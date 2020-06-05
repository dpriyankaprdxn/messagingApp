<?php
require_once '../helper/baseUrl.php';
require_once '../helper/validation.php';

$validation = new Validation();

if(isset($_SESSION['id'])) {
  header('location: http://localhost/messagingApp/');
}

if(isset($_POST['submit'])){
  $validation->registerForm();
}
?>
<!doctype html>
<!-- If multi-language site, reconsider usage of html lang declaration here. -->
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- Place favicon.ico in the root directory: mathiasbynens.be/notes/touch-icons -->
  <link rel="shortcut icon" href="favicon.ico" />
  <!--font-awesome link for icons-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Default style-sheet is for 'media' type screen (color computer display).  -->
  <link rel="stylesheet" media="screen" href="../assets/css/style.css" >
</head>
<body>
  <!--container start-->
  <div class="container">
    <!--header section start-->
    <header>
    <?php  include_once 'header.php'; ?>
    </header>
    <!--header section start-->
    <!--main section start-->
    <main>
      <section class="main-form">
        <div class="wrapper">
            <h2>Register Here</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
              <span>* required field.</span>
              <div class='form-container'>
                <div class="form-group">
                  <label>First Name:</label>
                  <input name="firstname" type="text" value="<?php if(isset($_POST['firstname'])) { echo $_POST['firstname']; } ?>">
                  <span class="error">* <?php echo $validation->fnameError;?></span>
                </div>
                <div class="form-group">
                  <label>Last Name:</label>
                  <input name="lastname" type="text" value="<?php if(isset($_POST['lastname'])) { echo $_POST['lastname']; } ?>">
                  <span class="error">* <?php echo $validation->lnameError;?></span>
                </div>
                <div class="form-group">
                  <label>Email:</label>
                  <input name="email" type="text" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">
                  <span class="error">* <?php echo $validation->emailError;?></span>
                </div>
                <div class="form-group">
                  <label>Password:</label>
                  <input name="password" type="password">
                  <span class="error">* <?php echo $validation->passwordError;?></span>
                </div>
                <div class="form-group">
                  <label>Confirm Password:</label>
                  <input name="repassword" type="password">
                  <span class="error">* <?php echo $validation->repasswordError;?></span>
                </div>
              </div>
              <div class="form-control">
                <input class="submit" name="submit" type="submit" value="Submit">
              </div>
          </form>
        </div>
      </section>
    </main>
    <!--main section end-->
    <!--footer section start-->
    <footer>      
    </footer>
    <!--footer section end-->
  </div>
  <!--container end-->
</body>
</html>
