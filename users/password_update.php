<?php 
session_start();
require '../db.php';

$current_password = $_POST['current_password'];
$password = $_POST['password'];
$after_hash = password_hash($password, PASSWORD_DEFAULT);
$confirm_password = $_POST['confirm_password'];
$id = $_POST['user_id'];

$flag = false;

if(empty($current_password)){
    $flag = true;
    $_SESSION['c_pass_err'] = 'Please Enter Current Password';
}
else{
    $select = "SELECT * FROM users2 WHERE id=$id";
    $select_res = mysqli_query($db_connection, $select);
    $after_assoc = mysqli_fetch_assoc($select_res);
    if(!password_verify($current_password, $after_assoc['password'])){
        $flag = true;
        $_SESSION['c_pass_err'] = 'Wrong Current Password';
    }
}
if(empty($password)){
    $flag = true;
    $_SESSION['pass_err'] = 'Please Enter New Password';
}
if(empty($confirm_password)){
    $flag = true;
    $_SESSION['conpass_err'] = 'Please Enter Confirm Password';

} else {
    if($password != $confirm_password) {
        $flag = true;
        $_SESSION['conpass_err'] = 'Password & confirm password does not match';
    }
}

if($flag){
    header('location:profile.php');
} else {
    $update = "UPDATE users2 SET password ='$after_hash' WHERE id=$id";
mysqli_query($db_connection, $update);

$_SESSION['pass_update'] = 'password Has Changed!';
header('location:profile.php');


}
