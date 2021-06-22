<?php 
$sales_mail = new PHPMailer;
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
<b>Dear Sales team, </b>
<br><br>
We have received a new enquiry for your department: <br>
Name = '.$name.'<br>
Contact Number = '.$contact.'<br>
Email = '.$email.'<br>
Company Name = '.$company.'<br>
Message = '.$message.'<br>
<br><br>
Best Regards,<br>
Payed family<br>
<img height="25" src="https://payed.in/seller/assets/dist/img/logo.png" alt="Payed" class="brand-image">
</center>
</body>
</html>';
$sales_mail->isSendmail();
$sales_mail->setFrom('info@payed.in', 'Payed');
$sales_mail->addAddress('info@payed.in', 'Admin');
$sales_mail->isHTML(true);  
$sales_mail->addAttachment($targetFilePath, $fileName);
$sales_mail->Subject ="You have a new Seller Partner enquiry! ";
$sales_mail->Body    =$message;
$sales_mail->send();

?>
