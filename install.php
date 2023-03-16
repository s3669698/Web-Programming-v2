<?php
require_once 'phpClass/registerController.php';
require_once 'modules/top.php';

session_start();

$adminError = '';

$allowRegister = true;

if (isset($_POST['submitAdmin'])) {
    if ($_POST['confirmAdminPassword'] != $_POST['adminPassword']){
        $adminError = '<p style="color: red; font-size: 13px; text-align: left">Retyped password does not match!</p>';
        $allowRegister = false;
    }
    
    if ($allowRegister) {        
        $login = (new Register())->registerAdmin();
        die();
    }
}

topModule();
?>
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/styles.css">
<title>PHP Installation</title>
</head>

<form id="login-form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="input-group">
    <input type="text" name="adminUsername" id="" class="input-field" placeholder="Enter admin user name here"
    required>

    <input type="password" name="adminPassword" id="" class="input-field" placeholder="Enter password" required>
    <input type="password" name="confirmAdminPassword" id="" class="input-field" placeholder="Confirm password" required>
    <div id=""> <?php echo $adminError; ?></div>
    <div>
    <?php
    if (isset($_GET['alreadyExists']) && $_GET['alreadyExists'] && isset($_SESSION['adminExists']))
    echo '<p style="color: red; font-size: 13px; text-align: center">'. $_SESSION["adminExists"] . '</p>';
        ?>
    </div>
    <br></br>
    
    <button type="submit" name="submitAdmin" id="login-btn" class="login-btn">Setup</button>

</form>