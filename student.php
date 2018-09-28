<?php
$name="";
if($_SERVER[REQUEST_METHOD]=='GET'){
$name=$_GET['name'];
$cgpa=$_GET['cgpa'];
$id=$_GET['id'];
$ch=$_GET['option'];
$con=mysqli_connect("localhost","root","");
if($con){
  $db=mysqli_select_db($con,"myDB");
  if($db){

  }
  else
  echo "Database error";
}
else{
  echo "MySQL not connected";
}
}
?>
