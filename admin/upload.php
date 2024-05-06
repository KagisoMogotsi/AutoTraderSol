<?php

require_once 'connection.php';

if(isset($_POST["submit"])){
  $productname = $_POST["product_name"];
  $price = $_POST["price"];
  $product_description = $_POST["product_description"];
    
  $sql = "INSERT INTO `products` (`product_name`, `price`, `product_description`)
          VALUES('$productname', '$price', '$product_description')";

  if($conn->query($sql) === TRUE){
    echo "<script>alert('Your product uploaded successfully')</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="upload.css">
</head>
<body>
    <?php
         include_once 'header.php';

    ?>
    <section id="upload_container"> 
        <form method="post" action="">
            <label for="productname">Product Name:</label><br>
            <input type="text" id="productname" name="product_name" required><br>
            <label for="price">Price:</label><br>
            <input type="number" id="price" name="price" required><br>
            <label for="product_description">Product Description:</label><br>
            <textarea id="product_description" name="product_description" required></textarea><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </section>

    <script>
        var productname = document.getElementById("productname");
        var price = document.getElementById("price");
        var discount = document.getElementById("product_description");

    </script>
</body>
</html>