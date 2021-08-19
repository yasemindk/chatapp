<?php
$conn = mysqli_connect("localhost", "root", "","chat");
// if ($conn) {
//   echo "database bağlandı";
// }else {
//   echo "error";
// } localhost/chatapp/php/config.php adresinden bağlanıp bağlanmadığını kontrol edebilirsin

if (!$conn) {
  echo "database connected" . mysqli_connect_error();
}//bağlanmadıysa database not connected yazar
 ?>
