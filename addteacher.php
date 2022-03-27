<?php
$name=$_POST['tname'];
$mobile=$_POST['mob'];
$address=$_POST['addr'];
$email=$_POST['mail'];
$msg="";

  $conn=new PDO("mysql:host=localhost;dbname=Attendance","root",null);
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  try{
    $stmt=$conn->prepare("insert into Teacher(tName,mobile,address,email) values(?,?,?,?)");
    $stmt->bindParam(1,$name);
    $stmt->bindParam(2,$mobile);
    $stmt->bindParam(3,$address);
    $stmt->bindParam(4,$email);
    $stmt->execute();
    $conn="null";
    header("location:home.php");
  }
  catch(Exception $e){
    $msg="Teacher not added".$e->getMessage();
  }


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Teacher Adding</title>
  </head>
  <body>
    <?php
      echo $msg;
    ?>
  </body>
</html>