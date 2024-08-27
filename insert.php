<?php
include('connect.php');
if(isset($_POST['submit'])){
    $Name = $_POST['name'];
    $Qualification = $_POST['qualification'];
    $Age = $_POST['age'];
    $Phone = $_POST['phone'];
    $Email = $_POST['email'];
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'images/'.$file_name;
    if(move_uploaded_file($tempname,$folder)){
    $sql = "insert into employee(name,qualification,age,phone,email,image)values('$Name','$Qualification','$Age','$Phone','$Email','$folder')";
    $query =mysqli_query($conn,$sql);  
    } 
    if($query){
        
        echo "Data is insert";
        
    }       
    else{
        echo "not insert";
    }   

}

?>