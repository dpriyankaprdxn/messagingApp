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

		function insertUser($firstName,$lastName,$email,$password)
		{
			$insert = "insert into users(first_name,last_name,email,password,status)values('".$firstName."','".$lastName."','".$email."','".$password."','1')";

			return $insert;
		}
		
		function escapeString($data) 
		{
			$string = $this->conn->real_escape_string($data);
			return $string;
		}
		
		function existingUser($email) 
		{
			$result = $this->conn->query("SELECT email FROM users WHERE email='".$email."'");
			if ($result->num_rows > 0) {
				return true;
			} 
			else {
				return false;
			}
		}
		
		function validUser($email) 
		{
			$result = $this->conn->query("SELECT * FROM users WHERE email='". $email ."'");
			if($row = mysqli_fetch_array($result)) {
				return $row;
			}
		}
		
		function getAllUsers($conn) 
		{
			$select = 'select * from users';
			$result = mysqli_query($conn,$select);
			return $result;
		}
		
		function getSingleUser($conn,$id) 
		{
			$select = 'select * from users where id = '.$id;
			$result = mysqli_query($conn,$select);
			return $result;
		}
		
		function updateUser($conn,$id,$firstName,$lastName,$email,$phone) 
		{
			$update = "UPDATE users SET first_name ='".$firstName."', last_name ='".$lastName. "', email ='".$email."', phone = '".$phone."' WHERE id = ". $id;
			return $update;
		}
		
		function deleteUser($conn,$id) 
		{
			$delete = 'DELETE FROM users WHERE id ='. $id;
			$result = mysqli_query($conn,$delete);
			return $result;
		}
		
	}
?>
