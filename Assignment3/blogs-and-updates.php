<?php
require_once '/home/entra/important/configuration.php';
date_default_timezone_set("Asia/Karachi");

session_start();

$sql = "SELECT * FROM blogsandupdates WHERE Tag = 'Blog' ORDER BY Timesnap ASC";

$stmt = $websiteconn->prepare($sql);
$stmt->execute();
$blogs = $stmt->fetchAll();

$sql = "SELECT * FROM blogsandupdates WHERE Tag = 'Update' ORDER BY Timesnap ASC";

$stmt = $websiteconn->prepare($sql);
$stmt->execute();
$updates = $stmt->fetchAll();

?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Blogs and Updates | entracloud</title>
  <meta name="description" content="Explore entracloud's domain registration and management services, offering secure, reliable, and scalable solutions for your business. Register, manage, and protect your domain with our tailored services to ensure seamless online presence.">
  <meta name="keywords" content="Domain Registration, Domain Management, EntraCloud, secure domains, cloud domains, domain services, IT security, cloud solutions, Artificial Intelligence, AI, entraAI, intraAI, cloud computing, IT outsourcing, Pakistan IT services, cloud technology, entracloud, IT solutions Pakistan, entra cloud, entracloud pakistan, indtracloud, intra, entra, intra cloud, intracloud pakistan">
  <meta name="robots" content="index, follow">

  <!-- Favicons -->
  <link href="assets/img/favicon.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.jpg" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  
  <style>
    .hover-grow {
      transition: transform 0.3s ease-in-out;
    }
    .hover-grow:hover {
      transform: scale(1.05);
    }
  </style>
  
</head>

<body class="starter-page-page">

  <?php include('header.php'); ?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container">
        <h1>Blogs and Updates</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="https://www.entracloud.net">Homepage</a></li>
            <li class="current">Blogs and Updates</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <section id="features" class="features section">
      <div class="container">
    
        <div class="d-flex justify-content-center">
    
          <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">
    
            <li class="nav-item">
              <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                <h4>Blogs</h4>
              </a>
            </li><!-- End tab nav item -->
    
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                <h4>Updates</h4>
              </a>
            </li><!-- End tab nav item -->
    
          </ul>
    
        </div>
    
        <!-- Tab Content -->
        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
          
          <div class="tab-pane fade active show" id="features-tab-1">
              <div class="row g-4">
              <?php foreach ($blogs as $row) { ?>
              <!-- Update 1 -->
              <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 hover-grow">
                  <img src="<?php echo $row['FeaturedImage']; ?>" class="card-img-top" alt="<?php echo $row['Title']; ?>">
                  <div class="card-body">
                    <h5 class="card-title fw-bold"><?php echo strlen($row['Title']) > 31 ? substr($row['Title'], 0, 31) . '...' : $row['Title']; ?></h5>
                    <p class="card-text text-muted"><?php echo strlen($row['Header']) > 31 ? substr($row['Header'], 0, 31) . '...' : $row['Header']; ?></p>
                    <div class="d-flex align-items-center mt-3">
                      <div>
                        <small class="text-muted"><?php echo date('F j, Y h:iA', strtotime($row['Timesnap'])); ?></small>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer bg-transparent border-0">
                    <a href="view-blog-update.php?id=<?php echo $row['ID']; ?>" class="btn btn-info text-white">
                        Readmore
                        <i class="bi bi-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div><!-- End tab content item -->
          
        </div>
        
        <!-- Tab Content -->
        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
          
          <div class="tab-pane fade active show" id="features-tab-2">
              <div class="row g-4">
              <?php foreach ($updates as $row) { ?>
              <!-- Update 1 -->
              <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 hover-grow">
                  <img src="<?php echo $row['FeaturedImage']; ?>" class="card-img-top" alt="<?php echo $row['Title']; ?>">
                  <div class="card-body">
                    <h5 class="card-title fw-bold"><?php echo strlen($row['Title']) > 31 ? substr($row['Title'], 0, 31) . '...' : $row['Title']; ?></h5>
                    <p class="card-text text-muted"><?php echo strlen($row['Header']) > 31 ? substr($row['Header'], 0, 31) . '...' : $row['Header']; ?></p>
                    <div class="d-flex align-items-center mt-3">
                      <div>
                        <small class="text-muted"><?php echo date('F j, Y h:iA', strtotime($row['Timesnap'])); ?></small>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer bg-transparent border-0">
                    <a href="/home/entra/public_html/view-blogs-updates.php?id=<?php echo $row['ID']; ?>" class="btn btn-info text-white">
                        Readmore
                        <i class="bi bi-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div><!-- End tab content item -->
          
        </div>
      </div>
    </section>

  </main>

  <?php include('footer.php'); ?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>