<?php
session_start();
require_once'../database/connect.php';
require_once'../utils/Auth.php';
require_once'../utils/Input.php';

if (!empty($_POST['username']) || !empty($_POST['password'])) {
    $user = escapeVar($_POST['username']);
    $pass = escapeVar($_POST['password']);
    $_SESSION['username'] = $user; 
    $_SESSION['password'] = $pass;
    Auth::attempt($user , $pass);
    
    $stmt = $dbc->prepare("SELECT * FROM users WHERE username = '$user' AND password = '$pass'");
}
if(isset($stmt)) {
    $stmt->execute();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>LogIn</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    <div id="wrapper">
        <?php require_once'../views/partials/navbar.php'; ?>
        <div id="content">
            <form class='form' method="POST">
                <label>Name</label>
                <input type="text" name="username"><br>
                <label>Password</label>
                <input type="password" name="password"><br>
                <input type="submit"><br>
                <a href="register.php">Not a Member? Register Here.</a>
            </form>

        </div>
        <?php require_once'../views/partials/footer.php' ?>
        <h1>Login HERE!</h1>
    </div>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="/js/media.js"></script>
</body>
</html>