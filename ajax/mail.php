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

$mail->setFrom('info@payed.in', 'Payed');
$mail->addAddress($email, $name);
$mail->isHTML(true);  
$mail->Subject ="Your Enquiry in Payed";
$mail->Body    =$message;
$mail->send()

?>
