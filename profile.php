<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["fullname"];
    echo "<h1>Welcome Back </h1>" . htmlspecialchars($fullName);
}
?>
