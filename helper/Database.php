	<?php
	class Database
	{
		private $serverName;
		private $userName;
		private $password;
		private $databaseName;
		public $conn;

		public function __construct() {
			$this->connect();
		}
		public function connect(){
			try {
				$this->serverName = 'localhost';
				$this->userName = "root";
				$this->password = '';
				$this->databaseName = "messaging_app";
				// Create connection
				$this->conn = new mysqli($this->serverName, $this->userName, $this->password,$this->databaseName,'3308');
				// Check connection
				if ($this->conn->connect_error)
					die("Connection failed: " . $this->conn->connect_error);
				return $this->conn;
			}
			catch(Exception $e) {
				echo "There is some problem in connection: " . $e->getMessage();
			}
		}

		public function closeConnection(){
			$this->conn-> close();
		}

		public function insertUser($firstName,$lastName,$email,$password)
		{
			$insert = "insert into users(first_name,last_name,email,password,status)values('".$firstName."','".$lastName."','".$email."','".$password."','1')";

			return $insert;
		}
		
		public function escapeString($data) 
		{
			$string = $this->conn->real_escape_string($data);
			return $string;
		}
		
		public function existingUser($email) 
		{
			$result = $this->conn->query("SELECT email FROM users WHERE email='".$email."'");
			if ($result->num_rows > 0) {
				return true;
			} 
			else {
				return false;
			}
		}
		
		public function validUser($email) 
		{
			$result = $this->conn->query("SELECT * FROM users WHERE email='". $email ."'");
			if ($result->num_rows > 0) {
				if($row = $result->fetch_assoc()) {
					return $row;
				}
			} 
			else {
				return false;
			}
		}
		
		public function getAllUsers() 
		{
			$select = 'select * from users';
			$result = $this->conn->query($select);
			return $result;
		}
		
		function getSingleUser($conn,$id) 
		{
			$select = 'select * from users where id = '.$id;
			$result = mysqli_query($conn,$select);
			return $result;
		}
		
		public function updateStatus($status,$id) 
		{
			$update = "UPDATE users SET status ='".$status."' WHERE id = ". $id;
			if ($this->conn->query($update) === TRUE) {
				echo "Record updated successfully";
			  } else {
				echo "Error updating record: " . $this->conn->error;
			}
			return $update;
		}

		public function getUserName($id) 
		{
			$getUserName = "SELECT * FROM users WHERE id=".$id."";
			$result = $this->conn->query($getUserName);
			return $result->fetch_assoc();
		}
	}
?>
