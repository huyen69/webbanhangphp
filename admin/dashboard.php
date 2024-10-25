<?php
session_start();
if (!isset($_SESSION['dangnhap'])) {
	header('Location: login.php');
}
if (isset($_GET['login'])) {
	$dangxuat = $_GET['login'];
} else {
	$dangxuat = '';
}
if ($dangxuat == 'dangxuat') {
	session_destroy();
	header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Welcome Admin</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!--icon-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
	<p>Xin chào : <?php echo $_SESSION['dangnhap'] ?> <a href="?login=dangxuat">Đăng xuất</a></p>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="xulydonhang.php">Đơn hàng <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="xulydanhmuc.php">Danh mục</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="xulysanpham.php">Sản phẩm</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Khách hàng</a>
				</li>

			</ul>
		</div>

	</nav>
	<div class="col-lg-12" id="main-content">
		<div class="row">
			<div class="col-lg-3 text-center">
				<i style="     margin: 50px;
    padding: 50px 50px;
    font-size: 20px;font-size: 20px;color: green; background: darkseagreen;     margin-bottom: 15px;" class="fa-solid fa-cart-plus"></i>
				<p style=" color: darkblue; font-size: 20px;"><span style="    color: crimson;font-size: 24px;">89</span> Đơn hàng chưa xử lí</p>
			</div>
			<div class="col-lg-3 text-center">
				<i style="    margin: 50px;
    padding: 50px 50px;
    font-size: 20px;font-size: 20px; color: green;background: aquamarine;     margin-bottom: 15px;" class="fa-solid fa-cart-plus"></i>
				<p style=" color: darkblue;font-size: 20px;"><span style="    color: crimson;font-size: 24px;">115</span> Sản phẩm sắp hết hàng</p>

			</div>
			<div class="col-lg-3 text-center">
				<i style="    margin: 50px;
    padding: 50px 50px;
    font-size: 20px;font-size: 20px;color: white;background: darkcyan;     margin-bottom: 15px;" class="fa-solid fa-truck-arrow-right"></i>
				<p style=" color: darkblue;font-size: 20px;"><span style="    color: crimson;font-size: 24px;">115K</span> Đang vận chuyển </p>

			</div>
			<div class="col-lg-3 text-center">
				<i style="    margin: 50px;
    padding: 50px 50px;
    font-size: 20px;font-size: 20px;color: blueviolet;background: indigo;   margin-bottom: 15px;" class="fa-solid fa-cart-plus"></i>
				<p style=" color: darkblue;font-size: 20px;"><span style="    color: crimson;font-size: 24px;">98</span> Tổng sản phẩm</p>
			</div>
		</div>

	</div>
</body>

</html>