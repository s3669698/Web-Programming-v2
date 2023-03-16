<?php

class Register
{
    public $email;
    public $phone;    
    public $password;
    public $firstName;
    public $lastName;
    public $address;
    public $city;
    public $country;
    public $zipcode;
    public $accountType;

    // for admin setup in install.php
    public $adminUsername;
    public $adminPassword;
    
    // for store owners
    public $businessName;
    public $storeName;
    public $storeType;


    // array to place lines fed from text files later
    public $data;

    public $readEmail;
    public $readPhone;

    public $readAdmin;

    public function __construct()
    {
        // sanitize inputs for safety and consistency
        $this->adminUsername = @trim(htmlentities(strtolower($_POST['adminUsername'])));
        $this->adminPassword = @password_hash($_POST['adminPassword'], PASSWORD_DEFAULT);
        
        $this->email = @trim(htmlentities(strtolower($_POST['email'])));
        $this->phone = @$_POST['phone'];
        $this->password = @password_hash($_POST['password'], PASSWORD_DEFAULT);
        $this->firstName = @trim(ucwords($_POST['firstName']));
        $this->lastName = @trim(ucwords($_POST['lastName']));
        $this->address = @trim(ucwords($_POST['address']));
        $this->city = @ucwords($_POST['city']);
        $this->country = @trim($_POST['country']);
        $this->zipcode = @trim($_POST['zipcode']);
        $this->accountType = @htmlentities($_POST['rad']);
        $this->businessName = @htmlentities($_POST['businessName']);
        $this->storeName = @htmlentities($_POST['storeName']);
        $this->storeType = @$_POST['store-type'];
    }

    public function registerAdmin(){
        if ($this->isAdminAvailable()){
            $data = array($this->adminUsername, $this->adminPassword);
            $registerInfo = implode('|',$data);

            file_put_contents("../admins.txt", $registerInfo.PHP_EOL, FILE_APPEND);
    
            echo '<p style="text-align:center"><b>PHP installation completed!</b></p><br>';
            echo '<p style="text-align:center"><b>Delete the install.php file to begin using or <a href="install.php">click here</a> to go back and add another admin user</b></p>';
            die();
        }
        else {
            header("Location: install.php?alreadyExists=true");
            die();
        }
    }

    public function register()
    {
        // see if phone number/email is available
        if ($this->isAdminAvailable() && $this->isEmailAndPhoneAvailable()) {
            if ($this->accountType === 'Store Owner'){
                // Primary indices: email - 0, phone - 1, password - 2, account type - 9
                $data = array($this->email, $this->phone, $this->password, $this->firstName, $this->lastName,  $this->address, $this->city, $this->country, $this->zipcode, $this->accountType, $this->businessName, $this->storeName, $this->storeType);

                $registerInfo = implode('|',$data);
                file_put_contents("../storeOwners.txt", $registerInfo.PHP_EOL, FILE_APPEND);
                echo '<p style="text-align:center"><b>Successfully registered!</b></p><br>';
                echo '<p style="text-align:center"><b>Redirecting to login page in 3 seconds...</b></p><br>';
                header("refresh:3; url=login.php");
                die();
            }
            else {
                $data = array($this->email, $this->phone,$this->password, $this->firstName, $this->lastName,  $this->address, $this->city, $this->country, $this->zipcode, $this->accountType);
                $registerInfo = implode('|',$data);
                file_put_contents("../users.txt", $registerInfo.PHP_EOL, FILE_APPEND);
                echo '<p style="text-align:center"><b>Successfully registered!</b></p><br>';
                echo '<p style="text-align:center"><b>Redirecting to login page in 3 seconds...</b></p><br>';
                header("refresh:3; url=login.php");
                die();
            }
        }
        else {
            header("Location: register.php?alreadyExists=true");
            die();
        }      
    }

    public function isAdminAvailable(){
        if (file_exists("../admins.txt")){
            $d = file_get_contents("../admins.txt");
            $data = explode("\n", $d);

            foreach ($data as $row => $data) {

                $row_user = explode('|', $data);
                $this->readAdmin = @trim(strtolower($row_user[0]));

                // check if user already exists depending on whether POST data
                // is coming from PHP installation page or normal register page
                if (!isset($_POST['email'])) {
                    if (strcmp($this->readAdmin, $this->adminUsername) === 0) {
                        $_SESSION['adminExists'] = $this->adminUsername . ' is not available';
                        return false;
                    }
                }
                elseif (strcmp($this->readAdmin, $this->email) === 0){
                    $_SESSION['adminExists'] = $this->email . ' is not available';
                    return false;
                }
            }
            $_SESSION['adminExists'] = '';
            return true;
        }
        else{
            $files = fopen("../admins.txt","x");
            fwrite($files,'');
            fclose($files);
            return true;
        }
    }


    public function isEmailAndPhoneAvailable(){
        // see if user is signing up as a store owner
        // to store login info in a separate flat file
        if ($this->accountType === 'Store Owner'){
            if (file_exists("../storeOwners.txt")){
                $d = file_get_contents("../storeOwners.txt");
                $data = explode("\n", $d);
    
                foreach ($data as $row => $data) {
    
                    $row_user = explode('|', $data);
                    $this->readEmail = @trim(strtolower($row_user[0]));
                    $this->readPhone = @trim($row_user[1]);
    
                    // check if email/phone already exists
                    if (strcmp($this->readEmail, $this->email) === 0 && strcmp($this->readPhone, $this->phone) === 0) {
                        $_SESSION['emailExists'] = $this->email . ' is not available';
                        $_SESSION['phoneExists'] = $this->phone . ' is not available';
                        return false;
                    }

                    elseif (strcmp($this->readEmail, $this->email) === 0) {
                        $_SESSION['emailExists'] = $this->email . ' is not available';
                        return false;
                    }

                    elseif (strcmp($this->readPhone, $this->phone) === 0) {
                        $_SESSION['phoneExists'] = $this->phone . ' is not available';
                        return false;
                    }
                }
                $_SESSION['emailExists'] = '';
                $_SESSION['phoneExists'] = '';
                $_SESSION['adminExists'] = '';
                return true;
            }
            else {
                $files = fopen("../storeOwners.txt","x");
                fwrite($files,'');
                fclose($files);
                return true;
            }
        }
        if (file_exists("../users.txt")){
            $d = file_get_contents("../users.txt");
            $data = explode("\n", $d);

            foreach ($data as $row => $data) {

                $row_user = explode('|', $data);
                $this->readEmail = @trim(strtolower($row_user[0]));
                $this->readPhone = @trim($row_user[1]);

                // check if email/phone already exists
                if (strcmp($this->readEmail, $this->email) === 0 && strcmp($this->readPhone, $this->phone) === 0) {
                    $_SESSION['emailExists'] = $this->email . ' is not available';
                    $_SESSION['phoneExists'] = $this->phone . ' is not available';
                    return false;
                }

                elseif (strcmp($this->readEmail, $this->email) === 0) {
                    $_SESSION['emailExists'] = $this->email . ' is not available';
                    return false;
                }

                elseif (strcmp($this->readPhone, $this->phone) === 0) {
                    $_SESSION['phoneExists'] = $this->phone . ' is not available';
                    return false;
                }
            }
            $_SESSION['emailExists'] = '';
            $_SESSION['phoneExists'] = '';
            $_SESSION['adminExists'] = '';
            return true;
        }
        else{
            $files = fopen("../users.txt","x");
            fwrite($files,'');
            fclose($files);
            return true;
        }
    }
}