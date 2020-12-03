<?php
//PHPMAILER for sending mails.
//PLEASE MAKE SURE TO ALLOW LESS SECURED APPS TO SEND MAILS, IN YOUR GMAIL ACCOUNT'S SECURITY SETTINGS.
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../vendor/phpmailer/phpmailer/src/Exception.php';
    require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require '../vendor/phpmailer/phpmailer/src/SMTP.php';
    // Load Composer's autoloader
    require '../vendor/autoload.php';
//CHECKING IF THE SUBMIT BUTTON IS CLICKED.
    if(isset($_POST['Send']))
    {
        $first = $_POST['username'];
        $email = $_POST['email'];
        $sub = $_POST['sub'];
        $message = $_POST['email_body'];
        $mail = new PHPMailer(true);
        try
        {
            $mail->IsSMTP();
            $mail->SMTPDebug  = 0;  
            $mail->SMTPAuth   = TRUE;
            $mail->SMTPSecure = "tls";
            $mail->Port       = 587;
            $mail->Host       = "smtp.gmail.com";
            $mail->Username   = "";//your-email@gmail.com within double quotes
            $mail->Password   = "";//your-gmail-password within double qoutes

            $mail->IsHTML(true);
            $mail->AddAddress("", "");//("recipient-email@domain", "recipient-name")
            $mail->SetFrom("", "");//("from-email@gmail.com", "from-name")
            $mail->AddReplyTo($email , $first);
            $mail->Subject = $sub;
            $content = "<p>First Name: $first Message: $message </p>";

            $mail->MsgHTML($content); 
            $mail->send();
            echo "<script>alert('Email Sent Successfully!')</script>";              
        }
        catch(Exception $e)
        {
            echo "<script>alert('Email Wasn't Sent | Some error occured')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    if(!isset($_COOKIE["login"]))
    {
      header('Location: login.php');
    }
  ?>
  <meta charset="UTF-8">
  <title>Contact Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap-4.2.1-dist/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../bootstrap-4.2.1-dist/js/bootstrap.min.js"/>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="zigwheels_favicon.png" type="image/icon"/>
  <link rel="stylesheet" type="text/css" href="../css_files/crawl.css">
  <style>
    .body{
      background-color: lightgoldenrodyellow;
    }
  </style>
<!--JS FUNCTION FOR VALIDATION-->
  <script>
    function validate()
    {
      var id=document.contact_form.username.value;
      var email=document.contact_form.email.value;
      if( id.length == "" || email.length == ""){
        alert("Fill all details!");
        return false;
      }
      return true;
    }
  </script>
</head>

<body class="body">
<!--NAVBAR-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <h1 class="navbar-brand" >ZigWheels
      <medium class="text-muted">Crawler</medium></center></h1>
      <a class="nav-link" href="home.php">Home</a>
      <a class="nav-link" href="about.php">About Me</a>
      <a class="nav-link" href="contact.php">Contact Us</a>
      <a class="logout" name="logout" href="logout.php">Logout</a>
  </nav><center>
<!--FORM FOR TAKING IN EMAIL-->
  <form name="contact_form" action="contact.php" onsubmit="return validate()" method="POST">
      <h4>Name </h4>
      <input type="text" name="username" class="input" id="username" placeholder="Enter USERNAME">
      <h4><br>Your Email ID</h4>
      <input type="email" class="input" id="email" name="email" placeholder="Enter email ID">
      <h4><br>Purpose of mail</h4>
      <input type="text" id="sub" name="sub" placeholder="Subject">
      <h4><br>Body:</h4>
      <textarea class="input" id="email_body" name="email_body" placeholder="Type content here" rows="10" cols="80"></textarea><br><br>
      <input type="submit" name="Send" class="btn btn-primary" value="Email">
    </form></center>
</body>
</html>