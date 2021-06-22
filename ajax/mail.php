<?php 
$message='<!DOCTYPE>
<html>
<head>
<title>Email</title>
<style type="text/css">
	.card-header {
    background-color: hsl(0, 0%, 90%);
    border-bottom: 1px solid rgba(0, 0, 0, .125);
    padding: .75rem 1.25rem;
    position: relative;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
}
.text-center {
    text-align: center!important;
}
.h1, h1 {
    margin-bottom: .5rem;
    font-family: inherit;
    font-weight: 500;
    line-height: 1.2;
    color: inherit;
    font-size: 2.5rem;
}
a{
    text-decoration: none;
    background-color: hsl(0, 0%, 90%);
}
</style>
</head>
<body>
<center>
<div class="card-header text-center">
 <a href="https://payed.in/seller" class="h1"><img height="50" src="https://payed.in/seller/assets/dist/img/logo.png" alt="Payed" class="brand-image"></a>
</div>
<br><br>
<b>Dear '.$name.',</b>
<br><br>
Thanks for your response
<br><br>
Best Regards,<br>
Payed family<br>
<img height="25" src="https://payed.in/seller/assets/dist/img/logo.png" alt="Payed" class="brand-image">
</center>
</body>
</html>';
$to = $email;
$subject = "Your Enquiry in Payed";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <enquiry@payed.in>' . "\r\n";


mail($to,$subject,$message,$headers);
?>



