<?php 
  session_start();

  if(!isset($_SESSION["id"])) {
    header('location: http://localhost/messagingApp/views/login.php');
  }

  require_once 'helper/baseUrl.php';

?>
<!doctype html>
<!-- If multi-language site, reconsider usage of html lang declaration here. -->
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <title>Client</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- Place favicon.ico in the root directory: mathiasbynens.be/notes/touch-icons -->
  <link rel="shortcut icon" href="favicon.ico" />
  <!--font-awesome link for icons-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Default style-sheet is for 'media' type screen (color computer display).  -->
  <link rel="stylesheet" media="screen" href="assets/css/style.css" >
</head>
<body>
  <!--container start-->
  <div class="container">
    <!--header section start-->
    <?php include 'views/header.php' ?>
    <!--header section start-->
    <!--main section start-->
    <main>
      <?php 
      if(isset($_SESSION['id'])) {
        echo $_SESSION['id']; 
      }
      ?>
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
