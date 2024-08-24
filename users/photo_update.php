<?php 
session_start();
require '../db.php';

$photo = $_FILES['photo'];
$user_id = $_POST['user_id'];

$select = "SELECT * FROM users2 WHERE id=$user_id";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);


$after_explode = explode('.', $photo['name']);
$extension = end($after_explode);
$allowed_extension = array('jpg', 'png', 'JPG', 'jpeg', 'peg', 'PNG');
if(in_array($extension,$allowed_extension)){
    if($photo['size']<= 1000000){
        if($after_assoc['photo'] != null){
            $delete_from = '../uploads/users/'. $after_assoc['photo'];
            unlink($delete_from);
        }
        $file_name = uniqid().'.'.$extension;
        $new_location = '../uploads/users/'.$file_name;
        move_uploaded_file($photo['tmp_name'], $new_location);

        $update = "UPDATE users2 SET photo= '$file_name' WHERE id=$user_id";
        mysqli_query($db_connection, $update);
        $_SESSION['photo'] = 'Profile Photo Updated';
        header('location:profile.php');
        
     } else {
        $_SESSION['err'] = 'File Size Max 1 Mb';
        header('location:profile.php');
    }
} else {
    $_SESSION['err'] = 'Only JPG & PNG format are allowed';
    header('location:profile.php');
}