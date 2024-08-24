<?php
session_start();
require '../db.php';



$user_id = $_GET['id'];
$delete = " DELETE  FROM users2 WHERE id=$user_id";
mysqli_query($db_connection,$delete);

$_SESSION['del'] = 'User Data Successfully Delected';
header('location:users.php');

?>

