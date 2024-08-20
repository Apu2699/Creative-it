<?php 
session_start();
require '../db.php'; 
$name = $_POST['name'];
$email = $_POST['email'];
$division = $_POST['division'];
$gender = $_POST['gender'];
$id =$_POST['user_id'];

$update = "UPDATE users2 SET name='$name', email='$email', division='$division', gender='$gender' WHERE id=$id";
mysqli_query($db_connection, $update);

$_SESSION['updated'] = 'Profile Info Updated';
header('location:profile.php');

