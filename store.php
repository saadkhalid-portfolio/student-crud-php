<?php
include 'db.php';

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    
    $image = null;
    if(isset($_FILES['st_pic']) && !empty($_FILES['st_pic']['name'])){
    $directory = 'studentimages/';
    // $file_name = $_FILES['st_pic']['name'];
    $file_name = time().'-'.basename($_FILES['st_pic']['name']);
    $file_type = $_FILES['st_pic']['type'];
    $file_size = $_FILES['st_pic']['size'];
    $file_tmp = $_FILES['st_pic']['tmp_name'];

        // Check if file already exists
        // if (file_exists($directory.$file_name)) {
        // echo "Sorry, file already exists.";
        // }
    
    // Move the uploaded temporary file to our uploads folder
    move_uploaded_file($file_tmp, $directory.$file_name);
    $image = $file_name;

    }

    $sql = "INSERT INTO students (name,email,number,address,image) VALUES ('$name','$email','$number','$address','$image')";

    $result = mysqli_query($connection,$sql);

    if($result){
        $msg = "Student add Successfully";
    }else {
        $msg = "Error: " . mysqli_error($connection);
    }
    
    mysqli_close($connection);

    // Redirect back to Add User page with message
    header("Location: index.php?msg=" . urlencode($msg));
    exit;




}

?>