<?php 
    session_start();
    require_once'bootstrap.php';  
     $stmt = $dbc->prepare('INSERT INTO listed_items (username,sales,publish_date,category, description) VALUES (
            :username, 
            :sales, 
            :publish_date, 
            :category,
            :description
        )');

    if (isset($_POST['postTitle']) && isset($_POST['price']) && isset($_POST['categorySelect'])) {
        $_SESSION['title'] = escapeVar($_POST['title']);
        $_SESSION['price'] = escapeVar($_POST['price']);
        $_SESSION['categorySelect'] = escapeVar($_POST['categorySelect']);
        if(isset($_POST['description'])) {
            $_SESSION['description'] = escapeVar($_POST['description']);
        }        

        $stmt->bindValue(':username' , $_SESSION['username'] , PDO::PARAM_STR);
        $stmt->bindValue(':price' , $_SESSION['price'] , PDO::PARAM_STR);
        $stmt->bindValue(':publish_date' , date("Y-m-d H:i:s") , PDO::PARAM_STR);
        $stmt->bindValue(':category' , $_SESSION['category'] , PDO::PARAM_STR);
        $stmt->bindValue(':description' , $_SESSION['description'] , PDO::PARAM_STR);
    
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
        <input type="text" name="postTitle"><br>
        <label>Price</label>
        <input type="text" name="price"><br>
        <label>Category</label>
        <p>
            <select name="categorySelect">
              <option value="electroic">Electronics</option>
              <option value="car">Cars</option>
              <option value="clothes">Clothes</option>
              <option value="pet">Pets</option>
              <option value="furniture">Furniture</option>
            </select>
        </p>
        <label>Description</label>
          <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
        <input type="submit">
    </form>

</body>
</html>