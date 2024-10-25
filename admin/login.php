<!-- <?php
	session_start();
 include('../db/connect.php'); 
?> -->
<?php
	// session_destroy();
	// unset('dangnhap');
	if(isset($_POST['dangnhap'])) {
		$taikhoan = $_POST['taikhoan'];
		$matkhau = $_POST['matkhau'];
		if($taikhoan=='' || $matkhau ==''){
			echo '<p>Xin nhập đủ</p>';
		}else{
			$sql_select_admin = mysqli_query($con,"SELECT * FROM tbl_admin WHERE email='$taikhoan' AND password='$matkhau'");
			$row_dangnhap = mysqli_fetch_assoc($sql_select_admin);

			echo '<pre>';
			print_r($row_dangnhap);

			
			if(isset($row_dangnhap)){
				$_SESSION['email'] = $row_dangnhap['email'];
				$_SESSION['admin_pass'] = $row_dangnhap['password'];
				$_SESSION['dangnhap'] = true;
				// var_dump(99);
				header('Location: ./dashboard.php');
			}else{
				echo '<p>Tài khoản hoặc mật khẩu sai</p>';
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng nhập Admin</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<h2 >Đăng nhập Admin</h2>
	<div class="col-md-6">
	<div class="form-group">
		<form action="" method="POST">
		<label>Tài khoản</label>
		<input type="text" name="taikhoan" placeholder="Điền Email" class="form-control"><br>
		<label>Mật khẩu</label>
		<input type="password" name="matkhau" placeholder="Điền mật khẩu" class="form-control"><br>
		<input type="submit" name="dangnhap" class="btn btn-primary" value="Đăng nhập Admin">
		</form>
	</div>
	</div>
</body>
</html>