<?php 
session_start();
include_once('../db/connect.php');
if(isset($_POST['email'])){
    $email = $_POST['email'];
}
else{
    header("Location:dangnhap.php");
    die();
}

if(isset($_POST['password'])){
    $password = $_POST['password'];
}
else{
    header("dangnhap.php");
    die();
}


$sql = "SELECT * FROM tbl_customer WHERE email='$email' AND password='$password' LIMIT 1";

# Thuc thi cau lenh
$rs = mysqli_query($con, $sql);

if(mysqli_num_rows($rs) == 0){
    // Sai email hoac password 
    header("Location: ./dangnhap.php");
    // die ("<h1>Sai email hoặc password</h1>");

}
else{
    $user = mysqli_fetch_assoc($rs);
    // dang nhap thanh cong 
    $_SESSION['auth']['id'] = $user['id'];
    $_SESSION['auth']['customer'] = $user['cusName'];
    $_SESSION['auth']['email'] = $user['email'];
    // Chuyen huong ve home.php
    header("Location: ../index.php");
}