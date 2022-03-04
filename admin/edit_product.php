<?php
    require 'db/connect.php';
?>
<?php
        $MSHH=$_GET['MSHH'];
        $query=mysqli_query($con,"SELECT hanghoa.MSHH,hanghoa.TenHH, hanghoa.QuyCach,hanghoa.Gia,hanghoa.SoLuongHang, hanghoa.HinhDaiDien, hinhhanghoa.Hinh, hanghoa.MaLoaiHang
        from hanghoa, hinhhanghoa
        where hanghoa.MSHH='$MSHH'");
        $row=mysqli_fetch_assoc($query);
?>

<?php
if(!empty($_POST)){
    $masp = $_POST['masp'];
    $tensp = $_POST['tensp'];
    $quycach = $_POST['quycach'];
    $giasp = $_POST['giasp'];
    $sluongsp = $_POST['sluongsp'];
    $loaisp = $_POST['loaisp'];
    $file = $_FILES['hinhsp']['name'];
    $sql = "UPDATE hanghoa SET MSHH='$MSHH', TenHH='$tensp', QuyCach='$quycach', Gia='$giasp', SoLuongHang='$sluongsp', MaLoaiHang='$loaisp'
            WHERE MSHH='$MSHH'";
    $result1= $con->query($sql);

    $duongdan= 'img/'.$file;
    move_uploaded_file($_FILES['hinhsp']['tmp_name'], $duongdan);
    $sql_edit = " UPDATE hinhhanghoa SET Hinh='$duongdan'
            WHERE MSHH='$MSHH'";
    $result2= $con->query($sql_edit);
    if($result1==true  ){
        header('Location: list_product.php');
    }
    else{
        echo'sửa không thành công';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sản phẩm</title>
    <link rel="stylesheet" href="index1.css">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>                                        

    <!-- The sidebar -->
        <div class="sidebar">
            <h2 style="height:60px ; text-align: center; padding: 10px 0; font-family:sans-serif">ADMIN</h2>
            <a  href="index.php">Home</a>
            <a class="active" href="#news">Quản lý sản phẩm</a>
            <a href="emp/index.php">Quản lý nhân viên</a>
        </div>
        <?php include ("header.php")?>
<div class="wrapper">
    <div class="content">
        <div class="content-wrapper" >
            <form id="form-add" method="POST" role="form " enctype="multipart/form-data" >
                <div class="title" style="color: blue; padding: 0 100px">
                    <h2>Cập nhật sản phẩm</h2 >
                </div>
                <div class="update-info">
                    <div class="form-group">
                        <label >Mã sản phẩm</label>
                        <input type="text " value="<?php echo $row['MSHH'];?> " class="form-control" name="masp" required>
                    </div>
                    <div class="form-group">
                        <label >Tên sản phẩm</label>
                        <input type="text" value="<?php echo $row['TenHH'];?>" class="form-control"  name="tensp" required >
                    </div>
                    <div class="form-group">
                        <label >Quy cách</label>
                        <input type="text" value="<?php echo $row['QuyCach'];?>" class="form-control" name="quycach" required>
                    </div> 
                    <div class="form-group">
                        <label >Giá sản phẩm</label>
                        <input type="text " value="<?php echo $row['Gia'];?> " class="form-control" name="giasp" required>
                    </div>
                    <div class="form-group">
                        <label >Số lượng</label>
                        <input type="text" value="<?php echo $row['SoLuongHang'];?>" class="form-control" name="sluongsp" required>
                    </div>
                    <div class="form-group">
                        <label >Loại sản phẩm</label>
                        <select class="form-control" value="<?php echo $row['MaLoaiHang'];?>" name="loaisp" required>
                        <?php
                            $query=mysqli_query($con,'select * from loaihanghoa');
                            while($row=mysqli_fetch_array($query)){?>
                                <option value="<?php echo $row['MaLoaiHang']?>"> <?php echo $row['TenLoaiHang']?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>    
                </div>
                <div class="update-img">
                    <div class="form-group">
                        <label >Hình ảnh</label>
                        <input type="file" value="<?php echo $row['Hinh'];$row['TenHinh'];?>" class="form-control" name="hinhsp" required> 
                    </div> 
                </div>
                   
                <button name="sbm" type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

</div>
</body>
</html>




