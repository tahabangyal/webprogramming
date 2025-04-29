<?php

require_once '/home/entra/important/configuration.php';
require_once '/home/entra/important/PHPMailer/src/Exception.php';
require_once '/home/entra/important/PHPMailer/src/PHPMailer.php';
require_once '/home/entra/important/PHPMailer/src/SMTP.php';

date_default_timezone_set("Asia/Karachi");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['cf-turnstile-response'], $_POST['fullname'], $_POST['email'], $_POST['phone'], $_POST['type'], $_POST['subject'], $_POST['message']))
{
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $key = '';
    
    for ($i = 0; $i < 6; $i++)
    {
        $key .= $characters[rand(0, 35)];
    }
    
    $name = ucwords(strtolower($_POST['fullname']));
    $email = strtolower($_POST['email']);
    $phone = $_POST['phone'];
    $type = $_POST['type'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    if (!empty($_POST['cf-turnstile-response']))
    {
        $token = $_POST['cf-turnstile-response'];
        $secret = '0x4AAAAAABWehxgnmY9JFtfeUJSkkiqMh1I';
        
        $data = [
            'secret' => $secret,
            'response' => $token,
            'remoteip' => $_SERVER['REMOTE_ADDR'] ?? null
        ];

        $ch = curl_init('https://challenges.cloudflare.com/turnstile/v0/siteverify');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $verifyResponse = curl_exec($ch);
        curl_close($ch);

        $responseData = json_decode($verifyResponse, true);

        if ($responseData['success'])
        {
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
                
                sendoneemail('info@entracloud.net', $subject, $message, $name, $email);
                
                $subject = 'Acknowledgement (Thread: ' . $key . ')';
                
                $body = "Dear Sir/Madam,<br><br>Thank you for contacting entracloud.<br><br>This is an auto generated reply to acknowledge the receipt of your $type. Our team will get back to you as soon as possible.<br><br>In case you have any further queries, please feel free to contact us at +92 (453) 252983, as it is really a matter of honor and privilege for us to serve you.<br><br>Thanks and Regards,<br>entracloud<br>www.entracloud.net";
                
                sendtwoemail($email, $subject, $body);
                
                echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var myModal = new bootstrap.Modal(document.getElementById('formsubmit'));
                            myModal.show();
                        });
                      </script>";
            }
        }
    }
}

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

function sendtwoemail($recipient, $subject, $body)
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
    
    $mail->addReplyTo('info@entracloud.net');
    
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $body;
    
    $mail->send();
}

function sendoneemail($recipient, $subject, $body, $name, $email)
{
    $mail = new PHPMailer(true);
    
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'admin@entracloud.net';
    $mail->Password = 'emfx laps nwtk roea';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    
    $mail->setFrom('noreply@entracloud.net', $name);
    $mail->addAddress($recipient);
    
    $mail->addReplyTo($email);
    
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
  <title>Contact Us | entracloud</title>
  <meta name="description" content="Get in touch with entracloud for innovative cloud solutions, software development, and managed IT services. Contact us to discuss your business needs and discover how our secure, scalable solutions can drive your success.">
  <meta name="keywords" content="Contact entracloud, IT company, cloud solutions, software development, managed IT services, Artificial Intelligence, AI, entraAI, intraAI, cloud computing, IT outsourcing, Pakistan IT services, cloud technology, entracloud, IT solutions Pakistan, entra cloud, entracloud pakistan, indtracloud, intra, entra, intra cloud, intracloud pakistan">
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
</head>

<body class="starter-page-page">

  <?php include('header.php'); ?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container">
        <h1>Contact Us</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="https://www.entracloud.net">Homepage</a></li>
            <li class="current">Contact Us</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->
    
    <section id="contact" class="contact section light-background">
      <div class="container">
        <div class="row g-4 g-lg-5">
    
          <!-- Contact Info Box (Left) -->
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <div class="info-box" data-aos="fade-up" data-aos-delay="200">
              <h3>Contact Information</h3>
              <p>Need help or want to get something new? Just click up below,</p>
              <div class="row">
                <div class="d-flex flex-column gap-4">
                  <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon-box"><i class="bi bi-buildings"></i></div>
                    <div class="content">
                      <h4>Headoffice</h4>
                      <p>EntraCloud HQ, Darya Khan, Punjab, Pakistan</p>
                    </div>
                  </div>
                
                  <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                    <div class="icon-box"><i class="bi bi-headset"></i></div>
                    <div class="content">
                      <h4>Hotline</h4>
                      <p><a href="tel:+92453252983">+92 453 252983</a></p>
                    </div>
                  </div>
                
                  <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                    <div class="icon-box"><i class="bi bi-envelope-paper"></i></div>
                    <div class="content">
                      <h4>Email Address</h4>
                      <p><a href="mailto:info@entracloud.net">info@entracloud.net</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    
          <!-- Contact Form (Right) -->
          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">
            <div class="contact-form" data-aos="fade-left" data-aos-delay="300">
              <h3>Queries or Suggestions</h3>
              <p>Share your opinions or want new Products and Services, just send us the details,</p>
              <form method="POST" data-aos="fade-up" data-aos-delay="400">
                <div class="row gy-4">
                  <div class="col-md-6">
                    <input type="text" name="fullname" class="form-control" placeholder="Full Name*" required>
                  </div>
                  <div class="col-md-6">
                    <input type="email" class="form-control" name="email" placeholder="Email Address*" required>
                  </div>
                  <div class="col-md-6">
                    <input type="tel" name="phone" class="form-control" placeholder="Mobile Number*" required>
                  </div>
                  <div class="col-md-6">
                    <select class="form-select" name="type" required>
                      <option disabled selected>Reason for Contact*</option>
                      <option value="Information">Information</option>
                      <option value="Suggestion">Suggestion</option>
                      <option value="Complaint">Complaint</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <input type="text" class="form-control" name="subject" placeholder="Query or Suggestion Subject*" required>
                  </div>
                  <div class="col-12">
                    <textarea class="form-control" name="message" rows="6" placeholder="Query or Suggestion*" required></textarea>
                  </div>
                  <div style="display:none;">
                    <input type="text" name="website" autocomplete="off" tabindex="-1">
                  </div>
                  <div class="col-12">
                    <div class="cf-turnstile" data-sitekey="0x4AAAAAABWeh5KeqaIchcl0"></div>
                  </div>
                  <div class="col-12 text-center">
                    <button type="submit" class="btn">Fly Message <i class="bi bi-send"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
    
        </div>
      </div>
    </section>


  </main>

  <?php include('footer.php'); ?>
  
  <div class="modal fade" id="formsubmit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Query or Suggestion Submitted!</h5>
          </div>
          <div class="modal-body">
              Your Queries or Suggestions has been submitted successfully. Our team will reply to you within 24-hours.
          </div>
          <div class="modal-footer">
            <a href="contact-us.php" class="btn btn-success">Acknowledged</a>
          </div>
        </div>
      </div>
    </div>

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
  
  <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

</body>

</html>