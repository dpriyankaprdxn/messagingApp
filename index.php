<?php 
  session_start();
  require 'helper/database.php';
  require_once 'helper/baseUrl.php';

  $db = new Database();

  if(!isset($_SESSION["id"])) {
    header('location: http://localhost/messagingApp/views/login.php');
  }
?>
<!doctype html>
<!-- If multi-language site, reconsider usage of html lang declaration here. -->
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <title>Home | Messaging App</title>
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
      <div class="result">
        <div class="wrapper">
          <ul class="heading">
            <li>Name</li>
            <li>Online Status</li>
          </ul>
      <?php       
        if(isset($_SESSION["id"])) {
          $result = $db->getAllUsers();
          while($row = $result->fetch_assoc()){ 
            echo '<ul>'; 
            if ($row['id'] == $_SESSION["id"] ) {
              echo "<li>".$row['first_name'].' '.$row['last_name'].'</li>';
            }
            else {
              echo "<li><a href='".$baseUrl."/views/dashboard.php?id=".$row['id']."' alt='".$row['first_name'].' '.$row['last_name']."'>".$row['first_name'].' '.$row['last_name'].'</a></li>';
            }
            if ($row['status'] == 1) {
              echo '<li class="online">Online</li>';
            }
            else {
              echo '<li class="offline">Offline</li>';
            }
            echo '</ul>';
          }
        }
        else {
        }
      ?>  
        </div>
      </div>
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
