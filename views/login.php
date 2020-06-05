<?php

require_once '../helper/baseUrl.php';
require_once '../helper/validation.php';
$validation = new Validation();

if(isset($_SESSION['id'])) {
  header('location: http://localhost/messagingApp');
}

if(isset($_POST['submit'])){
  $validation->loginForm();
}

?>

<!doctype html>
<!-- If multi-language site, reconsider usage of html lang declaration here. -->
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- Place favicon.ico in the root directory: mathiasbynens.be/notes/touch-icons -->
  <link rel="shortcut icon" href="favicon.ico" />
  <!--font-awesome link for icons-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Default style-sheet is for 'media' type screen (color computer display).  -->
  <link rel="stylesheet" media="screen" href="<?php echo $baseUrl;  ?>/assets/css/style.css" >
</head>
<body>
  <!--container start-->
  <div class="container">
    <!--header section start-->
    <?php 
      include_once 'header.php'; 
      ?>
    <!--header section start-->
    <!--main section start-->
    <main>
      <section class="login">
        <div class="wrapper">
            <h2>Login Here</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
              <span>* required field.</span>
              <div class='form-container'>
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
              </div>
              <div class="form-control">
                <input class="submit" name="submit" type="submit" value="Login">
                <span class="status"> <?php echo $validation->loginStatus;?></span>
              </div>
          </form>
          <div class="register">
            <a title="Not a member" href="<?php echo  $baseUrl; ?>/views/register.php">Don't have account</a>
          </div>
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
