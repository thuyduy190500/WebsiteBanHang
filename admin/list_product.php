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
            <h2 >ADMIN</h2>
            <a href="index.php">Quản lý đơn đặt hàng</a>
            <a class="active" href="list_product.php">Quản lý sản phẩm</a>
            <a href="emp/index.php">Quản lý nhân viên</a>
        </div>
        <?php include ("header.php")?>


        <!-- Page content -->
        <div class="content">
            <div class="table-mg">
            <h3 style="text-align: center;">DANH SÁCH SẢN PHẨM</h3>
            <a href="add_product.php">Thêm sản phẩm</a>
                <table class="table table-striped">
                    <thead>
                        <tr> 
                            <th scope="col"><i class="fas fa-cog"></i></th>
                            <th scope="col">#</th>
                            <th scope="col">Mã sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Mã loại hàng</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Hình ảnh</th>

                        </tr>
                    </thead>
                    <?php
                        require_once('db/connect.php');
                       
                        $query=mysqli_query($con,"select hanghoa.MSHH, hanghoa.TenHH, hanghoa.MaLoaiHang, hanghoa.Gia, hanghoa.SoLuongHang,hanghoa.QuyCach, hanghoa.HinhDaiDien
                        from hanghoa");
                        $index=1;
                        while($row=mysqli_fetch_array($query)){
                    ?>
                        
                        <tr>
                            <td>
                                <a href="edit_product.php?MSHH=<?php echo $row['MSHH'];?>"><i class="fas fa-pencil-alt"></i></a>
                                <a href="delete_product.php?MSHH=<?php echo $row['MSHH'];?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                            <td><?php echo ($index++);?></td>
                            <td><?php echo $row['MSHH'];?></td>
                            <td><?php echo $row['TenHH'];?></td>
                            <td style="text-align:center"><?php echo $row['MaLoaiHang'];?></td>
                            <td><?php echo number_format ($row['Gia'],0,',','.').'vnd';?></td>
                            <td style="text-align:center"><?php echo $row['SoLuongHang'];?></td>
                            <td style= "max-width:150px; font-size:13px"><?php echo $row['QuyCach'];?></td>
                            <td ><img src=<?php echo $row['HinhDaiDien'];?> style="max-width: 120px; height:130px"/></td>
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