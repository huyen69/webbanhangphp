<!-- <?php
		// session_start();
		include_once('../db/connect.php');

		if (isset($_POST['login'])) {
			$email = $_POST['email'];
			$password = md5($_POST['password']);

			$sql = mysqli_query($con, "SELECT * FROM tbl_khachhang WHERE email='$email' AND password='$password'");
			$count = mysqli_num_rows($sql);

			if ($count > 0) {
				$row = mysqli_fetch_array($sql);
				$_SESSION['email'] = $row['email'];
				$_SESSION['dangnhap_home'] = $row['name'];
				$_SESSION['khachhang_id'] = $row['khachhang_id'];
				header('Location: cart.php'); // Chuyển hướng lại trang giỏ hàng
				exit();
			} else {
				echo "Email hoặc mật khẩu không đúng!";
			}
		}
		?> -->

<!-- HTML của trang đăng nhập -->
<!-- <!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập</h2>
    <form action="" method="post">
        <input type="text" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mật khẩu" required>
        <input type="submit" name="login" value="Đăng nhập">
    </form>
</body>
</html> -->
<!-- modals -->
<!-- log in -->
<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-center">Log In</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="include/modallogincheck.php" method="post">
					<div class="form-group">
						<label class="col-form-label">Email</label>
						<input type="text" class="form-control" placeholder=" " name="email" required="">
					</div>
					<div class="form-group">
						<label class="col-form-label">Password</label>
						<input type="password" class="form-control" placeholder=" " name="password" required="">
					</div>
					<div class="right-w3l">
						<input type="submit" class="form-control" value="Log in">
					</div>
					<div class="sub-w3l">
						<div class="custom-control custom-checkbox mr-sm-2">
							<input type="checkbox" class="custom-control-input" id="customControlAutosizing">
							<label class="custom-control-label" for="customControlAutosizing">Remember me?</label>
						</div>
					</div>
					<p class="text-center dont-do mt-3">Don't have an account?
						<a href="#" data-toggle="modal" data-target="#exampleModal2">
							Register Now</a>
					</p>
				</form>
			</div>
		</div>
	</div>
</div>