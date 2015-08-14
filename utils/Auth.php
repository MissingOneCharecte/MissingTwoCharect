<?php
	class Auth 
		{
			public $result;

			protected static function getInfo($username,$password) {				
				$userDBinfo = new mysqli("127.0.0.1", "root", "", "list_db");
				$usernameVar = mysqli_query($userDBinfo , "SELECT * FROM users WHERE username = '$username'");
				$usersRow = mysqli_fetch_row($usernameVar);
		        $result = mysqli_num_rows($usernameVar);
		        if($result > 0) { 
					if(password_verify($_SESSION['password'] , $usersRow[2])){ 
						echo "<script type='text/javascript'> alert('Login info correct!'); </script>";
						header("Location: http://missingonecharecte.dev");
						exit();
					}
				}
			}
			//Get input from login field put in parameters and compare that to database info
			public static function attempt($username, $password) 
			{
				self::getInfo($_SESSION['username'] , $_SESSION['password']);    
			}

			//
			public static function check($username) 
			{
				$userDBinfo = new mysqli("127.0.0.1", "root", "", "list_db");
				$usernameVar = mysqli_query($userDBinfo , "SELECT * FROM users WHERE username = '$username'");
				$usersRow = mysqli_fetch_row($usernameVar);
		        $result = mysqli_num_rows($usernameVar);
		        if($result > 0) { 
					if($usernameVar) {
						if(password_verify($_SESSION["password"] , $usersRow[2])){			
							return true;
						} else {
							echo "<script type='text/javascript'> alert('Login info correct!'); </script>";
							return false;
						}
					} else {
						return;
					}
				}
			}
			
			public static function user() 
			{
				return $_SESSION["username"];
			}

			public static function logout()
			{
				header("Location: missingonecharecte.dev/logout.php");
				exit();
			}

			
	}
?>
