<?php
    require '../admin/db/connect.php';
    $query=mysqli_query($con,"SELECT dathang.NgayDH,dathang.NgayGH,chitietdathang.DiaChiGH,khachhang.SoDienThoai,khachhang.MSKH, dathang.MSKH ,khachhang.HoTenKH,hanghoa.Gia,hanghoa.HinhDaiDien , chitietdathang.GiaDatHang,chitietdathang.SoLuong,chitietdathang.SoDonDH,dathang.SoDonDH, chitietdathang.MSHH, hanghoa.MSHH, hanghoa.TenHH  FROM hanghoa,chitietdathang, khachhang, dathang WHERE khachhang.MSKH=dathang.MSKH AND dathang.SoDonDH = chitietdathang.SoDonDH AND hanghoa.MSHH=chitietdathang.MSHH AND chitietdathang.SoDonDH=(SELECT MAX(SoDonDH) FROM chitietdathang) ");
    $row=mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/order-info.css">

</head>
<body>
    <div class="wrapper">
    <div class="info">
       
        <div class="container_copy">
        <h3><?php echo $row['NgayDH']?></h3>
        <h1 class='title'>Hi <?php echo $row['HoTenKH']?></h1>
        <h2 class='thanks'>Cám ơn bạn đã đặt hàng</h2>
        <p>Đơn hàng của bạn đang trong quá trình xử lý. Dưới đây là thông tin chi tiết đơn hàng của bạn</p>
        <h1>Order: #<?php echo $row['SoDonDH']?></h1>
        <table  >
            <tr>
                <th>Sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Giá</th>
            </tr>
            <tr>
                <td><?php echo $row['TenHH']?></td>
            
                <td><img src="../admin/<?php echo $row['HinhDaiDien'];?>"  alt="" style="width:100px"></td>
                <td><?php echo $row['SoLuong']?></td>
                <td><?php echo number_format ($row['Gia'],0,',','.').'vnd';?></td>
            </tr>
        </table>
        <div class="order">
            <p>Phí giao hàng: <i>Miễn phí </i></p>
            <p>Tổng tiền: <i><?php echo number_format ($row['GiaDatHang'],0,',','.').'vnd';?></i> </p>
        </div>
           <div class="info-order">
            <div class="left">
                <h2> Thông tin khách hàng   </h2>
                <p>Họ tên: <?php echo $row['HoTenKH']?></p>
                <p>Số điện thoại: <?php echo $row['SoDienThoai']?></p>
            </div>
            <div class="right" style="margin-left:30px">
                <h2>Thông tin giao hàng</h2>
                <p>Địa chỉ giao hàng: <?php echo $row['DiaChiGH']?></p>
                <p>Ngày giao hàng: <b><?php echo $row['NgayGH']?></b> </p>
            </div>
        </div>
        
        

        </div>
    </div>
    </div>
        
        
    </div>
</body>
</html>