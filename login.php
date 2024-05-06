<?php
if (isset($_SESSION["user"])) {
   header("Location: index.php");
   exit; // Stop further execution
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <div class="container">
    <?php
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    // Include the database connection file
    include './includes/connection.php';
    
    // Prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
    if ($user) {
        if (password_verify($password, $user["password"])) {
            // Storing user details in the session
            session_start();
            $_SESSION["user"] = "yes";
            $_SESSION["user_email"] = $user["email"];
            $_SESSION["user_fullname"] = $user["full_name"];
            
            // Fetch product details from the 'products' table
            $query = "SELECT * FROM products";
            $productResult = $conn->query($query);
            $product = $productResult->fetch_assoc();
            
            // Store product details in session or use them as needed
            $_SESSION["product_name"] = $product["name"];
            $_SESSION["product_price"] = $product["price"];
            
            header("Location: index.php");
            exit; // Stop further execution
        } else {
            echo "<div class='alert alert-danger'>Password does not match</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Email does not match</div>";
    }
    
    $stmt->close();
    $conn->close();
}
?>

        <div class="hero">
            <div class="form-box">
                <div class="button-box">
                    <div class="btn"></div>
                    <a href="registration.php"><input type="button" value="Not registered yet? Register Here" name="submit" class="toggle-btn"></a>
                </div>
                <div class="banner">
                    <img src="assets/images/logo.png">
                </div>
                <form id="login" class="input-group" action="login.php" method="post">
                    <input type="email" placeholder="Enter Email:" name="email" class="input-field">
                    <input type="password" placeholder="Enter Password:" name="password" class="input-field">
                    <input type="submit" value="Login" name="login" class="submit-btn">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
