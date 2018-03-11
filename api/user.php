<?php
require_once "../include/db.php";

if(isset($_POST['email'])){
	header('Access-Control-Allow-Origin: *');
	$email = $_POST['email'];
	
	$sql = "SELECT * FROM users";
$result = $conn->query($sql);
	 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
    $data[] = array(
      'username' => $row['username'],
      'email' => $row['email'],
      'role' => $row['role'],
      'aktif' => $row['status'],
      'android_id' => $row['android_id']
	  );
	  
	  
	  
    }
		

}else{
	 $data = array(
      'username' => 0,
      'email' => 0,
      'role' => 0,
      'aktif' => 0,
      'android_id' => 0
	  );
}



	
$json = json_encode($data, JSON_UNESCAPED_SLASHES);
echo $json;
}

?>