<?php
require_once "../include/db.php";




if(isset($_POST['email'])){
	header('Access-Control-Allow-Origin: *');
	$username = $_POST['username'];
	$email = $_POST['email'];
	$namalengkap = $_POST['namalengkap'];
	$password = md5($_POST['password']);
	
	
	$sql = "SELECT * FROM users WHERE email='$email' OR username='$username'";
$result = $conn->query($sql);
	 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    $data = array(
      'status' => 0,
	  );
    }
		

}else{
	$sql = "INSERT INTO users (username, email,fullname, password, role, status)
    VALUES ('$username', '$email','$namalengkap', '$password', 'user', 1)";
    if ($conn->query($sql) === TRUE) {
	 $data = array(
      'status' => 1,
	  );
} else {
    $data = array(
      'status' => 3,
	  );
}

}



	
$json = json_encode($data, JSON_UNESCAPED_SLASHES);
echo $json;
}
?>