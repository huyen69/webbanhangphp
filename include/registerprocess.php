<?php 
	include_once('../db/connect.php');
if(isset($_POST['submit'])){
    $name = $_POST['cus_name'];
    $email = $_POST['cus_email'];
    $phone = $_POST['cus_phone'];
    $address = $_POST['cus_address'];
    $password = $_POST['cus_password'];
    if ($con->connect_error) {
        die("Kết nối thất bại: " . $con->connect_error);
    }
    // Tao cau lenh insert
    $sql = "INSERT INTO tbl_customer VALUES (NULL,'$name','$email','$password','$phone','$address')";
    echo $sql;

    // Thuc thi cau lenh
    $rs = mysqli_query($con, $sql);
    if($rs){
        header("Location:../index.php");
    }
    else{
        die("Đăng kí thất bại!");
    }
}