<?php

require_once '/home/entra/important/configuration.php';
date_default_timezone_set("Asia/Karachi");

$sql = "SELECT * FROM blogsandupdates ORDER BY Timesnap ASC LIMIT 2";

$stmt = $websiteconn->prepare($sql);
$stmt->execute();
$tables = $stmt->fetchAll();

?>

<!-- Clients Section -->
<section id="clients" class="clients section">
  
  <div class="container section-title" data-aos="fade-up">
    <h2>Partners</h2>
    <p>We proudly collaborate with some of the most prestigious companies in the tech industry to provide top-tier cloud solutions and services</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="swiper init-swiper">
      <script type="application/json" class="swiper-config">
        {
          "loop": true,
          "speed": 600,
          "autoplay": {
            "delay": 1000
          },
          "slidesPerView": "auto",
          "pagination": {
            "el": ".swiper-pagination",
            "type": "bullets",
            "clickable": true
          },
          "breakpoints": {
            "320": {
              "slidesPerView": 2,
              "spaceBetween": 40
            },
            "480": {
              "slidesPerView": 3,
              "spaceBetween": 60
            },
            "640": {
              "slidesPerView": 4,
              "spaceBetween": 80
            },
            "992": {
              "slidesPerView": 6,
              "spaceBetween": 120
            }
          }
        }
      </script>
      <div class="swiper-wrapper align-items-center">
        <div class="swiper-slide"><img src="/assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="/assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="/assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="/assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="/assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="/assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="/assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="/assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="/assets/img/clients/client-9.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="/assets/img/clients/client-10.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="/assets/img/clients/client-11.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="/assets/img/clients/client-12.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="/assets/img/clients/client-13.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="/assets/img/clients/client-14.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="/assets/img/clients/client-15.png" class="img-fluid" alt=""></div>
      </div>
      <!--<div class="swiper-pagination"></div>-->
    </div>

  </div>

</section><!-- /Clients Section -->

<footer id="footer" class="footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="https://www.entracloud.net" class="logo align-items-center me-auto me-xl-0">
            <img src="/assets/img/logo.png" alt="entracloud logo">
            <!--<h1 class="sitename">iLanding</h1>-->
          </a>
          <div class="footer-contact pt-3">
            <p>EntraCloud HQ, Darya Khan, Punjab, Pakistan</p>
            <p class="mt-3"><strong>Hotline:</strong> <span><a href="tel: +92 453 252983">+92 453 252983</a></span></p>
            <p><strong>Support:</strong> <span><a href="mailto:info@entracloud.net">info@entracloud.net</a></span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href="https://www.facebook.com/entracloud" target="_blank"><i class="bi bi-facebook"></i></a>
            <a href="https://x.com/entracloud" target="_blank"><i class="bi bi-twitter-x"></i></a>
            <a href="https://www.instagram.com/entracloud" target="_blank"><i class="bi bi-instagram"></i></a>
            <a href="https://www.linkedin.com/company/entracloud" target="_blank"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
    
        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="/about-company.php">About Company</a></li>
            <li><a href="/contact-us.php">Contact Us</a></li>
            <li><a href="https://support.entracloud.net" target="_blank">entraSupport <i class="bi bi-box-arrow-up-right"></i></a></li>
            <li><a href="https://careers.entracloud.net" target="_blank">entraCareers <i class="bi bi-box-arrow-up-right"></i></a></li>
            <li><a href="https://hrms.entracloud.net" target="_blank">entraHRMS <i class="bi bi-box-arrow-up-right"></i></a></li>
          </ul>
        </div>
    
        <div class="col-lg-3 col-md-3 footer-links">
          <h4>Products and Services</h4>
          <ul>
            <li><a href="/services/artificial-intelligence-development.php">Artificial Intelligence Development</a></li>
            <li><a href="/products/emails-and-security.php">Emails and Security</a></li>
            <li><a href="/products/vpn.php">Virtual Private Networks (VPN)</a></li>
            <li><a href="/products/cloud-servers.php">Cloud Servers</a></li>
            <li><a href="/services/website-development.php">Website Development</a></li>
          </ul>
        </div>
    
        <div class="col-lg-3 col-md-3 footer-links">
          <h4>Blogs and Updates</h4>
          
          <div class="blog-list overflow-auto pe-2" style="max-height: 400px;">
            
            <?php foreach ($tables as $row) { ?>
            
            <div class="blog-item d-flex align-items-start mb-3">
              <img src="<?php echo $row['FeaturedImage'] ?>" alt="<?php echo $row['Title']; ?>" class="blog-image">
              <div class="blog-content flex-grow-1">
                <h5 class="blog-title fs-6 mb-1 fw-semibold"><?php echo strlen($row['Title']) > 21 ? substr($row['Title'], 0, 21) . '...' : $row['Title']; ?></h5>
                <p class="blog-excerpt small text-muted mb-1"><?php echo strlen($row['Header']) > 31 ? substr($row['Header'], 0, 31) . '...' : $row['Header']; ?></p>
                <span class="blog-date small text-muted fst-italic"><?php echo date('F j, Y h:iA', strtotime($row['Timesnap'])); ?></span>
              </div>
            </div>
            <?php } ?>
            
          </div>
          
        </div>
      </div>
    </div>
    
    <div class="container copyright text-center mt-4">
      <p>© <strong class="sitename">entracloud - <?php echo date('Y'); ?></strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <a href="https://policies.entracloud.net/privacy-policy">Privacy Policy</a>&emsp;
        <a href="https://policies.entracloud.net/terms-of-services">Terms of Services</a>&emsp;
        <a href="https://policies.entracloud.net/refund-policy">Refund Policy</a>
      </div>
    </div>

</footer>