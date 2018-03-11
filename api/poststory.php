<?php
require "../include/db.php";

if(isset($_GET['drafts'])){
    $email = $_POST['email'];
    $kategori = $_POST['kategori'];
$sql = "INSERT INTO stories (user_email,kategori_id,image,date, status)
             VALUES ('$email',$kategori,'defaultupload.png','".time()."','Drafts')";
             if ($conn->query($sql) === TRUE) {
			 $stories_id = $conn->insert_id;
			 
			 if(isset($_POST['title'])){
			 $title= $_POST['title'];
			 $sql = "UPDATE `stories` SET `title`='$title' WHERE id=$stories_id";
             $conn->query($sql);
			 }
			 
			 if(isset($_POST['description'])){
			 $description= $_POST['description'];
			 $sql = "UPDATE `stories` SET `description`='$description' WHERE id=$stories_id";
             $conn->query($sql);
			 }
			 
			 if(isset($_POST['content'])){
			 $content= $_POST['content'];
			 $sql = "UPDATE `stories` SET `content`='$content' WHERE id=$stories_id";
             $conn->query($sql);
			 }
			 
			 if (isset($_FILES['uploaded_file']['name'])) {
				$file_path = "image/";
				$newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["uploaded_file"]["name"]));
				$file_path = $file_path . $newfilename;
					if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
						$sql = "UPDATE `stories` SET `image`='$newfilename' WHERE id=$stories_id";
						$conn->query($sql);
					} 
			 }
			 $response['error'] = false;
			 $response['message'] = 'Draft Story berhasil ditambahkan';
	}else{
		$response['error'] = true;
		$response['message'] = 'Terjadi kesahalan pada database';
		}
}
else if(isset($_GET['published'])){
    $email = $_POST['email'];
    $kategori = $_POST['kategori'];
$sql = "INSERT INTO stories (user_email,kategori_id,image,date, status)
             VALUES ('$email',$kategori,'defaultupload.png','".time()."','Published')";
             if ($conn->query($sql) === TRUE) {
			 $stories_id = $conn->insert_id;
			 
			 if(isset($_POST['title'])){
			 $title= $_POST['title'];
			 $sql = "UPDATE `stories` SET `title`='$title' WHERE id=$stories_id";
             $conn->query($sql);
			 }
			 
			 if(isset($_POST['description'])){
			 $description= $_POST['description'];
			 $sql = "UPDATE `stories` SET `description`='$description' WHERE id=$stories_id";
             $conn->query($sql);
			 }
			 
			 if(isset($_POST['content'])){
			 $content= $_POST['content'];
			 $sql = "UPDATE `stories` SET `content`='$content' WHERE id=$stories_id";
             $conn->query($sql);
			 }
			 
			 if (isset($_FILES['uploaded_file']['name'])) {
				$file_path = "image/";
				$newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["uploaded_file"]["name"]));
				$file_path = $file_path . $newfilename;
					if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
						$sql = "UPDATE `stories` SET `image`='$newfilename' WHERE id=$stories_id";
						$conn->query($sql);
					} 
			 }
			 $response['error'] = false;
			 $response['message'] = 'Published Story berhasil ditambahkan';
	}else{
		$response['error'] = true;
		$response['message'] = 'Terjadi kesahalan pada database';
		}
}
else if(isset($_GET['image'])){
    if (isset($_FILES['uploaded_file']['name'])) {
				$file_path = "image/";
				$newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["uploaded_file"]["name"]));
				$file_path = $file_path . $newfilename;
					if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
						$response['error'] = false;
			            $response['message'] = 'http://www.hugaf.com/project/api/image/'.$newfilename;
					}else{
					    	$response['error'] = true;
		                	$response['message'] = 'Tidak Berhasil Upload Gambar Tersebut';
					} 
		
			 }else{
			     $response['error'] = true;
		         $response['message'] = 'Error';
			 }
			 
}
else{
    $response['error'] = true;
		$response['message'] = 'Tidak ada data';
}
 
echo json_encode($response);
?>