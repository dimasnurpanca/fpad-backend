<?php
require "../include/db.php";
if(isset($_POST['type'])){
    $type=$_POST['type'];
    if($type=='username'){
        $value= $_POST['value'];
        $email= $_POST['email'];
         $sql = "SELECT * FROM users WHERE username='$value'";
        $result = $conn->query($sql);
	        if ($result->num_rows > 0) {
                $response['error'] = true;
			    $response['message'] = 'Username tersebut sudah terdaftar di database, silahkan pilih username lain';
	        }else{
	            $sql2 = "UPDATE `users` SET `username`='$value' WHERE email='$email'";
             $conn->query($sql2);
                $response['error'] = false;
			    $response['message'] = 'Berhasil mengganti username';
	        }


    }
    else if($type=='fullname'){
        $value= $_POST['value'];
        $email= $_POST['email'];
         $sql2 = "UPDATE `users` SET `fullname`='$value' WHERE email='$email'";
             $conn->query($sql2);
                $response['error'] = false;
			    $response['message'] = 'Berhasil mengganti nama profile anda';


    }
    else if($type=='gender'){
        $value= $_POST['value'];
        $email= $_POST['email'];
         $sql2 = "UPDATE `users` SET `gender`='$value' WHERE email='$email'";
             $conn->query($sql2);
                $response['error'] = false;
			    $response['message'] = 'Berhasil mengganti gender profile anda';


    }
    else if($type=='birthday'){
        $value= $_POST['value'];
        $email= $_POST['email'];
         $sql2 = "UPDATE `users` SET `birthday`='$value' WHERE email='$email'";
             $conn->query($sql2);
                $response['error'] = false;
			    $response['message'] = 'Berhasil mengganti tanggal lahir profile anda';


    }
    else if($type=='gantipassword'){
        $oldpassword= md5($_POST['value1']);
        $newpassword= md5($_POST['value2']);
        $email= $_POST['email'];
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$oldpassword'";
       $result = $conn->query($sql);
         if ($result->num_rows > 0) {
           $sql2 = "UPDATE `users` SET `password`='$newpassword' WHERE email='$email'";
            $conn->query($sql2);
            $response['error'] = false;
            $response['message'] = 'Berhasil mengganti password profile anda';
         }else{
         $response['error'] = true;
         $response['message'] = 'Password lama anda tidak sesuai';
         }





    }



echo json_encode($response);
}
?>
