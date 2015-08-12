<?php
require_once'../database/connect.php';
$stmt = $dbc->prepare('SELECT * FROM users WHERE id = 1');
$stmt->execute();
function pageController() {
  $data = [];
  if (!empty($_SESSION['status']) && $_SESSION['status'] == 'loggedin') {
    header("location: http://codeup.dev/authorized.php");
    exit();
  }
  if (empty($_POST['search'])) {
    if(empty($_POST['username']) || empty($_POST['password']) || is_numeric($_POST['password']) || is_numeric($_POST['username'])) {
      $fail = " Please enter a Valid user name and Password.";
    } else {
      $password = $_POST['password'];
      $user = $_POST['username'];
    }
  } else {
    $search = escape($_POST['search']);
    header("location: https://duckduckgo.com/?q=$search");
    exit();
  }
  $data['fail'] = " Please enter a Valid user name and Password.";
  return $data;     
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
            <table>
        <tr>
            <?php
            foreach($stmt as $id => $park) { ?>
            <tr>
                <td><?= $park['id']; ?>:</td>
                <td><?= $park['username']; ?></td>
                <td><?= $park['password']; ?></td>
                <td><?= $park['email']; ?></td>
                <tr/>
                <?php } ?>
                <tr/>
            </table>
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
  </div>
  <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="/js/media.js"></script>
</body>
</html>