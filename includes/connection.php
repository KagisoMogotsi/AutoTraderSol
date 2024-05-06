<?php
session_start();

// Include the database connection file
include 'database.php';

if(isset($_GET["id"])){
    $product_id = $_GET["id"];
    $sql = "SELECT * FROM cart WHERE product_id = $product_id";
    $result = $conn->query($sql);
    $total_cart = "SELECT * FROM cart";
    $total_cart_result = $conn->query($total_cart);
    $cart_num = mysqli_num_rows($total_cart_result);

    if(mysqli_num_rows($result) > 0){
        $in_cart = "already In cart";

        echo json_encode(["num_cart"=>$cart_num,"in_cart"=>$in_cart]);
    }else{
        $insert = "INSERT INTO cart(product_id) VALUES($product_id)";
        if($conn->query($insert) === true){
            $in_cart = "added into cart";
            echo json_encode(["num_cart"=>$cart_num,"in_cart"=>$in_cart]);
        }else{
            echo "<script>alert(It doesn't insert)</script>";
        }
    }
}

if(isset($_GET["cart_id"])){
    $product_id = $_GET["cart_id"];
    $sql = "DELETE FROM cart WHERE product_id=".$product_id;

    if($conn->query($sql) === TRUE){
        echo "Removed from cart";
    }
}



// Check if the cart is empty
$sql_check_cart = "SELECT * FROM cart";
$result_check_cart = $conn->query($sql_check_cart);

if ($result_check_cart) { // Check if query executed successfully
    if(mysqli_num_rows($result_check_cart) <= 0) {
        // Clear existing order number if it exists
        unset($_SESSION['order_number']);

        // Generate and set a new order number
        do {
            $orderNumber = uniqid('RGR_');
            $_SESSION['order_number'] = $orderNumber;

            // Check if the order number already exists in the order_summary table
            $sql_check_order = "SELECT * FROM order_summary WHERE order_number = '$orderNumber'";
            $result_check_order = $conn->query($sql_check_order);

            // Repeat generation if the order number already exists
        } while($result_check_order && mysqli_num_rows($result_check_order) > 0);
    } else {
        // Cart is not empty, retrieve the existing order number from the session
        if(isset($_SESSION['order_number'])) {
            $orderNumber = $_SESSION['order_number'];
        } else {
            echo "Failed to retrieve order number from session!";
        }
    }
} else {
    echo "Error executing SQL query: " . mysqli_error($conn);
}

?>
<?php
    // Handle form submission
    if (isset($_POST["submit"])) {
        $orderNumber = $_POST["order_number"];
        $totalPrice = $_POST['totalPrice'];
        // Your error handling and SQL insert logic here
        // Remember to sanitize input and handle errors appropriately
        $errors = array();
         
        // Include the connection file
        require_once 'connection.php';
        if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
        }else{
            $sql = "INSERT INTO order_summary (order_number, totalPrice) VALUES ( ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"ss",$orderNumber, $totalPrice);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>Entries Logged Successfully.</div>";
                // Redirect to checkout
                header("Location: ./payment_gateway/payGate.php");
                exit();
            }else{
                die("Something went wrong");
            }
        }
    }
?>