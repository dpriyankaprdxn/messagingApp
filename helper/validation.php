<?php
    session_start();
    require 'database.php';

    class Validation
    {
        // Initialize variables to null
        public $fnameError = '';
        public $lnameError =  '';
        public $emailError = '';
        public $passwordError = '';
        public $repasswordError = '';
        public $firstName =  '';
        public $lastName = '';
        public $email  = '';
        public $password = '';
        public $repassword = '';
        public $loginStatus = '';
        protected $formfName , $formlName , $FormEmail , $formPassword , $formRepassword ;
        private $data;

        // testinput function
        public function testInput($data) 
        {   
            $this->data =  $data;
            $this->data = trim($this->data);
            $this->data = stripslashes($this->data);
            $this->data = htmlspecialchars($this->data);
            return $this->data;
        }

        // validate first name function/
        public function validateFirstName($ffName) 
        {
            $this->formfName = $ffName;
            if (empty($this->formfName)) {
                $this->fnameError = "First Name is required";
              } 
              else {
                $this->firstName = $this->testInput($this->formfName);
                
                if (!preg_match("/^[a-zA-Z]+$/",$this->formfName)) {
                  $this->fnameError = "Only letters allowed";
                }
            }
        }

        // function for validate last name 
        public function validateLastName($flName) 
        {
            $this->formlName = $flName;
            if (empty($this->formlName)) {
                $this->lnameError = "Last Name is required";
              } 
              else {
                $this->lastName = $this->testInput($this->formlName);
                
                if (!preg_match("/^[a-zA-Z]+$/",$this->formlName)) {
                  $this->lnameError = "Only letters allowed";
                }
            }
        }

        // function for email validation
        public function validateEmail($femail)
        {
            $this->formEmail = $femail;
            if (empty($this->formEmail)) {
                $this->emailError = "Email is required";
              } 
              else {  
                $this->email = $this->testInput($this->formEmail);
                
                if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $this->email)) {
                  $this->emailError = "Invalid email format";
                }
            }
        }

        // function for checking password validation and confirm password
        public function validatePassword($fPassword,$fRepassword) 
        {
            $this->formPassword = $fPassword;
            $this->formRepassword = $fRepassword;
            if (!empty($this->formPassword)) {
                $this->password = $this->testInput($this->formPassword);
                $this->repassword = $this->testInput($this->formRepassword);
                
                if (strlen($this->formPassword) <= '8') {
                  $this->passwordError = "Your Password Must Contain At Least 8 Characters";
                }
                elseif (strlen($this->formPassword) >= '15') {
                  $this->passwordError = "Your Password Must Contain maximum 15 Characters";
                }
                elseif(!preg_match("#[0-9]+#",$this->formPassword)) {
                  $this->passwordError = "Your Password Must Contain At Least 1 Number";
                }
                elseif(!preg_match("#[A-Z]+#",$this->formPassword)) {
                  $this->passwordError = "Your Password Must Contain At Least 1 Capital Letter";
                }
                elseif(!preg_match("#[a-z]+#",$this->formPassword)) {
                  $this->passwordError = "Your Password Must Contain At Least 1 Lowercase Letter";
                }
                elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $this->formPassword)) {
                  $this->passwordError .= "Your Password Must Contain At Least 1 Special Character";
                }
            }
            else {
                $this->passwordError = "Please enter password";
            } 
            if ($this->passwordError == "" && $this->formPassword != $this->formRepassword) {	
                $this->repasswordError = "Please Check You've Entered Or Confirmed Your Password";
            }
        }

        // function for register form data validate
        public function registerForm () 
        {
            $this->validateFirstName($_POST["firstname"]);
            $this->validateLastName($_POST["lastname"]);
            $this->validateEmail($_POST["email"]);
            $this->validatePassword($_POST["password"],$_POST['repassword']);
            
            if( $this->fnameError == "" && $this->lnameError == "" && $this->emailError == "" && $this->passwordError == "" && $this->repasswordError == "" ) {
            
                $db = new Database();

                $this->password = password_hash($this->password,PASSWORD_DEFAULT);
                $existingEmail = $db->escapeString($this->email);
                $existingUser = $db->existingUser($existingEmail);
            
                if ($existingUser)
                {
                  header("Location: login.php");
                }
                else {
                  $insert = $db->insertUser($this->firstName,$this->lastName,$this->email,$this->password);
                
                  if ($db->conn->query($insert) === TRUE) {
                    $id = $db->conn->insert_id;
            
                    if(isset($_SESSION['id'])) {
                      echo 'New user add successfully';
                    }
                    else {
                        $_SESSION['id'] = $id;  
                    }
                    header("Location: http://localhost/messagingApp/");                    
                    } 
                    else {
                        echo "Error: " . $insert . "<br>" . $db->closeConnection();
                    }
                }
            }
        }

        // function for login form validation
        public function loginForm() 
        {
            $this->validateEmail($_POST["email"]);
            if (empty($_POST["password"])) {
                $this->passwordError = "password is required";
              } 
            if ( $this->emailError  == "" &&  $this->passwordError == ""){
                $db = new Database();

                $row = $db->validUser($this->email);

                $passwordVerification = password_verify($this->password,$row['password']);

                if($row ==  false && $passwordVerification == false) {
                    $this->loginStatus='Invalid email or Password!';
                } 
                else {
                  $_SESSION['id'] = $row['id'];
                  $db->updateStatus('1',$_SESSION['id']);
                  header("Location: http://localhost/messagingApp/");
                }
            }
        }
    }
?> 