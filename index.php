<?php
include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body><div>
    <form method="post" action="insert.php" enctype="multipart/form-data">
        <div id="edit">
            <h1>Registration form</h1>

            image<input type="file" id="image" name="image"><br><br>
            Name:<input type="text" id="Name" name="name" placeholder="name" autocomplete="off"><br><br>
            Qualification:<input type="text" id="Qualification" name="qualification" placeholder="qualification" autocomplete="off"><br><br>
            Age:<input type="number" id="Age" name="age" placeholder="age" autocomplete="off"><br><br>
            Phone:<input type="number" id="Phone" name="phone" placeholder="phone" autocomplete="off"><br><br>
            Email:<input type="email" id="Email" name="email" placeholder="email" autocomplete="off"><br><br>
           
            <input type="submit" name="submit" value="save" style="margin-right:19%;">

        </div>
    </form>
</div>
    
</body>
</html>