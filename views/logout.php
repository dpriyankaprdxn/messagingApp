<?php
    session_start();

    require_once '../helper/Database.php';
    
    $id = $_SESSION['id'];
    
    session_unset();
    session_destroy();

    if(isset($_SESSION['id']) == false ) {
         $db = new Database();

         $db->updateStatus('0',$id);

        header('location: http://localhost/messagingApp/');
    }
    header("location:http://localhost/messagingApp/views/login.php");
       
?>