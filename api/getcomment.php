<?php
require "../include/db.php";

	header('Access-Control-Allow-Origin: *');
	if(isset($_POST['story_id'])){
	    $story_id = $_POST['story_id'];
	$sql = "SELECT * FROM stories_comment WHERE stories_id=$story_id ORDER BY date DESC";
$result = $conn->query($sql);
	 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $email = $row['email_user'];
      $date1 = $row['date'];
      
      	$sql2 = "SELECT * FROM users WHERE email='$email'";
$result2 = $conn->query($sql2);
	 if ($result2->num_rows > 0) {
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
        $fullname= $row2['fullname'];
    }
	 }
      
       $date = new DateTime('@'.$date1, new DateTimeZone('Asia/Jakarta'));
      $dates = $date->format('M j, Y \a\t g:i A');
    $data[] = array(
      'id' => $row['id'],
      'stories_id' => $row['stories_id'],
      'fullname' => $fullname,
      'email_user' => $row['email_user'],
      'comment' => $row['comment'],
      'date' => $dates
	  );
	  
	  
	  
    }
		
$json = json_encode($data, JSON_UNESCAPED_SLASHES);
echo $json;
}

}

	

?>