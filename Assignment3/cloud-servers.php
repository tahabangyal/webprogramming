<?php

require_once '/home/entra/important/configuration.php';
date_default_timezone_set("Asia/Karachi");

$sql = "SELECT * FROM cloudservers ORDER BY Price ASC";

$stmt = $websiteconn->prepare($sql);
$stmt->execute();
$tables = $stmt->fetchAll();

?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Cloud Servers | entracloud</title>
  <meta name="description" content="Explore entracloud's advanced cloud server solutions, offering scalable, secure, and high-performance infrastructure for businesses. Leverage our expertise in cloud computing to optimize your operations and drive growth.">
  <meta name="keywords" content="Cloud Servers, entracloud, cloud solutions, cloud computing, IT infrastructure, scalable servers, secure cloud, managed IT services, Artificial Intelligence, AI, entraAI, intraAI, IT outsourcing, Pakistan IT services, cloud technology, entracloud, IT solutions Pakistan, entra cloud, entracloud pakistan, indtracloud, intra, entra, intra cloud, intracloud pakistan">
  <meta name="robots" content="index, follow">

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

  <?php include($_SERVER['DOCUMENT_ROOT'].'/header.php'); ?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container">
        <h1>Cloud Servers</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="https://www.entracloud.net">Homepage</a></li>
            <li class="current">Cloud Servers</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Page Section -->
    <section id="about" class="about section">
    
      <div class="container" data-aos="fade-up" data-aos-delay="100">
    
        <div class="row gy-4 align-items-center justify-content-between">
    
          <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
            <h2 class="about-title">Cloud Server Solutions</h2>
            <p class="about-description">
              Cloud servers are powerful virtual servers hosted in a cloud environment, providing businesses with scalable, reliable, and cost-efficient computing resources without the need for physical infrastructure. Entracloud offers reliable, scalable, and secure cloud server infrastructure tailored to meet the diverse needs of startups, growing businesses, and enterprises. Our cloud platforms ensure lightning-fast performance, seamless uptime, and complete control — empowering you to deploy, manage, and scale with confidence.
            </p>
    
            <h2 class="about-title">What We Offer</h2>
            <div class="row feature-list-wrapper">
              <div class="col-md-12">
                <ul class="feature-list">
                  <li><i class="bi bi-check-circle-fill"></i> High-Performance Virtual Servers</li>
                  <li><i class="bi bi-check-circle-fill"></i> Scalable SSD Storage & Bandwidth</li>
                  <li><i class="bi bi-check-circle-fill"></i> Full Root Access & Custom OS Installs</li>
                  <li><i class="bi bi-check-circle-fill"></i> 99.99% Uptime SLA & DDoS Protection</li>
                  <li><i class="bi bi-check-circle-fill"></i> 24/7 Technical Support & Monitoring</li>
                </ul>
              </div>
            </div>
          </div>
    
          <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
            <div class="image-wrapper">
              <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                <img src="/assets/img/cloud-servers-page.png" alt="Cloud Infrastructure" class="img-fluid main-image rounded-4">
              </div>
            </div>
          </div>
        </div>
    
      </div>
    
    </section><!-- /About Section -->
    
    <!-- Pricing Section -->
    <section id="pricing" class="pricing section light-background">
    
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Server Plans</h2>
        <p>Flexible and scalable cloud server solutions tailored to meet your specific business needs.</p>
      </div><!-- End Section Title -->
    
      <div class="container" data-aos="fade-up" data-aos-delay="100">
    
        <div class="row g-4 justify-content-center">
          
          <?php
            foreach ($tables as $index => $plan)
            {
                $features = explode('|', $plan['Features']);
                $delay = 100 + ($index * 100);
                $isPopular = $plan['Popular'] === 'Yes';
          ?>
          
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                <div class="pricing-card<?php echo $isPopular ? ' popular' : ''; ?>">
                    <?php if ($isPopular) { ?>
                        <div class="popular-badge">Most Popular</div>
                    <?php } ?>
                    <h3><?php echo htmlspecialchars($plan['Title']); ?></h3>
                    <div class="price">
                        <span class="currency"><?php echo htmlspecialchars($plan['Currency']); ?></span>
                        <span class="amount"><?php echo number_format($plan['Price'], 2); ?></span>
                        <span class="period">/ <?php echo htmlspecialchars($plan['Subscription']); ?></span>
                    </div>
                    <p class="description"><?php echo htmlspecialchars($plan['Description']); ?></p>
        
                    <h4>Features Included:</h4>
                    <ul class="features-list">
                        <?php foreach ($features as $feature) { ?>
                            <li><i class="bi bi-check-circle-fill"></i> <?php echo htmlspecialchars(trim($feature)); ?></li>
                        <?php } ?>
                    </ul>
        
                    <a href="#" class="btn <?php echo $isPopular ? 'btn-light' : 'btn-primary'; ?>">
                        Buy Now
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
          <?php } ?>
          
        </div>
    
      </div>
    
    </section><!-- /Pricing Section -->

  </main>

  <?php include($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>

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