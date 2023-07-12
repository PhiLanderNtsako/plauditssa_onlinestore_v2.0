<?php
    session_start();
    include 'inc/config.php';

/**
 * This example shows sending a message using a local sendmail binary.
 */

//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;

require 'libs/phpmailer/vendor/autoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();
//Set PHPMailer to use the sendmail transport
$mail->isSendmail();
//Set who the message is to be sent from
$mail->setFrom('phil.ntsako98@gmail.com', 'First Last');
//Set an alternative reply-to address
$mail->addReplyTo('phil.ntsako98@gmail.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('philanderntsako.ms@gmail.com', 'John Doe');


$mail->isHTML(true); 
//Set the subject line
$mail->Subject = 'PHPMailer sendmail test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->Body = 'sex';
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}

    $errors = array();

    if (isset($_POST['register'])) {

        $user_email = mysqli_real_escape_string($conn,$_POST['user_email']);

        $user_check_query = "SELECT * FROM user WHERE user_email = '$user_email' LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if($user) {

              $unique_id = uniqid();
              $rand_start = mt_rand(1,5);
              $verification_code = substr($unique_id, $rand_start);
              $user_id = $user['user_id'];

              $query = "UPDATE user SET verification_code = '$verification_code' WHERE user_id = '$user_id'";
                  mysqli_query($conn, $query);

                  $mail = new PHPMailer(true);
                  $mail->From = 'info@plauditssa.co.za';
                  // $mail->FromName = $row_admin['admin_name'];
                  $mail->AddAddress($user['user_email']);
                  $mail->isHTML(true);
          
                  $mail->Subject = 'Plaudits SA - User Verification';
                  $mail->Body = '
                                <h2>Email Confirmation for '.$user['user_email'].'</h2><br>
        
                                <p>Click The Link Below To Confirm Your Email and Verify Your account</p>
        
                                <p><a href="https://plauditssa.co.za/registration.php?code='.$verification_code.'&email='.$user['user_email'].'">Verify Here </a></p>
        
                                <p>Or Copy and Paste this link on your browser</p>
        
                                <p><a href="https://plauditssa.co.za/registration.php?code='.$verification_code.'&email='.$user['user_email'].'">https://plauditssa.co.za/registration.php?code='.$verification_code.'&email='.$user['user_email'].'</a></p>
        
                                <p>IF YOU DID NOT REQUEST THIS ACTION OR YOU DID NOT SIGN UP FOR PLAUDITS SA IGNORE THIS EMAIL.</p>
                                ';
          
                  // $mail->addAttachment($filename);
          
                  try {
                      $mail->send();
                      echo "Report has been sent successfully";
                  } catch(Exception $e){
                      echo "Mailer Error: ".$mail->ErrorInfo;
                  }
        
                  $message = "Email Is Sent To ".$user['user_email']." For Verification. Click the link sent";
                  echo "<script type='text/javascript'>alert('$message')</script>";
                  echo '<meta http-equiv="refresh" content="0; url= index.php">';
        }else {
              
          $unique_id = uniqid();
          $rand_start = mt_rand(1,5);
          $verification_code = substr($unique_id, $rand_start);
              
             $query = "INSERT INTO user (user_email, verification_code) VALUES ('$user_email','$verification_code')";
          mysqli_query($conn, $query);

          $mail = new PHPMailer(true);
          $mail->From = 'info@plauditssa.co.za';
          // $mail->FromName = $row_admin['admin_name'];
          $mail->AddAddress($user_email);
          $mail->isHTML(true);
  
          $mail->Subject = 'Plaudits SA - User Verification';
          $mail->Body = '
                        <h2>Email Confirmation for '.$user_email.'</h2><br>

                        <p>Click The Link Below To Confirm Your Email and Verify Your account</p>

                        <p><a href="https://plauditssa.co.za/registration.php?code='.$verification_code.'&email='.$user_email.'">Verify Here </a></p>

                        <p>Or Copy and Paste this link on your browser</p>

                        <p><a href="https://plauditssa.co.za/registration.php?code='.$verification_code.'&email='.$user_email.'">https://plauditssa.co.za/registration.php?code='.$verification_code.'&email='.$user_email.'</a></p>

                        <p>IF YOU DID NOT REQUEST THIS ACTION OR YOU DID NOT SIGN UP FOR PLAUDITS SA IGNORE THIS EMAIL.</p>
                        ';
  
          // $mail->addAttachment($filename);
  
          try {
              $mail->send();
              echo "Report has been sent successfully";
          } catch(Exception $e){
              echo "Mailer Error: ".$mail->ErrorInfo;
          }

          $message = "Email Is Sent To ".$user_email." For Verification. Click the link sent";
          echo "<script type='text/javascript'>alert('$message')</script>";
          echo '<meta http-equiv="refresh" content="0; url= index.php">';

        //   echo '<meta http-equiv="refresh" content="0; url= register.php?code='.$verification_code.'&email='.$user['user_email'].'">';	
        }
    }
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>Plaudits SA</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<!-- <link rel="stylesheet" href="css/owl.carousel.min.css"> -->
	<!-- main css -->
	<link rel="stylesheet" href="css/style.css">
	<!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>
<body>
<?php
    include 'header.php';
?>
    <div class="login-section">
        <div class="container">
            <div class="row">
                <div class="login-header-text">
                    <h3>Register</h3>
                </div>
                                <?php if (count($errors) > 0) : ?>
					<?php foreach ($errors as $error) : ?>
						<small style="color: red;"><?php echo $error ?></small>
					<?php endforeach ?>
				<?php endif ?>
                <div class="login-form">
                    <form action="" method="post" class="form">
                        <input type="text" name="user_email" placeholder="Email" required>
                        <button type="submit" name="register" class="login-btn btn">Register</button>
                        <small class="register-text"><a href="login.php"">already have an account? </a></small>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        include 'footer.php';
    ?>
    <script src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.js" ></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script>
        // Product Slider
        $(document).ready(function() {
            $('#cover-slides').lightSlider({
                autoWidth:true,
                speed: 5000, //ms'
                auto: true,
                loop: true,
                slideEndAnimation: true,
                pause: 3000,
                controls: true,
                onSliderLoad: function() {
                    $('#cover-slides').removeClass('cs-hidden');
                } 
            });  
        });
    </script>
</body>
</html>