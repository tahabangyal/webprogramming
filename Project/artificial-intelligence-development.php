<?php

require_once '/home/entra/important/configuration.php';
require_once '/home/entra/important/PHPMailer/src/Exception.php';
require_once '/home/entra/important/PHPMailer/src/PHPMailer.php';
require_once '/home/entra/important/PHPMailer/src/SMTP.php';

date_default_timezone_set("Asia/Karachi");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['fullname'], $_POST['email'], $_POST['phone'], $_POST['timeline'], $_POST['budget'], $_POST['project'], $_POST['details']))
{
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $id = '';
    
    for ($i = 0; $i < 12; $i++)
    {
        $id .= $characters[rand(0, 35)];
    }
    
    $name = ucwords(strtolower($_POST['fullname']));
    $email = strtolower($_POST['email']);
    $phone = $_POST['phone'];
    $timeline = $_POST['timeline'];
    $budget = $_POST['budget'];
    $project = 'Artificial Intelligence Development';
    $title = $_POST['project'];
    $details = $_POST['details'];
    
    $attachment = '';
    
    if (!empty($_FILES["attachment"]["name"]))
    {
        $targetDir = "/home/entra/important/website_services/";

        $originalName = basename($_FILES["attachment"]["name"]);
        $fileTmp = $_FILES["attachment"]["tmp_name"];
        $fileExt = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
        
        $uniqueName = $id . '.' . $fileExt;
        $filePath = $targetDir . $uniqueName;
        
        if (move_uploaded_file($fileTmp, $filePath))
        {
            $attachment = $filePath;
        }
    }
    else
    {
        $attachment = NULL;
    }
    
    $stmt = $websiteconn->prepare("INSERT INTO services (`ServiceID`, `Name`, `Phone`, `Email`, `Timeline`, `Budget`, `Project`, `Title`, `Details`, `Attachment`, `RequestTime`) VALUES (:id, :name, :phone, :email, :timeline, :budget, :project, :title, :details, :attachment, current_timestamp())");

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':timeline', $timeline);
    $stmt->bindParam(':budget', $budget);
    $stmt->bindParam(':project', $project);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':details', $details);
    $stmt->bindParam(':attachment', $attachment);
    
    if ($stmt->execute())
    {
        $subject = $project . ' Request (#' . $id . ')';
        
        $body = '
            Dear Team,<br><br>
            
            I have a project with the following details:<br><br>
            
            <b>Title:</b> ' . $title . '<br>
            <b>Timeline:</b> ' . $timeline . '<br>
            <b>Budget:</b> ' . $budget . '<br>
            <b>Details:</b><br>' . $details . '<br><br>
            
            Thank you for your time and consideration.<br><br>
            
            Best Regards,<br>
            ' . htmlspecialchars($name) . '<br>
            <b>Email:</b> ' . htmlspecialchars($email) . '<br>
            <b>Phone:</b> ' . htmlspecialchars($phone) . '
            ';
        
        sendemail('bilal@entracloud.net', $subject, $body, $attachment, $emial);
        sendemail('tahabangyal@entracloud.net', $subject, $body, $attachment, $email);
        sendemail('naveed@entracloud.net', $subject, $body, $attachment, $email);
                
        $body = "Dear $name,<br><br>Thank you for Requesting a Service of <b>$project</b> from entracloud.<br><br>This is an auto generated reply to the acknowledge of the receipt of your Service <b>Request # $id</b>. Our team will get back to you, if more details are required.<br><br>In case you have any further queries, please feel free to email us at info@entracloud.net, it is really a matter of honor and privilege for us to serve you.<br><br>Thanks and Regards,<br>entracloud<br>www.entracloud.net";
        
        sendemail($email, $subject, $body, $attachment = NULL, 'info@entracloud.net');
        
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var myModal = new bootstrap.Modal(document.getElementById('formsubmit'));
                myModal.show();
            });
          </script>";
    }
}


function sendemail($recipient, $subject, $body, $attachment, $replyto)
{
    $mail = new PHPMailer(true);
    
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'admin@entracloud.net';
    $mail->Password = 'emfx laps nwtk roea';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    
    $mail->setFrom('noreply@entracloud.net', 'entracloud customer care');
    $mail->addAddress($recipient);
    $mail->addReplyTo($replyto);
    
    if (!empty($attachment) && file_exists($attachment))
    {
        $mail->addAttachment($attachment);
    }
    
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $body;
    
    $mail->send();
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
            <h2 class="about-title">Artificial Intelligence Development</h2>
            <p class="about-description">
              entracloud specializes in cutting-edge Artificial Intelligence development, helping businesses leverage the power of machine learning, automation, and predictive analytics. Our AI solutions are designed to drive innovation, streamline operations, and unlock data-driven insights. From model training to deployment, we deliver custom AI tools that scale with your needs and align with your strategic goals.
            </p>
    
            <h2 class="about-title">What We Offer</h2>
            <div class="row feature-list-wrapper">
              <div class="col-md-12">
                <ul class="feature-list">
                  <li><i class="bi bi-check-circle-fill"></i> Custom Machine Learning Model Development</li>
                  <li><i class="bi bi-check-circle-fill"></i> Natural Language Processing & Chatbot Integration</li>
                  <li><i class="bi bi-check-circle-fill"></i> Computer Vision & Image Recognition Solutions</li>
                  <li><i class="bi bi-check-circle-fill"></i> Predictive Analytics & Data Intelligence</li>
                  <li><i class="bi bi-check-circle-fill"></i> AI-Powered Automation & Workflow Optimization</li>
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
              <form method="POST" data-aos="fade-up" data-aos-delay="300" enctype="multipart/form-data">
                <div class="row gy-4">
                  
                  <div class="col-md-4">
                    <input type="text" name="fullname" id="name" class="form-control" placeholder="Full Name*" required>
                  </div>
                  
                  <div class="col-md-4">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email Address*" required>
                  </div>
                  
                  <div class="col-md-4">
                    <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone Number*" required>
                  </div>
                  
                  <div class="col-md-6">
                    <select name="timeline" id="timeline" class="form-control" required>
                      <option value="" disabled selected>Project Timeline*</option>
                      <option value="Tomorrow">Tomorrow</option>
                      <option value="Within this Week">Within this Week</option>
                      <option value="Within next Week">Within next Week</option>
                      <option value="1 Month">1 Month</option>
                      <option value="2-3 Months">2 - 3 Months</option>
                      <option value="Not Sure">Not Sure</option>
                    </select>
                  </div>
                  
                  <div class="col-md-6">
                    <select name="budget" id="budget" class="form-control" required>
                      <option value="" disabled selected>Budget Range*</option>
                      <option value="$0-$500">$0 - $500</option>
                      <option value="$500-$1,000">$500 - $1,000</option>
                      <option value="$1,000-$5,000">$1,000 - $5,000</option>
                      <option value="$5,000+">$5,000+</option>
                    </select>
                  </div>
                  
                  <div class="col-md-12">
                    <input type="text" name="project" id="project" class="form-control" placeholder="Project Title*" required>
                  </div>
                  
                  <div class="col-12">
                    <textarea class="form-control" name="details" rows="6" placeholder="Details about Project*" required></textarea>
                  </div>
                  
                  <div class="col-md-12">
                    <input type="file" name="attachment" id="attachment" class="form-control" placeholder="Attachment" accept=".doc,.docx,.ppt,.pptx,.xls,.xlsx,.csv,.tsv,.pdf,.txt,image/*,audio/*,video/*,.zip,.rar,.7z,.tar,.gz,.bz2" />
                    <small class="form-text text-muted">One File allowed and file size must be less than 4 MB.</small>
                  </div>
                  
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn">Request this Project <i class="bi bi-send"></i></button>
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
              Your Service Request has been submitted successfully. Our team will contact you as soon as possible.
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
  
  <script>
    document.getElementById('attachment').addEventListener('change', function ()
    {
        const maxSize = 4 * 1024 * 1024;
        const file = this.files[0];
        
        if (file && file.size > maxSize)
        {
            alert(`File must be less than 4 MB. "${file.name}" is too large.`);
            this.value = '';
        }
    });
  </script>

</body>

</html>