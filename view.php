<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: lightseagreen;
        }
    </style>
</head>
<body><div>
    <table border="2px">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Image</th>
            <th>Qualification</th>
            <th>Age</th>
            <th>Phone</th>
            <th>Email</th>
            <th colspan="2">Properties</th>
        </tr>
        <?php
        include('connect.php');

        $abc = "select * from employee";
        $data = mysqli_query($conn,$abc);
        $result = mysqli_num_rows($data);
        if($result > 0){
            while($row = mysqli_fetch_array($data)){ ?>
              <tr>
            <td><?php  echo $row['id'];?></td>    
            <td><?php  echo $row['name'];?></td>
            <td><img src="<?php echo $row['image'];?>" alt="" height="50px" width="50px"></td>
            <td><?php  echo $row['qualification'];?></td>
            <td><?php  echo $row['age'];?></td>
            <td><?php  echo $row['phone'];?></td>
            <td><?php  echo $row['email'];?></td>
            <td><a href="delete.php?id=<?php echo $row['id'];?>">delete</a></td>
            <td><a href="update.php?id=<?php echo $row['id'];?>">update</a></td>

        </tr>

        <?php
            }
        }

        ?>
    </table>
</div>
    
</body>
</html>