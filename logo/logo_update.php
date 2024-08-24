<?php 
session_start();
require '../db.php';
$header_logo = $_FILES['header_logo'];
$footer_logo = $_FILES['footer_logo'];


if($header_logo['name'] != ''){
  $after_explode = explode('.', $header_logo['name']);
  $extension = end($after_explode);
  $allowed_extension = array('png', 'webp', 'gif');
  if(in_array($extension, $allowed_extension)){


  } 
  else{
    $_SESSION['er'] = 'Only png, webp, and gif formate are allowed';
    header('location:logo.php');
  }

}
?>