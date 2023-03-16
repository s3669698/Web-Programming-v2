<?php
require_once 'modules/top.php';
require_once 'modules/footer.php';

session_start();

if (file_exists('install.php')){
  echo '<p style="font-size: 20px; text-align: center">PHP installation script detected. First-time setup required!</p>';
  echo '<p style="font-size: 20px; text-align: center">Redirecting to installation script in 5 seconds...</p>';
  header('refresh:5, url=install.php');
  die();
}

// top module, then manually specified stylesheets, then navbar module
// edit in 'modules/top.php'
topModule();  
  echo '<link rel="stylesheet" href="css/styles.css">';
navModule("Cinery | Terms of Service");
?>
<main>
    
</main>
<?php
// footer, edit in 'modules/footer.php'
endModule();
?>

</html>
