<?php
	class Auth 
		{
			
			protected static function getInfo($username,$password) {
				$setPassword = $password;
				
				$userDBinfo = new mysqli("127.0.0.1", $_SESSION['username'], $_SESSION['databasePassword'], "users");
				$usernameVar = mysqli_query($userDBinfo , "SELECT * FROM users WHERE username = '$username'");
				$queryHash = mysqli_query($userDBinfo , "SELECT password FROM users WHERE password = '$password'");
				$hashedPassword = mysqli_fetch_row($queryHash);
		        $result = mysqli_num_rows($usernameVar);
		        if($result > 0) { 
					if(password_verify($_SESSION['password'] , '$2y$10$o8LyYT3JXY5ODGs7OgBZ7uink3xZ024MQ1ucjyBiAUS1pV4UvSw7K')){ 
						self::loggedInDB($_SESSION['username'] , $_SESSION['databasePassword']);
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

			protected static function loggedInDB($username , $password) {
				define('DB_HOST1','127.0.0.1');
			    define('DB_NAME1','listed_items');
			    define('DB_USER1', $username);
			    define('DB_PASS1', $password);
			    $dbc2 = new PDO('mysql:host='.DB_HOST1.';dbname='.DB_NAME1, DB_USER1, DB_PASS1);
			    $dbc2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}

	}

?>