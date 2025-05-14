<?php

require_once '/home/entra/important/configuration.php';
date_default_timezone_set("Asia/Karachi");

$sql = "SELECT Name, Photo, PositionName, AdditionalPosition, DirectorType
        FROM profile
        INNER JOIN documents ON documents.EmployeeID = profile.EmployeeID
        INNER JOIN employment ON employment.EmployeeID = profile.EmployeeID WHERE PositionName LIKE 'Chief%' OR AdditionalPosition LIKE 'Chief%' OR DirectorType LIKE '%Director' OR PositionName LIKE 'Head%' OR AdditionalPosition LIKE 'Head%' ORDER BY 
    CASE 
        WHEN DirectorType LIKE '%Director' THEN 0
        WHEN PositionName LIKE 'Chief Executive Officer%' OR AdditionalPosition LIKE 'Chief Executive Officer%' THEN 1
        WHEN PositionName LIKE 'Chief%' OR AdditionalPosition LIKE 'Chief%' THEN 2
        WHEN PositionName LIKE 'Head%' OR AdditionalPosition LIKE 'Head%' THEN 3
        ELSE 4
    END";

$stmt = $hrmsconn->prepare($sql);
$stmt->execute();
$info = $stmt->fetchAll();


?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>About Company | entracloud</title>
  <meta name="description" content="Learn about entracloud, a premier IT services provider specializing in cloud solutions, software development, and IT outsourcing, focused on Pakistan and serving clients globally.">
  <meta name="keywords" content="About entracloud, IT company, cloud solutions, software development, managed IT services, Artificial Intelligence, AI, entraAI, intraAI, cloud computing, IT outsourcing, Pakistan IT services, cloud technology, entracloud, IT solutions Pakistan, entra cloud, entracloud pakistan, indtracloud, intra, entra, intra cloud, intracloud pakistan">
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
  
  <script type="application/ld+json">
    [
      {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "About Company | entracloud",
        "url": "https://www.entracloud.net/about-company",
        "description": "Learn about entracloud, a premier IT services provider specializing in cloud solutions, software development, and IT outsourcing, focused on Pakistan and serving clients globally.",
        "publisher": {
          "@type": "Corporation",
          "name": "entracloud",
          "legalName": "ENTRACLOUD (PRIVATE) LIMITED",
          "url": "https://www.entracloud.net",
          "logo": "https://www.entracloud.net/assets/img/logo.png",
          "contactPoint": [
            {
              "@type": "ContactPoint",
              "telephone": "+92-453-252983",
              "contactType": "customer service",
              "areaServed": "PK",
              "availableLanguage": "en"
            },
            {
              "@type": "ContactPoint",
              "email": "info@entracloud.net",
              "contactType": "customer support",
              "areaServed": "PK",
              "availableLanguage": "en"
            }
          ]
        }
      }
    ]
  </script>
  
  <script type="application/ld+json">
    [
      {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Taha Abdullah Bangyal",
        "jobTitle": "Chief Executive Officer",
        "worksFor": {
          "@type": "Corporation",
          "name": "entracloud"
        },
        "url": "https://www.entracloud.net/about-company/team/taha-abdullah-bangyal",
        "sameAs": ["https://www.linkedin.com/in/tahabangyal"]
      },
      {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Muhammad Bilal",
        "jobTitle": "Chief Technology Officer",
        "worksFor": {
          "@type": "Corporation",
          "name": "entracloud"
        },
        "url": "https://www.entracloud.net/about-company/team/muhammad-bilal",
        "sameAs": ["http://www.linkedin.com/in/bilal-ashiq"]
      },
      {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Talha Abdullah Bangyal",
        "jobTitle": "Chief Human Resource Officer",
        "worksFor": {
          "@type": "Corporation",
          "name": "entracloud"
        },
        "url": "https://www.entracloud.net/about-company/team/talha-abdullah-bangyal",
        "sameAs": ["https://www.linkedin.com/in/talhabangyal"]
      },
      {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Muhammad Bilal Ahmad",
        "jobTitle": "Chief Operations Officer",
        "worksFor": {
          "@type": "Corporation",
          "name": "entracloud"
        },
        "url": "https://www.entracloud.net/about-company/team/muhammad-bilal-ahmad",
        "sameAs": ["https://www.linkedin.com/in/muhammadbilalahmad9806"]
      },
      {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Ali Hamza",
        "jobTitle": "Chief Marketing Officer",
        "worksFor": {
          "@type": "Corporation",
          "name": "entracloud"
        },
        "url": "https://www.entracloud.net/about-company/team/ali-hamza",
        "sameAs": ["https://www.linkedin.com/in/iam-ali-hamza"]
      },
      {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Muhammad Asim Umair",
        "jobTitle": "Chief Legal Officer",
        "worksFor": {
          "@type": "Corporation",
          "name": "entracloud"
        },
        "url": "https://www.entracloud.net/about-company/team/muhammad-asim-umair"
      },
      {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Naveed Ahmad",
        "jobTitle": "Chief Product Officer",
        "worksFor": {
          "@type": "Corporation",
          "name": "entracloud"
        },
        "url": "https://www.entracloud.net/about-company/team/naveed-ahmad",
        "sameAs": ["https://www.linkedin.com/in/naveed-ahmad-882bb8294/"]
      }
    ]
  </script>
  
  <style>
    .profile-card {
        border: none;
        border-radius: 20px;
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
    }
    .profile-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
    }
    .profile-img {
        object-fit: cover;
        border: 4px solid #ffffff;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, border-color 0.3s ease;
        margin-top: 18px;
    }
    .profile-img:hover {
        transform: scale(1.05);
        border-color: #0d6efd;
    }
    .card-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    .card-title a {
        color: #1a1a1a;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    .card-title a:hover {
        color: #0d6efd;
    }
    .card-text {
        font-size: 1rem;
        color: #6c757d;
        font-weight: 400;
    }
  </style>
  
</head>

<body class="starter-page-page">

  <?php include('header.php'); ?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container">
        <h1>About Company</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="https://www.entracloud.net">Homepage</a></li>
            <li class="current">About Company</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 align-items-center justify-content-between">

          <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
            <span class="about-meta">WHAT IS ENTRACLOUD?</span>
            <h2 class="about-title">Overview</h2>
            <p class="about-description">entracloud is an IT company delivering innovative and tailored web development solutions to elevate businesses’ online presence. With expertise in web development, mobile applications, e-commerce solutions, hosting, domain management, AI development, VPN services, and a wide array of IT solutions.</p>

            <h2 class="about-title">Core Specializations</h2>
            <div class="row feature-list-wrapper">
              <div class="col-md-12">
                <ul class="feature-list">
                  <li><i class="bi bi-check-circle-fill"></i> Website Development</li>
                  <li><i class="bi bi-check-circle-fill"></i> Mobile Application Development</li>
                  <li><i class="bi bi-check-circle-fill"></i> Artificial Intelligence Development</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
            <div class="image-wrapper">
              <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                <img src="assets/img/about-company-page.png" alt="Business Meeting" class="img-fluid main-image rounded-4">
                <img src="assets/img/about-building.jpg" alt="Corporate Office" class="img-fluid small-image rounded-4">
              </div>
              <div class="experience-badge floating">
                <h3>3<span>Years</span></h3>
                <p>of experience in IT industry</p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!--  Mission and Vision-->
    <section id="contact" class="contact section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4 g-lg-5">
          <div class="col-lg-6">
            <div class="contact-form" data-aos="fade-right" data-aos-delay="200">
              <h3>Mission Statements</h3>
              <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                <div class="row about feature-list-wrapper">
                  <div class="col-md-12">
                    <ul class="about feature-list">
                      <li><i class="bi bi-check-circle-fill"></i> Innovative solutions for a digital world</li>
                      <li><i class="bi bi-check-circle-fill"></i> Empowering businesses through cutting-edge software technologies</li>
                      <li><i class="bi bi-check-circle-fill"></i> Transforming ideas into powerful, scalable software solutions</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="contact-form" data-aos="fade-left" data-aos-delay="200">
              <h3>Vision Statements</h3>
              <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                <div class="row about feature-list-wrapper">
                  <div class="col-md-12">
                    <ul class="about feature-list">
                      <li><i class="bi bi-check-circle-fill"></i> Revolutionizing web development by pioneering innovation and delivering exceptional digital experiences</li>
                      <li><i class="bi bi-check-circle-fill"></i> Leading the future of web, mobile, and Artificial Intelligence development</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Mission and Vision Section -->

    <!-- Corporate Section -->
    <section id="about" class="contact section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4 g-lg-5">
          <div class="col-lg-6">
            <div class="info-box" data-aos="fade-right" data-aos-delay="200">
              <h3>Registration Information</h3>
              <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                  <i class="bi bi-file-earmark-check"></i>
                </div>
                <div class="content">
                  <h4>ENTRACLOUD (PRIVATE) LIMITED<br>CUIN: 0230713</h4>
                  <p>Registered with Securities and Exchange Comission of Pakistan (SECP) under section 16 of the Companies Act, 2017 (XIX of 2017) of Constitution of Islamic Republic of Pakistan</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="info-box" data-aos="fade-left" data-aos-delay="200">
              <h3>Tax Inofrmation</h3>
              <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                  <i class="bi bi-postcard"></i>
                </div>
                <div class="content">
                  <h4>National Tax Number: A362255-5</h4>
                  <p>Registered with Federal Board of Revenue (FBR) under the Companies Ordinance, 1984 or any other law repealed thereunder</p>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Corporate Section -->
    
    <!--  Mission and Vision-->
    <section id="contact" class="contact section light-background">
        
        <div class="container section-title" data-aos="fade-up">
            <h2>Meet Our Team</h2>
            <p>Our team of passionate experts brings innovation, experience, and dedication to every project, working together to turn your vision into reality</p>
        </div><!-- End Section Title -->
        
        <div class="container" data-aos="fade-left" data-aos-delay="200">
            <div class="row">
                <?php foreach ($info as $row) {?>
                <!-- Profile Card 1 -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card profile-card h-100">
                        <div class="card-body text-center d-flex flex-column align-items-center">
                            <?php
                                $name = $row['Name'];
                                $slug = strtolower(str_replace(' ', '-', $name));
                                $profileLink = "https://www.entracloud.net/about-company/team/" . $slug;
                            ?>
                            <?php
            				if (!empty($row['Photo']))
            				{
            				  $imagePath = $row['Photo'];
                              $imageData = base64_encode(file_get_contents($imagePath));
                              $imageSrc = 'data:image/jpeg;base64,' . $imageData;
                              
                              echo '<a href="' . $profileLink . '">';
                              echo '<img class="rounded-circle profile-img mb-3" src="' . $imageSrc . '" alt="' . $name . '" width="120" height="120">';
                              echo '</a>';
            				}
            			   ?>
                            <h3 class="card-title mb-2"><a href="<?php echo $profileLink; ?>"><?php echo $name; ?></a></h3>
                            <?php
                            $items = array_filter([
                                $row['DirectorType'] ?? '',
                                $row['PositionName'] ?? '',
                                $row['AdditionalPosition'] ?? ''
                            ]);
                            
                            $items = array_unique($items);
                            
                            if (!empty($items))
                            {
                                echo '<p class="card-text text-muted mb-4">' . implode(', ', $items) . '</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>

    </section><!-- /Mission and Vision Section -->

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