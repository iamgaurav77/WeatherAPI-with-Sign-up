<?php 
 
class User{
	
	protected $pdo;

 	public function __construct($pdo){											
	    $this->pdo = $pdo;
	}

	 
	public function checkInput($data){
		$data = htmlspecialchars($data);
		$data = trim($data);
		$data = stripcslashes($data);
		return $data;
	}
	
	

	public function login($email, $password){
		$passwordHash = md5($password);
		$stmt = $this->pdo->prepare('SELECT `user_id` FROM `users` WHERE `email` = :email AND `password` = :password');
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':password', $passwordHash, PDO::PARAM_STR);
		$stmt->execute();

		$count = $stmt->rowCount();
		$user = $stmt->fetch(PDO::FETCH_OBJ);

		if($count > 0){
			$_SESSION['user_id'] = $user->user_id;
			header('Location: main.php');
		}else{
			return false;
		}
	}


	  public function register($email, $password, $screenName){
	    $passwordHash = md5($password);
	    $stmt = $this->pdo->prepare("INSERT INTO `users` (`email`, `password`, `screenName`, `profileImage`, `profileCover`) VALUES (:email, :password, :screenName, 'assets/images/defaultprofileimage.png', 'assets/images/defaultCoverImage.png')");
	    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
 	    $stmt->bindParam(":password", $passwordHash , PDO::PARAM_STR);
	    $stmt->bindParam(":screenName", $screenName, PDO::PARAM_STR);
	    $stmt->execute();

	    $user_id = $this->pdo->lastInsertId();
	    $_SESSION['user_id'] = $user_id;
	  }


	public function userData($user_id){
		$stmt = $this->pdo->prepare('SELECT * FROM `users` WHERE `user_id` = :user_id');
		$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	

	public function create($table, $fields = array()){
		$columns = implode(',', array_keys($fields));
		$values  = ':'.implode(', :', array_keys($fields));
		$sql     = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";

		if($stmt = $this->pdo->prepare($sql)){
			foreach ($fields as $key => $data) {
				$stmt->bindValue(':'.$key, $data);
			}
			$stmt->execute();
			return $this->pdo->lastInsertId();
		}
	}

	

	public function checkUsername($username){
		$stmt = $this->pdo->prepare("SELECT `username` FROM `users` WHERE `username` = :username");
		$stmt->bindParam(':username', $username, PDO::PARAM_STR);
		$stmt->execute();

		$count = $stmt->rowCount();
		if($count > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function checkPassword($password){
		$stmt = $this->pdo->prepare("SELECT `password` FROM `users` WHERE `password` = :password");
		$stmt->bindParam(':password', md5($password), PDO::PARAM_STR);
		$stmt->execute();

		$count = $stmt->rowCount();
		if($count > 0){
			return true;
		}else{
			return false;
		}
	}

	public function checkEmail($email){
		$stmt = $this->pdo->prepare("SELECT `email` FROM `users` WHERE `email` = :email");
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->execute();

		$count = $stmt->rowCount();
		if($count > 0){
			return true;
		}else{
			return false;
		}
	}	

	public function loggedIn(){
		return (isset($_SESSION['user_id'])) ? true : false;
	}

	
	
}
?>