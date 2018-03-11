<?php
require_once "../include/db.php";

	header('Access-Control-Allow-Origin: *');
	
	$sql = "SELECT * FROM kategori";
$result = $conn->query($sql);
	 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
    $data[] = array(
      'id' => $row['id'],
      'nama_kategori' => $row['nama_kategori']
	  );
	  
	  
	  
    }
		
$json = json_encode($data, JSON_UNESCAPED_SLASHES);
echo $json;
}



	

?>