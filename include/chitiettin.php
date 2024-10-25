<?php
include('../db/connect.php'); // Đảm bảo rằng tập tin connect.php đã tồn tại và thiết lập kết nối

$id_baiviet = isset($_GET['id_tin']) ? $_GET['id_tin'] : '';

if(!empty($id_baiviet)) {
    $sql_tenbaiviet1 = mysqli_query($con, "SELECT * FROM tbl_baiviet WHERE baiviet_id='$id_baiviet'");
    if(mysqli_num_rows($sql_tenbaiviet1) > 0) {
        $row_bai1 = mysqli_fetch_array($sql_tenbaiviet1);
?>
<!-- page -->
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="../index.php">Trang chủ</a>
                    <i>|</i>
                </li>
                <li><?php echo $row_bai1['tenbaiviet'] ?> </li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->
<!-- about -->
<div class="welcome py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3"><?php echo $row_bai1['tenbaiviet'] ?></h3>
        <!-- //tittle heading -->
        <?php
        $sql_baiviet = mysqli_query($con, "SELECT * FROM tbl_baiviet WHERE baiviet_id='$id_baiviet'");
        $row_baiviet = mysqli_fetch_array($sql_baiviet);
        ?>
        <div class="row">
            <div class="col-lg-12 welcome-left">
                <h5><?php echo $row_baiviet['tenbaiviet'] ?></h5>
                <h4 class="my-sm-3 my-2"><?php echo $row_baiviet['tomtat'] ?></h4>
                <p><?php echo $row_baiviet['noidung'] ?></p>
            </div>
        </div><br>
    </div>
</div>
<!-- //about -->
<?php
    } 
} 
?>
