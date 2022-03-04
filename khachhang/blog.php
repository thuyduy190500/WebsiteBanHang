<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="css/home.css">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>
<!-- HEADER -->
<div class="topnav">
        <div class="topnav-left">
             <img src="image/logo1.png" alt="">
            <form class="form-inline my-2 my-lg-0" method="GET">
                <input class="form-control mr-sm-2" name="tenhh" type="text" placeholder="Bạn tìm sản phẩm gì..." aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" name="btn" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <a  href="index.php">HOME</a>
            <a  href="list-product.php" >CỬA HÀNG</a>
            <a class="active" href="blog.php">BLOG</a>
        </div>
        
       
    </div>
  
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
    <!-- <div class="container d-flex justify-content-center mt-50 mb-50"> -->
        <div class="card">
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="img-banner">
                            <h4>CẨM NANG DU LỊCH PHÚ QUỐC</h4>
                            <img src="image/blog3.jfif" alt="">
                        </div>
                        <div class="media flex-column flex-sm-row mt-0 mb-3">
                            <div class="mr-sm-3 mb-2 mb-sm-0">
                                <div class="card-img-actions"> <img src="image/blog1.jpg" class="img-item " alt=""> </div>
                            </div>
                            <div class="media-body">
                                <h6 class="media-title"><a href="https://mia.vn/cam-nang-du-lich/vinpearl-safari-phu-quoc-review-tu-a-z-mo-hinh-ban-so-thu-hoang-da-dau-tien-tai-viet-nam-2-2">Vinpearl Safari Phú Quốc – Review từ A-Z mô hình bán sở thú hoang dã đầu tiên tại Việt Nam 10-01-2021</a></h6>
                            </div>
                        </div>
                        <div class="media flex-column flex-sm-row mt-0 mb-3">
                            <div class="mr-sm-3 mb-2 mb-sm-0">
                                <div class="card-img-actions"> <img src="image/blog2.jpg" class="img-item " alt=""> </div>
                            </div>
                            <div class="media-body">
                                <h6 class="media-title"><a href="https://mia.vn/cam-nang-du-lich/vinwonders-phu-quoc-vinpearl-land-phu-quoc-cong-vien-chu-de-lon-nhat-viet-nam-3-3" >VinWonders Phú Quốc (Vinpearl Land Phú Quốc) – Công viên chủ đề lớn nhất Việt Nam
                                    11-01-2021</a></h6>
                            </div>
                        </div>
                        <div class="media flex-column flex-sm-row mt-0 mb-3">
                            <div class="mr-sm-3 mb-2 mb-sm-0">
                                <div class="card-img-actions"> <img src="image/blog4.jpg" class="img-item" alt=""> </div>
                            </div>
                            <div class="media-body">
                                <h6 class="media-title"><a href="https://mia.vn/cam-nang-du-lich/cho-ganh-dau-phu-quoc-cho-que-yen-binh-tren-bac-dao-37-37" >Chợ Gành Dầu Phú Quốc – Chợ quê yên bình trên Bắc đảo
                                    21-01-2021</a></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="img-banner">
                            <h4>TIN TỨC</h4>
                            <img src="image/blog5.jfif" alt="">
                        </div>
                        <div class="media flex-column flex-sm-row mt-0 mb-3">
                            <div class="mr-sm-3 mb-2 mb-sm-0">
                                <div class="card-img-actions"> <img src="image/blog7.jpg" class="img-item " alt=""> </div>
                            </div>
                            <div class="media-body">
                                <h6 class="media-title"><a href="https://sanphamngon.com/top-10-vali-chat-luong/">Top 10 Vali chất lượng và bán chạy nhất trong năm nay</a></h6>
                            </div>
                        </div>
                        <div class="media flex-column flex-sm-row mt-0 mb-3">
                            <div class="mr-sm-3 mb-2 mb-sm-0">
                                <div class="card-img-actions"> <img src="image/blog6.jpg" class="img-item " alt=""> </div>
                            </div>
                            <div class="media-body">
                                <h6 class="media-title"><a href="https://my-best.vn/31252/" >Top 10 Vali tốt nhất hiện nay</a></h6>
                            </div>
                        </div>
                        <div class="media flex-column flex-sm-row mt-0 mb-3">
                            <div class="mr-sm-3 mb-2 mb-sm-0">
                                <div class="card-img-actions"> <img src="image/blog8.jpg" class="img-item" alt=""> </div>
                            </div>
                            <div class="media-body">
                                <h6 class="media-title"><a href="https://mia.vn/cam-nang-du-lich/cho-ganh-dau-phu-quoc-cho-que-yen-binh-tren-bac-dao-37-37" >Tổng hợp 10 thương hiệu nổi tiếng</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->
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