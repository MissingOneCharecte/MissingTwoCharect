<?php
    require_once'../views/partials/navbar.php';
    require_once'../views/partials/footer.php';  
    require_once'../utils/input.php';
    
    // if(inputHas::'username' && inputHas::'email' && inputHas::'password') {
        
    // }
    define('DB_HOST','127.0.0.1');
    define('DB_NAME','list_db');
    define('DB_USER', 'root');
    define('DB_PASS','');
    $dbc = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
    $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    <form class='form' method="POST">
        <label>Name</label>
        <input type="text" name="username"><br>
        <label>Email</label>
        <input type="text" name="email"><br>
        <label>Password</label>
        <input type="password" name="password"><br>
        <label>ReType Password</label>
        <input type="password" name="retype_password"><br>
        <input type="submit">
    </form>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="/js/media.js"></script>
</body>
</html>