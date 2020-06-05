<?php

	include_once 'Database.php';

	class Chat extends Database
	{
		private $sender_id;
		private $reciver_id;
		private $msg;
        private $time;
        
		public function __construct($sender_id, $reciver_id, $msg, $time)
		{
			$this->sender_id = $sender_id;
			$this->reciver_id = $reciver_id;
			$this->msg = $msg;
			$this->time = $time;
		}
		public function msgSend()
		{   
            $db = new Database();

            $senderId = $this->sender_id;
            $reciverId = $this->reciver_id;
            $insert = "INSERT INTO chat (sender_id, reciver_id, msg, sent_time) VALUES (".$senderId.",".$reciverId.",'".$this->msg."','".$this->time."')";

            if ($db->conn->query($insert) === TRUE) {
                return "msg sent";
            } else {
                $string = "Error: " . $insert . "<br>" . $db->conn->error;
                return $string;
            }
            $conn->close();
		}
	}

?>
