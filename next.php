// Attempt to move the uploaded file
<?php
include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <style>
        body {
            background-color: skyblue;
            text-align: center;
        }
        #Name, #Qualification, #Age, #Phone, #Email {
            margin-left: 5%;
        }
    </style>
</head> 
<body>
    <div>
        <form method="post" action="#" enctype="multipart/form-data">
            <div>
                <h1>Update</h1>

                <?php
                $id = $_GET['id'];
                $abc = "SELECT * FROM `employee` WHERE `id`='$id'";
                $abc_run = mysqli_query($conn, $abc);
                $row = mysqli_fetch_array($abc_run);
                ?>

                <?php if (!empty($row["image"])): ?>
                    <p>Current Image: <img src="<?php echo htmlspecialchars($row["image"]); ?>" width="100" alt="Current Image"></p>
                <?php endif; ?>

                Image: <input type="file" id="image" name="image"><br><br>
                Name: <input type="text" id="Name" value="<?php echo htmlspecialchars($row["name"]); ?>" name="name" placeholder="name"><br><br>
                Qualification: <input type="text" id="Qualification" value="<?php echo htmlspecialchars($row["qualification"]); ?>" name="qualification" placeholder="qualification"><br><br>
                Age: <input type="number" id="Age" value="<?php echo htmlspecialchars($row["age"]); ?>" name="age" placeholder="age"><br><br>
                Phone: <input type="number" id="Phone" value="<?php echo htmlspecialchars($row["phone"]); ?>" name="phone" placeholder="phone"><br><br>
                Email: <input type="email" id="Email" value="<?php echo htmlspecialchars($row["email"]); ?>" name="email" placeholder="email"><br><br>
               
                <input type="submit" name="update" value="Update" style="margin-right:19%;">

            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $qualification = $_POST['qualification'];
        $age = $_POST['age'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        // Start building the SQL query
        $sql = "UPDATE `employee` SET `name`='$name', `qualification`='$qualification', `age`='$age', `phone`='$phone', `email`='$email'";

        // Handle file upload
        if (!empty($_FILES['image']['name'])) {
            $file_name = $_FILES['image']['name'];
            $tempname = $_FILES['image']['tmp_name'];
            $folder = 'images/' . basename($file_name);
            
            // Attempt to move the uploaded file
            if (move_uploaded_file($tempname, $folder)) {
                $sql .= ", `image`='$folder'";
            } else {
                echo "Failed to upload image.";
            }
        }

        // Complete the SQL query
        $sql .= " WHERE `id`='$id'";

        // Execute the query
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "Record updated successfully";
            header("Location: http://localhost/company/view.php");
            exit(); // Ensure no further code is executed after redirect
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
    ?>
</body>
</html>
