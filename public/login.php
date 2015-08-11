<?php
require_once'../views/partials/navbar.php';
if($_FILES) {

  $uploads_dirctory = 'img/uploads/';
  $filename= $uploads_dirctory . basename($FILES['somefile']['name'])

  if (move_uploaded_file($_FILES[somefile][tmp_name], $filename)) {
    echo '<p>The file '. basename( $_FILES)
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>LogIn</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    <form class='form' method="POST">
	    <label>Name</label>
	    <input type="text" name="username"><br>
	    <label>Password</label>
	    <input type="password" name="password"><br>
	    <input type="submit"><br>
      <a href="http://missingonecharecte.dev/register.php">Not a Member? Register Here.</a>
    </form>
</body>
</html>
<form method='POST' action="upload.php" enctype='multipart/form-data'>

  <input type='file' name='somefile'>
  <button>Submit this</button>
  </form>