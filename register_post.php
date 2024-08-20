<?php
session_start();

require 'db.php';



$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$after_hash = password_hash($password, PASSWORD_DEFAULT);
$confirm_password = $_POST['confirm_password'];
$division = $_POST['division'];
$gender = $_POST['gender'];

$upper = preg_match('@[A-Z]@', $password);
$lower = preg_match('@[a-z]@', $password);
$number = preg_match('@[0-9]@', $password);
$spsl = preg_match('@[#,$,^,&,*]@', $password);

$flag = false;

if(empty($name)){
    $flag = true;
   
   $_SESSION['name_err'] = 'Please Enter Your Name';
}
else{
    $_SESSION['name'] = $name;

}

if(empty($email)){
    $flag = true;
    $_SESSION['email_err'] = 'Please Enter Your Email';

}
else{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $flag = true;
        $_SESSION['email_err'] = 'Please Enter valid Email';
    }
    else{
        $_SESSION['email'] = $email;
    }
}

if(empty($password)){
    $flag = true;
    $_SESSION['pass_err'] = 'Please Enter Your password';
}
else{
    if(!$upper || !$lower - !$number || !$spsl || strlen($password) < 8){
        $flag = true;
        $_SESSION['pass_err'] = 'Password contains uppercase, lowercase, number, special charecter and min 8 digit';
    }
}
    if(empty($confirm_password)){
        $flag = true;
        $_SESSION['conpass_err'] = 'Please Enter Confirm Password';
    }
    else {
        if($password != $confirm_password){
            $flag = true;
            $_SESSION['conpass_err'] = 'Password and confirm password does not match';
        }

}
if(empty($division)){
    $flag = true;
    $_SESSION['division_err'] = 'Please Select Your Division';
}
else{
    $_SESSION['division'] = $division;

}   
if(empty($gender)){
    $flag = true;
    $_SESSION['gender_err'] = 'Please Select Your Gender';
}
else{
    $_SESSION['gender'] = $gender;

}   
if($flag == true){
      header('location:register.php');
}
else{
  
    $insert = "INSERT INTO users2 (name, email, password, division, gender)VALUES('$name', '$email', '$after_hash', '$division', '$gender')";
    mysqli_query($db_connection, $insert);
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    unset($_SESSION['division']);
    unset($_SESSION['gender']);
   
    $_SESSION['success'] = 'User Register Sucessfuly';
    header ('location:register.php');
}

?>
