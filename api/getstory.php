<?php
require "../include/db.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_POST['status'])){
	header('Access-Control-Allow-Origin: *');
	$email = $_POST['email'];
	$status = $_POST['status'];
	date_default_timezone_set('Asia/Jakarta');
	if($status=='Published'){
	$sql = "SELECT * FROM stories WHERE user_email='$email' AND status='Published' OR user_email='$email' AND status='Approved' ORDER BY date DESC";
	}else if($status=='Drafts'){
	$sql = "SELECT * FROM stories WHERE user_email='$email' AND status='$status' ORDER BY date DESC";
	}
$result = $conn->query($sql);
	 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $last_update = $row['last_update'];
        if($last_update!=''){
        $date = new DateTime('@'.$last_update, new DateTimeZone('Asia/Jakarta'));
      $dates = $date->format('M j');
        }else{
            $dates ='';
        }
    $data[] = array(
      'id' => $row['id'],
      'kategori_id' => $row['kategori_id'],
      'email' => $row['user_email'],
      'title' => $row['title'],
      'description' => $row['description'],
      'image' => $row['image'],
      'content' => $row['content'],
      'date' => $row['date'],
      'last_update' => $dates,
      'status' => $row['status'],
      'read' => read($row['id']),
      'like' => like($row['id']),
      'comment' => comment($row['id'])
	  );
	  
	  
	  
    }
		

}else{
	 $data = array(
      'id' => 0,
      'kategori_id' => 0,
      'email' => 0,
      'title' => 0,
      'description' => 0,
      'image' => 0,
      'content' => 0,
      'date' => 0,
      'status' => 0,
      'read' => 0,
      'like' => 0,
      'comment' => 0
	  );
}



	
$json = json_encode($data, JSON_UNESCAPED_SLASHES);
echo $json;
}
else if(isset($_POST['story_id'])){
	header('Access-Control-Allow-Origin: *');
	$story_id = $_POST['story_id'];
	date_default_timezone_set('Asia/Jakarta');
	
	$sql = "SELECT * FROM stories WHERE id=$story_id";
$result = $conn->query($sql);
	 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $last_update = $row['last_update'];
        if($last_update!=''){
        $date = new DateTime('@'.$last_update, new DateTimeZone('Asia/Jakarta'));
      $dates = $date->format('M j');
        }else{
            $dates ='';
        }
    $data[] = array(
      'id' => $row['id'],
      'kategori_id' => $row['kategori_id'],
      'email' => $row['user_email'],
      'title' => $row['title'],
      'description' => $row['description'],
      'image' => $row['image'],
      'content' => $row['content'],
      'date' => $row['date'],
      'last_update' => $dates,
      'status' => $row['status'],
      'read' => read($row['id']),
      'like' => like($row['id']),
      'comment' => comment($row['id'])
	  );
	  
	  
	  
    }
		

}else{
	 $data = array(
      'id' => 0,
      'kategori_id' => 0,
      'email' => 0,
      'title' => 0,
      'description' => 0,
      'image' => 0,
      'content' => 0,
      'date' => 0,
      'status' => 0,
      'read' => 0,
      'like' => 0,
      'comment' => 0
	  );
}



	
$json = json_encode($data, JSON_UNESCAPED_SLASHES);
echo $json;
}
else if(isset($_POST['type']) && trim($_POST["type"])=='search'){
	header('Access-Control-Allow-Origin: *');
	$text = $_POST['text'];
	date_default_timezone_set('Asia/Jakarta');
    $sql2 = "SELECT * FROM stories WHERE title LIKE '%$text%' AND status='Approved' ORDER BY date DESC";
$result2 = $conn->query($sql2);
	 if ($result2->num_rows > 0) {
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
         $last_update = $row2['last_update'];
        if($last_update!=''){
        $date = new DateTime('@'.$last_update, new DateTimeZone('Asia/Jakarta'));
      $dates = $date->format('M j');
        }else{
            $dates ='';
        }
    $data[] = array(
      'id' => $row2['id'],
      'kategori_id' => $row2['kategori_id'],
      'email' => $row2['user_email'],
      'title' => $row2['title'],
      'description' => $row2['description'],
      'image' => $row2['image'],
      'content' => $row2['content'],
      'date' => $row2['date'],
      'last_update' => $dates,
      'status' => $row2['status'],
      'read' => read($row2['id']),
      'like' => like($row2['id']),
      'comment' => comment($row2['id'])
	  );
        
    }
    $json = json_encode($data, JSON_UNESCAPED_SLASHES);
echo $json;
	 }
}
else if(isset($_POST['type']) && trim($_POST["type"])=='library'){
	header('Access-Control-Allow-Origin: *');
	$email = $_POST['email'];
	date_default_timezone_set('Asia/Jakarta');
	$sql = "SELECT * FROM stories_read WHERE email_user='$email'";
$result = $conn->query($sql);
	 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id = $row['stories_id'];
        
        	$sql2 = "SELECT * FROM stories WHERE id=$id AND status='Approved' ORDER BY date DESC";
$result2 = $conn->query($sql2);
	 if ($result2->num_rows > 0) {
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
         $last_update = $row2['last_update'];
        if($last_update!=''){
        $date = new DateTime('@'.$last_update, new DateTimeZone('Asia/Jakarta'));
      $dates = $date->format('M j');
        }else{
            $dates ='';
        }
    $data[] = array(
      'id' => $row2['id'],
      'kategori_id' => $row2['kategori_id'],
      'email' => $row2['user_email'],
      'title' => $row2['title'],
      'description' => $row2['description'],
      'image' => $row2['image'],
      'content' => $row2['content'],
      'date' => $row2['date'],
      'last_update' => $dates,
      'status' => $row2['status'],
      'read' => read($row2['id']),
      'like' => like($row2['id']),
      'comment' => comment($row2['id'])
	  );
        
    }
	 }
        
       
	  
	  
	  
    }
		

}else{
	 $data = array(
      'id' => 0,
      'kategori_id' => 0,
      'email' => 0,
      'title' => 0,
      'description' => 0,
      'image' => 0,
      'content' => 0,
      'date' => 0,
      'status' => 0,
      'read' => 0,
      'like' => 0,
      'comment' => 0
	  );
}



	
$json = json_encode($data, JSON_UNESCAPED_SLASHES);
echo $json;
}
else if(isset($_POST['type']) && trim($_POST["type"])=='new' OR trim($_POST["type"])=='hot' OR trim($_POST["type"])=='rising'){
	header('Access-Control-Allow-Origin: *');
	date_default_timezone_set('Asia/Jakarta');
$data= array();
if(isset($_POST['kategori'])){
    $kategori_ids = $_POST['kategori'];
	$sql = "SELECT * FROM stories WHERE status='Approved' AND kategori_id=$kategori_ids ORDER BY date DESC";
}else{
    $sql = "SELECT * FROM stories WHERE status='Approved' ORDER BY date DESC";
}
$type= $_POST['type'];
$result = $conn->query($sql);
	 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if(checkminimum($type,$row['id'])==true){
        
        $last_update = $row['last_update'];
        if($last_update!=''){
        $date = new DateTime('@'.$last_update, new DateTimeZone('Asia/Jakarta'));
      $dates = $date->format('M j');
        }else{
            $dates ='';
        }
    $data[] = array(
      'id' => $row['id'],
      'kategori_id' => $row['kategori_id'],
      'email' => $row['user_email'],
      'title' => $row['title'],
      'description' => $row['description'],
      'image' => $row['image'],
      'content' => $row['content'],
      'date' => $row['date'],
      'last_update' => $dates,
      'status' => $row['status'],
      'read' => read($row['id']),
      'like' => like($row['id']),
      'comment' => comment($row['id'])
	  );
        }
	  
	  
    }
		

}



if(count($data)>=1){
$json = json_encode($data, JSON_UNESCAPED_SLASHES);
echo $json;
}
}


function checkminimum($type,$id){
    require "../include/db.php";
    	$sql = "SELECT * FROM stories_settings";
$result = $conn->query($sql);
	 if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
        $hot = $row['hot'];
        $rising = $row['rising'];
        }
    }
    $sql2 = "SELECT count(*)as total FROM stories_like WHERE stories_id=$id";
$result2 = $conn->query($sql2);
	 if ($result2->num_rows > 0) {
    // output data of each row
        while($row2 = $result2->fetch_assoc()) {
        $like = $row2['total'];
        }
    }
    
  if($type=='hot'){
    	
    if($like>=$hot){
        $return = true;
    }else{
        $return = false;
    }
  }
  else if($type=='rising'){
    if($like>=$rising && $like<$hot){
        $return = true;
    }else{
        $return = false;
    }
        
    }
  else if($type=='new'){
  if($like<$rising){
        $return = true;
    }else{
        $return = false;
    }
      
  }
    //$read = number_format_short($read);
    return $return;
}

function read($id){
    require "../include/db.php";
    	$sql = "SELECT count(*)as total FROM stories_read WHERE stories_id=$id";
$result = $conn->query($sql);
	 if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
        $read = $row['total'];
        }
    }
    $read = number_format_short($read);
    return $read;
}
function like($id){
    require "../include/db.php";
    	$sql = "SELECT count(*)as total FROM stories_like WHERE stories_id=$id";
$result = $conn->query($sql);
	 if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
        $like = $row['total'];
        }
    }
    $like = number_format_short($like);
    return $like;
}
function comment($id){
    require "../include/db.php";
    	$sql = "SELECT count(*)as total FROM stories_comment WHERE stories_id=$id";
$result = $conn->query($sql);
	 if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
        $comment = $row['total'];
        }
    }
    $comment = number_format_short($comment);
    return $comment;
}

function number_format_short( $n ) {
    $n_format=0;
    $suffix='';
	if ($n > 0 && $n < 1000) {
		// 1 - 999
		$n_format = floor($n);
		$suffix = '';
	} else if ($n >= 1000 && $n < 1000000) {
		// 1k-999k
		$n_format = floor($n / 1000);
		$suffix = 'K+';
	} else if ($n >= 1000000 && $n < 1000000000) {
		// 1m-999m
		$n_format = floor($n / 1000000);
		$suffix = 'M+';
	} else if ($n >= 1000000000 && $n < 1000000000000) {
		// 1b-999b
		$n_format = floor($n / 1000000000);
		$suffix = 'B+';
	} else if ($n >= 1000000000000) {
		// 1t+
		$n_format = floor($n / 1000000000000);
		$suffix = 'T+';
	}

	return !empty($n_format . $suffix) ? $n_format . $suffix : 0;
}

?>