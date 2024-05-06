<?php
if (isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="./styles.css">
</head>
    <body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $fullName = $_POST["fullname"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           // Include the database connection file
           include './includes/database.php';
           $sql = "SELECT * FROM users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO users (full_name, email, password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
                header("Location: login.php");
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
        <div class="hero">
            <div class="form-box">
                <div class="button-box">
                    <div class="btn"></div>
                        <a href="login.php"><input type="button" value="Already Registered? Login Here" name="submit" class="toggle-btn"></a>
                    </div>
                    <div class="banner">
                        <img src="assets/images/logo.png">
                    </div>
                    <form id="login" class="input-group" action="registration.php" method="post">
                        <input type="text" placeholder="Full Name:" name="fullname" class="input-field">
                        <input type="email" placeholder="Email:" name="email" class="input-field">
                        <input type="password" placeholder="Password:" name="password" class="input-field">
                        <input type="password" placeholder="Repeat Password:" name="repeat_password" class="input-field">
                        <a href="./t&c.html" class="terms-link">
                            <em>
                                <input type="button" value="Read our terms & conditions" class="terms-button">
                            </em>
                        </a>
                        <input type="submit" value="Register" name="submit" class="submit-btn">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>