<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = '';
}

$sql_cate = mysqli_query($con, "SELECT tbl_sanpham.*, tbl_category.category_name 
                                FROM tbl_category 
                                INNER JOIN tbl_sanpham 
                                ON tbl_category.category_id = tbl_sanpham.category_id 
                                WHERE tbl_sanpham.category_id = '$id' 
                                ORDER BY tbl_sanpham.sanpham_id DESC");

$row_title = mysqli_fetch_array($sql_cate);
$title = isset($row_title['category_name']) ? $row_title['category_name'] : 'Danh mục sản phẩm';		
?>
<div class="ads-grid py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3"><?php echo $title ?></h3>
        <div class="row">
            <div class="agileinfo-ads-display col-lg-9">
                <div class="wrapper">
                    <div class="product-sec1 px-sm-4 px-3 py-sm-5 py-3 mb-4">
                        <div class="row">
                            <?php
                            mysqli_data_seek($sql_cate, 0);
                            while ($row_sanpham = mysqli_fetch_array($sql_cate)) {
                                $price = number_format($row_sanpham['sanpham_gia'], 0, ',', '.') . ' VNĐ';
                                $discount_price = number_format($row_sanpham['sanpham_giakhuyenmai'], 0, ',', '.') . ' VNĐ';
                            ?>
                            <div class="col-md-4 product-men mt-5">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item text-center">
                                        <img src="images/<?php echo $row_sanpham['sanpham_image'] ?>" alt style="height: auto;width: 189px; display:flex;">
                                        <div class="men-cart-pro">
                                            <div  class="inner-men-cart-pro">
                                                <a  href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>" class="link-product-add-cart">Preview</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info-product text-center border-top mt-4">
                                        <h4 class="pt-1">
                                            <a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>"><?php echo $row_sanpham['sanpham_name'] ?></a>
                                        </h4>
                                        <div class="info-product-price my-2" style="display: grid;">
                                            <span class="item_price"><?php echo $discount_price ?></span>
                                            <del><?php echo $price ?></del>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                            <form action="?quanly=giohang" method="post">
                                                <fieldset>
                                                    <input type="hidden" name="tensanpham" value="<?php echo $row_sanpham['sanpham_name'] ?>" />
                                                    <input type="hidden" name="sanpham_id" value="<?php echo $row_sanpham['sanpham_id'] ?>" />
                                                    <input type="hidden" name="giasanpham" value="<?php echo $row_sanpham['sanpham_gia'] ?>" />
                                                    <input type="hidden" name="hinhanh" value="<?php echo $row_sanpham['sanpham_image'] ?>" />
                                                    <input type="hidden" name="soluong" value="1" />			
                                                    <input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button" />
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
                <div class="side-bar p-sm-4 p-3">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-xl-4 py-lg-2">
    <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">Danh mục</h3>
    <div class="row">
        <div class="agileinfo-ads-display col-lg-9">
            <div class="wrapper">
                <div class="product-sec1 px-sm-4 px-3 py-sm-5 py-3 mb-4">
                    <div class="row">
                        <?php
                        mysqli_data_seek($sql_cate, 0);
                        while ($row_cate = mysqli_fetch_array($sql_cate)) {
                            $price = number_format($row_cate['sanpham_gia'], 0, ',', '.') . ' VNĐ';
                            $discount_price = number_format($row_cate['sanpham_giakhuyenmai'], 0, ',', '.') . ' VNĐ';
                        ?>
                        <div class="col-md-4 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item text-center">
                                    <img src="images/<?php echo $row_cate['sanpham_image'] ?>" alt style="height:auto; width:189px;">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="?quanly=chitietsp&id=<?php echo $row_cate['sanpham_id'] ?>" class="link-product-add-cart">Preview</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info-product text-center border-top mt-4">
                                    <h4 class="pt-1">
                                        <a href="?quanly=chitietsp&id=<?php echo $row_cate['sanpham_id'] ?>"><?php echo $row_cate['sanpham_name'] ?></a>
                                    </h4>
                                    <div class="info-product-price my-2">
                                        <span class="item_price"><?php echo $discount_price ?></span>
                                        <del><?php echo $price ?></del>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <form action="?quanly=giohang" method="post">
                                            <fieldset>
                                                <input type="hidden" name="tensanpham" value="<?php echo $row_cate['sanpham_name'] ?>" />
                                                <input type="hidden" name="sanpham_id" value="<?php echo $row_cate['sanpham_id'] ?>" />
                                                <input type="hidden" name="giasanpham" value="<?php echo $row_cate['sanpham_gia'] ?>" />
                                                <input type="hidden" name="hinhanh" value="<?php echo $row_cate['sanpham_image'] ?>" />
                                                <input type="hidden" name="soluong" value="1" />			
                                                <input type="submit" name="themgiohang" value="Add to cart" class="button" />
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>	
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
            <div class="side-bar p-sm-4 p-3">
            </div>
        </div>
    </div>
</div>
