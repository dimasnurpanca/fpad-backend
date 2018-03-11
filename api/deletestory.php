<?php
require "../include/db.php";

if(isset($_POST['id']) && isset($_POST['uid']) && isset($_POST['email'])){
    $story_id = $_POST['id'];
    $story_uid = $_POST['uid'];
    $story_email = $_POST['email'];
    $uid = uid($story_email);
    
    if($story_uid==$uid){
        $sql = "UPDATE `stories` SET `status`='' WHERE id=$story_id";
             $conn->query($sql);
        $response['error'] = false;
		$response['message'] = 'Story berhasil dihapus';
    }else{
        $response['error'] = true;
		$response['message'] = 'Tidak berhasil menghapus konten, id anda tidak sesuai dengan log pada database, silahkan login ulang.';	 
    }
    
    
    
}

function uid($email){
    require "../include/db.php";
    	$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);
	 if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
        $android_id = $row['android_id'];
        }
    }
    return $android_id;
}

echo json_encode($response);
?>