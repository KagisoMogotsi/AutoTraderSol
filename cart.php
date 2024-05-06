<?php
require_once './includes/connection.php';

// Order number already exists in session
$orderNumber = $_SESSION['order_number'];
$totalAmount = 0;
// Now proceed to fetch and display cart items, and calculate the total amount
// Your existing code for fetching cart items and calculating total amount goes here
if (isset($_POST["submit"])) {
    // SQL to clear the cart (assuming cart table structure)
    $sql_clear_cart = "TRUNCATE TABLE cart"; // Truncate table to remove all rows
    if ($conn->query($sql_clear_cart) === TRUE) {
        echo "Cart cleared successfully.";
    } else {
        echo "Error clearing cart: " . $conn->error;
    }
}
$sql = "SELECT * FROM products";
$all_product = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>AutoTrader Solutions - Landing Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/font.css">
    <link rel="stylesheet" href="assets/css/samo.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
  </head>

<body>
  <?php require_once "./includes/header.php";?>

  <!-- ***** Main Banner Area Start ***** -->
  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="header-text">
            <div class="section-heading">
                <h6>Order Number: <?php echo $orderNumber; ?></h6>
            </div>
            <h2><?php echo mysqli_num_rows($all_cart); ?> Item/s in cart</h2>
            <div class="div-dec"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="about-us" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="naccs">
            <div class="tabs">
              <div class="row">
                <div class="col-lg-12">
                  <ul class="nacc">
                    <li class="active">
                      <div>

    <main>
        <?php
            // Check if the cart is empty
            if(mysqli_num_rows($all_cart) <= 0) {
                echo "No items in cart";
            } else {
    
            // Start fetching cart items
            while($row_cart = mysqli_fetch_assoc($all_cart)) {
                $product_id = $row_cart["product_id"];
                $sql_product = "SELECT * FROM products WHERE product_id=$product_id";
                $result_product = $conn->query($sql_product);
    
                while($row = mysqli_fetch_assoc($result_product)) {
                    // Calculate total amount for each product
                    $totalAmount += $row["price"];
        ?>
        <!-- Product details -->
        <div class='list-item'>
            <span class='item item-title'><?php echo $row["product_name"]; ?></span>
            <span class="item">R<?php echo $row["price"]; ?></span>
            <p class="product_description"><i><?php echo $row["product_description"]; ?></i></p>
            <!-- Remove button -->
            <span class="purchase-btn"><button class="remove" data-id="<?php echo $row["product_id"]; ?>">Remove from Cart</button></span>
        </div><br>
        <?php
                    } // End of inner while loop
                } // End of outer while loop

                // Display total amount
                echo "<div class='col-lg-6 offset-lg-3'>";
                echo "<div class='section-heading'>";
                echo "<h6>Grand Total: <b id='totalPrice'>R" . number_format($totalAmount, 2) . "</b></h6>";
                echo "</div>";
                echo "</div>";
            }
            if(mysqli_num_rows($all_cart) > 0) {
        ?>
        <form method="POST" action="">
            <!-- <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> -->
            <input type="hidden" name="order_number" value="<?php echo $orderNumber; ?>">
            <input type="hidden" id="totalPriceInput" name="totalPrice" value="<?php echo $totalAmount; ?>">
            <input type="submit" class="btn btn-warning" name="submit" value="Go to checkout">
        </form>
        <?php
                    } else {
                // Display button to go to shop
                echo "<button onclick='goToShop()'>Go to shop</button>";
            }
            // JavaScript function for redirection
            echo "<script>
            function goToShop() {
                window.location.href = '../shop.php';
            }
            </script>";
        ?>
    </main>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
    <script>
        // Event listener for remove button
        var removeButtons = document.querySelectorAll('.remove');
        removeButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                var target = event.target;
                var cart_id = target.getAttribute("data-id");
                var xml = new XMLHttpRequest();
                xml.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        // var data = JSON.parse(this.responseText);
                        // target.innerHTML = data.in_cart;
                        // document.getElementById("badge").innerHTML = data.num_cart - 1; // Decrease item count
                        target.innerHTML = this.responseText;
                        target.style.opacity = .3;
                        updateTotalPrice(); // Update total after removal
                    }
                }
                xml.open("GET", "connection.php?cart_id=" + cart_id, true);
                xml.send();
            });
        });
        // Function to update the hidden input field with the updated total price
        function updateTotalPriceInput(totalPrice) {
            document.getElementById('totalPriceInput').value = totalPrice.toFixed(2);
        }

        // Update total price dynamically whenever quantity changes
        function updateTotalPrice() {
            var totalPrice = 0;
            var productRows = document.querySelectorAll('.card');

            productRows.forEach(function(row) {
                var quantityInput = row.querySelector('.quantity');
                var quantity = parseInt(quantityInput.value);
                var priceElement = row.querySelector('.price');
                var price = parseFloat(priceElement.textContent.replace('R', ''));
                totalPrice += quantity * price;
            });

            document.getElementById('totalPrice').textContent = 'R' + totalPrice.toFixed(2);
            updateTotalPriceInput(totalPrice); // Update the hidden input field
        }

        // Add event listeners for increment and decrement buttons
        // Event listeners for quantity changes (including input changes)
        quantityInputs.forEach(input => {
            input.addEventListener('change', updateTotalPrice);
        });
    </script>
</body>
</html>