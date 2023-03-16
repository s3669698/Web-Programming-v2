<?php
  if (isset($_POST['act'])) {
    if ($_FILES["profile_image"]["error"] == UPLOAD_ERR_OK) {
      $new_location = './van.jpg';    
      move_uploaded_file($_FILES['profile_image']['tmp_name'], $new_location);
    }
  }
?>

<?php
require_once 'modules/top.php';
require_once 'modules/footer.php';

// top module, then manually specified stylesheets, then navbar module
// edit in 'modules/top.php'
topModule();  
  echo '<link rel="stylesheet" href="css/styles.css">';
  echo '<link rel="stylesheet" href="css/aboutus.css">';
navModule("Cinery | About Us");

?>

<main>
    <h2>Team Profile</h2>

    <button id="myBtn">
        <div class="card">
            <img src="media/nguyen.jpg">
            <h1>Le Thanh Nguyen</h1>
            <p class="title">s3638100</p>
            <h4>RMIT University</h4>
        </div>
    </button>

    <div id="myModal" class="modal">
        <div class="modal-content">
        <p>My name is Ma Tu Van. I am an very friendly and joyful person. My hometown is Guangzhou, China. </p>
        </div>
    </div>
    
    <button id="myBtn">
        <div class="card">
            <img src="media/van.jpg">
            <h1>Ma Tu Van</h1>
            <p class="title">s3877618</p>
            <h4>RMIT University</h4>
        </div>
    </button>

    <div id="myModal" class="modals">
        <div class="modal-contents">
          <p>My name is Ma Tu Van. I am an very friendly and joyful person. My hometown is Guangzhou, China. </p>
        </div>
    </div>

    <button id="myBtn">
        <div class="card">
            <img src="media/duc.jpg">
            <h1>Nguyen Huu Duc</h1>
            <p class="title">s3669698</p>
            <h4>RMIT University</h4>
        </div>
    </button>

    <div id="myModal" class="modals">
        <div class="modal-contents">
          <p>My name is Nguyen Huu Duc. I am a very friendly and joyful person. My hometown is Guangzhou, China. </p>
        </div>
    </div>

<?php
// footer, edit in 'modules/footer.php'
endModule();
?>
<script src="js/modal.js"></script>

</html>


<form enctype="multipart/form-data" method="post" action="upload.php">
  <input type="file" name="profile_image">
  <input type="submit" name="act" value="Upload">
</form>