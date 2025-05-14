<?php

require_once '/home/entra/important/configuration.php';
date_default_timezone_set("Asia/Karachi");

$sql = "SELECT * FROM blogsandupdates WHERE Category = 'Blog' ORDER BY CreationTime DESC";

$stmt = $websiteconn->prepare($sql);
$stmt->execute();
$blogslist = $stmt->fetchAll();

$sql = "SELECT * FROM blogsandupdates WHERE Category = 'Update' ORDER BY CreationTime DESC";

$stmt = $websiteconn->prepare($sql);
$stmt->execute();
$updates = $stmt->fetchAll();

$sql = "SELECT * FROM blogsandupdates ORDER BY CreationTime DESC";

$stmt = $websiteconn->prepare($sql);
$stmt->execute();
$schema = $stmt->fetchAll();

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
  
  <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "CollectionPage",
        "mainEntity": {
            "@type": "ItemList",
            "itemListElement": [
                <?php foreach ($schema as $index => $post): ?>
                {
                    "@type": "ListItem",
                    "position": <?php echo $index + 1; ?>,
                    "url": "https://www.entracloud.net/blogs-and-updates",
                    "item": {
                        "@type": "BlogPosting",
                        "headline": "<?php echo addslashes($post['Title']); ?>",
                        "image": "<?php echo addslashes($post['FeaturedImage']); ?>", 
                        "author": {
                            "@type": "Organization",
                            "name": "<?php echo addslashes($post['Author']); ?>",
                            "url": "https://www.entracloud.net"
                        },
                        "datePublished": "<?php echo date('Y-m-d', strtotime($post['CreationTime'])); ?>",
                        "dateModified": "<?php echo !empty($post['UpdateTime']) ? date('Y-m-d', strtotime($post['UpdateTime'])) : date('Y-m-d', strtotime($post['CreationTime'])); ?>"
                    }
                }<?php echo $index + 1 < count($schema) ? ',' : ''; ?>
                <?php endforeach; ?>
            ]
        }
    }
  </script>
  
  <style>
    .card {
      transition: transform 0.3s ease-in-out;
    }
    .card:hover {
      transform: scale(1.05);
    }
    .card-img-top, .card video {
      object-fit: cover;
      height: 200px;
      width: 100%;
    }
    .card-title {
      font-size: 1.25rem;
      line-height: 1.4;
    }
    .btn-outline-primary {
      transition: background-color 0.3s, color 0.3s;
    }
    .btn-outline-primary:hover {
      background-color: #0d6efd;
      color: white;
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
            
            <?php
            foreach ($blogslist as $row) {
            ?>
            <!-- Blog Post 1 -->
            <div class="col-md-6 col-lg-4">
              <div class="card h-100 border-0 shadow rounded-3 overflow-hidden transition-transform duration-300 hover:scale-105">
                  <div class="position-relative">
                    <img src="<?php echo $row['FeaturedImage']; ?>" class="card-img-top" alt="<?php echo $row['Title'];?>">
                    <?php if ($row['Importance'] == 'Yes') { ?>
                    <div class="position-absolute top-0 start-0 bg-info text-white px-2 py-1 rounded-bottom-right">
                      <small>Featured</small>
                    </div>
                    <?php } ?>
                  </div>
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title fw-bold text-dark mb-2"><?php echo $row['Title'];?></h5>
                  <div class="d-flex align-items-center mb-3">
                    <small class="text-muted me-2"><?php echo date('F d, Y', strtotime($row['CreationTime']));?></small>
                    <!--<span class="text-muted">|</span>
                    <small class="text-muted ms-2"><?php echo $row['Author']; ?></small>-->
                  </div>
                  <a href="#" class="btn btn-outline-primary mt-auto rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#descriptionModal<?php echo $row['ID']; ?>">
                    Read Blog <i class="bi bi-arrow-right ms-1"></i>
                  </a>
                </div>
              </div>
            </div>
            
            <div class="modal fade" id="descriptionModal<?php echo $row['ID']; ?>" tabindex="-1" aria-labelledby="modalLabel<?php echo $row['ID']; ?>" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel<?php echo $row['ID']; ?>"><?php echo $row['Title']; ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            
            <p><img src="<?php echo $row['FeaturedImage']; ?>" width="100%" height="auto" alt="<?php echo $row['Title'];?>"></p>
            
            <p><?php echo nl2br($row['FirstParagraph']); ?></p>
            
            <?php if (!empty($row['ImageOne'])) { ?>
            
            <p><img src="<?php echo $row['ImageOne']; ?>" class="card-img-top" alt="<?php echo $row['Title'];?>"></p>
            
            <?php } ?>
            
            <p><?php echo nl2br($row['SecondParagraph']); ?></p>
            
            <?php if (!empty($row['ImageTwo'])) { ?>
            
            <p><img src="<?php echo $row['ImageTwo']; ?>" class="card-img-top" alt="<?php echo $row['Title'];?>"></p>
            
            <?php } ?>
            
            <p><?php echo nl2br($row['ThirdParagraph']); ?></p>
          </div>
        </div>
      </div>
    </div>
            
            <?php
            }
            ?>
            
            </div>
          </div><!-- End tab content item -->
          
        </div>
        
        <!-- Tab Content -->
        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
          
          <div class="tab-pane fade" id="features-tab-2">
            <div class="row g-4">
            
            <?php
            foreach ($updates as $row) {
            ?>
            <!-- Blog Post 1 -->
            <div class="col-md-6 col-lg-4">
              <div class="card h-100 border-0 shadow rounded-3 overflow-hidden transition-transform duration-300 hover:scale-105">
                  <div class="position-relative">
                    <img src="<?php echo $row['FeaturedImage']; ?>" class="card-img-top" alt="<?php echo $row['Title'];?>">
                    <?php if ($row['Importance'] == 'Yes') { ?>
                    <div class="position-absolute top-0 start-0 bg-danger text-white px-2 py-1 rounded-bottom-right">
                      <small>Important</small>
                    </div>
                    <?php } ?>
                  </div>
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title fw-bold text-dark mb-2"><?php echo $row['Title'];?></h5>
                  <div class="d-flex align-items-center mb-3">
                    <small class="text-muted me-2"><?php echo date('F d, Y', strtotime($row['CreationTime']));?></small>
                    <!--<span class="text-muted">|</span>
                    <small class="text-muted ms-2"><?php echo $row['Author']; ?></small>-->
                  </div>
                  <a href="#" class="btn btn-outline-primary mt-auto rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#descriptionModal<?php echo $row['ID']; ?>">
                    Read Update <i class="bi bi-arrow-right ms-1"></i>
                  </a>
                </div>
              </div>
            </div>
            
            <div class="modal fade" id="descriptionModal<?php echo $row['ID']; ?>" tabindex="-1" aria-labelledby="modalLabel<?php echo $row['ID']; ?>" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel<?php echo $row['ID']; ?>"><?php echo $row['Title']; ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            
            <p><img src="<?php echo $row['FeaturedImage']; ?>" width="100%" height="auto" alt="<?php echo $row['Title'];?>"></p>
            
            <p><?php echo nl2br($row['FirstParagraph']); ?></p>
            
            <?php if (!empty($row['ImageOne'])) { ?>
            
            <p><img src="<?php echo $row['ImageOne']; ?>" class="card-img-top" alt="<?php echo $row['Title'];?>"></p>
            
            <?php } ?>
            
            <p><?php echo nl2br($row['SecondParagraph']); ?></p>
            
            <?php if (!empty($row['ImageTwo'])) { ?>
            
            <p><img src="<?php echo $row['ImageTwo']; ?>" class="card-img-top" alt="<?php echo $row['Title'];?>"></p>
            
            <?php } ?>
            
            <p><?php echo nl2br($row['ThirdParagraph']); ?></p>
          </div>
        </div>
      </div>
    </div>
            
            <?php
            }
            ?>
            
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