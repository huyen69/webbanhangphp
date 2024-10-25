<?php
session_start();
include('../db/connect.php'); 

// Handle order cancellation
if (isset($_GET['huydon']) && isset($_GET['magiaodich'])) {
    $huydon = $_GET['huydon'];
    $magiaodich = $_GET['magiaodich'];
    $sql_update_donhang = mysqli_query($con, "UPDATE tbl_donhang SET huydon='$huydon' WHERE mahang='$magiaodich'");
    $sql_update_giaodich = mysqli_query($con, "UPDATE tbl_giaodich SET huydon='$huydon' WHERE magiaodich='$magiaodich'");
}

?>
<!-- top Products -->
<div class="ads-grid py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">Xem đơn hàng</h3>
        <!-- //tittle heading -->
        <div class="row">
            <!-- product left -->
            <div class="agileinfo-ads-display col-lg-9">
                <div class="wrapper">
                    <!-- first section -->

                    <div class="row">
                        <?php
                        if (isset($_SESSION['dangnhap_home'])) {
                            echo 'Đơn hàng : ' . $_SESSION['dangnhap_home'];
                        }
                        ?>
                        <div class="col-md-12">
                            <?php
                            // Debug: Check if customer ID is set
                            if (isset($_GET['khachhang'])) {
                                $id_khachhang = $_GET['khachhang'];
                            } else {
                                $id_khachhang = '';
                            }
                            // Debug: Check the customer ID
                            echo "Customer ID: " . $id_khachhang;
                            $sql_select = mysqli_query($con, "SELECT magiaodich, MIN(ngaythang) as ngaythang FROM tbl_giaodich WHERE khachhang_id='$id_khachhang' GROUP BY magiaodich");
                            // Debug: Check number of rows fetched
                            echo "Number of orders: " . mysqli_num_rows($sql_select);
                            ?>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Thứ tự</th>
                                    <th>Mã giao dịch</th>
                                    <th>Ngày đặt</th>
                                    <th>Quản lý</th>
                                    <th>Tình trạng</th>
                                    <th>Yêu cầu</th>
                                </tr>
                                <?php
                                $i = 0;
                                while ($row_donhang = mysqli_fetch_array($sql_select)) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row_donhang['magiaodich']; ?></td>
                                        <td><?php echo $row_donhang['ngaythang']; ?></td>
                                        <td><a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>&magiaodich=<?php echo $row_donhang['magiaodich'] ?>">Xem chi tiết</a></td>
                                        <td>
                                            <?php
                                            $sql_tinhtrang = mysqli_query($con, "SELECT tinhtrangdon FROM tbl_donhang WHERE mahang='" . $row_donhang['magiaodich'] . "' LIMIT 1");
                                            $row_tinhtrang = mysqli_fetch_array($sql_tinhtrang);
                                            if ($row_tinhtrang['tinhtrangdon'] == 0) {
                                                echo 'Đã đặt hàng';
                                            } else {
                                                echo 'Đã xử lý | Đang giao hàng';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($row_donhang['huydon'] == 0) {
                                            ?>
                                                <a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>&magiaodich=<?php echo $row_donhang['magiaodich'] ?>&huydon=1">Yêu cầu hủy</a>
                                            <?php
                                            } elseif ($row_donhang['huydon'] == 1) {
                                            ?>
                                                <p>Đang chờ hủy...</p>
                                            <?php
                                            } else {
                                                echo 'Đã hủy';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>

                        <div class="col-md-12">
                            <p>Chi tiết đơn hàng</p><br>
                            <?php
                            if (isset($_GET['magiaodich'])) {
                                $magiaodich = $_GET['magiaodich'];
                            } else {
                                $magiaodich = '';
                            }
                            $sql_select = mysqli_query($con, "SELECT * FROM tbl_giaodich INNER JOIN tbl_khachhang ON tbl_giaodich.khachhang_id=tbl_khachhang.khachhang_id INNER JOIN tbl_sanpham ON tbl_giaodich.sanpham_id=tbl_sanpham.sanpham_id WHERE tbl_giaodich.magiaodich='$magiaodich' ORDER BY tbl_giaodich.giaodich_id DESC");
                            ?>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Thứ tự</th>
                                    <th>Mã giao dịch</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Ngày đặt</th>
                                </tr>
                                <?php
                                $i = 0;
                                while ($row_donhang = mysqli_fetch_array($sql_select)) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row_donhang['magiaodich']; ?></td>
                                        <td><?php echo $row_donhang['sanpham_name']; ?></td>
                                        <td><?php echo $row_donhang['soluong']; ?></td>
                                        <td><?php echo $row_donhang['ngaythang']; ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <!-- //first section -->
                </div>
            </div>
            <!-- //product left -->
            <!-- product right -->
        </div>
    </div>
</div>
<!-- //top products -->
