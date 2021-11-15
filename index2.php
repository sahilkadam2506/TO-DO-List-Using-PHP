

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO-DO List</title>
    <style>
       body {
            text-align: center;
            margin: 0px;
            padding: 0px;
            background-color: rgb(248, 224, 85)
        }
        table {
            display: inline-block;
            margin: 6px;
            padding: 4px;
        }
        
        td{
            
            height: 30px;
            width: 150px;
            
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

    <h2>Employee Details</h2>

    <table border="0">
    <tr>
        <td>Sr.No.</td>
        <td>Task Name</td>
        <td>Priority</td>
        <td>Description</td>
        <td>Deadline</td>
        <td>Done</td>
    </tr>

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";

    
    $conn = new mysqli($servername, $username, $password);

   
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $records = mysqli_query($conn,"select * from `todo`.`tasks`"); // fetch data from database

    while($data = mysqli_fetch_array($records))
    {
    ?>
    <tr>
        <td><?php echo $data['task_id']; ?></td>
        <td><?php echo $data['task_name']; ?></td>
        <td><?php echo $data['priority']; ?></td>
        <td><?php echo $data['description']; ?></td>
        <td><?php echo $data['deadline']; ?></td>
        <td><a href="delete.php?id=<?php echo $data['task_id']; ?>">Delete</a></td>
        
    </tr>	
    <?php
    }
    ?>
</table>
<div class="container">
<a href="addTask.php">
<button class="button">Add Task</button>
</a>
</div>
<?php mysqli_close($conn);?>

    
    
</body>
</html>