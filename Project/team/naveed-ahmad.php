<?php

require_once '/home/entra/important/configuration.php';
date_default_timezone_set("Asia/Karachi");

$username = '0019543';

$sql = "SELECT Name, Photo, Facebook, LinkedIn, GitHub, Twitter, PositionName, AdditionalPosition, DirectorType
        FROM profile
        LEFT JOIN documents ON documents.EmployeeID = profile.EmployeeID
        INNER JOIN employment ON employment.EmployeeID = profile.EmployeeID
        LEFT JOIN socialmedia ON socialmedia.EmployeeID = profile.EmployeeID
        WHERE profile.EmployeeID = :username";

$stmt = $hrmsconn->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->execute();
$data = $stmt->fetch();

$sql = "SELECT Type, Major, Institute FROM qualifications WHERE EmployeeID = :username ORDER BY Completion ASC";
$stmt = $hrmsconn->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->execute();
$edudata = $stmt->fetchAll();

$sql = "SELECT PositionTitle, Company, StartYear, EndYear FROM experiences WHERE EmployeeID = :username ORDER BY EndYear DESC";
$stmt = $hrmsconn->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->execute();
$expdata = $stmt->fetchAll();


?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php echo $data['Name'] ?> | entracloud</title>
  <meta name="description" content="Learn about entracloud, a premier IT services provider specializing in cloud solutions, software development, and IT outsourcing, focused on Pakistan and serving clients globally.">
  <meta name="keywords" content="About entracloud, IT company, cloud solutions, software development, managed IT services, Artificial Intelligence, AI, entraAI, intraAI, cloud computing, IT outsourcing, Pakistan IT services, cloud technology, entracloud, IT solutions Pakistan, entra cloud, entracloud pakistan, indtracloud, intra, entra, intra cloud, intracloud pakistan">
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
  
  <style>
      .social-icons {
        display: flex;
        gap: 15px;
        justify-content: center;
        align-items: center;
        margin: 20px 0;
    }
    
    .social-icons a {
        text-decoration: none;
        color: #555;
        font-size: 24px;
        transition: color 0.3s, transform 0.3s;
    }
    
    .social-icons a:hover {
        color: #007bff; /* Change to brand-specific color if desired */
        transform: scale(1.2);
    }
    
    .social-icons a:nth-child(1):hover {
        color: #3b5998; /* Facebook Blue */
    }
    .social-icons a:nth-child(2):hover {
        color: #1da1f2; /* Twitter/X Blue */
    }
    .social-icons a:nth-child(3):hover {
        color: #e1306c; /* Instagram Pink */
    }
    .social-icons a:nth-child(4):hover {
        color: #0077b5; /* LinkedIn Blue */
    }
  </style>
  
</head>

<body class="starter-page-page">

  <?php include($_SERVER['DOCUMENT_ROOT'].'/header.php'); ?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container">
        <h1><?php echo $data['Name']; ?></h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="https://www.entracloud.net">Homepage</a></li>
            <li><a href="https://www.entracloud.net/about-company">About Company</a></li>
            <li class="current"><?php echo $data['Name']; ?></li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 align-items-center justify-content-between">

          <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
            <h2 class="about-title">About Me</h2>
            <p class="about-description">entracloud is an IT company delivering innovative and tailored web development solutions to elevate businesses’ online presence. With expertise in web development, mobile applications, e-commerce solutions, hosting, domain management, AI development, VPN services, and a wide array of IT solutions.</p>
            <div class="social-icons">
                <a href="<?php echo $data['Facebook']; ?>" target="_blank"><i class="bi bi-facebook"></i></a>
                <a href="<?php echo $data['Twitter']; ?>" target="_blank"><i class="bi bi-twitter-x"></i></a>
                <a href="<?php echo $data['GitHub']; ?>" target="_blank"><i class="bi bi-github"></i></a>
                <a href="<?php echo $data['LinkedIn']; ?>" target="_blank"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
            <div class="image-wrapper">
              <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                <?php
				if (!empty($data['Photo']))
				{
				  $imagePath = $data['Photo'];
                  $imageData = base64_encode(file_get_contents($imagePath));
                  $imageSrc = 'data:image/jpeg;base64,' . $imageData;
                  
                  echo '<img class="img-fluid main-image rounded-4" src="' . $imageSrc . '" alt="' . $data['Name'] . '" width="360" height="360">';
				}
			   ?>
              </div>
              <div class="experience-badge floating">
                <?php
                $items = array_filter([
                    $data['DirectorType'] ?? '',
                    $data['PositionName'] ?? '',
                    $data['AdditionalPosition'] ?? ''
                ]);
                
                $items = array_unique($items);
                
                if (!empty($items))
                {
                    echo '<p>' . implode(', ', $items) . '</p>';
                }
                ?>
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
              <h3>Qualifications</h3>
              <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                <div class="row about feature-list-wrapper">
                  <div class="col-md-12">
                    <ul class="about feature-list">
                      <?php foreach ($edudata as $row) { ?>
                      <i class="bi bi-check-circle-fill text-primary fs-5"></i> <?php echo $row['Type']; ?> (<?php echo $row['Major']; ?>)<br><?php echo "<strong>" . $row['Institute'] . "</strong>"; ?> <br><br>
                      <?php } ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="contact-form" data-aos="fade-left" data-aos-delay="200">
              <h3>Experiences</h3>
              <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                <div class="row about feature-list-wrapper">
                  <div class="col-md-12">
                    <ul class="about feature-list">
                      <?php foreach ($expdata as $row) { ?>
                      <i class="bi bi-check-circle-fill text-primary fs-5"></i> <?php echo $row['PositionTitle']; ?><br><?php echo "<strong>" . $row['Company'] . "</strong>"; ?><br> <?php echo date("F Y", strtotime($row['StartYear'])); ?> - <?php echo date("F Y", strtotime($row['EndYear'])); ?> <br><br>
                      <?php } ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Mission and Vision Section -->

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