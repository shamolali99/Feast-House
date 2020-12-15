<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>


	 <meta charset="utf-8">
	 <link rel="stylesheet" type="text/css" href="index.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body class="bg">
	<div class="container-fluid ">
	<div class="row">
	
		
	<form class="form col-md-4 form_container" method="POST">
  			<div class="form-group">
  				<center><h3 id="font">Sign Up</h3> </center><br/>
				    <label class="color">User Name</label>
				    <input type="text" class="form-control" name="name" placeholder="Enter Name">
				    </div>
            <div class="form-group ">
              <label class="color">Email</label>
              <input type="email" name="email" class="form-control" name="email" placeholder="Enter email">
            </div>
				    <div class="form-group ">
				    <label class="color">Password</label>
				    <input type="password" class="form-control" name="password"  placeholder="Enter Password">
				  	</div>

            <div class="form-group ">
              <label class="color">Re-type Password</label>
              <input type="password"  class="form-control" name="retype_password" placeholder="Re-type the Password">
            </div>

            <div class="form-group ">
              <label class="color">Permanent Address</label>
              <input type="address" name="permanent_address" class="form-control" name="permanent_address" placeholder="Enter Your Permanent Address">
            </div>

			       <div class="form-group ">
              <label class="color">Phone Number</label>
              <input type="number" name="phone" class="form-control" name="phone" placeholder="Enter Your Phone Number">
            </div><br/>
            
				  <button type="submit" class="btn btn-success btn-block" name="submit">Submit</button>

			

	</form>



</body>
</html>

<?php
include_once('dbconfig.php');
if(isset($_POST['submit'])){
  
  $name = $_POST['name'] ;
  $email = $_POST['email'] ;
  $password = $_POST['password'] ;
  $retype_password = $_POST['retype_password'] ;
  $permanent_address = $_POST['permanent_address'] ;
  $phone = $_POST['phone'] ;
  $vkey = md5(time().$name);
  $result = mysqli_query($conn , "INSERT into registration (name ,email,password,retype_password,permanent_address , phone, vkey, validation) 
            VALUES('$name' ,'$email' ,'$password' ,'$retype_password' ,'$permanent_address' ,'$phone' , '$vkey', '0')");

          if($result){
              echo "<script type='text/javascript'>alert('Verification mail has been send to yoiur mail!')</script>";
          }
          else{
            echo "Insert";
          }



require 'class.phpmailer.php';

$mail = new PHPMailer;
$mail->SMTPDebug = 1;
// fardeen.rahman22@gmail.com //Fardeen_Gmail22 
$mail->IsSMTP(); // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com'; // Specify main and backup server
$mail->Port = 587; // Set the SMTP port
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'fardeen.rahman22@gmail.com'; // SMTP username
$mail->Password = 'Fardeen_Gmail22'; // SMTP password
$mail->SMTPSecure = 'tls'; // Enable encryption, 'ssl' also accepted

$mail->From = 'fardeen.rahman22@gmail.com';
$mail->FromName = 'Feast House';
$mail->AddAddress($email, 'Account'); // Add a recipient

  
$mail->IsHTML(true); // Set email format to HTML

$mail->Subject = 'Email Verification';
$mail->Body = "For email Verification click the register button <a href = 'http://localhost/feast_house/verify.php?vkey=$vkey'> Register </a>";
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->Send()) {
echo 'Message could not be sent.';
echo 'Mailer Error: ' . $mail->ErrorInfo;
exit;
}
else{
  echo "Email send successfull";
}
}

?>