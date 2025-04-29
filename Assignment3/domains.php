<?php

require_once '/home/entra/important/configuration.php';
date_default_timezone_set("Asia/Karachi");

$sql = "SELECT * FROM domains ORDER BY RegistrationPrice ASC";

$stmt = $websiteconn->prepare($sql);
$stmt->execute();
$tables = $stmt->fetchAll();

?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Domains | entracloud</title>
  <meta name="description" content="Explore entracloud's domain registration and management services, offering secure, reliable, and scalable solutions for your business. Register, manage, and protect your domain with our tailored services to ensure seamless online presence.">
  <meta name="keywords" content="Domain Registration, Domain Management, EntraCloud, secure domains, cloud domains, domain services, IT security, cloud solutions, Artificial Intelligence, AI, entraAI, intraAI, cloud computing, IT outsourcing, Pakistan IT services, cloud technology, entracloud, IT solutions Pakistan, entra cloud, entracloud pakistan, indtracloud, intra, entra, intra cloud, intracloud pakistan">
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

  <?php include('header.php'); ?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container">
        <h1>Domains</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="https://www.entracloud.net">Homepage</a></li>
            <li class="current">Domains</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Page Section -->
    <section id="about" class="about section">
      
      <div class="container" data-aos="fade-up" data-aos-delay="100">
      
        <div class="row gy-4 align-items-center justify-content-between">
      
          <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
            <h2 class="about-title">Domains and DNS</h2>
            <p class="about-description">
              At Entracloud, we offer robust and reliable domain registration and DNS management services to ensure your website is always accessible and secure. Our advanced DNS solutions allow you to take full control of your domain, offering seamless performance, security features, and quick propagation times. Whether you're starting a new website or managing an existing one, our domain services guarantee that your online presence is optimized for reliability and speed.
            </p>
      
            <h2 class="about-title">What We Offer</h2>
            <div class="row feature-list-wrapper">
              <div class="col-md-12">
                <ul class="feature-list">
                  <li><i class="bi bi-check-circle-fill"></i> Hassle-Free Domain Registration</li>
                  <li><i class="bi bi-check-circle-fill"></i> DNS Management with High Uptime</li>
                  <li><i class="bi bi-check-circle-fill"></i> Fast DNS Propagation & Low Latency</li>
                  <li><i class="bi bi-check-circle-fill"></i> Secure DNS with Anti-DDoS Protection</li>
                  <li><i class="bi bi-check-circle-fill"></i> Customizable DNS Records (A, CNAME, MX, etc.)</li>
                  <li><i class="bi bi-check-circle-fill"></i> Easy Domain Transfer & Renewal Services</li>
                  <li><i class="bi bi-check-circle-fill"></i> 24/7 Support for DNS Configuration & Management</li>
                </ul>
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
        </div>
      
      </div>
      
    </section><!-- /About Section -->
    
    <!-- Pricing Section for VPN -->
    <section id="pricing" class="pricing section light-background">
    
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Domain Plans</h2>
      <p>Secure your online presence with entracloud’s reliable and affordable domain services. Choose the best plan for your needs.</p>
    </div><!-- End Section Title -->
    
      <div class="container" data-aos="fade-up" data-aos-delay="100">
    
        <div class="row g-4 justify-content-center">
          
          <div class="table-responsive" style="text-align:center;font-size:14px;">
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>TLD</th>
                        <th>Registration</th>
                        <th>Renewal</th>
                        <th>Transfer</th>
                        <th>Validity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($tables as $index => $plan) {
                            $isPopular = $plan['Popular'] === 'Yes';
                    ?>
                    <tr>
                        <td>
                            <?php if ($isPopular) { ?>
                            <span><?php echo $plan['TLD']; ?>
                                <span class="badge bg-danger">Hot</span></span>
                            <?php } else { ?>
                            <span><?php echo $plan['TLD']; ?></span>
                            <?php } ?>
                        </td>
                        <td>
                            <span class="amount"><?php echo $plan['RegisterCurrency'] . number_format($plan['RegistrationPrice'], 2); ?></span>
                        </td>
                        <td>
                            <span class="amount"><?php echo $plan['RenewCurrency'] . number_format($plan['RenewPrice'], 2); ?></span>
                        </td>
                        <td>
                            <span class="amount"><?php echo $plan['TransferCurrency'] . number_format($plan['TransferPrice'], 2); ?></span>
                        </td>
                        <td>
                            <span class="period"><?php echo $plan['Validity']; ?></span>
                        </td>
                        <td>
                            <a href="#" class="btn btn-primary">
                                Buy Now
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            
        </div>
          
        </div>
    
      </div>
    
    </section><!-- /Pricing Section -->

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