<?php 
    session_start();
    require_once'bootstrap.php';  
     $stmt = $dbc->prepare('INSERT INTO listed_items (username,title,sales,publish_date,category, description) VALUES (
            :username, 
            :title,
            :sales, 
            :publish_date, 
            :category,
            :description
        )');

    if (isset($_POST['postTitle']) && isset($_POST['sales']) && isset($_POST['categorySelect'])) {
        $stmt->bindValue(':username' , $_SESSION['username'] , PDO::PARAM_STR);
        $stmt->bindValue(':title' , escapeVar($_POST['postTitle']) , PDO::PARAM_STR);
        $stmt->bindValue(':sales' , escapeVar($_POST['sales']) , PDO::PARAM_STR);
        $stmt->bindValue(':publish_date' , date("Y-m-d H:i") , PDO::PARAM_STR);
        $stmt->bindValue(':category' , $_POST['categorySelect'] , PDO::PARAM_STR);

        if(isset($_POST['description'])) {
            $stmt->bindValue(':description' , escapeVar($_POST['description']) , PDO::PARAM_STR);
        }        
    
        $stmt->execute();
    }
    var_dump($_FILES);
    if($_FILES) {
        $uploads_directory = 'img/uploads/';
        $filename = $uploads_directory . basename($_FILES['somefile']['name']);
        if (move_uploaded_file($_FILES['somefile']['tmp_name'], $filename)) {
            echo '<p>The file '. basename( $_FILES['somefile']['name']). ' has been uploaded.</p>';
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
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
        <input type="text" name="sales"><br>
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
        <input type="file" name="somefile">
        <label>Description</label>
          <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
        <input type="submit">
    </form>

</body>
</html>