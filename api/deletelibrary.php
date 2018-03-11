<?php
require "../include/db.php";

if(isset($_POST['id']) && isset($_POST['email'])){
    $story_id = $_POST['id'];
    $story_email = $_POST['email'];
    
   
        $sql = "DELETE FROM `stories_read` WHERE stories_id=$story_id AND email_user='$story_email'";
             $conn->query($sql);
        $response['error'] = false;
		$response['message'] = 'Reading List berhasil dihapus';
    
    
    
    
}


echo json_encode($response);
?>