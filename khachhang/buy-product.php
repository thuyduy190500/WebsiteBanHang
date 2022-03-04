<?php
    require '../admin/db/connect.php';
    $MSHH=$_GET['MSHH'];
    $query=mysqli_query($con,"SELECT hanghoa.MSHH,hanghoa.TenHH, hanghoa.QuyCach,hanghoa.Gia,hanghoa.SoLuongHang,hanghoa.HinhDaiDien, hinhhanghoa.Hinh, hanghoa.MaLoaiHang
    from hanghoa, hinhhanghoa
    where hanghoa.MSHH='$MSHH' and hinhhanghoa.MSHH='$MSHH'");
    $row=mysqli_fetch_assoc($query);
?>
<?php
    if(!empty($_POST)){
        $hoten = $_POST['hoten'];
        $sdt = $_POST['sdt'];
        $diachi = $_POST['diachi'];
        $email = $_POST['email'];
        $soluong= $_POST['soluong'];
        $ghichu = $_POST['ghichu'];
        $thanhtoan = $_POST['thanhtoan'];
        if(!empty($_POST)){
            // insert khachhang
            $createUser=$con->query("INSERT INTO khachhang (MSKH,HoTenKH,TenCongTy,SoDienThoai,SoFax) values ('','$hoten','','$sdt','')");
            //  insert chitietdathang
            $createDetailOrder=$con->query("INSERT INTO chitietdathang values ('','$MSHH','$soluong','$diachi','$thanhtoan','','$ghichu' )");
            // lấy MSKH lớn nhất
            $orderMSKH=mysqli_fetch_row(mysqli_query($con,"SELECT MAX(MSKH) FROM khachhang "));
            // insert địa chỉ khách hàng
            // $sql2="INSERT INTO diachikh values ('', '$diachi', '$orderMSKH[0]')";
            $createAddress=$con->query("INSERT INTO diachikh values ('', '$diachi', '$orderMSKH[0]')");
            // lấy số đơn đặt hàng lớn nhất
            $numberOrder=mysqli_fetch_row(mysqli_query($con,"SELECT MAX(SoDonDH) FROM chitietdathang "));
            // echo $numberOrder[0];
            // $sql3="INSERT INTO dathang values ('$numberOrder[0]','$orderMSKH[0]', 'NV02', '','' , 'Dang cho' )";
            //insert đặt hàng
            $createOrder=$con->query("INSERT INTO dathang values ('$numberOrder[0]','$orderMSKH[0]', 'NV02', NOW(),ADDDATE(NOW(),5) , 'Đang chờ' )");
            if( $createUser==true && $createDetailOrder==true && $createAddress==true && $createOrder==true ){
                // echo '<script> alert("Đặt hàng thành công");</script>';
                header("location: order-info.php");
            
            }
            else echo '<script> alert("Đặt hàng không thành công");</script>';
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="css/buy-products.css">
</head>
<body>
    <div class="topnav">
        <img src="image/logo1.png" alt="">
    </div>
    <div class="buy-pro" method="POST" role="form ">
        <div class="info-pro">
            <img src="../admin/<?php echo $row['HinhDaiDien'];?>"  alt="">
            <div class="title">
                <h2 style="color: #f04e23"><?php echo $row['TenHH'];?></h2>
                <div class="product-count">
                    <div class="max-sz"> <?php echo $row['SoLuongHang']?> sản phẩm có sẳn</div>
                    <label for="size">Vui lòng chọn số lượng</label>
                    <div class="display-flex">
                        <button class="qtyminus" onclick="buttonSub('num')" >-</button>
                        <input type="text" name="quantity" value="1" class="qty" id="num">
                        <button class="qtyplus" onclick="buttonAdd('num')"  >+</button>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <form action="" method="POST">
            <div class="cost">
                <div class="title-cost">
                    <p>Phí vận chuyển:</p>
                    <p style="font-weight: bold">Số lượng:</p>
                    <strong>Cần thanh toán:</strong>
                </div>
                <div class="money">
                    <div class="free">Miễn phí</div>
                    <!-- <input id="pay" value='' > </input> -->
                    <p> <input name="soluong" id="sl" value='1'> </input> </p>
                    <p> <input name="thanhtoan" id="pay" value='<?php echo $row['Gia']?>'> </input> vnd</p>

                </div>
            </div>
            <hr>
            <div class="customer">
                <h3 style="font-size: 20px;">Thông tin khách hàng</h3>
                <div class="info-cus">
                    <input type="text" placeholder="Số điện thoại" id="tel" name="sdt" >
                    <input type="text" placeholder="Họ tên" id="name" name="hoten" >
                </div>
                <input type="text" placeholder="Email" id="email" name="email">
            </div>
            <div class="address">
                <h3 style="font-size: 20px;">Địa chỉ giao hàng</h3>
                <div class="addr"><input type="text" placeholder="Địa chỉ" id="addr" name="diachi"></div>
                <div class="addr"><input type="text" placeholder="Ghi chú" id="note" name="ghichu"></div>
            </div>
            <div class="pay">
                <h3>Phương thức thanh toán</h3>
                <input type="radio" checked="checked">
                <label for="">Thanh toán khi nhận hàng(COD)</label>
            </div>
            <button class="btn">Thanh toán</button>
        </form>
        
        
        
    </div>
    <!-- <script src="xuly.js"></script>     -->
    <!-- xử lý số lượng -->
    <script>
      var i = 1;
      i<=<?php echo $row['SoLuongHang']?>;
      var gia= <?php echo $row['Gia'] ?>;
      function buttonAdd(id) {
          if(i< <?php echo $row['SoLuongHang']?>)
            i++;
            document.getElementById('num').setAttribute('value', i);
            thanhtoan= gia * i;
            document.getElementById('sl').setAttribute('value', i);
            document.getElementById('pay').setAttribute('value', thanhtoan);
      }
      function buttonSub(id) {
          if(i>1){
            i--;
            var thanhtoan= document.getElementById('pay').getAttribute('value');
            document.getElementById('num').setAttribute('value', i);
            thanhtoan_tru=  thanhtoan - gia;
            document.getElementById('sl').setAttribute('value', i);
            document.getElementById('pay').setAttribute('value', thanhtoan_tru);
          }
      }
    //   function update(){
    //     var a= <?php  echo $row['SoLuongHang']?>;
    //     var b= document.getElementById('sl').getAttribute('value', i);
    //     var c= a-b;
    //   }
      
  
    </script> 
    
    

</body>
</html>