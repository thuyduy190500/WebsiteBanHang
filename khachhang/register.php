<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.7.2/css/all.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="wrapper bg-white">
        <div class="h2 text-center">Đăng ký </div>
        <div class="register"><i>Vui lòng điền thông tin đăng ký</i></div>
        <form method="POST">
            <div class="d-sm-flex align-items-sm-center justify-content-sm-between pt-1">
                <div class="form-group"> <label class="register ">Username</label> <input type="text" required class="form-control" name="username"> </div>
                <div class="form-group"> <label class="register ">Họ tên</label> <input type="text" required class="form-control" name="hoten"> </div>
            </div>
            <div class="d-sm-flex align-items-sm-center justify-content-sm-between pt-1">
                <div class="form-group"> <label class="register">Số điện thoại</label> <input type="tel" required class="form-control" name="sdt"> </div>
                <div class="form-group"> <label class="register">Địa chỉ</label> <input type="text" class="form-control" name="diachi"> </div>
            </div>
            <div class="form-group"> <label class="register ">Mật khẩu</label> <input type="password" required class="form-control" name="mkhau"> </div>
            <div class="form-group"> <label class="register ">Nhập lại mật khẩu</label> <input type="password" required class="form-control" name="rmkhau">  </div>
            <div class="d-flex align-items-center justify-content-sm-end button-section"> <button class="btn btn-primary mx-4" type="submit">Submit</button> <button class="btn">Cancel</button> </div>
        </form>
    </div>
    <?php
        require "../admin/db/connect.php";
        if(!empty($_POST)){
            $user = $_POST['username'];
            $tenuser = $_POST['hoten'];
            $sdt = $_POST['sdt'];
            $diachi = $_POST['diachi'];
            $mkhau = $_POST['mkhau'];
            $rmkhau = $_POST['rmkhau'];
            if(!empty($_POST)){
                if($mkhau==$rmkhau){
                    $createAccount= $con->query("INSERT INTO taikhoan values ('', '$user', '$mkhau','Thành viên') ");
                    $createUser= $con->query("INSERT INTO khachhang values ('', '$tenuser', '', '$sdt','') ");
                    $registerMSKH=mysqli_fetch_row(mysqli_query($con,"SELECT MAX(MSKH) FROM khachhang "));
                    // echo $registerMSKH[0];
                    $createAddress= $con->query("INSERT INTO diachikh values ('', '$diachi', '$registerMSKH[0]')");
                    if($createAccount==true && $createUser==true && $createAddress==true){
                        echo '<script> alert("Đăng ký thành công");</script>';
                    }
                    else echo '<script> alert("Đăng ký không thành công");</script>';
                }
                else echo '<script> alert("Mật khẩu không trùng khớp");</script>';
            }
        }
    ?>
</body>
</html>