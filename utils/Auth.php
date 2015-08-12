<?php
	class Auth 
		{
			//Get user password from the database
			public static $setPassword;

			public static function getPassword($password) {
				$setPassword = $password;
				return $setPassword;
			}
			//Get input from login field put in parameters and compare that to database info
			public static function attempt($username, $password) 
			{
				if($username == "guest" && password_verify($password , self::$setPassword)){ 
					header("Location: missingonecharecte.dev/index.php");
					exit();      
				} else {
					$message = "Incorrect username or password";
					echo "<script type='text/javascript'> alert('$message'); </script>";
				}
			}

			//
			public static function check() 
			{
				if(password_verify($_SESSION["password"] , self::$setPassword)){			
					return true;
				} else {
					return false;
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