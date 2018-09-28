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
      if(isset($name)&&isset($id)&&isset($cgpa))
      {
      $query="INSERT INTO stud values($name,$id,$cgpa)";
      if(mysqli_query($con,$query))
      echo "Inserted successfully";
      else
      echo "Error in insertion";
      }
      else
      echo "Enter the required field";
      break;
    }
    case 'delete':{
      if(isset($id))
      {
      $query="delete from stud where id=$id";
      if(mysqli_query($con,$query))
      echo "Deleted successfully";
      else
      echo "Error in Deletion";
      }
      else
      echo "Enter the id of the student";
    break;
    }
    case 'update':{
      if(isset($id)&&isset($cgpa))
      {
      $query="update stud set cgpa=$cgpa where id=$id";
      if(mysqli_query($con,$query))
      echo "Updated successfully";
      else
      echo "Error in Updation";
      }
      else
      echo "Enter the required field";
      break;
    }
    case 'display':{
      break;
    }
    default:{
      echo "No option selected";
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
