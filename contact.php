<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../vendor/phpmailer/phpmailer/src/Exception.php';
    require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require '../vendor/phpmailer/phpmailer/src/SMTP.php';
    // Load Composer's autoloader
    require '../vendor/autoload.php';
    
    echo "<script>console.log(".isset($_POST['send']).")</script>";
    if(isset($_POST['send'])){

        $first = $_POST['username'];
        $email = $_POST['email'];
        $sub = $_POST['sub'];
        $message = $_POST['body'];

        $mail = new PHPMailer(true);
        try{
            $mail->IsSMTP();
            $mail->SMTPDebug  = 1;  
            $mail->SMTPAuth   = TRUE;
            $mail->SMTPSecure = "tls";
            $mail->Port       = 587;
            $mail->Host       = "smtp.gmail.com";
            $mail->Username   = "arundharavath6@gmail.com";
            $mail->Password   = "steamedmomos@1030";

            $mail->IsHTML(true);
            $mail->AddAddress("arundharavath6@gmail.com", "Arun Kumar Dharavath");
            $mail->SetFrom("arundharavath6@gmail.com", "IT TASK SAMPLE EMAIL");
          //  $mail->AddReplyTo($email , $first);
            $mail->Subject = "$sub";
            $content = "<p>First Name: $first Message: $message </p>";

            $mail->MsgHTML($content); 
            $mail->send();
            echo "<div>Email Sent Successfully!</div>";              
        }
        catch(Exception $e){
            echo "<div>Email Wasn't Sent | Some error occured</div>";
        }
    }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>

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
    .input{
      text-align: center;
    }
  </style>

  <script>
        function validate(){
            var id=document.contact_form.username.value;
            var email=document.contact_form.email.value;
            var sub=document.contact_form.sub.value;
            var body=document.contact_form.body.value;
            if( id.length == "" || email.length == "" || sub.length == "" || body.length == ""){
                alert("invalid details");
                return false;
            }
            return true;
        }
    </script>
</head>

<body class="body"> 
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <h1 class="navbar-brand" >ZigWheels
      <medium class="text-muted">Crawler</medium></h1>
      <a class="nav-link" href="home.php">Home</a>
      <a class="nav-link" href="about.php">About Me</a>
      <a class="nav-link" href="contact.php">Contact Us</a>
      <a class="logout" name="logout" href="logout.php">Logout</a>
  </nav>
  <form name="contact_form" action="sample.php" onsubmit="return validate()" method="POST">
   <div class="emailer"><br>  
      <h4>Name </h4>
      <input type="text" class="input" id="username" name="username" placeholder="Enter USERNAME"/>
      <h4>Your Email ID</h4>
      <input type="email" class="input" id="email" name="email" placeholder="Enter email ID"/>
      <h4><br>Purpose of mail</h4>
      <input type="text" class="input" id="sub" name="sub" placeholder="Subject"/>
      <h4><br>Body:</h4>
      <textarea class="input" id="body" name="body" placeholder="Type content here" rows="10" cols="80"></textarea><br><br>
      <input type="submit" class="btn btn-primary" name="send" value="Email"/>
  </form>
  
    

</body>
</html>