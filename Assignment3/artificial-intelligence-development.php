<?php

require_once '/home/entra/important/configuration.php';
require_once '/home/entra/important/sendmail.php';
require_once '/home/entra/important/sendsms.php';
date_default_timezone_set("Asia/Karachi");

/*if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['fullname'], $_POST['email'], $_POST['phone'], $_POST['type'], $_POST['subject'], $_POST['message']))
{
    $name = ucwords(strtolower($_POST['fullname']));
    $email = strtolower($_POST['email']);
    $phone = $_POST['phone'];
    $type = $_POST['type'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    $email = validateEmail($email);
    
    $stmt = $websiteconn->prepare("INSERT INTO contact (`ID`, `Name`, `Email`, `Mobile`, `QueryType`, `Subject`, `Message`) VALUES (:key, :name, :email, :mobile, :type, :subject, :message)");
    
    $stmt->bindParam(':key', $key);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mobile', $phone);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':subject', $subject);
    $stmt->bindParam(':message', $message);
    
    if ($stmt->execute())
    {
        $subject = $subject . ' - ' .  $type .' (Thread: ' . $key . ')';
        
        $message = $message . '<br><br>Thanks and Regards,<br>' . $name . '<br><b>Email Address:</b> ' . $email . '<br><b>Mobile Number:</b> ' . $phone;
        
        sendemail('info@entracloud.net', $subject, $message);
        
        sendemail($email, $subject, $message);
        
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    var myModal = new bootstrap.Modal(document.getElementById('formsubmit'));
                    myModal.show();
                });
              </script>";
    }
}*/

function validateEmail($email)
{
    if (empty($email))
    {
        return NULL;
    }
    
    $domain = substr(strrchr($email, '@'), 1);
    
    if (!checkdnsrr($domain, 'MX') && !checkdnsrr($domain, 'A'))
    {
        return NULL;
    }
    
    return $email;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Artificial Intelligence Development | entracloud</title>
  <meta name="description" content="Get in touch with entracloud for innovative cloud solutions, software development, and managed IT services. Contact us to discuss your business needs and discover how our secure, scalable solutions can drive your success.">
  <meta name="keywords" content="Contact entracloud, IT company, cloud solutions, software development, managed IT services, Artificial Intelligence, AI, entraAI, intraAI, cloud computing, IT outsourcing, Pakistan IT services, cloud technology, entracloud, IT solutions Pakistan, entra cloud, entracloud pakistan, indtracloud, intra, entra, intra cloud, intracloud pakistan">
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
        <h1>Artificial Intelligence Development</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="https://www.entracloud.net">Homepage</a></li>
            <li class="current">Artificial Intelligence Development</li>
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
                <img src="/assets/img/artificial-intelligence-development-page.png" alt="AI Development" class="img-fluid main-image rounded-4">
              </div>
            </div>
          </div>
        </div>
    
      </div>
    
    </section><!-- /About Section -->
    
    <section id="contact" class="contact section light-background">
      <div class="container">
        <div class="row g-4 g-lg-5">
          
            <div class="contact-form" data-aos="fade-left" data-aos-delay="200">
              <h3>Request Service Now!</h3>
              <p>Share the details of the Artificial Intelligence Development Project, for this just fill in the details,</p>
              <form method="POST" data-aos="fade-up" data-aos-delay="300" onsubmit="return validateRecaptcha()">
                <div class="row gy-4">
                  
                  <?php
                    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                    $key = '';
                    for ($i = 0; $i < 12; $i++)
                    {
                        $key .= $characters[rand(0, 35)];
                    }
                  ?>
                  
                  <div class="col-md-3">
                    <input type="text" name="orderid" class="form-control" placeholder="OrderID*" value="<?php echo $key; ?>" readonly>
                  </div>
                  
                  <div class="col-md-3">
                    <input type="text" name="fullname" id="name" class="form-control" placeholder="Full Name*" required>
                  </div>
                  
                  <div class="col-md-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email Address*" required>
                  </div>
                  
                  <div class="col-md-3">
                    <input type="tel" name="phone" id="phone" class="form-control" placeholder="Mobile Number*" required>
                  </div>
                  
                  <div class="col-md-6">
                    <input type="text" name="addresslineone" id="address" class="form-control" placeholder="Billing Address Line 1*" required>
                  </div>
                  
                  <div class="col-md-6">
                    <input type="text" name="addresslinetwo" id="address" class="form-control" placeholder="Billing Address Line 2">
                  </div>
                  
                  <div class="col-md-3">
                    <input type="text" name="city" id="city" class="form-control" placeholder="Town / City*" required>
                  </div>
                  
                  <div class="col-md-3">
                    <input type="text" name="state" id="state" class="form-control" placeholder="State / Province*" required>
                  </div>
                  
                  <div class="col-md-3">
                    <input type="text" name="code" id="zip" class="form-control" placeholder="ZIP / Postal Code*" required>
                  </div>
                  
                  <div class="col-md-3">
                    <input type="text" name="country" id="country" class="form-control" placeholder="Country / Region*" required>
                  </div>
                  
                  <div class="col-md-3">
                    <input type="text" name="taxid" id="tax" class="form-control" placeholder="Tax ID*" required>
                  </div>
                  
                  <div class="col-md-3">
                    <input type="text" name="project" id="project" class="form-control" placeholder="Project*" value="Artificial Intelligence Development" readonly>
                  </div>
                  
                  <div class="col-md-3">
                    <input type="text" name="projecttitle" id="projecttitle" class="form-control" placeholder="Project Title*" required>
                  </div>
                  
                  <div class="col-md-3">
                    <input type="file" name="attachment" id="attachment" class="form-control" placeholder="Attachment">
                  </div>
                  
                  <div class="col-12">
                    <textarea class="form-control" name="details" rows="6" placeholder="Details about Project*" required></textarea>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="g-recaptcha" data-sitekey="6LfyAJkqAAAAAHX6FDEoL1kXIc3nT4pahQ-m1A-t" data-callback="onRecaptchaSuccess"></div>
                  </div>
                  
                  <div class="col-md-6 text-center">
                    <button type="submit" class="btn">Order Now <i class="bi bi-send"></i></button>
                  </div>
                </div>
              </form>
            </div>

        </div>
      </div>
    </section>


  </main>

  <?php include($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>
  
  <div class="modal fade" id="formsubmit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Service Requested!</h5>
          </div>
          <div class="modal-body">
              Your Service Request has been submitted successfully. Our team will contact you within 24-hours.
          </div>
          <div class="modal-footer">
            <a href="artificial-intelligence-development.php" class="btn btn-success">Acknowledged</a>
          </div>
        </div>
      </div>
    </div>

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
  
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  
  <script>
    let recaptchaVerified = false;
    
    function onRecaptchaSuccess()
    {
        recaptchaVerified = true;
    }
    
    function validateRecaptcha()
    {
        if (!recaptchaVerified)
        {
            alert("Please complete the reCAPTCHA verification.");
            return false;
        }
        return true;
    }
  </script>

</body>

</html>