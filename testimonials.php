<?php
// Include the database connection file
include './includes/connection.php';
// Check if the user is logged in
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
   exit(); // Stop further execution
}

$sql = "SELECT * FROM testimonials";
$all_testimonials = $conn->query($sql);

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
            <h2>Clients Feedback</h2>
            <div class="div-dec"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="testimonials" id="testimonials">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h6>Testimonials</h6>
            <h4>What They Say</h4>
          </div>
        </div>
        <div class="col-lg-10 offset-lg-1">
          <div class="owl-testimonials owl-carousel" style="position: relative; z-index: 5;">
            <?php
              // Fetch all testimonials from the database
              $sql = "SELECT * FROM testimonials";
              $result = $conn->query($sql);

              // Check if there are any testimonials
              if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                  echo '<div class="item">';
                  echo '<i class="fa fa-quote-left"></i>';
                  echo '<p>"' . $row['message'] . '"</p>';
                  echo '<h4>' . $row['product_name'] . '</h4>';
                  echo '<span>' . $row['fullName'] . '</span>';
                  echo '<div class="right-image">';
                  echo '<img src="assets/images/testimonials-01.png" alt="">'; // You may want to use $row['image'] if you have an image column
                  echo '</div>';
                  echo '</div>';
                }
              } else {
                echo "No testimonials available";
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
// Check if the message is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the message
    $fullName = trim($_POST["fullName"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);
    // You can perform further validation here if needed

    // Prepare and execute the SQL statement to insert the message into the 'testimonials' table
    $query = "INSERT INTO testimonials (fullName, email, feedback) VALUES (?, ?, ?)";
    $statement = $conn->prepare($query);
    $statement->bind_param("s", $message);
    $statement->execute();

    // Check if the insertion was successful
    if ($statement->affected_rows > 0) {
        // Redirect to a success page or display a success message
        header("Location: testimonials.php");
        exit();
    }

    // Close the statement and database connection
    $statement->close();
    $conn->close();
}
?>

  <section class="calculator">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-heading">
            <h6>Rate Us</h6>
            <h4>Add feedback</h4>
          </div>
          <form id="calculate" action="" method="post">
              <div class="col-lg-12">
                <fieldset>
                  <input class="box1" type="text" name="name" id="name" placeholder="Enter Name" value="<?php echo isset($_SESSION["user_fullname"]) ? $_SESSION["user_fullname"] : ''; ?>" required><br> <!-- Add required attribute -->
                  <label for="email">Email</label><br>
                  <input class="box1" type="email" name="email" id="email" placeholder="Enter Email" value="<?php echo isset($_SESSION["user_email"]) ? $_SESSION["user_email"] : ''; ?>" required><br> <!-- Add required attribute -->
                  <label for="message">Your Message</label>
                  <input type="text" name="message" placeholder="Enter your message:" class="input_fields" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <button type="submit" id="form-submit" class="orange-button" value="Send">Send Email</button>
              </div>
            </div>
          </form>
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