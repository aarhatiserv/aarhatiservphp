<?php
	class database{
		// private $host = 'localhost';
		// private $dbName = 'u386832518_admin';
		// private $user = 'u386832518_greddy';
		// private $pass = 'Aarhat@12345';

		// localhost
		private $host = 'localhost';
		private $dbName = 'aarhat_admin';
		private $user = 'root';
		private $pass = '';
		
		public function connect(){
			try{
				$conn = new PDO('mysql:host='.$this->host . '; dbname=' . $this->dbName , $this->user , $this->pass);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				return $conn;
			}catch(PDOException $e){
				echo 'Database Error: '.$e->getMessage();
			}
		}
	}


?>
