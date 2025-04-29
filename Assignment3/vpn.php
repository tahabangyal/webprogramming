<?php

require_once '/home/entra/important/configuration.php';
date_default_timezone_set("Asia/Karachi");

$sql = "SELECT * FROM vpns ORDER BY Price ASC";

$stmt = $websiteconn->prepare($sql);
$stmt->execute();
$tables = $stmt->fetchAll();

?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Virtual Private Network (VPN) | entracloud</title>
  <meta name="description" content="Discover entracloud's secure and reliable VPN services, designed to provide encrypted connections for remote access to your business networks. Ensure data privacy and seamless connectivity with our scalable VPN solutions tailored to your needs.">
  <meta name="keywords" content="VPN Services, EntraCloud, cloud VPN, secure VPN, remote access, encrypted connections, IT security, cloud solutions, Artificial Intelligence, AI, entraAI, intraAI, cloud computing, IT outsourcing, Pakistan IT services, cloud technology, entracloud, IT solutions Pakistan, entra cloud, entracloud pakistan, indtracloud, intra, entra, intra cloud, intracloud pakistan">
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
        <h1>Virtual Private Network (VPN)</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="https://www.entracloud.net">Homepage</a></li>
            <li class="current">Virtual Private Network (VPN)</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Page Section -->
    <section id="about" class="about section">
    
      <div class="container" data-aos="fade-up" data-aos-delay="100">
    
        <div class="row gy-4 align-items-center justify-content-between">
    
          <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
            <h2 class="about-title">VPN Solutions</h2>
            <p class="about-description">
              A Virtual Private Network (VPN) ensures your online privacy and security by encrypting your internet connection and routing it through a secure server. At Entracloud, we provide top-tier VPN services designed to safeguard your personal and business data, ensuring anonymous browsing, secure online communications, and unrestricted access to global content. Our VPN solutions offer unmatched reliability, blazing-fast speeds, and complete privacy protection.
            </p>
    
            <h2 class="about-title">What We Offer</h2>
            <div class="row feature-list-wrapper">
              <div class="col-md-12">
                <ul class="feature-list">
                  <li><i class="bi bi-check-circle-fill"></i> Military-Grade 256-bit AES Encryption</li>
                  <li><i class="bi bi-check-circle-fill"></i> Access to 50+ Global Server Locations</li>
                  <li><i class="bi bi-check-circle-fill"></i> No-Logs Policy & Complete Privacy Protection</li>
                  <li><i class="bi bi-check-circle-fill"></i> High-Speed VPN Servers for Streaming & Gaming</li>
                  <li><i class="bi bi-check-circle-fill"></i> Unlimited Bandwidth & P2P Support</li>
                  <li><i class="bi bi-check-circle-fill"></i> 24/7 Customer Support & Technical Assistance</li>
                  <li><i class="bi bi-check-circle-fill"></i> Seamless Device Compatibility (Windows, macOS, Android, iOS)</li>
                </ul>
              </div>
            </div>
          </div>
    
          <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
            <div class="image-wrapper">
              <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                <img src="/assets/img/vpn-page.png" alt="VPN Service" class="img-fluid main-image rounded-4">
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
        <h2>VPN Plans</h2>
        <p>Protect your online privacy with Entracloud’s secure, fast, and reliable VPN service. Choose the best plan for your needs.</p>
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