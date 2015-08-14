<?php
	class Auth 
		{
			
			protected static function getInfo($username,$password) {
				$setPassword = $password;
				
				$userDBinfo = new mysqli("127.0.0.1", "root", "", "list_db");
				$usernameVar = mysqli_query($userDBinfo , "SELECT * FROM users WHERE username = '$username'");
				$queryHash = mysqli_query($userDBinfo , "SELECT password FROM users WHERE password = '$password'");
				$hashedPassword = mysqli_fetch_row($queryHash);
		        $result = mysqli_num_rows($usernameVar);
		        if($result > 0) { 
					if(password_verify($_SESSION['password'] , '$2y$10$fmtLDBsMA56PBGlakVMouu2N8DcpMeC5dQl6Eg64GP62jLoUNCDPm')){ 
						echo "<script type='text/javascript'> alert('yeah!'); </script>";
					}

				}
			}
			//Get input from login field put in parameters and compare that to database info
			public static function attempt($username, $password) 
			{
				self::getInfo($_SESSION['username'] , $_SESSION['password']);
					// header("Location: google.com");
					// exit();      
				
		        	
				 
					// $message = "Incorrect username or password";
					// echo "<script type='text/javascript'> alert('$message'); </script>";
				
			}

			//
			protected static function check() 
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