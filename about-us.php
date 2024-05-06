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
            <h2>About Us</h2>
            <div class="div-dec"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="about-us" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h6>About Us</h6>
            <h4>Clients Favourites</h4>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="naccs">
            <div class="tabs">
              <div class="row">
                <div class="col-lg-12">
                  <div class="menu">
                    <div class="active gradient-border"><span>MQL 4</span></div>
                    <div class="gradient-border"><span>MQL 4(micro)</span></div>
                    <div class="gradient-border"><span>MQL 5</span></div>
                    <div class="gradient-border"><span>MQL 5(micro)</span></div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <ul class="nacc">
                    <li class="active">
                      <div>
                        <div class="main-list">
                          <span class="title">Expert Name</span>
                          <span class="title">Budget (from Nov 2024)</span>
                          <span class="title">Created</span>
                          <span class="title">Clients</span>
                        </div>
                        <div class="list-item">
                          <span class="item item-title">Moving Average</span>
                          <span class="item">R1,600</span>
                          <span class="item">2022 Dec 2</span>
                          <span class="item">Capital Clique</span>
                        </div>
                        <div class="list-item">
                          <span class="item item-title">1 Click Close</span>
                          <span class="item">R2,200</span>
                          <span class="item">2022 Dec 8</span>
                          <span class="item">Alpha Finance</span>
                        </div>
                        <div class="list-item">
                          <span class="item item-title">Samo88</span>
                          <span class="item">R2,500 to R3,600</span>
                          <span class="item">2022 Dec 10</span>
                          <span class="item">Elite Strategies</span>
                        </div>
                        <div class="list-item last-item">
                          <span class="item item-title">1000Pow</span>
                          <span class="item">R4,500 to R6,200</span>
                          <span class="item">2022 Dec 12</span>
                          <span class="item">Axis Wealth</span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="main-list">
                          <span class="title">Project Title</span>
                          <span class="title">Budget</span>
                          <span class="title">Created</span>
                          <span class="title">Client</span>
                        </div>
                        <div class="list-item">
                          <span class="item item-title">MA(m)</span>
                          <span class="item">R1,200 to R1,600</span>
                          <span class="item">2022 Nov 3</span>
                          <span class="item">MoneyMinds</span>
                        </div>
                        <div class="list-item">
                          <span class="item item-title">1 Click Close(m)</span>
                          <span class="item">R1,200 to R1,800</span>
                          <span class="item">2022 Nov 10</span>
                          <span class="item">Noble Ventures</span>
                        </div>
                        <div class="list-item">
                          <span class="item item-title">Samo88(m)</span>
                          <span class="item">R2,500 to R3,000</span>
                          <span class="item">2022 Nov 18</span>
                          <span class="item">Opus Wealth Planning</span>
                        </div>
                        <div class="list-item last-item">
                          <span class="item item-title">1000Pow(m)</span>
                          <span class="item">R3,500 to R4,800</span>
                          <span class="item">2022 Nov 24</span>
                          <span class="item">FinFlex</span>
                        </div>
                    </li>
                    <li>
                      <div>
                        <div class="main-list">
                          <span class="title">NOT YET AVAILABLE</span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="main-list">
                          <span class="title">NOT YET AVAILABLE</span>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="right-content">
            <h4>To learn more about our services click below</h4>
            <div class="green-button">
              <a href="./shop.php">Shop Here</a>
            </div>
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

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>

    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/swiper.js"></script>
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


