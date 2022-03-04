<?php
        require '../db/connect.php';
        $MSNV=$_GET['MSNV'];
        $query=mysqli_query($con,"SELECT * FROM nhanvien where MSNV='$MSNV'");
        $row=mysqli_fetch_assoc($query);
?>

<?php
if(!empty($_POST)){
    $manv = $_POST['manv'];
    $tennv = $_POST['tennv'];
    $chucvu = $_POST['chucvu'];
    $diachi = $_POST['diachi'];
    $sdt = $_POST['sdt'];
    $sql = "DELETE FROM nhanvien
            WHERE MSNV='$MSNV'";
    $result= $con->query($sql);
    if($result==true  ){
        header('Location: index.php');
    }
    else{
        echo '<script> alert("Xóa không thành công");</script>';
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa nhân viên</title>
    <link rel="stylesheet" href="../index1.css">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>                                        
    <div class="sidebar">
        <h2 style="height:60px ; text-align: center; padding: 10px 0; font-family:sans-serif">ADMIN</h2>
        <a  href="../index.php">Home</a>
        <a  href="../list_product.php">Quản lý sản phẩm</a>
        <a class="active" href="#contact">Quản lý nhân viên</a>
    </div>
    <?php include ("../header.php")?>

<div class="wrapper">
    <div class="content">
        <div class="content-wrapper" >
            <form id="form-add" method="POST" role="form " enctype="multipart/form-data" >
                <div class="title" style="color: blue; padding: 0 100px">
                    <h2>Xóa nhân viên</h2 >
                </div>
                <div class="update-info">
                    <div class="form-group">
                        <label >Mã nhân viên</label>
                        <input type="text " value="<?php echo $row['MSNV'];?> " class="form-control" name="manv" required>
                    </div>
                    <div class="form-group">
                        <label >Họ tên nhân viên</label>
                        <input type="text" value="<?php echo $row['HoTenNV'];?>" class="form-control"  name="tennv" required >
                    </div>
                    <div class="form-group">
                        <label >Chức vụ</label>
                        <input type="text" value="<?php echo $row['ChucVu'];?>" class="form-control" name="chucvu" required>
                    </div> 
                    <div class="form-group">
                        <label >Địa chỉ</label>
                        <input type="text " value="<?php echo $row['DiaChi'];?> " class="form-control" name="diachi" required>
                    </div>
                    <div class="form-group">
                        <label >Số điện thoại</label>
                        <input type="text" value="<?php echo $row['SoDienThoai'];?>" class="form-control" name="sdt" required>
                    </div>
                     
                </div>
                <button name="sbm" type="submit" class="btn btn-primary">Xóa</button>
            </form>
        </div>
    </div>

</div>
</body>
</html>




