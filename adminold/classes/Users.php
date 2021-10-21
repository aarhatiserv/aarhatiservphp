<?php
//Database Table Name->users
	class Users{
		protected $id;
		protected $name;
		protected $mobile;
		protected $email;
        protected $pass;
        protected $activated;
		protected $token;
        protected $createdOn;


		public $conn;

		function setId($id) { $this->id = $id; }
        function getId() { return $this->id; }

		function setName($name) { $this->name = $name; }
        function getName() { return $this->name; }

		function setMobile($mobile) { $this->mobile = $mobile; }
        function getMobile() { return $this->mobile; }

		function setEmail($email) { $this->email = $email; }
        function getEmail() { return $this->email; }

		function setPass($pass) { $this->pass = $pass; }
        function getPass() { return $this->pass; }

        function setActivated($activated) { $this->activated = $activated; }
        function getActivated() { return $this->activated; }

		function setToken($token) { $this->token = $token; }
        function getToken() { return $this->token; }

		function setCreatedOn($createdOn) { $this->createdOn = $createdOn; }
        function getCreatedOn() { return $this->createdOn; }







		function __construct(){
            include_once 'config/Dbconnect.php';

			$db = new database();
			$this->conn = $db->connect();
		}
		//query for sign in for admin...
		public function newUsers(){
            $sql = "INSERT INTO `users`(`id`,`name`, `mobile`, `email`, `pass`, `activated`, `token`, `created_on`) VALUES (NULL, :fname,:mobile,:email,:pass,:activated,:token,:cdate)";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam('fname', $this->name);
		$stmt->bindParam('mobile', $this->mobile);
		$stmt->bindParam('email', $this->email);
        $stmt->bindParam('pass', $this->pass);
        $stmt->bindParam(':activated', $this->activated);
		$stmt->bindParam(':token', $this->token);
		$stmt->bindParam(':cdate', $this->createdOn);

			try{
                if($stmt->execute())
                    {
                        return true;
                    }
                    else
                        {
                            return false;
                }
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }
        //query for selecting all data by using email....
        public function getUserByEmail(){
            $stmt = $this->conn->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->bindParam(':email', $this->email);
            try{
                if($stmt->execute()){
                    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $user;
                }
            }
            catch(Exception $e){
                    echo $e->getMessage();

            }

        }
         //query for selecting all data by using id....
        public function getUserByid(){
            $stmt = $this->conn->prepare('SELECT * FROM users WHERE id = :id');
            $stmt->bindParam(':id', $this->id);
            try{
                if($stmt->execute()){
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $user;
                }
            }
            catch(Exception $e){
                    echo $e->getMessage();
                }


        }
        //query for activating UserAccount during confirmation of account....
        public function activateUserAccount(){
            $stmt = $this->conn->prepare('UPDATE users SET activated = "1" WHERE id = :id');
           $stmt->bindParam(':id', $this->id);

           try{
               if($stmt->execute())
                   {
                       return true;
                   }
                   else
                       {
                           return false;
                       }
           }
           catch(Exception $e){
               echo $e->getMessage();
           }
       }

        //query for updating Token during reset password....
        public function updateToken(){
             $stmt = $this->conn->prepare('UPDATE users SET token =:token WHERE id = :id');
            $stmt->bindParam(':token', $this->token);
            $stmt->bindParam(':id', $this->id);
            try{
                if($stmt->execute())
                    {
                        return true;
                    }
                    else
                        {
                            return false;
                        }
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }

         //query for selecting id by using email....
        public function getUserIDByEmail(){
            $stmt = $this->conn->prepare('SELECT id FROM users WHERE email = :email ');
            $stmt->bindParam(':email', $this->email);
            try{
                if($stmt->execute()){
                    $userid = '';
                    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($user as $row){
                        $userid = $row['id'];
                    }
                    return $userid;
                }
            }
            catch(Exception $e){
                    echo $e->getMessage();
                }


        }


    }