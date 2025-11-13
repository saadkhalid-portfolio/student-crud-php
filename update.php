<?php
include 'db.php';

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['address'];

    $previous_img_sql = "SELECT image FROM students Where id=$id";
    $previous_img_result = mysqli_query($connection,$previous_img_sql);
    $row = mysqli_fetch_assoc($previous_img_result);
   
    $image = $row['image'];
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

    $sql = "UPDATE students SET name='$name',email='$email',number='$number',address='$address',image='$image' WHERE id=$id ";

    $result = mysqli_query($connection,$sql);

    if($result){
        $msg = "Student Update Successfully";
    }else {
        $msg = "Error: " . mysqli_error($connection);
    }
    
    mysqli_close($connection);

    // Redirect back to Add User page with message
    header("Location: index.php?msg=" . urlencode($msg));
    exit;




}

?>