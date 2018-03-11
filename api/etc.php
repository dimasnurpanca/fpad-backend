<?php
require "../include/db.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_POST['type'])){
    $type=$_POST['type'];
    if($type=='checkvote'){
        $id= $_POST['id'];
        $email= $_POST['email'];
        $sql = "SELECT * FROM stories_like WHERE stories_id=$id AND email_user='$email'";
        $result = $conn->query($sql);
	        if ($result->num_rows > 0) {
                $response['error'] = false;
			    $response['message'] = 'true';
	        }else{
	            $response['error'] = false;
			    $response['message'] = 'false';
	        }    
    }
    else if($type=='addvote'){
        $id= $_POST['id'];
        $email= $_POST['email'];
        $sql = "INSERT INTO stories_like (stories_id,email_user) VALUES ($id,'$email')";
            if ($conn->query($sql) === TRUE) {
                $response['error'] = false;
			    $response['message'] = 'true';
	        }
    }
    else if($type=='deletevote'){
        $id= $_POST['id'];
        $email= $_POST['email'];
        $sql = "DELETE FROM `stories_like` WHERE stories_id=$id AND email_user='$email'";
            if ($conn->query($sql) === TRUE) {
                $response['error'] = false;
			    $response['message'] = 'false';
	        }
    }
    else if($type=='postcomment'){
        $id= $_POST['id'];
        $email= $_POST['email'];
        $comment= $_POST['comment'];
        $sql = "INSERT INTO stories_comment (stories_id,email_user,comment,date) VALUES ($id,'$email','$comment','".time()."')";
            if ($conn->query($sql) === TRUE) {
                $response['error'] = false;
			    $response['message'] = 'true';
	        }
    }
    else if($type=='kategori'){
        $id= $_POST['value'];
        	$sql2 = "SELECT * FROM kategori WHERE id=$id";
$result2 = $conn->query($sql2);
	 if ($result2->num_rows > 0) {
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
        $response['error'] = false;
		$response['message'] = $row2['nama_kategori'];
    }
	 }
    }
    else if($type=='fullname'){
        $id= $_POST['value'];
        	$sql2 = "SELECT * FROM users WHERE email='$id'";
$result2 = $conn->query($sql2);
	 if ($result2->num_rows > 0) {
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
        $response['error'] = false;
		$response['message'] = $row2['fullname'];
    }
	 }
    }
    else if($type=='totalreadinglist'){
        $id= $_POST['value'];
        	$sql2 = "SELECT count(*)as total FROM stories_read WHERE email_user='$id'";
$result2 = $conn->query($sql2);
	 if ($result2->num_rows > 0) {
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
        $response['error'] = false;
		$response['message'] = $row2['total'];
    }
	 }
    }
    
    else if($type=='checkread'){
        $id= $_POST['id'];
        $email= $_POST['email'];
        	$sql2 = "SELECT * FROM stories_read WHERE email_user='$email' AND stories_id=$id";
$result = $conn->query($sql2);
	        if ($result->num_rows > 0) {
                $response['error'] = false;
			    $response['message'] = 'true';
	        }else{
	            $response['error'] = false;
			    $response['message'] = 'false';
	        } 
    }
    else if($type=='postread'){
        $id= $_POST['id'];
        $email= $_POST['email'];
$sql = "INSERT INTO stories_read (stories_id,email_user) VALUES ($id,'$email')";
            if ($conn->query($sql) === TRUE) {
                $response['error'] = false;
			    $response['message'] = 'berhasil';
	        }
    }
    else if($type=='forgotpassword'){
        $email= $_POST['value'];
        	$sql2 = "SELECT * FROM users WHERE email='$email'";
$result2 = $conn->query($sql2);
	 if ($result2->num_rows > 0) {
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
        $pass = md5('qwerty');
        
         $sql = "UPDATE `users` SET `password`='$pass' WHERE email='$email'";
             $conn->query($sql);
        require "../include/class.phpmailer.php";
$mail             = new PHPMailer();

$body             ="Hi.. ".$email.",\n\n<br><br>"
             ."Password anda adalah qwerty\n\n\n<br><br><br><br>";

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "ssl://mail.hugaf.com"; // SMTP server
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "mail.hugaf.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "project@hugaf.com";  // GMAIL username
$mail->Password   = "sColS5fu;S3W+";            // GMAIL password

$mail->SetFrom('project@hugaf.com', 'Lupa password');

$mail->Subject    = "Lupa password";
$mail->MsgHTML($body);

$address = $email;
$mail->AddAddress($address, $email);
        
        
        $response['error'] = false;
		$response['message'] = 'Silahkan cek inbox pada email anda';
    }
	 }else{
	     $response['error'] = true;
		$response['message'] = 'Email anda belum terdaftar';
	 }
    }
    
    
echo json_encode($response);
}
?>