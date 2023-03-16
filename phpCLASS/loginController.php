<?php

class Login
{
    public $username;    
    public $password;

    // variables in array later made available through $_SESSION to 
    // display in user dashboard
    public $readEmail;
    public $readPhone;
    public $readName;
    public $readAccountType;
    public $readPassword;

    // initialize array to place lines fed from text files later
    public $data;

    public function __construct()
    {
        // sanitize inputs for safety and consistency
        $this->username = @trim(htmlentities(strtolower($_POST['username'])));
        $this->password = @trim(htmlentities($_POST['password']));
    }

    // separate user verification function to authenticate normal users
    public function verifyUser()
    {
        if (file_exists("../users.txt")) {
            $d = file_get_contents("../users.txt");
            $data = explode("\n", $d);

            foreach ($data as $row => $data) {

                $row_user = explode('|', $data);
                $this->readEmail = @trim(strtolower($row_user[0]));
                $this->readPhone = @trim($row_user[1]);
                $this->readPassword = @trim($row_user[2]);
                $this->readName = @trim($row_user[3]) . ' ' . @trim($row_user[4]);
                $this->readAccountType = @trim($row_user[9]);

                // check for both username and password for a match in the "database"
                if ((strcmp($this->readEmail, $this->username) === 0 || strcmp($this->readPhone, $this->username) === 0) && password_verify($this->password, $this->readPassword)) {

                    return array($this->readEmail,$this->readPhone,$this->readName,$this->readAccountType);
                }
            }
        }        
        return null;
    }

    // separate user verification function to authenticate store owners
    public function verifyStoreOwner()
    {
        if (file_exists("../storeOwners.txt")) {
            $d = file_get_contents("../storeOwners.txt");
            $data = explode("\n", $d);

            foreach ($data as $row => $data) {

                $row_user = explode('|', $data);
                $this->readEmail = @trim(strtolower($row_user[0]));
                $this->readPhone = @trim($row_user[1]);
                $this->readPassword = @trim($row_user[2]);
                $this->readName = @trim($row_user[3]) . ' ' . @trim($row_user[4]);
                $this->readAccountType = @trim($row_user[9]);

                // check for both username and password for a match in the "database"
                if ((strcmp($this->readEmail, $this->username) === 0 || strcmp($this->readPhone, $this->username) === 0) && password_verify($this->password, $this->readPassword)) {

                    return array($this->readEmail,$this->readPhone,$this->readName,$this->readAccountType);
                }
            }
        }        
        return null;
    }
    // separate user verification function to authenticate admins
    public function verifyAdmin()
    {
        if (file_exists("../admins.txt")){
            $d = file_get_contents("../admins.txt");
            $data = explode("\n", $d);

            foreach ($data as $row => $data) {
                $row_user = explode('|', $data);

                $this->readUsername = @trim(strtolower($row_user[0]));
                $this->readPassword = @trim($row_user[1]);
                // check for both username and password for a match in the "database"
                if (strcmp($this->readUsername, $this->username) === 0 && password_verify($this->password, $this->readPassword)) {
                    return true;
                }
            }
            return false;
        }        
        return false;
    }

    public function logIn()
    {
        // first, see if it's an admin
        if ($this->verifyAdmin()) {
            $_SESSION['adminName'] = $this->username;
            $_SESSION['email'] = '';
            $_SESSION['name'] = '';
            $_SESSION['accountType'] = 'Administrator';
            $_SESSION['isAdmin'] = true;

            echo '<p style="font-size: 20px; text-align: center"><b>Welcome, administrator ' . $this->username . '.</b></p>';
            header("refresh:3; url=cms.php");
            die();
        }

        // check if it's a store owner
        elseif ($this->verifyStoreOwner() != null) {
            $data = $this->verifyStoreOwner();
            $_SESSION['email'] = $data[0];
            $_SESSION['phone'] = $data[1];
            $_SESSION['name'] = $data[2];
            $_SESSION['accountType'] = $data[3];
            $_SESSION['isUser'] = true;    

            header("Location: logged-in.php");
            die();        
        } 

        // otherwise, must be an user
        elseif ($this->verifyUser() != null) {
            $data = $this->verifyUser();
            $_SESSION['email'] = $data[0];
            $_SESSION['phone'] = $data[1];
            $_SESSION['name'] = $data[2];
            $_SESSION['accountType'] = $data[3];
            $_SESSION['isUser'] = true;    

            header("Location: logged-in.php");
            die();        
        } 

        // neither, failed authentication
        else {
            $_SESSION['invalidReason'] = 'Invalid username or password!';
            header("Location: login.php?invalidLogin=true");
            die();
        }
    }

    public function logOut()
    {
        session_start();
        session_unset();
        header("Location: login.php");
        die();
    }
}

?>