<?php
include_once("config.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\htdocs\emailsending\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\emailsending\vendor\phpmailer\phpmailer\src\Exception.php';
require 'C:\xampp\htdocs\emailsending\vendor\phpmailer\phpmailer\src\SMTP.php';

if(isset($_POST['submit']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$status=0;
$activationcode=md5($email.time());
$query=mysqli_query($con,"insert into userregistration(name,email,password,activationcode,status) values('$name','$email','$password','$activationcode','$status')");
	if($query)
	{

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "example@gmail.com";
$mail->Password   = "createdappspassword";
$mail->IsHTML(true);
$mail->AddAddress($email, $name);
$mail->SetFrom("joyanta955@gmail.com", "Joy");
$mail->AddReplyTo("joyanta955@gmail.com", "Joy");
$mail->AddCC($email, $name);
$mail->Subject = "Email Verification";
$content = "<a href='http://localhost/emailverify/email_verification.php?code=$activationcode'>Click Here To Verify</a>";
$mail->MsgHTML($content);
if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
} else {
  echo "Email sent successfully";
} 

echo "<script>alert('Registration successful, please verify in the registered Email-Id');</script>";
echo "<script>window.location = 'login.php';</script>";}

else
{
echo "<script>alert('Data not inserted');</script>";
}
}
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>PHP Email Verification Script </title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>


<div class="container-fluid">
  
      
     
 <!--/left-->
  
  <!--center-->
  <div class="col-sm-6">
    <div class="row">
      <div class="col-xs-12">
        <h3>PHP Email Verification Script </h3>
		<hr >
		<form name="insert" action="" method="post">
     <table width="100%"  border="0">
    <tr>
    <th height="62" scope="row">Name </th>
    <td width="71%"><input type="text" name="name" id="name" value=""  class="form-control" required /></td>
  </tr>  
  <tr>
    <th height="62" scope="row">Email id </th>
    <td width="71%"><input type="email" name="email" id="email" value=""  class="form-control" required /></td>
  </tr>
  <tr>
    <th height="62" scope="row">Password </th>
    <td width="71%"><input type="password" name="password" id="password" value=""  class="form-control" required /></td>
  </tr>
 <tr>
    <th height="62" scope="row"></th>
    <td width="71%"><input type="submit" name="submit" value="Submit" class="btn-group-sm" /> </td>
  </tr>
</table>
 </form>
 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- newone21 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-8906663933481361"
     data-ad-slot="6355325537"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
      </div>
    </div>
  
        
   
  </div><!--/center-->

</div><!--/container-fluid-->
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
