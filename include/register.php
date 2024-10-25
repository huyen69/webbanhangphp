<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Đăng kí tài khoản</title>
</head>

<body>
    <div class="container my-3">
        <h1 class="text-center">Đăng kí tài khoản mới</h1>
        <form class="w-50 mx-auto my-5" method="POST" action="./registerprocess.php">
            
            <div class="input-group">
                <span class="input-group-text" style="width:120px">Họ tên</span>
                <input name="cus_name" type="text" class="form-control">
            </div>

            <div class="input-group mt-3">
                <span class="input-group-text" style="width:120px">Email</span>
                <input name="cus_email" type="email" class="form-control">
            </div>

            <div class="input-group mt-3">
                <span class="input-group-text" style="width:120px">SĐT</span>
                <input name="cus_phone" type="text" class="form-control">
            </div>

            <div class="input-group mt-3">
                <span class="input-group-text" style="width:120px">Địa chỉ</span>
                <input name="cus_address" type="text" class="form-control">
            </div>

            <div class="input-group mt-3">
                <span class="input-group-text" style="width:120px">Mật khẩu</span>
                <input name="cus_password" type="password" class="form-control">
            </div>

            <div class="mt-3 d-flex">
                <button type="reset" class="btn btn-danger">Nhập lại </button>
                <div class="flex-grow-1"></div>
                <button type="submit" name="submit" class="btn btn-primary">Tạo tài khoản </button>
            </div>
        </form>
    </div>
</body>

</html>