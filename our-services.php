<?php
// Include the database connection file
include './includes/connection.php';
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
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
            <h2>Our Services</h2>
            <div class="div-dec"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Main Banner Area End ***** -->


  <section class="services" id="services">
    <div class="section-heading">
      <h6>Our Services</h6>
      <h4>we offer a range of services and functionalities designed to assist you in executing trades more efficiently and effectively</h4>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fas fa-suitcase"></i>
            <h4>Automated Trading</h4>
            <p>Trdaing bots can automatically execute trades based on predefined criteria, such as market trends, technical indicators, or specific trading strategies.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fas fa-cloud"></i>
            <h4>Market Analysis</h4>
            <p>Bots can analyze market data in real-time, identify trading opportunities, and provide insights into market trends, volatility, and price movements.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fas fa-charging-station"></i>
            <h4>Portfolio Management</h4>
            <p>Some trading bots offer portfolio management features, including asset allocation, risk management, and rebalancing to optimize portfolio performance.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fas fa-suitcase"></i>
            <h4>Arbitrage Trading</h4>
            <p>Bots can exploit price differences between different exchanges or markets to execute profitable trades simultaneously, known as arbitrage trading.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fas fa-cloud"></i>
            <h4>Back Testing</h4>
            <p>Trading bots often include backtesting capabilities, allowing traders to test their trading strategies using historical market data to evaluate performance and refine their strategies.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fas fa-charging-station"></i>
            <h4>Risk Management</h4>
            <p>Bots can implement risk management strategies, such as stop-loss orders, trailing stops, and position sizing, to minimize losses and protect capital.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fas fa-suitcase"></i>
            <h4>Market Management</h4>
            <p>Trading bots can act as market makers by providing liquidity to markets, placing buy and sell orders to facilitate trading and reduce spreads.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fas fa-puzzle-piece"></i>
            <h4>Order Execution</h4>
            <p>Bots can execute orders quickly and efficiently, ensuring timely execution and minimizing slippage.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fas fa-archway"></i>
            <h4>Customization and Flexibility</h4>
            <p>Many trading bots offer customization options, allowing traders to tailor their strategies, parameters, and risk levels to suit their preferences and objectives.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fas fa-puzzle-piece"></i>
            <h4>24/7 Trading</h4>
            <p>Unlike human traders, bots can operate 24/7 without the need for breaks or sleep, ensuring continuous monitoring of markets and opportunities.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer>
    
  </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        var interleaveOffset = 0.5;

      var swiperOptions = {
        loop: true,
        speed: 1000,
        grabCursor: true,
        watchSlidesProgress: true,
        mousewheelControl: true,
        keyboardControl: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev"
        },
        on: {
          progress: function() {
            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {
              var slideProgress = swiper.slides[i].progress;
              var innerOffset = swiper.width * interleaveOffset;
              var innerTranslate = slideProgress * innerOffset;
              swiper.slides[i].querySelector(".slide-inner").style.transform =
                "translate3d(" + innerTranslate + "px, 0, 0)";
            }      
          },
          touchStart: function() {
            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {
              swiper.slides[i].style.transition = "";
            }
          },
          setTransition: function(speed) {
            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {
              swiper.slides[i].style.transition = speed + "ms";
              swiper.slides[i].querySelector(".slide-inner").style.transition =
                speed + "ms";
            }
          }
        }
      };

      var swiper = new Swiper(".swiper-container", swiperOptions);
    </script>

  </body>
</html>