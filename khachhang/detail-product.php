<?php
        require '../admin/db/connect.php';
        $MSHH=$_GET['MSHH'];
        $query=mysqli_query($con,"SELECT hanghoa.MSHH,hanghoa.TenHH, hanghoa.QuyCach,hanghoa.Gia,hanghoa.SoLuongHang,hanghoa.HinhDaiDien, hinhhanghoa.Hinh, hanghoa.MaLoaiHang
        from hanghoa, hinhhanghoa
        where hanghoa.MSHH='$MSHH' and hinhhanghoa.MSHH='$MSHH'");
        $row=mysqli_fetch_assoc($query);
        session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/detail-product.css">

</head>
<body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- HEADER -->

    <div class="topnav">
        <div class="topnav-left">
             <img src="image/logo1.png" alt="">
            <form class="form-inline my-2 my-lg-0" method="GET">
                <input class="form-control mr-sm-2" name="tenhh" type="text" placeholder="Bạn tìm sản phẩm gì..." aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" name="btn" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <a href="#home">HOME</a>
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
    <!-- CONTENT -->
    <div class="detail">
      <div class="container">
        <div class="img">
            <img id ="img-main" src="../admin/<?php echo $row['HinhDaiDien'];?>" alt="" style='width: 400px;'>
            <div class="img-list">
              <ul>
                <?php
                  $sql= "select MSHH,MaHinh, Hinh from hinhhanghoa where MSHH='$MSHH'";
                  $img['img']= $con->query($sql);
                  foreach($img['img'] as $item){ ?>
                    <li><img class='list-img' src="../admin/img/<?php echo $item['Hinh'];?>" onclick="changeImg('<?php echo $item['MaHinh']?>')"   id="<?php echo $item['MaHinh']?>" alt="" ></li>
                <?php } ?>
                <!-- <li><img src="../admin/img/valinice2.jpg" alt="" onclick="changeImg('one')" id="one"></li> -->
              </ul>

             

            </div>
        </div>
        <div class="content">
          <div class="col-md-7">
            <div class="product-dtl">
              <div class="product-info">
                <div class="product-name"><?php echo $row['TenHH'].' '.$row['MSHH'];?></div>
                <div class="reviews-counter">
                  <div class="rate">
                    <input type="radio" id="star5" name="rate" value="5" checked />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" checked />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" checked />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" />
                    <label for="star1" title="text">1 star</label>
                  </div>
                  <span>3 Reviews</span>
                </div>
                <div class="product-price-discount"><span><?php echo number_format ($row['Gia'],0,',','.').'vnd';?></span></div>
              </div>
              <p><?php echo $row['QuyCach'];?></p>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="size">Size</label>
                <select id="size" name="size" class="form-control">
                  <option>M</option>
                </select>
              </div>
              
            </div>
            <div class="product-count">
              <a href="buy-product.php?MSHH=<?php echo $row['MSHH']?>" class="round-black-btn">Mua ngay </a>
            </div>
            <!-- giỏ hàng -->
            
            <div class="product-count">
                <!-- <a name="addcart" href="cart.php?MSHH=<?php echo $row['MSHH']?>" class="round-black-btn">Thêm vào giỏ hàng <i class="fas fa-shopping-cart"></i></a> -->
                <form action="cart.php" method="POST">
                  <input type="number" name="soluong" min="1" max="10" value="1">
                  <input class="round-black-btn" type="submit" name="addcart" value="Thêm vào giỏ hàng">
                  <input type="hidden" name="tensp" value="<?php echo $row['TenHH']?>">
                  <input type="hidden" name="masp" value="<?php echo $row['MSHH']?>">
                  <input type="hidden" name="gia" value="<?php echo $row['Gia']?>">
                  <input type="hidden" name="hinh" value="<?php echo $row['HinhDaiDien'];?>">
                </form>
            </div>
          </div>
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
                
    <script src="xuly.js"></script> 
      
</body>
</html>