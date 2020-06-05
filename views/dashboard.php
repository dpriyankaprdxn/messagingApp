<?php
	session_start();

	include_once '../helper/Database.php';
  include_once '../helper/chat.php';
  require_once '../helper/baseUrl.php';

  if(!isset($_SERVER['HTTP_REFERER'])){
		header("Location: http://localhost/messagingApp/");
  }
  

  if (empty($_SESSION)) {
		header("Location: http://localhost/messagingApp/");
	}

	$db = new Database();

	if (isset($_GET['id'])) {
    
    $id = $db->escapeString($_GET['id']);
    $db->getUserName($id);
	}

	$getChat = "SELECT * FROM chat WHERE (sender_id=".$_SESSION['id']." and reciver_id=".$_GET['id'].") or (sender_id=".$_GET['id']." and reciver_id=".$_SESSION['id'].")" ;
	$result = $db->conn->query($getChat);
	$data = $result->fetch_assoc();
	
	if (isset($_POST['send'])) {
		if(!empty($_POST['message'])) {
			$time = date('Y:m:d H:i:s');
			$chat = new Chat($_SESSION['id'], $_GET['id'], $_POST['message'], $time);
			$val = $chat->msgSend();
		} else {
			echo "add message";
		}
	}

?>
<!DOCTYPE html>
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
      <section>
        <div class="wrapper">
          <div class="chat">
          <?php
						while ($row = $result->fetch_assoc()) {
							if ($_SESSION['id'] == $row['sender_id']) {
								echo "<p>
								<span class='time'>".$row['sent_time']."</span>
								<span class='sender-msg'>".$row['msg']."</span>
								</p>";
							} else {
								echo "<p>
								<span class='time'>".$row['msg']."</span>
								<span class='reciever-msg'>".$row['sent_time']."</span>
								</p>";
							}
						}
					?>
          </div>
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"].'?id='.$_GET['id']);?>">
                <div class="form-group">
                  <label>Message:</label>
                  <input name="message" type="text">
                </div>
              <div class="form-control">
                <input class="submit" name="send" type="submit" value="Send">
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
