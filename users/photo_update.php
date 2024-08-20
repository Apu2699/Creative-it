<?php 
session_start();
require '../db.php';

$photo = $_FILES['photo'];

$after_explode = explode('.', $photo['name']);
$extension = end($after_explode);
$allowed_extension = array('jpg', 'png', 'JPG', 'jpeg', 'PNG');
if(in_array($extension,$allowed_extension)){
    if($photo['size']<= 1000000){

        $file_name = uniqid().'.'.$extension;
        $new_location = '../uplods/users/'.$file_name;
        move_upload_file($photo['tmp_name'], $new_location);
        
     } else {
        $_SESSION['err'] = 'File Size Max 1 Mb';
        header('location:profile.php');
    }
} else {
    $_SESSION['err'] = 'Only JPG & PNG format are allowed';
    header('location:profile.php');
}