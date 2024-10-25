<?php
include('../db/connect.php');

// Disable ONLY_FULL_GROUP_BY mode for the current session
mysqli_query($con, "SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");

if (isset($_POST['capnhatdonhang'])) {
    $xuly = $_POST['xuly'];
    $mahang = $_POST['mahang_xuly'];
    $sql_update_donhang = mysqli_query($con, "UPDATE tbl_donhang SET tinhtrang='$xuly' WHERE mahang='$mahang'");
    $sql_update_giaodich = mysqli_query($con, "UPDATE tbl_giaodich SET tinhtrangdon='$xuly' WHERE magiaodich='$mahang'");

    if (!$sql_update_donhang || !$sql_update_giaodich) {
        echo "Error updating records: " . mysqli_error($con);
    }
}

if (isset($_GET['xoadonhang'])) {
    $mahang = $_GET['xoadonhang'];
    $sql_delete = mysqli_query($con, "DELETE FROM tbl_donhang WHERE mahang='$mahang'");
    if ($sql_delete) {
        header('Location: xulydonhang.php');
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}

if (isset($_GET['xacnhanhuy']) && isset($_GET['mahang'])) {
    $huydon = $_GET['xacnhanhuy'];
    $magiaodich = $_GET['mahang'];
    $sql_update_donhang = mysqli_query($con, "UPDATE tbl_donhang SET huydon='$huydon' WHERE mahang='$magiaodich'");
    $sql_update_giaodich = mysqli_query($con, "UPDATE tbl_giaodich SET huydon='$huydon' WHERE magiaodich='$magiaodich'");

    if (!$sql_update_donhang || !$sql_update_giaodich) {
        echo "Error updating records: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đơn hàng</title>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
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
                <!-- <li class="nav-item">
                    <a class="nav-link" href="xulydanhmucbaiviet.php">Danh mục bài viết</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="xulybaiviet.php">Bài viết</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="xulykhachhang.php">Khách hàng</a>
                </li>
            </ul>
        </div>
    </nav><br><br>
    <div class="container-fluid">
        <div class="row">
            <?php
                if (isset($_GET['quanly']) && $_GET['quanly'] == 'capnhattrangthai') {
                    $trangthai = $_GET['trangthai'];
                    $mahang = $_GET['mahang'];
                    $sql_update2 = mysqli_query($con, "UPDATE tbl_donhang SET huydon=1 WHERE mahang='$mahang'");

                    // var_dump("UPDATE tbl_donhang SET huydon=1 WHERE mahang='$mahang'");
                    // die();
                }
            ?>
            <?php
            if (isset($_GET['quanly']) && $_GET['quanly'] == 'xemdonhang') {
                $mahang = $_GET['mahang'];
                $sql_chitiet = mysqli_query($con, "SELECT * FROM tbl_donhang, tbl_sanpham WHERE tbl_donhang.sanpham_id=tbl_sanpham.sanpham_id AND tbl_donhang.mahang='$mahang'");
            ?>
                <div class="col-md-7">
                    <p>Xem chi tiết đơn hàng</p>
                    <form action="" method="POST">
                        <table class="table table-bordered ">
                            <tr>
                                <th>Thứ tự</th>
                                <th>Mã hàng</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Tổng tiền</th>
                                <th>Ngày đặt</th>
                            </tr>
                            <?php
                            $i = 0;
                            while ($row_donhang = mysqli_fetch_array($sql_chitiet)) {
                                $i++;
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row_donhang['mahang']; ?></td>
                                    <td><?php echo $row_donhang['sanpham_name']; ?></td>
                                    <td><?php echo $row_donhang['soluong']; ?></td>
                                    <td><?php echo number_format($row_donhang['sanpham_giakhuyenmai'], 0, ',', '.'); ?></td>
                                    <td><?php echo number_format(($row_donhang['soluong'] * $row_donhang['sanpham_giakhuyenmai']), 0, ',', '.')  ?></td>
                                    <td><?php echo $row_donhang['ngaythang'] ?></td>
                                    <input type="hidden" name="mahang_xuly" value="<?php echo $row_donhang['mahang'] ?>">
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <select class="form-control" name="xuly">
                            <option value="1">Đã xử lý | Giao hàng</option>
                            <option value="0">Chưa xử lý</option>
                        </select><br>
                        <input type="submit" value="Cập nhật đơn hàng" name="capnhatdonhang" class="btn btn-success">
                    </form>
                </div>
            <?php
            } else {
            ?>
                <div class="col-md-7">
                    <p>Đơn hàng</p>
                </div>
            <?php
            }
            ?>
            <div class="col-md-5">
                <h4>Liệt kê đơn hàng</h4>
                <?php
                $sql_select = mysqli_query($con, "
                    SELECT mahang, MAX(tbl_sanpham.sanpham_id) AS sanpham_id, tinhtrang, name, ngaythang, note, huydon 
                    FROM tbl_sanpham, tbl_khachhang, tbl_donhang 
                    WHERE tbl_donhang.sanpham_id=tbl_sanpham.sanpham_id 
                    AND tbl_donhang.khachhang_id=tbl_khachhang.khachhang_id 
                    GROUP BY mahang, tinhtrang, name, ngaythang, note, huydon
                ");
                ?>
                <table class="table table-bordered ">
                    <tr>
                        <th>Thứ tự</th>
                        <th>Mã hàng</th>
                        <th>Tình trạng đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Ngày đặt</th>
                        <th>Ghi chú</th>
                        <th>Hủy đơn</th>
                        <th>Quản lý</th>
                    </tr>
                    <?php
                    $i = 0;
                    while ($row_donhang = mysqli_fetch_array($sql_select)) {
                        $i++;
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row_donhang['mahang']; ?></td>
                            <td><?php
                                if ($row_donhang['tinhtrang'] == 0) {
                                    echo 'Chưa xử lý';
                                } else {
                                    echo 'Đã xử lý';
                                }
                                ?></td>
                            <td><?php echo $row_donhang['name']; ?></td>
                            <td><?php echo $row_donhang['ngaythang'] ?></td>
                            <td><?php echo $row_donhang['note'] ?></td>
                            <td><?php
                                if ($row_donhang['huydon'] == 0) {
                                    echo 'Không hủy';
                                } elseif ($row_donhang['huydon'] == 1) {
                                    echo '<a href="xulydonhang.php?quanly=xemdonhang&mahang=' . $row_donhang['mahang'] . '&xacnhanhuy=2">Xác nhận hủy đơn</a>';
                                } else {
                                    echo 'Đã hủy';
                                }
                                ?></td>
                            <td>
                                <a href="xulydonhang.php?quanly=xemdonhang&mahang=<?php echo $row_donhang['mahang']; ?>">Xem đơn hàng</a>
                                <a href="xulydonhang.php?quanly=capnhattrangthai&trangthai=huy&mahang=<?php echo $row_donhang['mahang'] ?>">Hủy</a>
                        
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
