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
            <a  href="#home">HOME</a>
            <a class="active" href="list-product.php" >CỬA HÀNG</a>
            <a href="blog.php">BLOG</a>
        </div>
        
        <div class="topnav-right" >
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
                    echo "<a href=detail-product.php?TenHH=".$row['TenHH']."></a>";
                }
            }
        }
    ?>
</div>



</body>
</html>