<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "DELETE FROM `tasks` WHERE `task_id` ='$id'";

if ($conn->query($sql) === TRUE) {
    
   
    header("Location:index2.php");
    
    exit();
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();

// $id = $_GET['task_id']; 
// // $task_id = $_POST['task_id'];

// $del = mysqli_query($conn,"DELETE FROM `tasks` WHERE `todo`.`task_id` ='$id'");

// if($del)
// {
//     mysqli_close($conn);
//     header("index2.php");
//     exit;	
// }
// else
// {
//     echo "Error deleting record";
// }
?>