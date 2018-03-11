<?php
require "../include/db.php";

if(isset($_POST['password'])){
	header('Access-Control-Allow-Origin: *');
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$android_id = $_POST['android_id'];

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);
	 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row['status']==1){
    $data = array(
      'status' => 1,
      'username' => $row['username'],
      'email' => $row['email'],
      'namalengkap' => $row['fullname'],
      'role' => $row['role'],
      'aktif' => $row['status'],
      'android_id' => $row['android_id'],
			'gender' => $row['gender'],
			'birthday' => $row['birthday']
	  );


	   $update = "UPDATE `users` SET `android_id`='$android_id' WHERE email='$email'";
	   $conn->query($update);
        }else{
             $data = array(
      'status' => 3,
      'username' => 0,
      'email' => 0,
      'namalengkap' => 0,
      'role' => 0,
      'aktif' => 0,
			'gender' => 0,
			'birthday' => 0,
      'android_id' => 0
	  );

        }
    }


}else{
	 $data = array(
      'status' => 0,
      'username' => 0,
      'email' => 0,
      'namalengkap' => 0,
      'role' => 0,
      'aktif' => 0,
			'gender' => 0,
			'birthday' => 0,
      'android_id' => 0
	  );
}




$json = json_encode($data, JSON_UNESCAPED_SLASHES);
echo $json;
}

if(isset($_POST['namalengkap'])){
	header('Access-Control-Allow-Origin: *');
	$email = $_POST['email'];
	$namalengkap = $_POST['namalengkap'];
	$android_id = $_POST['android_id'];

	$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);
	 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    $data = array(
      'status' => 1,
      'username' => $row['username'],
      'email' => $row['email'],
      'namalengkap' => $row['fullname'],
      'role' => $row['role'],
      'aktif' => $row['status'],
      'android_id' => $row['android_id'],
			'gender' => $row['gender'],
			'birthday' => $row['birthday']
	  );


	   $update = "UPDATE `users` SET `android_id`='$android_id' WHERE email='$email'";
	   $conn->query($update);

    }


}else{
    $pass = md5("qwerty");
	$sql = "INSERT INTO users (username, email,fullname, password, role, status, android_id)
    VALUES ('$email', '$email','$namalengkap', '$pass', 'user', 1, '$android_id')";
    if ($conn->query($sql) === TRUE) {
	  $data = array(
      'status' => 1,
      'username' => $email,
      'email' => $email,
      'namalengkap' => $namalengkap,
      'role' => 'user',
      'aktif' => '1',
      'android_id' => $android_id,
			'gender' => '',
			'birthday' => ''
	  );
    }
}




$json = json_encode($data, JSON_UNESCAPED_SLASHES);
echo $json;
}


?>
