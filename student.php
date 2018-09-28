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
  switch($ch){
    case 'insert':{
      break;
    }
    case 'delete':{
    break;
    }
    case 'update':{
      break;
    }
    case 'display':{
      break;
    }
    default:{

    }
  }
  }
  else
  echo "Database error";
}
else{
  echo "MySQL not connected";
}
}
?>
