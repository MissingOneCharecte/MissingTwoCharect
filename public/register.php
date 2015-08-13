<?php
    session_start();
    require_once'../views/partials/navbar.php';
    require_once'../views/partials/footer.php';  
    require_once'../utils/Input.php';
                         
    define('DB_HOST','127.0.0.1');
    define('DB_NAME','list_db');
    define('DB_USER', 'root');
    define('DB_PASS','');
    $dbc = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
    $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $mysqli = new mysqli("127.0.0.1", "root", "", "list_db");
    
    if(inputHas('username') && inputHas('email') && inputHas('password')) {
        if(!($_POST['password'] == $_POST['retype_password'])) {
            $notSame = true;
        }
        $stmt = $dbc->prepare('INSERT INTO users (username,password,email,first_name, last_name) VALUES (
            :username, 
            :password, 
            :email, 
            :first_name, 
            :last_name
        )');
        $username = $_POST['username'];

        $usernameVar = mysqli_query($mysqli , "SELECT * FROM users WHERE username = '$username'");
        $result = mysqli_num_rows($usernameVar);
        if($result > 0) {
            $usernameSame = true;
            
        } else {
            $usernameSame = false;
            $username = escapeVar(inputGet('username'));
            $password = escapeVar(inputGet('password'));
            $email = escapeVar(inputGet('email'));
            $_SESSION['databasePassword'] = $password;
            $userDatabase = "FLUSH PRIVILEGES; CREATE USER '$username'@'localhost' IDENTIFIED BY '$_SESSION[databasePassword]';
            GRANT SELECT ON listed_items TO '$username'@'localhost';
            GRANT SELECT ON users TO '$username'@'localhost';";
            $dbc->exec($userDatabase);
            $password = password_hash($password , PASSWORD_DEFAULT);

            if(inputHas('first_name') || inputHas('last_name')) {
                if(inputHas('first_name') && inputHas('last_name')) {
                    $first_name = escapeVar(inputGet('first_name'));
                    $last_name = escapeVar(inputGet('last_name'));

                    $_SESSION['first_name'] = $first_name;
                    $_SESSION['last_name'] = $last_name;

                    $stmt->bindValue(':first_name' , $_POST['first_name'] , PDO::PARAM_STR);
                    $stmt->bindValue(':last_name' , $_POST['last_name'] , PDO::PARAM_STR);

                } elseif (inputHas('first_name')) {
                    $first_name = escapeVar(inputGet('first_name'));
                    $_SESSION['first_name'] = $first_name;
                    $stmt->bindValue(':first_name' , $_POST['first_name'] , PDO::PARAM_STR);
                } elseif (inputHas('last_name')) {
                    $last_name = escapeVar(inputGet('last_name'));
                    $_SESSION['last_name'] = $last_name;
                    $stmt->bindValue(':last_name' , $_POST['last_name'] , PDO::PARAM_STR);
                }  
            } 

            //Making session variables to work with
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['email'] = $email;

            $stmt->bindValue(':username' , $_SESSION['username'] , PDO::PARAM_STR);
            $stmt->bindValue(':password' , $_SESSION['password'] , PDO::PARAM_STR);
            $stmt->bindValue(':email' , $_SESSION['email'] , PDO::PARAM_STR);

            $stmt->execute();
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    <h1 class='reghere'>Register Here!</h1>
    <form class='form' method="POST">
        <label>Username</label>
        <input type="text" name="username"><span id='passwordProblem'> <?php if(isset($usernameSame) && $usernameSame == true){ echo "Username is taken"; } ?> </span> <br>
        <label>Email</label>
        <input type="text" name="email"><br>
        <label>Password</label>
        <input type="password" name="password"><br>
        <label>ReType Password</label>
        <input type="password" name="retype_password"><span id='passwordProblem'> <?php if(isset($notSame) && $notSame){ echo "Passwords do not match"; } ?> </span> <br>
        <h3>-Optional-</h3>
        <label>First name</label>
        <input type="text" name="first_name"><br>
        <label>Last name</label>
        <input type="text" name="last_name"><br>
        <input type="submit">
    </form>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="/js/media.js"></script>
</body>
</html>