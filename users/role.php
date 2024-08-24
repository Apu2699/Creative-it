<?php
session_start();
require '../db.php';

$user_id = $_POST['user_id'];
$role_id = $_POST['role_id'];

$update ="UPDATE users2 SET role=$role_id WHERE id=$user_id";
mysqli_query($db_connection, $update);
$_SESSION['role'] = 'Role Assigned Success';
header('location:users.php');
?>