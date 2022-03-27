<?php
  $fulname = $_POST['fulname'];
  $mnum = $_POST['mnum'];
  $email = $_POST['email'];
  $anum = $_POST['anum'];
  $address = $_POST['address'];
  $uname = $_POST['uname'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  $host = "localhost8080";
  $root =

$conn = new mysqli('localhost8080','root','','','tests');
if($conn->connect_error){
  die('Connection Failed : '.$conn->connect_error);
}else {
  $stmt = $conn->prepare("insert into registration values(fulname, mnum, email, anum, address, uname, password, cpassword)
  values(?, ?, ?, ?, ?, ?, ?, ?)")
  $stmt->bind_param("sisissss",$fulname, $mnum, $email, $anum, $address, $uname, $password, $cpassword);
  $stmt->execute();
  echo "Registration Successfully..."
  $stmt->close();
  $conn->close();
}
 ?>
