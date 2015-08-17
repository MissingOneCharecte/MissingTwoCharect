<?php 
    require_once'bootstrap.php';                    

    if (inputHas($_POST['title']) && inputHas($_POST['price']) && inputHas($_POST['category'])) {
        $_SESSION['title'] = escapeVar($_POST['title']);
        $_SESSION['password'] = escapeVar($_POST['price']);
        $_SESSION['category'] = escapeVar($_POST['category']);
    
        if(isset($_POST['category'])) {
            $_SESSION['description'] = escapeVar($_POST['description']);
        }
        
        // $stmt = $dbc->prepare("SELECT * FROM users WHERE username = '$user' AND password = '$pass'");
    }
    if(isset($stmt)) {
        $stmt->execute();
    }
?>

<html>
<head>
	<title></title>
</head>
<body>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="/js/media.js"></script>

	<form class='createAd' method="POST">
        <label>Title</label>
        <input type="text" name="title"><br>
        <label>Price</label>
        <input type="text" name="price"><br>
        <label>Category</label>
        <input type="text" name="category"><br>
        <label>Description</label>
          <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
        <input type="submit">
    </form>

</body>
</html>