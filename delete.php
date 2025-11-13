<?php
include 'db.php';
$id = $_GET['id'];
$sql = "DELETE FROM students Where id = $id";
$delete = mysqli_query($connection,$sql);
if($delete){
    $msg = "Student Delete Successfully";
}else {
        $msg = "Error: " . mysqli_error($connection);
}

    mysqli_close($connection);

    // Redirect back to Add User page with message
    header("Location: index.php?msg=" . urlencode($msg));
    exit;




?>