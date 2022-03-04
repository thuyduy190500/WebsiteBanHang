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
            <h2 class="ad_title" style="">ADMIN</h2>
            <a class="active" href="#home">Quản lý đơn đặt hàng</a>
            <a href="list_product.php">Quản lý sản phẩm</a>
            <a href="emp/index.php">Quản lý nhân viên</a>
        </div>
        <?php include ("header.php")?>

        <!-- Page content -->
        <div class="content">
            <div class="table-mg">
            <h3 style="text-align: center;">ĐƠN ĐẶT HÀNG</h3>
                <table class="table table-striped" style="font-size:12px">
                    <thead>
                        <tr> 
                            <!-- <th scope="col"><i class="fas fa-cog"></i></th> -->
                            <th scope="col">#</th>
                            <th scope="col">Số đơn hàng</th>
                            <th scope="col">Mã sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Ghi chú</th>
                            <th scope="col">Mã KH</th>
                            <th scope="col">Tên KH</th>
                            <th scope="col">Ngày đặt hàng</th>
                            <th scope="col">Ngày giao hàng</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Trạng thái</th>
                        </tr>
                    </thead>
                    <?php
                        require_once('db/connect.php');
                       
                        $query=mysqli_query($con,"SELECT dathang.NgayDH,dathang.NgayGH,dathang.SoDonDH, hanghoa.MSHH, chitietdathang.SoLuong, chitietdathang.GiaDatHang, chitietdathang.GhiChu, khachhang.MSKH,khachhang.HoTenKH,chitietdathang.DiaChiGH
                        from hanghoa, dathang, chitietdathang, khachhang
                        where hanghoa.MSHH=chitietdathang.MSHH and chitietdathang.SoDonDH=dathang.SoDonDH and dathang.MSKH=khachhang.MSKH");
                        $index=1;
                        while($row=mysqli_fetch_array($query)){
                    ?>
                        <tr>
                            <!-- <td>
                                <a href="edit_product.php?MSHH=<?php echo $row['MSHH'];?>"><i class="fas fa-pencil-alt"></i></a>
                                <a href="delete_product.php?MSHH=<?php echo $row['MSHH'];?>"><i class="fas fa-trash-alt"></i></a>
                            </td> -->
                            <td><?php echo ($index++);?></td>
                            <td><?php echo $row['SoDonDH'];?></td>
                            <td><?php echo $row['MSHH'];?></td>
                            <td><?php echo $row['SoLuong'];?></td>
                            <td><?php echo number_format ($row['GiaDatHang'],0,',','.')?></td>
                            <td><?php echo $row['GhiChu'];?></td>
                            <td><?php echo $row['MSKH'];?></td>
                            <td><?php echo $row['HoTenKH'];?></td>
                            <td><?php echo $row['NgayDH'];?></td>
                            <td><?php echo $row['NgayGH'];?></td>
                            <td><?php echo $row['DiaChiGH'];?></td>
                            <td >
                                <form action="">
                                    <select name="" id="" style="border:none" selected="<?php echo $row['TrangThaiDH'];?> ">
                                        <option value=" ">Đang xử lý</option>
                                        <option value="daduyet ">Đã giao hàng</option>
                                    </select>
                                </form>
                            </td>
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