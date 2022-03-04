<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">

</head>
<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>                                        
    
<!-- HEADER -->
    <div class="topnav">
        <div class="topnav-left">
             <img src="image/logo1.png" alt="">
            <form class="form-inline my-2 my-lg-0" method="GET">
                <input class="form-control mr-sm-2" name="tenhh" type="text" placeholder="Bạn tìm sản phẩm gì..." aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" name="btn" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <a class="active" href="#home">HOME</a>
            <a  href="list-product.php" >CỬA HÀNG</a>
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
    
    <!-- tìm kiếm sản phẩm -->
    <?php
        if(isset($_GET['btn'])){
            $TenHH = $_GET['tenhh'];
            require "../admin/db/connect.php";
            $sql = "SELECT * FROM hanghoa WHERE TenHH like '%$TenHH%' ";
            $result = $con->query($sql);
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){ 
                //    chưa header()
                } 
            }
        }
    ?>
<!-- CONTAINER -->
<div class="content">
    <div class="banner-top">
        <!-- <img src="image/banner6.jfif" alt=""> -->
    </div>
                             <!--Slider-->
    <div class="slider">
        <img class="mySlides" src="./image/banner2.jpg" alt="">
        <img class="mySlides" src="./image/banner4.png" alt="">
        <!-- <img class="mySlides" src="./image/banner1.jpg" alt=""> -->
        <!-- <img class="mySlides" src="./image/banner5.jpg" alt=""> -->
    </div>
    <script>
        var myIndex = 0;
        carousel();
        
        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
            setTimeout(carousel, 4000); // 4s
        }
        </script>   
<!-- SELLER     -->
    <div class="seller">
        <div class="seller-theme">
            <img src="./image/title.png" alt="">
            <h2>Top sản phẩm bán chạy</h2>
        </div>
        <div class="bestseller-list">
            <?php
                require "../admin/db/connect.php";
                $query=mysqli_query($con, "SELECT *
                from hanghoa where Gia<1300000 ");
                while($row=mysqli_fetch_array($query)){
            ?>
            <div class="bestseller-item"> 
                <div class="bestseller-item-img">
                    <img class='product' src="../admin/<?php echo $row['HinhDaiDien'];?>" >
                    <h5 class="name"><?php echo $row['TenHH'];?></h5>
                    <p class="price"><?php echo number_format ($row['Gia'],0,',','.').'vnd';?></p>
                    <div class="xct"><a href="detail-product.php?MSHH=<?php echo $row['MSHH']?>">Xem chi tiết <i class="fas fa-angle-double-right"></i></a></div>
                </div>
            </div>
            <?php
                }
            ?>  
        </div>
    </div>
<!-- COMBO -->
<div class="combo">
    <div class="combo-theme">
        <a href="">Combo tiết kiệm <i class="fas fa-angle-double-right"></i></a>
    </div>
    <div class="combo-list">
        <?php
            $query1=mysqli_query($con, "SELECT *
            from hanghoa where TenHH LIKE '%Combo%' ");
            while($row=mysqli_fetch_array($query1)){
        ?>
        <div class="combo-item">
            <div class="combo-item-img">
                <img class='product' src="../admin/<?php echo $row['HinhDaiDien'];?>" >
                <h5 class="name"><?php echo $row['TenHH'];?></h5>
                <p class="price"><?php echo number_format ($row['Gia'],0,',','.').'vnd';?></p>
                <div class="xct"><a href="detail-product.php?MSHH=<?php echo $row['MSHH']?>">Xem chi tiết <i class="fas fa-angle-double-right"></i></a></div>
            </div>
        </div>
        <?php
            }
        ?> 
        
    </div>
</div>

<!-- VALI YÊU THÍCH -->
<div class="fav">
    <div class="fav-theme">
        <a href="">Vali yêu thích <i class="fas fa-angle-double-right"></i></a>
    </div>
    <div class="fav-list">
        <?php
            $query3=mysqli_query($con, "SELECT *
            from hanghoa where QuyCach LIKE '%tỉ mỉ%' ");
            while($row=mysqli_fetch_array($query3)){
        ?>
        <div class="fav-item">
            <div class="fav-item-img">
                <img class='product' src="../admin/<?php echo $row['HinhDaiDien'];?>" >
                <h5 class="name"><?php echo $row['TenHH'];?></h5>
                <p class="price"><?php echo number_format ($row['Gia'],0,',','.').'vnd';?></p>
                <div class="xct"><a href="detail-product.php?MSHH=<?php echo $row['MSHH']?>">Xem chi tiết <i class="fas fa-angle-double-right"></i></a></div>
            </div>
        </div>
        <?php
            }
        ?>    
    </div>
</div>
 


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