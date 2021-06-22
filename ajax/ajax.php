<?php
include "config.php";

	$error=[];
	$type=$_POST["type"];
	$name=$_POST["name"];
	$contact=$_POST["contact"];
	$email=$_POST["email"];
	$company=$_POST["company"];
	$website=$_POST["website"];
	$catalogue=($type=='seller-partner')?$_FILES["catalogue"]:(($type=='brand-partners')?$_FILES["catalogue1"]:$_FILES["catalogue2"]);
	$message=$_POST["message"];
if($name=='' || strlen($name)>75)
	$error["name"]="Name cannot be empty and more tha 75 character";
if($contact=='' || strlen($contact)>12 )
	$error["contact"]="Contact cannot be empty and more tha 12 character";
if(!is_numeric($contact))
	$error["contact"]="Contact has to be numeric";
if($email=='' || (filter_var($email,FILTER_VALIDATE_EMAIL)==false))
	$error["email"]="Please enter a valid email";
if($company=='')
	$error["company"]="Company cannot be empty";
if($catalogue["name"]=='')
	$error["catalogue"]="Catalogue cannot be empty";

if(!empty($error))
	$ajaxRes = array('status' => 0, 'response_code' => 201, 'errors' => $error);
if(!empty($catalogue["name"])){ 
                 
                $uploadDir= __DIR__.'/uploads/'; 
                $uploadStatus =1;
                $fileName = basename($catalogue["name"]); 
                $targetFilePath = $uploadDir . $fileName; 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg'); 
                
                if(in_array($fileType, $allowTypes)){ 
                	if(@move_uploaded_file($catalogue["tmp_name"], $targetFilePath)){ 
                        $uploadedFile = $fileName; 
                        
                    }else{ 
                        $uploadStatus = 0; 
                        $error["catalogue"]="File cannot be upload at this monment";
                       $ajaxRes = array('status' => 0, 'response_code' => 201, 'errors' => $error);
                    } 
    				}else{ 
                    $uploadStatus = 0; 
                    $error["catalogue"]='Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.'; 
                    $ajaxRes = array('status' => 0, 'response_code' => 201, 'errors' => $error);
                } 
}

if($_POST && empty($error) && $uploadStatus ==1){
	$sql = 'INSERT INTO enquiry (name, contact, email, company,uploads,message,website,type)
VALUES ("'.$name.'","'.$contact.'","'.$email.'","'.$company.'","'.$uploadedFile.'","'.$message.'","'.$website.'","'.$type.'")';
if (mysqli_query($connection_mysql, $sql)) {
	include "mail.php";
	include "admin_mail.php";
  $ajaxRes = array('status' => 1, 'response_code' => 202, 'errors' => '');
} else {
  $ajaxRes = array('status' => 0, 'response_code' => 201, 'errors' => 'Server not responding');
}
}
echo json_encode($ajaxRes);
exit;
?>