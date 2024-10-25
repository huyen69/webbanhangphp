<?php
	session_start();
?>

<?php
	include_once('../db/connect.php');
 ?>

<?php
    $email = $_POST["email"];
    $password = $_POST['password'];
    $sql_khachhang = mysqli_query($con, "SELECT * FROM tbl_customer WHERE email='$email' and password='$password'");
    $result = mysqli_fetch_array($sql_khachhang);

    if ($result == null) {
        echo "Sai tài khoản hoặc mật khẩu";
    } else {
        $_SESSION['email'] = $email;
        header("Location: success.php");
    }