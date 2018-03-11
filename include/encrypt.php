<?php
$secret_message_to_send="fpad";
$encrpted_msg=encrypt($secret_message_to_send);
echo "Our Encrypted Message is=".$encrpted_msg."</br>";
echo "Decrypting the orignal message=". decrypt($encrpted_msg);
function encrypt($str) {
 // Initialization vector
 $iv2 = 'dimasnurpanca';
 // Key
 $key2 ='hugaf.com';
 
 $td = mcrypt_module_open('rijndael-128', '', 'cbc', $iv2);
 mcrypt_generic_init($td, $key2, $iv2);
 $encrypted = mcrypt_generic($td, $str);
 mcrypt_generic_deinit($td);
 mcrypt_module_close($td);
 return bin2hex($encrypted);
 }
function decrypt($encrypted_string) {
// Initialization vector
 $iv2 = 'dimasnurpanca';
 // Key
 $key2 ='hugaf.com';
 $encrypted_string= hex2bina($encrypted_string);
 $td = mcrypt_module_open('rijndael-128', '', 'cbc', $iv2);
 mcrypt_generic_init($td, $key2, $iv2);
 $decrypted = mdecrypt_generic($td, $encrypted_string);
 mcrypt_generic_deinit($td);
 mcrypt_module_close($td);
 return utf8_encode(trim($decrypted));
 }
 
 
 function hex2bina($hexdata) {
 $bindata = '';
 for ($i = 0; $i < strlen($hexdata); $i += 2) {
 $bindata .= chr(hexdec(substr($hexdata, $i, 2)));
 }
 return $bindata;
 }
?>