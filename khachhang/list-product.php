<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tất cả sản phẩm</title>
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/list-product.css">

</head>
<body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
   
    <!-- HEADER -->
    <div class="topnav">
        <div class="topnav-left">
             <img src="image/logo1.png" alt="">
            <form class="form-inline my-2 my-lg-0" method="GET">
                <input class="form-control mr-sm-2" name="tenhh" type="text" placeholder="Bạn tìm sản phẩm gì..." aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" name="btn" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <a  href="index.php">HOME</a>
            <a class="active" href="list-product.php" >CỬA HÀNG</a>
            <a href="blog.php">BLOG</a>
        </div>
        
        <div class="topnav-right">
            <?php if(empty($_SESSION['user1'])):?>
                   <a href="login.php">Đăng nhập</a>
                   <a href="register.php">Đăng ký</a>
            <?php else:?>
                <a href="#" data-toggle="popover" data-placement="bottom"><i class="fas fa-user"></i> <?=$_SESSION['user1']?></a>
                <div id="popover-content" style="display:none;  ">
                    <ul style="list-style-type: none; font-size:15px; margin:0; padding:0;">
                        <li><a style="color:black;" href="cart.php">Xem giỏ hàng</a></li>
                        <li><a style="color:black" href="logout.php">Đăng xuất</a></li>
                    </ul>
                </div>  
            <?php endif; ?>
        </div>
    </div>
          <!-- popover -->
          <script>
            $("[data-toggle=popover]").popover({
            html: true, 
            content: function() {
                return $('#popover-content').html();
                }
            });
        </script>
    <div class="content">
        <!-- SLIDER -->
        <div class="banner">
            <img src="image/pro-banner.jpg" alt="">
        </div>
        <div class="branch">
            <img src="image/thuonghieu1.png" alt="">
            <img src="image/thuonghieu2.png" alt="">
            <img src="image/thuonghieu3.jpg" alt="">
            <img src="image/thuonghieu4.jpg" alt="">
            <img src="image/thuonghieu5.jpg" alt="">
        </div>
         <!-- LIST-PRODUCT  -->
         
            
    </div>
    <div class="list-product" >
        <ul class="list-pro">
            <?php
                require "../admin/db/connect.php";
                $query=mysqli_query($con, "select hanghoa.MSHH, hanghoa.TenHH, hanghoa.Gia,hanghoa.HinhDaiDien
                from hanghoa");
                while($row=mysqli_fetch_array($query)){
            ?>
            <li class="pro-item">
                <div class="pro-item-img">
                    <img class='product' src="../admin/<?php echo $row['HinhDaiDien'];?>" >
                    <p class="name"><?php echo $row['TenHH'];?></p>
                    <p class="price"><?php echo number_format ($row['Gia'],0,',','.').'vnd';?></p>
                    <div class="xct"><a href="detail-product.php?MSHH=<?php echo $row['MSHH']?>">Xem chi tiết <i class="fas fa-angle-double-right"></i></a></div>
                </div>
            </li>
            <?php
                }
            ?>  
        </ul>
    </div>
        
    

<!-- IMAGE  -->
    <div class="content-footer">
      <div class="content-footer-title">
          <h3>Sao Việt mua sắm tại VALI.vn</h3>
      </div>
      <div class="list-image">
        <div class="content-footer-img">
            <img src="image/sv1.jpg" alt="">
            <div class="overlay">Ca sĩ Thủy Tiên</div>
        </div>
        <div class="content-footer-img">
            <img src="image/sv2.jpg" alt="">
            <div class="overlay">Hoa hậu H'Hen Niê</div>
        </div>
        <div class="content-footer-img">
            <img src="image/sv3.jpg" alt="">
            <div class="overlay">Cầu thủ Quang Hải</div>
        </div>
        <div class="content-footer-img">
            <img src="image/sv4.jpg" alt="">
            <div class="overlay">Cầu thủ Hà Đức Chinh</div>
        </div>
      </div>
    </div>

    <!-- FOOTER -->
<div id="footer">
    <div class="footer-top">
        <div class="footer-item">
            <li><i class="fas fa-spinner"></i></li>
            <li>Miễn phí <br> đổi trả 365 ngày</li>
        </div>
        <div class="footer-item">
            <li><i class="fas fa-check-double"></i></li>
            <li>Bảo hành trọn đời <br> trên toàn hệ thống</li> 
        </div>
        <div class="footer-item">
            <li><i class="fas fa-user"></i></li>
            <li>Độc quyền phân phối <br> tại VALI.vn</li> 
        </div>
    </div>

    <div class="footer-center">
        <div class="footer-tel">
            <b>GỌI MUA HÀNG</b>
            <div class="footer-tel-1">
                <li><i class="fas fa-phone-square-alt"></i></li>
                <li>1800 6198</li>
            </div>
            <b>GÓP Ý - KHIẾU NẠI</b>
            <div class="footer-tel-1">
                <li><i class="fas fa-phone-square-alt"></i></li>
                <li>1800 6196</li>
            </div>
        </div>
        <div class="footer-addr">
            <b><i class="fas fa-map-marker-alt"></i> &nbsp; ĐỊA CHỈ CỬA HÀNG</b>
            <p> <b>Chi nhánh 1:</b>  128/5 đường Trần Hưng Đạo, phường Xuân Khánh, quận Ninh Kiều, tp Cần Thơ. </p>
            <p> <b>Chi nhánh 2:</b> 62A đường Hai Bà Trưng, quận 2, tp Hồ Chí Minh.</p>
        </div>
        <div class="footer-policy">
            <ul>
                <li><a href="#">Chính sách đổi trả</a></li>
                <li><a href="#">Chính sách bảo hành</a></li>
                <li><a href="#">Chính sách vận chuyển</a></li>
                <li><a href="#">Phương thức thanh toán</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-icon">
        <li><i class="fab fa-facebook"></i></li>
        <li><i class="fab fa-google"></i></li>
        <li><i class="fab fa-youtube"></i></li>
    </div>
</div>

</body>
</html>