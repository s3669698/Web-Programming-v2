<?php
require_once 'phpClass/loginController.php';

if (file_exists('install.php')){
    echo '<p style="font-size: 20px; text-align: center">PHP installation script detected. First-time setup required!</p>';
    echo '<p style="font-size: 20px; text-align: center">Redirecting to installation script in 5 seconds...</p>';
    header('refresh:5, url=install.php');
    die();
}

session_start();
if (!(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'])) {
    echo "You do not have permission to view this page.";
    header("refresh:3; url=login.php");
    die();
}

if (isset($_POST['submitLogOut'])) {
    $logout = (new Login())->logOut();    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="css/cms.css">
<link rel="stylesheet" href="css/logged-in.css">
</head>

<body>
<div class="header">
<img src="media/admin.png" alt="adminlogo" id="adminLogo"><br>Admin Panel.
</div>

<div class="sidebar">
    <ul>
        <li><a href="#"> Add Data </a></li>
        <li><a href="#"> Delete Data </a></li>
        <li><a href="upload.php"> Update Photo </a></li>
        <li><a href="#"> Developer </a></li>
    </ul>
</div>

<div class="data">
  <p>Welcome to the Admin Dashboard !</p>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <button id="logout-btn" name="submitLogOut" type="submit" class="btn">Log out</button>
    </form>
</div>


</body>

</html>
