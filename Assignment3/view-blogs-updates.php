<?php

require_once '/home/entra/important/configuration.php';
date_default_timezone_set("Asia/Karachi");

session_start();

if (!isset($_GET['id']))
{
    header("Location: /blogs-and-updates.php");
    exit();
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM blogsandupdates WHERE ID = :id";

$stmt = $websiteconn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$data = $stmt->fetch();

?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php echo $data['Title']; ?> | entracloud</title>
  <meta name="description" content="<?php echo $data['Header']; ?>">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="/assets/img/favicon.jpg" rel="icon">
  <link href="/assets/img/apple-touch-icon.jpg" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="/assets/css/main.css" rel="stylesheet">
</head>

<body class="starter-page-page">

  <?php include('header.php'); ?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container">
        <h1><?php echo $data['Title']; ?></h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="https://www.entracloud.net">Homepage</a></li>
            <li class="current"><?php echo $data['Title']; ?></li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Page Section -->
    <section id="about" class="about section">
      
      <div class="container" data-aos="fade-up" data-aos-delay="100">
      
        <div class="row gy-4 align-items-center justify-content-between">
      
          <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
            <h2 class="about-title"><?php echo $data['Title']; ?></h2>
            <p class="about-description">
              <?php echo $data['Header']; ?>
            </p>
            
            <div class="row feature-list-wrapper">
              <div class="col-md-12">
                <?php echo $data['Main']; ?>
              </div>
            </div>
          </div>
      
          <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
            <div class="image-wrapper">
              <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                <img src="/assets/img/domains-page.png" alt="Domain and DNS Services" class="img-fluid main-image rounded-4">
              </div>
            </div>
          </div>
          
          <div class="row feature-list-wrapper">
              <div class="col-md-12">
                <?php echo $data['Footer']; ?>
              </div>
            </div>
          </div>
          
        </div>
      
      </div>
      
    </section><!-- /About Section -->

  </main>

  <?php include('footer.php'); ?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>

</html>