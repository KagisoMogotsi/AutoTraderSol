<?php
  
  require_once 'connection.php';

$sql_cart = "SELECT * FROM cart";
$all_cart = $conn->query($sql_cart);


?>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="../index.php" class="logo">
                        <img src="../assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->  
                    <ul class="nav">
                      <li><a href="../AutoTraderSol/index.php">Home</a></li>
                      <li class="scroll-to-section"><a href="../AutoTraderSol/contact-us.php">Contact Us</a></li>
                      <li class="has-sub">
                          <a href="javascript:void(0)">Pages</a>
                          <ul class="sub-menu">
                              <li><a href="../AutoTraderSol/about-us.php">About</a></li>
                              <li><a href="../AutoTraderSol/our-services.php">Our Services</a></li>
                              <li><a href="../AutoTraderSol/testimonials.php">Testimonials</a></li>
                          </ul>
                      </li>
                      <li class="scroll-to-section"><a href="../AutoTraderSol/shop.php">Shop Here</a></li>
                      <li><a href="../AutoTraderSol/cart.php">Cart <span id="badge"><?php echo mysqli_num_rows($all_cart);  ?></span></a></li>
                      <a href="../AutoTraderSol/logout.php" class="btn btn-warning">Logout</a>
                    </ul>  
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
  <!-- ***** Header Area End ***** -->