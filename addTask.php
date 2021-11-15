<?php

if(isset($_POST['submit']))
{
    $servername = "localhost";
    $username = "root";
    $password = "";

    
    $conn = new mysqli($servername, $username, $password);

   
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $task = $_POST['task'];
    $task_description = $_POST['description'];
    $status = $_POST['status_id'];
    $priority = $_POST['priority_id'];
    $deadline = $_POST['deadline'];

    $sql= "INSERT INTO `todo`.`tasks` (`task_name`, `description`, `status`, `priority`, `deadline`) VALUES ('$task', '$task_description', '$status', '$priority', '$deadline')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert ("Task Added Successfully!")</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Tasks</title>

    <style type="text/css">
        body {
            text-align: center;
            margin: 0px;
            padding: 0px;
            /* background-color: rgb(248, 224, 85) */
            background-color:#bac3de;
        }
        form {
            display: inline-block;
            margin: 6px;
            padding: 4px;
            
        }
        td {
            height: 70px;
          }
        img{
            z-index: -1;
        }

        .button {
        transition-duration: 0.4s;
        }

        .button:hover {
        background-color: #4CAF50; /* Green */
        color: white;
        }
        
    </style>
</head>
<body>
    
    
    <h1>Add New Tasks</h1>
    <div class="tsk-form">
        <form method="POST" action="<?php $_PHP_SELF; ?>">
            <table>
                <tr>
                    <td>Task:</td>
                    <td><input type="text" name="task" placeholder="Enter your Task" required="required"/></td>
                </tr>
                <tr>
                    <td>Task description:</td>
                    <td><textarea name="description"></textarea></td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td><select name="status_id">
                        <option value="1">TO DO</option>
                        <option value="2">Doing</option>
                        <option value="3">Maybe DO</option>
                    </select></td>
                </tr>
                <tr>
                    <td>
                        Priority:
                    </td>
                    <td><select name="priority_id">
                        <option value="high">High</option>
                        <option value="medium">Medium</option>
                        <option value="low">Low</option>
                    </select></td>
                </tr>
                <tr>
                    <td> Deadline:</td>
                    <td><input type="date" name="deadline"/></td>
                </tr>
                <!-- <tr>
                    <td><input type="submit" name="submit"/></td>
                </tr> -->

            </table>
            <input type="submit" name="submit" value="Submit"><br>
        </form><br>
        <a href="index.php">
       <button class="button">Show Tasks</button>
        </a>

    </div>
</body>


</html>