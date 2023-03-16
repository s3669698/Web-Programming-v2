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
  echo '<link rel="stylesheet" href="css/fees.css">';
navModule("Cinery | Fees");
?>  

<main>
    <h3>Shoppers</h3>
    <table id="customers">
        <tr>
          <th>Membership card types</th>
          <th>Prices</th>
          <th>Gifts</th>
        </tr>
        <tr>
          <td>Silver Member</td>
          <td>100.000VND/6 months</td>
          <td>50.000VND shopping voucher</td>
        </tr>
        <tr>
          <td>Gold Member</td>
          <td>200.000VND/6 months</td>
          <td>100.000VND shopping voucher + 1 free 2D movie ticket</td>
        </tr>
        <tr>
          <td>Platinum Member</td>
          <td>250.000VND/6 months</td>
          <td>150.000VND shopping voucher + 2 free 2D movie ticket</td>
        </tr>
      </table>
      <br>
      <h3>Store Rental</h3>
      <table id="customers">
          <tr>
            <th>Rental Areas</th>
            <th>Rent Prices</th>
          </tr>
          <tr>
            <td>North side of the mall</td>
            <td>500.000VND/month</td>
          </tr>
          <tr>
            <td>Mall center</td>
            <td>1.000.000VND/month</td>
          </tr>
          <tr>
            <td>South side of the mall</td>
            <td>450.000VND/month</td>
          </tr>
        </table>
</main>

<?php
// footer, edit in 'modules/footer.php'
endModule();
?>

</html>
