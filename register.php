<?php
require_once 'phpClass/registerController.php';
require_once 'modules/top.php';
require_once 'modules/footer.php';

session_start();

if (file_exists('install.php')){
    echo '<p style="font-size: 20px; text-align: center">PHP installation script detected. First-time setup required!</p>';
    echo '<p style="font-size: 20px; text-align: center">Redirecting to installation script in 5 seconds...</p>';
    header('refresh:5, url=install.php');
    die();
}

// redirect based on superglobal login status
if (isset($_SESSION['isAdmin'])) {
    header("Location: cms.php");
    die();
}
  
if (isset($_SESSION['isUser'])) {
    header("Location: logged-in.php");
    die();
  }
 
$emailError = $phoneError = $passwordError = $retypeError = $nameError = $addressError = $cityError = $countryError = $zipcodeError = $accountTypeError  = $extraStoreError = '';

$allowRegister = true;

// regexes taken from previous JS assignment, in 'js/register_script.js'

$emailPattern = "/^(?!\.)(?!.*\.\.)([\w.]+)[^.]@[^.](?!.*\.\.)[\w]+(\.(\w+))*(\.([A-Za-z]{2,5}))$/";
$phonePattern = "/^(?!-| |\.)(?!.*(--|  |\.\.|-\.|- | -| \.|\.-|\. ))([0-9-. ]{9,22})(?<!(-| |\.))$/";
$passwordPattern = "/^(?!.*\s)(?=.*\d)(?=.*[!@#\$%\^&\*])(?=.*[A-Z])(?=.*[a-z])(.{8,20})$/";
$genericPattern = "/^(.{3,})$/";
$genericPattern2 = "/^(\D{3,})$/";
$zipPattern = "/^(\d{4,6})$/";

if (isset($_POST['submitRegister'])) {    
    if (!preg_match($emailPattern, $_POST['email'])){
        $emailError = '<p style="color: red; font-size: 13px; text-align: left">Email cannot begin/end with period (before/after @ sign), no consecutive periods and min of 2, max of 5 characters for last domain</p>';
        $allowRegister = false;
    }
    if (!preg_match($passwordPattern, $_POST['password'])){
        $passwordError = '<p style="color: red; font-size: 13px; text-align: left">Password must contain lowercase, uppercase, digit and special characters!</p>';
        $allowRegister = false;
    }

    if (!preg_match($phonePattern,$_POST['phone'])){
        $phoneError = '<p style="color: red; font-size: 13px; text-align: left">Phone no. starts and ends with a digit, 9-12 digits total, no consecutive dash/space/dot!</p>';
        $allowRegister = false;
    }

    if ($_POST['retypePassword'] != $_POST['password']){
        $retypeError = '<p style="color: red; font-size: 13px; text-align: left">Retyped password does not match!</p>';
        $allowRegister = false;
    }

    if (!preg_match($genericPattern2,$_POST['firstName'])){
        $nameError = '<p style="color: red; font-size: 13px; text-align: left">Name can only contain letters, minimum of 3 characters!</p>';
        $allowRegister = false;
    }

    if (!preg_match($genericPattern2,$_POST['lastName'])){
        $nameError = '<p style="color: red; font-size: 13px; text-align: left">Name can only contain letters, minimum of 3 characters!</p>';
        $allowRegister = false;
    }

    if (!preg_match($genericPattern,$_POST['address'])){
        $addressError = '<p style="color: red; font-size: 13px; text-align: left">Address must only contain minimum of 3 characters!</p>';
        $allowRegister = false;
    }

    if (!preg_match($genericPattern2,$_POST['city'])){
        $cityError = '<p style="color: red; font-size: 13px; text-align: left">City must only contain minimum of 3 characters!</p>';
        $allowRegister = false;
    }

    if (!preg_match($zipPattern,$_POST['zipcode'])){
        $zipcodeError = '<p style="color: red; font-size: 13px; text-align: left">Zipcode must contain minimum of 4 and maximum of 6 digits!</p>';
        $allowRegister = false;
    }

    if($_POST['country'] == ''){
        $countryError = '<p style="color: red; font-size: 13px; text-align: center">Please select a country</p>';
        $allowRegister = false;
    }
        
    if(!isset($_POST['rad'])){
        $accountTypeError = '<p style="color: red; font-size: 13px; text-align: center">Please select an account type</p>';
        $allowRegister = false;
    }

    elseif ($_POST['rad'] == 'Store Owner'){
        if (!preg_match($genericPattern2,$_POST['businessName']) || !preg_match($genericPattern2,$_POST['storeName'])){
            $extraStoreError = '<p style="color: red; font-size: 13px; text-align: left">Please fill out bussiness and store name with minimum of 3 characters.</p>';
            $allowRegister = false;
        }
    }

    if ($allowRegister) {        
        $login = (new Register())->register();
        die();
    }    
}

// top module, then manually specified stylesheets, then navbar module
// edit in 'modules/top.php'
topModule();  
  echo '<link rel="stylesheet" href="css/register.css">';
  echo '<link rel="stylesheet" href="css/styles.css">';
navModule("Cinery | Register");
?>

<main>
    <div class="parent-form">

        <div class="form-area">

            <div class="top-form">
                <h1 class="top-text">Register</h1>
            </div>

            <form id="register-form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="input-group">
                <input type="email" name="email" class="input-field" id="" placeholder="Email address" required>
                <div id=""> <?php echo $emailError; ?></div>
                <div id=""> <?php
                if (isset($_GET['alreadyExists']) && $_GET['alreadyExists'] && isset($_SESSION['adminExists']))
                echo '<p style="color: red; font-size: 13px; text-align: center">'. $_SESSION["adminExists"] . '</p>';
                if (isset($_GET['alreadyExists']) && $_GET['alreadyExists'] && isset($_SESSION['emailExists']))
                echo '<p style="color: red; font-size: 13px; text-align: center">'. $_SESSION["emailExists"]. '</p>';
                 ?>
                 </div>

                <input type="text" name="phone" class="input-field" id="" placeholder="Phone number" required>
                <div id=""><?php echo $phoneError; ?></div>
                <div id=""> <?php
                if (isset($_GET['alreadyExists']) && $_GET['alreadyExists'] && isset($_SESSION['phoneExists']))
                echo '<p style="color: red; font-size: 13px; text-align: center">'. $_SESSION["phoneExists"]. '</p>'; 
                 ?></div>

                <input type="password" name="password" class="input-field"  id="" placeholder="Password" required>
                <div id=""><?php echo $passwordError; ?></div>

                <input type="password" name="retypePassword" class="input-field" id="" placeholder="Retype password" required>
                <div id=""><?php echo $retypeError; ?></div>
                
                <input type="text" name="firstName" id="" class="input-field-first" placeholder="First name" required>

                <input type="text" name="lastName" id="" class="input-field-last" placeholder="Last name" required>
                <div id=""><?php echo $nameError; ?></div>

                <input type="text" name="address" id="regAddress" class="input-field" placeholder="Address" required>
                <div id=""><?php echo $addressError; ?></div>

                <input type="text" name="city" id="regCity" class="input-field" placeholder="City" required>
                <div id=""><?php echo $cityError; ?></div>
                <br></br>
                <!-- reading through csv file of countries with respective code
                then generate a corresponding dropdown selection -->
                <select name="country" id="">
                    <option value="">Select your country</option>
                    <?php
                    $file = fopen("others/countries.csv", "r");
                    fgets($file);

                    while (!feof($file)){
                        $country_row = fgetcsv($file);

                        echo "<option value='$country_row[1]'>$country_row[0]</option>";
                    }
                    fclose($file);
                    ?>                
                </select>
                <div id=""><?php echo $countryError; ?></div>

                <input type="number" name="zipcode" id="regZip" class="input-field" placeholder="Zip code" required>
                <div id=""><?php echo $zipcodeError; ?></div>

                <fieldset>
                    <legend>Account Type</legend>

                    <input id="rad0" class="rad" name="rad" value="Shopper" type="radio">
                    <label for="rad0" class="btn" id="type-label">Shopper</label>

                    <input id="rad1" class="rad" name="rad" value="Store Owner" type="radio">
                    <label for="rad1" class="btn" id="type-label">Store owner</label>
                    <div ><?php echo $accountTypeError; ?></div>

                    <div class="store-extra">
                        <div id="store-owner">
                            <input type="text" name="businessName" class="input-field" placeholder="Business name">
                            <input type="text" name ="storeName" class="input-field" placeholder="Store name">

                            <label for="store-type" id="category-label">Store category:</label>                           

                            <select name="store-type" id="store-type">
                                <option value="Department">Department</option>
                                <option value="Grocery">Grocery</option>
                                <option value="Restaurant">Restaurant</option>
                                <option value="Clothing">Clothing</option>
                                <option value="Accessories ">Accessories </option>
                                <option value="Pharmacy">Pharmacy</option>
                                <option value="Technology">Technology</option>
                                <option value="Pet">Pet</option>
                                <option value="Toy">Toy</option>
                                <option value="Specialty">Specialty</option>
                                <option value="Thrift">Thrift</option>
                                <option value="Services">Services</option>
                                <option value="Kiosk">Kiosk</option>
                            </select>

                        </div>
                    </div>
                </fieldset>

                <input type="checkbox" id="terms" class="terms">
                <label for="terms" class="terms-label">I agree to the terms and
                    conditions</label>

                <input class="clear-btn" type="reset" value="Clear form">

                <button type="submit" name="submitRegister" id="register-btn" class="register-btn">Register</button>
                <div class="has-account">
                    <p>Already have an account? <a href="login.php">Sign in</a></p>
                </div>

            </form>
        </div>
    </div>
</main>

<?php
// footer, edit in 'modules/footer.php'
endModule();
?>

</html>
