<?php 
session_start();
require 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$flag = false;

if(empty($email)){
    $flag = true;
    $_SESSION['eml_err'] = 'Please Enter Email';
}
else{
    $select = "SELECT COUNT(*) as total FROM users2 WHERE email='$email'";
    $select_res = mysqli_query($db_connection, $select);
    $after_assoc = mysqli_fetch_assoc($select_res);
    if($after_assoc['total'] != 1 ){
        $flag = true;
        $_SESSION['eml_err'] = 'Email Does Not Exist';
    }
} 


if(empty($password)){
    $flag = true;
    $_SESSION['pass_err'] = 'Please Enter Password';
}
else{
    $select = "SELECT * FROM users2 WHERE email='$email'";
    $select_res = mysqli_query($db_connection, $select);
    $after_assoc= mysqli_fetch_assoc($select_res);
    if(!password_verify($password, $after_assoc['password'])){
        $flag = true;
        $_SESSION['pass_err'] = 'Wrong Password';
    }
}



if($flag){
    header('location:login.php');
}
else{
    $_SESSION['login_korchi'] = 'Ami Login kore aschi';
    $_SESSION['logged_id'] =  $after_assoc['id'];
    header('location:dashboard.php');
}

?>