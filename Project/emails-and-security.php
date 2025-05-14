<?php

require_once '/home/entra/important/configuration.php';
date_default_timezone_set("Asia/Karachi");

$sql = "SELECT * FROM emailsandsecurity WHERE Type = 'Email' ORDER BY Price ASC";

$stmt = $websiteconn->prepare($sql);
$stmt->execute();
$emails = $stmt->fetchAll();

$sql = "SELECT * FROM emailsandsecurity WHERE Type = 'Security' ORDER BY Price ASC";

$stmt = $websiteconn->prepare($sql);
$stmt->execute();
$security = $stmt->fetchAll();

?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Emails and Security | entracloud</title>
  <meta name="description" content="entracloud offers robust email and security solutions to protect your business communications and data. Benefit from secure email hosting, advanced encryption, and comprehensive cybersecurity measures tailored for businesses worldwide.">
  <meta name="keywords" content="Email Security, Cybersecurity, entracloud, secure email hosting, data protection, encryption, IT security, cloud solutions, Artificial Intelligence, AI, entraAI, intraAI, cloud computing, IT outsourcing, Pakistan IT services, cloud technology, entracloud, IT solutions Pakistan, entra cloud, entracloud pakistan, indtracloud, intra, entra, intra cloud, intracloud pakistan">
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
        <h1>Emails and Security</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="https://www.entracloud.net">Homepage</a></li>
            <li class="current">Emails and Security</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Page Section -->
    <section id="about" class="about section">
    
      <div class="container" data-aos="fade-up" data-aos-delay="100">
    
        <div class="row gy-4 align-items-center justify-content-between">
    
          <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
            <h2 class="about-title">Email Solutions</h2>
            <p class="about-description">
              Entracloud’s Email Solutions are designed to meet the growing communication needs of businesses, offering secure, reliable, and scalable email hosting services. Whether you’re a startup or an enterprise, we provide fully managed, feature-rich email services that ensure your team can communicate effectively with clients, colleagues, and partners. With strong security protocols, advanced spam filtering, and user-friendly interfaces, Entracloud ensures your email systems are reliable, fast, and hassle-free.
            </p>
    
            <h2 class="about-title">What We Offer</h2>
            <div class="row feature-list-wrapper">
              <div class="col-md-12">
                <ul class="feature-list">
                  <li><i class="bi bi-check-circle-fill"></i> Secure Email Hosting with SSL Encryption</li>
                  <li><i class="bi bi-check-circle-fill"></i> Custom Domain Email Addresses (e.g., name@yourdomain.com)</li>
                  <li><i class="bi bi-check-circle-fill"></i> Advanced Spam & Virus Protection</li>
                  <li><i class="bi bi-check-circle-fill"></i> 99.99% Uptime SLA & Reliable Email Delivery</li>
                  <li><i class="bi bi-check-circle-fill"></i> Easy-to-Use Webmail Interface & Mobile Access</li>
                  <li><i class="bi bi-check-circle-fill"></i> Collaboration Tools (Shared Calendars, Contacts, and Tasks)</li>
                  <li><i class="bi bi-check-circle-fill"></i> Seamless Integration with Third-Party Applications</li>
                  <li><i class="bi bi-check-circle-fill"></i> 24/7 Customer Support & Email Assistance</li>
                </ul>
              </div>
            </div>
          </div>
    
          <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
            <div class="image-wrapper">
              <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                <img src="/assets/img/emails-page.png" alt="Email Service" class="img-fluid main-image rounded-4">
              </div>
            </div>
          </div>
        </div>
    
      </div>
    
    </section><!-- /About Section -->
    
    <!-- Pricing Section for Email Solutions -->
    <section id="pricing" class="pricing section light-background">
    
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Email Plans</h2>
        <p>Enhance your business communication with Entracloud’s reliable, secure, and scalable email hosting solutions. Choose the best plan that suits your needs.</p>
      </div><!-- End Section Title -->
    
      <div class="container" data-aos="fade-up" data-aos-delay="100">
    
        <div class="row g-4 justify-content-center">
          
          <?php
            foreach ($emails as $index => $plan)
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
                        <span class="currency"><?= htmlspecialchars($plan['Currency']); ?></span>
                        <span class="amount" data-price="<?= $plan['Price']; ?>"><?= number_format($plan['Price'], 2); ?></span>
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
    
    <!-- Page Section -->
    <section id="about" class="about section">
    
      <div class="container" data-aos="fade-up" data-aos-delay="100">
    
        <div class="row gy-4 align-items-center justify-content-between">
    
          <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
            <h2 class="about-title">Security Solutions</h2>
            <p class="about-description">
              At Entracloud, we deliver next-generation security solutions to protect your digital assets across websites, mobile applications, cloud environments, and AI platforms. Our security services are designed to defend against evolving threats, safeguard customer trust, and maintain the integrity and privacy of your systems. From SSL certificates to complete AI security audits, Entracloud ensures your business stays secure, compliant, and resilient in an increasingly digital world.
            </p>
    
            <h2 class="about-title">What We Offer</h2>
            <div class="row feature-list-wrapper">
              <div class="col-md-12">
                <ul class="feature-list">
                  <li><i class="bi bi-check-circle-fill"></i> SSL Certificates for Websites (Standard & Wildcard)</li>
                  <li><i class="bi bi-check-circle-fill"></i> End-to-End Website Security (Firewall, Malware Scanning & Removal)</li>
                  <li><i class="bi bi-check-circle-fill"></i> AI Model Security Audits and Adversarial Threat Protection</li>
                  <li><i class="bi bi-check-circle-fill"></i> Mobile App Security Testing (iOS & Android Penetration Testing)</li>
                  <li><i class="bi bi-check-circle-fill"></i> DDoS Protection and Network Defense Services</li>
                  <li><i class="bi bi-check-circle-fill"></i> GDPR, HIPAA, and PCI-DSS Compliance Assistance</li>
                  <li><i class="bi bi-check-circle-fill"></i> 24/7 Real-Time Threat Monitoring & Incident Response</li>
                  <li><i class="bi bi-check-circle-fill"></i> Secure API Development & Vulnerability Management</li>
                </ul>
              </div>
            </div>
          </div>
    
          <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
            <div class="image-wrapper">
              <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                <img src="/assets/img/security-page.png" alt="Security Solutions" class="img-fluid main-image rounded-4">
              </div>
            </div>
          </div>
        </div>
    
      </div>
    
    </section><!-- /About Section -->
    
    <!-- Pricing Section for Email Solutions -->
    <section id="pricing" class="pricing section light-background">
    
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Security Plans</h2>
        <p>Protect your digital presence with Entracloud’s secure, trusted, and scalable security solutions. Choose the perfect plan to safeguard your data and build user trust.</p>
      </div><!-- End Section Title -->
    
      <div class="container" data-aos="fade-up" data-aos-delay="100">
    
        <div class="row g-4 justify-content-center">
          
          <?php
            foreach ($security as $index => $plan)
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
                        <span class="currency"><?= htmlspecialchars($plan['Currency']); ?></span>
                        <span class="amount" data-price="<?= $plan['Price']; ?>"><?= number_format($plan['Price'], 2); ?></span>
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