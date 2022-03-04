<?php
require 'db/connect.php';
$masp=$tensp=$loaisp=$giasp=$quycach=$sluongsp='';
if(!empty($_POST)){
    $masp = $_POST['masp'];
    $tensp = $_POST['tensp'];
    $loaisp = $_POST['loaisp'];
    $giasp = $_POST['giasp'];
    $quycach = $_POST['quycach'];
    $sluongsp = $_POST['sluongsp'];
    $file = $_FILES['hinhsp']['name'];
    $duongdan= 'img/'.$file;
    move_uploaded_file($_FILES['hinhsp']['tmp_name'], $duongdan);
    $sql = "insert into hanghoa (MSHH, TenHH, QuyCach, Gia, SoLuongHang, MaLoaiHang, HinhDaiDien  ) values ('$masp',' $tensp', '$quycach', '$giasp','$sluongsp','$loaisp','$duongdan') ";
    $result1= $con->query($sql);
    //insert vao hinhhanghoa
    if(isset($_FILES['hinhlq'])){
        $files = $_FILES['hinhlq'];
        $file_names= $files['name'];
        foreach($file_names as $key => $value){
            move_uploaded_file($files['tmp_name'][$key],'img/'.$value);
        }
    }
    foreach($file_names as $key => $value){
        $sql_add = "insert into hinhhanghoa(MaHinh, Hinh, MSHH) values ('','$value','$masp')";
        $result2= $con->query($sql_add);
    }
    if($result1==true  ){
        header('Location: list_product.php');
    }
    else{
        echo'thêm không thành công';
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
    <link rel="stylesheet" href="index1.css">

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
            <a class="active" href="">Quản lý sản phẩm</a>
            <a href="emp/index.php">Quản lý nhân viên</a>
        </div>
        <?php include ("header.php")?>


        <!-- Page content -->
        <div class="content">
            <h3 style="text-align: center;">THÊM SẢN PHẨM</h3>
            <div class="content-wrapper">
            <form id="form-add" method="POST" role="form " enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Mã sản phẩm</label>
                    <input type="text " class="form-control" name="masp" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="text" class="form-control"  name="tensp" required >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Loại sản phẩm</label>
                    <select class="form-control" name="loaisp" required>
                    <?php
                        $sql= 'select * from loaihanghoa';
                        $category= $con->query($sql);
                        foreach($category as $item){?>
                            <option value="<?php echo $item['MaLoaiHang']?>"> <?php echo $item['TenLoaiHang']?>
                            </option>
                        <?php } ?>
                    </select>
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                    <input type="text" class="form-control" name="giasp" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                    <input type="text" class="form-control" name="quycach" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                    <input type="text" class="form-control" name="sluongsp"required >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Hình đại diện</label>
                    <input type="file" name="hinhsp"  required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Hình ảnh liên quan</label>
                    <input type="file" name="hinhlq[]" multiple="multiple" required>
                </div>
                <button name="sbm" type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
        </div>
    <!-- </div> -->
</body>
</html>