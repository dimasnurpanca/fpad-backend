<?php
require "../include/db.php";

if(isset($_POST['id'])){
			 $stories_id = $_POST['id'];
			 
			 if(isset($_POST['title'])){
			 $title= $_POST['title'];
			 $sql = "UPDATE `stories` SET `title`='$title',`last_update`='".time()."' WHERE id=$stories_id";
             $conn->query($sql);
			 }
			 
			 if(isset($_POST['description'])){
			 $description= $_POST['description'];
			 $sql = "UPDATE `stories` SET `description`='$description',`last_update`='".time()."' WHERE id=$stories_id";
             $conn->query($sql);
			 }
			 
			 if(isset($_POST['content'])){
			 $content= $_POST['content'];
			 $sql = "UPDATE `stories` SET `content`='$content',`last_update`='".time()."' WHERE id=$stories_id";
             $conn->query($sql);
			 }
			 
			 if(isset($_POST['kategori'])){
			 $kategori= $_POST['kategori'];
			 $sql = "UPDATE `stories` SET `kategori_id`=$kategori,`last_update`='".time()."' WHERE id=$stories_id";
             $conn->query($sql);
			 }
			 
			  if(isset($_POST['status'])){
			 $status= $_POST['status'];
			 if($status=='waitingapproval'){
			 $sql = "UPDATE `stories` SET `status`='Published',`last_update`='".time()."' WHERE id=$stories_id";
             $conn->query($sql);
             $response['error'] = false;
			 $response['message'] = 'Story berhasil dipublish, status story menunggu approval';    
			 }else if($status=='Drafts'){
			 $response['error'] = false;
			 $response['message'] = 'Draft Story berhasil disimpan';
			 }
			 else{
			 $response['error'] = false;
			 $response['message'] = 'Story berhasil disimpan';
			 }
			 }
			 
			
			 
	
}
echo json_encode($response);
?>