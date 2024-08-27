<?php
include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: skyblue;
            text-align: center;
        }
        #Name{
            margin-left: 5%;
        }
        #Qualification{
            margin-left: 1.3%;
        }
        #Age{
            margin-left: 6%;
        }
        #Phone{
            margin-left: 5%;
        }
        #Email{
            margin-left: 5%;
        }
     
    </style>
</head> 
<body><div>
    <form method="post" action="#" enctype="multipart/form-data">
        <div>
            <h1>Update</h1>

            <?php
                $id = $_GET['id'];
                $abc = "SELECT * from `employee` WHERE `id`='$id'";
                $abc_run = mysqli_query($conn,$abc);
                $row = mysqli_fetch_array($abc_run);

            ?>
             <?php if (!empty($row["image"])): ?>
                    <p>Current Image: <img src="<?php echo htmlspecialchars($row["image"]); ?>"  width="40"></p>
                <?php endif; ?>
            image<input type="file" id="image" name="image"><br><br>
            Name:<input type="text" id="Name" value="<?php echo $row["name"] ?>" name="name" placeholder="name"><br><br>
            Qualification:<input type="text" id="Qualification" value="<?php echo $row["qualification"] ?>" name="qualification" placeholder="qualification"><br><br>
            Age:<input type="number" id="Age" value="<?php echo $row["age"] ?>" name="age" placeholder="age"><br><br>
            Phone:<input type="number" id="Phone" value="<?php echo $row["phone"] ?>" name="phone" placeholder="phone"><br><br>
            Email:<input type="email" id="Email" value="<?php echo $row["email"] ?>" name="email" placeholder="email"><br><br>
           
            <input type="submit" name="update" value="update" style="margin-right:19%;">

        </div>
    </form>
</div>
    <?php
        if(isset($_POST['update'])) {
            $name = $_POST['name'];
            $qualification = $_POST['qualification'];
            $age = $_POST['age'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];

            $sql = "UPDATE `employee` SET `name`='$name', `qualification`='$qualification', `age`='$age', `phone`='$phone', `email`='$email'";


            if(!empty($_FILES['image']['name'])) {
                $file_name = $_FILES['image']['name'];
                $tempname = $_FILES['image']['tmp_name'];
                $folder = 'images/'.basename($file_name);
            
            if(move_uploaded_file($tempname,$folder)) {
                $sql .=", `image`='$folder'";
            }
            else{
                echo "failed to upload image.";
            }
        }
            $sql .= "WHERE `id`='$id'";
            $query = mysqli_query($conn, $sql);

            if ($query) {
                echo "Record updated successfully";
                header("Location: http://localhost/company/view.php");

            } else {
                 echo "Error updating record: ".mysqli_error($conn);
         }
    }
    ?>
</body>
</html>