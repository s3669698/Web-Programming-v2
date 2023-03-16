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
  echo '<link rel="stylesheet" href="css/faqs.css">';
navModule("Cinery | FAQs");
?>
  
<main>
    <h1>How can I help you?</h1>
    <h3>1. Does the mall or the stores provide worldwide shipping?</h3>
    <p>Ans: It depends on the stores, some may have, some may not but you can require the store owners to deliver products through post offices.</p>
    <h3>2. Can membership card be changed or refund?</h3>
    <p>Ans: Membership card can not be refund in any circumstances, however, you can change from low level cards to higher cards and vice versa with some additional fees can be charged.</p>
</main>


<?php
// footer, edit in 'modules/footer.php'
endModule();
?>
</html>
