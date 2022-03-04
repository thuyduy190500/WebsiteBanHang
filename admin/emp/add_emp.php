<?php
require '../db/connect.php';
if(!empty($_POST)){
    $manv = $_POST['manv'];
    $tennv = $_POST['tennv'];
    $chucvu = $_POST['chucvu'];
    $diachi = $_POST['diachi'];
    $sdt = $_POST['sdt'];
    $sql = "INSERT INTO nhanvien value ('$manv','$tennv','$chucvu','$diachi','$sdt')";
    $result= $con->query($sql);
    if($result==true  ){
        header('Location: index.php');
    }
    else{
        echo '<script> alert("Thêm không thành công");</script>';
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../index1.css">

</head>
<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>                                        

    <!-- <div class="container-fluid"> -->
        <!-- The sidebar -->
        <div class="sidebar">
            <h2 style="height:60px ; text-align: center; padding: 10px 0; font-family:sans-serif">ADMIN</h2>
            <a  href="../index.php">Home</a>
            <a  href="../list_product.php">Quản lý sản phẩm</a>
            <a class="active" href="#contact">Quản lý nhân viên</a>
        </div>
        <?php include ("../header.php")?>


        <!-- Page content -->
        <div class="content">
            <div class="content-wrapper">
            <form id="form-add" method="POST" role="form " enctype="multipart/form-data" >
                <div class="title" style="color: blue; padding: 0 100px">
                    <h2>Thêm nhân viên</h2 >
                </div>
                <div class="update-info">
                    <div class="form-group">
                        <label >Mã nhân viên</label>
                        <input type="text "  class="form-control" name="manv" required>
                    </div>
                    <div class="form-group">
                        <label >Họ tên nhân viên</label>
                        <input type="text"  class="form-control"  name="tennv" required >
                    </div>
                    <div class="form-group">
                        <label >Chức vụ</label>
                        <input type="text" class="form-control" name="chucvu" required>
                    </div> 
                    <div class="form-group">
                        <label >Địa chỉ</label>
                        <input type="text "  class="form-control" name="diachi" required>
                    </div>
                    <div class="form-group">
                        <label >Số điện thoại</label>
                        <input type="text"  class="form-control" name="sdt" required>
                    </div>
                     
                </div>
                <button name="sbm" type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
        </div>
    <!-- </div> -->
</body>
</html>