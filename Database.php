<?php
	class Database
	{
		private $servername = "localhost";
		private $username = "root";
		private $password = "";
		private $database = "gmail_clone";
		private $user_table = "user_details";
		private $dbConnect = false;
		
		//using MySqli Object-Oriented
		public function __construct()
		{
			if(!$this->dbConnect)
			{
				$con = new MySqli($this->servername,$this->username,$this->password,$this->database);
				if($con->connect_error)
				{
					die("Connection Faild : " . $con->connect_error);
				}
				else
				{
					$this->dbConnect = $con;
				}
			}
		}

		//using MySqli Procudural

		//using PDO(PHP Data Object)

		private function getData($sqlQuery)
		{
			$result = mysqli_query($this->dbConnect,$sqlQuery);
			if(!$result)
			{
				die("Error in query : " . mysqli_error());
			}	
			$data = array();
			while($row = mysqli_fetch_array($result))
			{
				$data[] = $row;
			}
			return $data;
		}
		public function loginUsers($username, $password)
		{
			$sqlQuery = "SELECT Id as UserId, User_Name, Password FROM ".$this->user_table." WHERE User_Name='$username' AND Password='$password'";
			return $this->getData($sqlQuery);
		}
	}
?>