<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="icon" class="logo-circle" type="image/png" href="/assets/ohmint.png">
  <title>HOME - OHM INTERNATIONAL PRIVATE LIMITED</title>
  <link rel="stylesheet" href="index.css"/>
  <!-- Bootstrap -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">  -->
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 100vh;
    }
    .thankyou-box{
        font-size: 13px;
    }
    .thankyou-box a{
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        margin-top: 20px;
    }
    .thankyou-box a button{
        background-color: black;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    /* ===== OUTER TRANSLUCENT BOX ===== */
    .outer{
    width:100%;
    max-width:800px;
    padding:28px;
    background:rgba(255,255,255,0.45);
    backdrop-filter: blur(14px);
    border-radius:30px;
    box-shadow:0 40px 80px rgba(0,0,0,0.08);
    }

    /* ===== INNER CONTENT ===== */
    .inner{
    background:#ffffff;
    border-radius:24px;
    padding:38px 42px 34px;
    }

    /* ===== TOP ICON ===== */
    .top-icon{
    width:96px;
    height:96px;
    margin:0 auto 26px;
    border-radius:28px;
    background:
        linear-gradient(135deg,#020617,#1e293b);
    display:flex;
    align-items:center;
    justify-content:center;
    box-shadow:
        0 20px 40px rgba(0,0,0,0.25),
        inset 0 0 0 1px rgba(255,255,255,0.15);
    }

    .top-icon span{
    width:42px;
    height:42px;
    border-radius:50%;
    background:rgba(255,255,255,0.15);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:24px;
    font-weight:700;
    color:#ffffff;
    backdrop-filter: blur(6px);
    }

    /* ===== THANK YOU NOTE ===== */
    .thank-note{
    background:#f1f5f9;
    border-radius:16px;
    padding:18px 22px;
    margin-bottom:34px;
    text-align:center;
    }

    .thank-note h1{
    font-size:22px;
    color:#020617;
    margin-bottom:6px;
    }

    .thank-note p{
    font-size:14px;
    color:#475569;
    }

    /* ===== STATUS LINE ===== */
    .progress-line{
    position:relative;
    height:4px;
    background:#e5e7eb;
    border-radius:4px;
    margin:28px 0 14px;
    }

    .progress-fill{
    position:absolute;
    height:100%;
    width:0%;
    background:#020617;
    border-radius:4px;
    transition:width .6s ease;
    }

    .dots{
    position:absolute;
    top:50%;
    left:0;
    width:100%;
    display:flex;
    justify-content:space-between;
    transform:translateY(-50%);
    }

    .dot{
    width:20px;
    height:20px;
    border-radius:50%;
    background:#e5e7eb;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:12px;
    font-weight:600;
    color:#ffffff;
    transition:.3s ease;
    }

    .dot.active{
    background:#020617;
    }

    .dot.done::after{
    content:"✓";
    }

    /* ===== LABELS (FIXED ALIGNMENT) ===== */
    .labels{
    display:flex;
    justify-content:space-between;
    margin-top:6px;
    }

    .labels span{
    width:33%;
    text-align:center;
    font-size:13px;
    color:#94a3b8;
    line-height:1.2;
    }

    .labels span.active{
    color:#020617;
    font-weight:600;
    }

    /* ===== ACTION BAR ===== */
    .action-bar{
    margin-top:36px;
    padding-top:22px;
    border-top:1px solid #e5e7eb;
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
    flex-wrap:wrap;
    }

    .actions{
    display:flex;
    gap:12px;
    }

    .actions a{
    text-decoration:none;
    padding:12px 18px;
    border-radius:14px;
    font-size:14px;
    transition:.25s ease;
    }

    .back{
    background:#e5e7eb;
    color:#020617;
    }

    .back:hover{
    background:#d1d5db;
    }

    .contact{
    background:#020617;
    color:#ffffff;
    }

    .contact:hover{
    background:#000000;
    }

    .emergency{
    font-size:13px;
    color:#475569;
    }

    .emergency strong{
    color:#020617;
    }

    /* ===== MOBILE ===== */
    @media(max-width:640px){
    .inner{
        padding:28px 24px 30px;
    }
    .action-bar{
        flex-direction:column;
        align-items:flex-start;
    }
    }

  </style>
</head>
<body>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $mail = new PHPMailer(true);
    
    $mailTO = "info@ohmint.in";
    $sub = "OHMINT Website Enquiry";
    $fullname = $_POST['user_name'];
    $email = $_POST['user_email'];
    $phone = $_POST['user_phone'];
    $usrMsg = $_POST['user_message'];
    $pry = $_POST['user_agrees_to_privacy_policy'];
    if(!$pry){
        $privacy = "No";
    }else{
        $privacy = "Yes";
    }
    $bdy = '<!DOCTYPE html>
        <html>
        <head>
        <meta charset="UTF-8">
        <title>Hyper Vare</title>
        </head>
    
        <body style="margin:0; padding:0; background-color:#f2f2f2; font-family: Arial, sans-serif;">
    
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
        <td align="center">
    
        <!-- Main Container -->
        <table width="600" cellpadding="0" cellspacing="0" border="0" style="margin:5%; background-color:#ffffff;">
    
            <!-- Header -->
            <tr>
                <td style="padding:20px; text-align:center; border-bottom:1px solid #ddd;">
                    <a href="https://hypervare.com" style="text-decoration:none; color:black;">
                        <h1 style="margin:0; font-size:24px;">HYPERVARE</h1>
                    </a>
    
                    <!-- Social Links -->
                    <p style="margin-top:10px;">
                        <a href="http://github.com/hypervare" style="text-decoration: none;">
                            <img src="https://cdn-icons-png.flaticon.com/128/733/733609.png" width="24">
                        </a>
                        &nbsp;
                        <a href="https://instagram.com/hypervare" style="text-decoration: none;">
                            <img src="https://cdn-icons-png.flaticon.com/128/1384/1384015.png" width="24">
                        </a>
                        &nbsp;
                        <a href="http://facebook.com/hypervare" style="text-decoration: none;">
                            <img src="https://cdn-icons-png.flaticon.com/128/2168/2168281.png" width="24">
                        </a>
                    </p>
                </td>
            </tr>
    
            <!-- Body -->
            <tr>
                <td style="padding:20px;">
    
                    <p><strong>Name:</strong></p>
                    <div style="background:#f2f2f2; padding:10px; border-radius:4px;">
                        '.$fullname.'
                    </div>
    
                    <p><strong>Email Address:</strong></p>
                    <div style="background:#f2f2f2; padding:10px; border-radius:4px;">
                        '.$email.'
                    </div>
    
                    <p><strong>Phone No:</strong></p>
                    <div style="background:#f2f2f2; padding:10px; border-radius:4px;">
                        '.$phone.'
                    </div>
    
                    <p><strong>User Message:</strong></p>
                    <div style="background:#f2f2f2; padding:10px; border-radius:4px;">
                        '.$usrMsg.'
                    </div>
    
                    <p><strong>Agreed to Privacy Policy:</strong></p>
                    <div style="background:#f2f2f2; padding:10px; border-radius:4px;">
                        '.$privacy.'
                    </div>
    
                </td>
            </tr>
    
            <!-- Footer -->
            <tr>
                <td style="background-color:black; text-align:center; padding:20px;">
                    <a href="https://hypervare.com/contact/" 
                    style="color:white; text-decoration:none; font-weight:bold;">
                    CONNECT WITH TECHNICAL SUPPORT
                    </a>
                </td>
            </tr>
    
        </table>
    
        </td>
        </tr>
        </table>
    
        </body>
        </html>
    ';
    
    
    try {

        // Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'noreply.admerit@gmail.com';                 // SMTP username (your Gmail address)
        $mail->Password   = 'fzcdtfdyoeqccptg';                    // SMTP password (the generated App Password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; 'PHPMailer::ENCRYPTION_SMTPS' also accepted on port 465
        $mail->Port       = 587;                                    // TCP port to connect to; use 465 for SSL
    
        // Recipients
        $mail->setFrom('noreply.admerit@gmail.com', 'OHMINT - Enquiry');         // Sender email and name
        $mail->addAddress($mailTO, 'OHMINT');     // Add a recipient
        
    
        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = $sub;
        $mail->Body    = $bdy;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; // Plain text body for non-HTML clients
    
        $mail->send();
    
        echo '<div class="outer">
        <div class="inner">
    
            <!-- UNIQUE TOP ICON -->
            <div class="top-icon">
            <span>✓</span>
            </div>
    
            <!-- THANK YOU NOTE -->
            <div class="thank-note">
            <h1>Thank You!</h1>
            <p>Your message is safely received. Here’s what happens next.</p>
            <br>
            <hr>
            <br>
            <div class="thankyou-box" style="text-align: left;">
            <h3>A dedicated investment advisor will connect with you shortly to provide:</h3>
            <ul style="margin-left: 20px; margin-top: 5px;">
                <li>Latest bond investment opportunities</li>
                <li>Expected returns & yield comparison</li>
                <li>Risk assessment & credit ratings</li>
                <li>Investment process & documentation</li>
            </ul>
            </div>
            </div>
    
            <!-- STATUS LINE -->
            <div class="progress-line">
            <div class="progress-fill" id="fill"></div>
    
            <div class="dots">
                <div class="dot" id="dot1"></div>
                <div class="dot" id="dot2"></div>
                <div class="dot" id="dot3"></div>
            </div>
            </div>
    
            <!-- LABELS -->
            <div class="labels">
            <span id="label1">Sent</span>
            <span id="label2">Received</span>
            <span id="label3">Responding</span>
            </div>
    
            <!-- ACTION BAR -->
            <div class="action-bar">
            <div class="actions">
                <a href="/" class="back">Go Back</a>
                <a href="https://wa.me/919431018702?text=Hi%2C%20I%E2%80%99d%20like%20to%20invest%20in%20bonds%20and%20understand%20the%20best%20options%20available.%20Please%20assist%20me%20with%20details%20on%20returns%2C%20risk%2C%20and%20process." class="contact">WhatsApp Us</a>
            </div>
    
            <div class="emergency">
                Emergency? Call <strong>+91 943101 8702</strong>
            </div>
            </div>
    
        </div>
        </div>
    
        <script>
        const steps = [
        { dot: "dot1", label: "label1", width: "0%" },
        { dot: "dot2", label: "label2", width: "50%" },
        { dot: "dot3", label: "label3", width: "100%" }
        ];
    
        let current = 0;
    
        const timer = setInterval(() => {
        if(current < steps.length){
            const s = steps[current];
            document.getElementById(s.dot).classList.add("active","done");
            document.getElementById(s.label).classList.add("active");
            document.getElementById("fill").style.width = s.width;
            current++;
        } else {
            clearInterval(timer);
        }
        }, 1200);
        </script>';
    
        exit();
        
    } catch (Exception $e) {
    
        echo '<div class="thankyou-overlay" id="thankYouPopup">
        <div class="thankyou-box">
            <h2>Something went wrong!</h2>
            <a href="/"><button id="thankYouClose">BACK</button></a>
        </div>
        </div>';
    
        exit();
            
    }

}else{

    echo '<div class="thankyou-overlay" id="thankYouPopup">
    <div class="thankyou-box">
        <h2>Something went wrong!</h2>
        <a href="/"><button id="thankYouClose">BACK</button></a>
    </div>
    </div>';
    
    exit();

}

    
?>
</body>
</html>
