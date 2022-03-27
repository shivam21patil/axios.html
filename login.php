<?php
$username=$_POST['txtusername'];
$password=$_POST['txtpassword'];

$conn=new PDO("mysql:host=localhost;dbname=Attendance","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
try{
  $stmt=$conn->prepare("select * from admin where email=? and password=?");
  $stmt->bindParam(1,$username);
  $stmt->bindParam(2,$password);

  $stmt->execute();
  $c=$stmt->rowCount();
  if($c==1){
    $_SESSION['session_emailid']=$username;
    $_SESSION['session_password']=$password;

    header("location:home.php");
  }
  else{
    echo "invalid Login";
  }
  $conn=null;
}
catch(Exception $e){
  $conn=null;
  echo "invalid login ".$e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
      <br> <a href="Adminloginform.php" target="_blank"class="btn btn-primary">Go Back</a>
  </body>
</html>
