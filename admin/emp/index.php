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
            <h2 >ADMIN</h2>
            <a  href="../index.php">Quản lý đơn đặt hàng</a>
            <a  href="../list_product.php">Quản lý sản phẩm</a>
            <a class="active" href="#">Quản lý nhân viên</a>
        </div>
        <?php include ("../header.php")?>


        <!-- Page content -->
        <div class="content">
            <div class="table-mg">
            <h3 style="text-align: center;">DANH SÁCH NHÂN VIÊN</h3>
            <a href="add_emp.php">Thêm nhân viên</a>
                <table class="table table-striped">
                    <thead>
                        <tr> 
                            <th scope="col"><i class="fas fa-cog"></i></th>
                            <th scope="col">#</th>
                            <th scope="col">Mã nhân viên</th>
                            <th scope="col">Tên nhân viên</th>
                            <th scope="col">Chức vụ</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Số điện thoại</th>
                        </tr>
                    </thead>
                    <?php
                        require_once('../db/connect.php');
                        $query=mysqli_query($con,"select * from nhanvien");
                        $index=1;
                        while($row=mysqli_fetch_array($query)){
                    ?>
                        
                        <tr>
                            <td>
                                <a href="edit_emp.php?MSNV=<?php echo $row['MSNV'];?>"><i class="fas fa-pencil-alt"></i></a>
                                <a href="delete_emp.php?MSNV=<?php echo $row['MSNV'];?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                            <td><?php echo ($index++);?></td>
                            <td><?php echo $row['MSNV'];?></td>
                            <td><?php echo $row['HoTenNV'];?></td>
                            <td><?php echo $row['ChucVu'];?></td>
                            <td><?php echo $row['DiaChi'];?></td>
                            <td><?php echo $row['SoDienThoai'];?></td>
                        </tr> 

                    <?php      
                        }
                    ?>
                </table>
           </div>
        </div>
    <!-- </div> -->
</body>
</html>