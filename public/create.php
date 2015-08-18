<?php 
    session_start();
    require_once'bootstrap.php';  
     $stmt = $dbc->prepare('INSERT INTO listed_items (username,title,sales,publish_date,category,description, images) VALUES (
            :username, 
            :title,
            :sales, 
            :publish_date, 
            :category,
            :description,
            :images
        )');
    if($_FILES) {
        $uploads_directory = 'img/upload/';
        $filename = $uploads_directory . basename($_FILES['somefile']['name']);
        if (move_uploaded_file($_FILES['somefile']['tmp_name'], $filename)) {
            echo '<p>The file '. basename( $_FILES['somefile']['name']). ' has been uploaded.</p>';
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    if (isset($_POST['postTitle']) && isset($_POST['sales']) && isset($_POST['categorySelect'])) {
        $stmt->bindValue(':username' , $_SESSION['username'] , PDO::PARAM_STR);
        $stmt->bindValue(':title' , escapeVar($_POST['postTitle']) , PDO::PARAM_STR);
        $stmt->bindValue(':sales' , escapeVar($_POST['sales']) , PDO::PARAM_STR);
        $stmt->bindValue(':publish_date' , date("Y-m-d H:i") , PDO::PARAM_STR);
        $stmt->bindValue(':category' , $_POST['categorySelect'] , PDO::PARAM_STR);
        $stmt->bindValue(':images' , $_FILES['somefile']['name'] , PDO::PARAM_STR);

        if(isset($_POST['description'])) {
            $stmt->bindValue(':description' , escapeVar($_POST['description']) , PDO::PARAM_STR);
        }        
    
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

	<form class='createAd' method="POST" enctype="multipart/form-data">
        <label>Title</label>
        <input type="text" name="postTitle"><br>
        <label>Price</label>
        <input type="text" name="sales"><br>
        <label>Category</label>
        <p>
            <select name="categorySelect">
              <option value="Electronics">Electronics</option>
              <option value="car">Cars</option>
              <option value="clothes">Clothes</option>
              <option value="pets">Pets</option>
              <option value="furniture">Furniture</option>
            </select>
        </p>
        <input type="file" name="somefile">
        <label>Description</label>
          <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
        <input type="submit">
    </form>

</body>
</html>