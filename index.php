<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Database</title>
    <link rel="stylesheet" href="css/styles.css" media="screen">
    <link rel="icon" href="https://studentwellbeinghub.edu.au/public/img/element-02-blue.png" type="image/png"sizes="16">
  </head>
  <body>
  <h1>STUDENT DATABASE</h1>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
  <div id="container">
  <pre>
  Name   :<input type="text" name="n" size="45"/><br/>
  Id     :<input type="text" name="i" size="45"/><br/>
  CGPA   :<input type="text" name="c" size="45"/><br/>
</pre>
  <input type="radio" name="o" value="insert">Insert
  <input type="radio" name="o" value="delete">Delete
  <input type="radio" name="o" value="update">Update
  <input type="radio" name="o" value="display">Display
  <pre>

    <input type="button" value="Submit"/>
  </pre>
</div>
</form>
</body>
</html>
<?php
$name=$cgpa=$id=$ch=$status=$query="";
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "GET"){
$name = isset($_GET['n']) ? test_input($_REQUEST['n']):'';
$cgpa= isset($_GET['c']) ? test_input($_REQUEST['c']):'';
$id= isset($_GET['i']) ? test_input($_REQUEST['i']):'';
$ch= isset($_GET['o']) ? test_input($_REQUEST['o']):'';

$con=mysqli_connect("localhost","root","") or die("cannot connect");
$db=mysqli_select_db($con,"mydb") or die("db not connected");
if($con){
  switch($ch){
    case 'insert':{
      if(!empty($name) && !empty($id) && !empty($cgpa))
      {
      $query="INSERT INTO stud values('$name','$id','$cgpa')";
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
      if(!empty($id))
      {
        $result = mysqli_query($con,"SELECT id from stud where id='$id'");
        if(mysqli_num_rows($result) > 0)
        {
      $query="delete from stud where id='$id'";
      if(mysqli_query($con,$query))
      echo "Deleted successfully";
    }
      else
      echo "No record found";
      }
      else
      echo "Enter the id of the student";
    break;
    }
    case 'update':{
      if(!empty($id)&& !empty($cgpa))
      {
        $result = mysqli_query($con,"SELECT id from stud where id='$id'");
        if(mysqli_num_rows($result) > 0)
        {
      $query="update stud set cgpa='$cgpa' where id='$id'";
      if(mysqli_query($con,$query))
      echo "Updated successfully";
       }
      else
      echo "No record found";
      }
      else
      echo "Enter the required field";
      break;
    }
    case 'display':{
      $query="select * from stud";
      echo "<div id='display'>";
      echo "<table><tr><th>Name</th><th>Id</th><th>Cgpa</th></tr>";
      $res=mysqli_query($con,$query);
      while($row=mysqli_fetch_array($res))
        echo "<tr><td>$row[0]</td><td> $row[1]</td><td> $row[2]<td></tr><br/>";
      echo "</table></div>";
      break;
    }
  }
}
}
?>
