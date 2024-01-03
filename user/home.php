<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
<link rel="stylesheet" href="../css/stylehome.css">
<!-- <link rel="stylesheet" href="../css/style.css"> -->
<link rel="stylesheet" href="../css/newtest.css">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
<title>Title</title>
<style>
    .Footer{
    margin-top: 0;
}
</style>
</head>
<body class="body-fixed">

    <div class="viewport">
    <?php
    session_start();
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
     }else{
        $user_id = '';
     };
    include("navbar.php");
?>
    <section class="main-banner" id="home">
                
                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="banner-text">
                                    <h1 class="h1-title">
                                        Chào Mừng Đến Với Websites
                                        <span>INTERNET FOOD SHOP</span>
                                    </h1>
                                    <p>Khám phá thế giới ẩm thực tuyệt vời của chúng tôi!</p>
                                    <div class="banner-btn mt-4">
                                        <a class="sec-btn" href="menu.php">Xem Thực Đơn Tại Đây</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="banner-img-wp">
                                    <div class="banner-img" style="background-image: url(../image1/banner1.png);">
                                    </div>
                                </div>
                                <div class="banner-img-text mt-4 m-auto">
                                    <h5 class="h5-title">Hotdog</h5>
                                    <p>Hotdog - Món ăn kinh điển, hương vị đậm đà và tiện lợi đến tuyệt vời!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="brands-sec">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="brand-title mb-5">
                                <h5 class="h5-title">
                                    Hợp tác cùng 20+ Công ty
                                </h5>
                            </div>
                            <div class="brands-row">
                                <div class="brands-box">
                                    <img class="w-75" src="../image1/b1.png" alt="">
                                </div>
                                <div class="brands-box">
                                    <img class="w-75" src="../image1/b2.png" alt="">
                                </div>
                                <div class="brands-box">
                                    <img class="w-75" src="../image1/b3.png" alt="">
                                </div>
                                <div class="brands-box">
                                    <img class="w-75" src="../image1/b4.png" alt="">
                                </div>
                                <div class="brands-box">
                                    <img class="w-75" src="../image1/b5.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="book-table section bg-light">
                <div class="book-table-shape">
                    <img src="../img/bg1.jpg" alt="">
                </div>
                
                <div class="book-table-shape book-table-shape2">
                    <img src="../img/bg1.jpg" alt="">
                </div>

                <div class="sec-wp" id="sec-wp">
                    <div class="container">
                        <div class="row" style="overflow: hidden;">
                            <div class="col-lg-12">
                                <div class="sec-title text-center mb-5">
                                    <p class="sec-sub-title mb-3">Đặt Bàn Ngay</p>
                                    <h2 class="h2-title">Giờ Mở Cửa</h2>
                                    <div class="sec-title-shape mb-4">
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="book-table-info">
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <div class="table-title text-center">
                                        <h3>Thứ 2 đến Thứ 6</h3>
                                        <p>9h-22h</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="call-now text-center">
                                        <i class="uil uil-phone"></i>
                                        <a href="Gọi 0784888888" class="">Gọi 0784888888</a>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="table-title text-center">
                                        <h3>Thứ 7 đến Chủ Nhật</h3>
                                        <p>11h-20h</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="bosuutap">
                            <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true" aria-label="First slide"></li>
                                    <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
                                    <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
                                    <li data-bs-target="#carouselId" data-bs-slide-to="3" aria-label="4"></li>
                                    <li data-bs-target="#carouselId" data-bs-slide-to="4" aria-label="5"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img style="width: 300px; height: 600px;" src="../image1/cr1.jpg" class="w-100 d-block" alt="First slide">
                                        <div class="carousel-caption ">
                                            <h3>Trà Trái Cây</h3>
                                            <p>Với hương vị tươi mát, ngọt ngào và hương thơm của trái cây tươi, trà trái cây là một lựa chọn tuyệt vời để thưởng thức trong những ngày nóng. 
                                                Nó cung cấp cảm giác giải khát và là một cách tuyệt vời để cung cấp vitamin và chất chống oxy hóa từ trái cây.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img style="width: 300px; height: 600px;" src="../image1/cr2.jpg" class="w-100 d-block" alt="Second slide">
                                        <div class="carousel-caption ">
                                            <h3>Cơm Cuộn</h3>
                                            <p>Kimbap là một món ăn truyền thống của Hàn Quốc, cũng được biết đến như là "sushi Hàn Quốc". Nó là một cuộn gạo nấu chín được cuộn trong rong biển và chứa các thành phần như thịt, cá, 
                                                rau sống và trứng. Kimbap thường có hình dạng cuộn dài và được cắt thành miếng nhỏ trước khi được thưởng thức.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img style="width: 300px; height: 600px;" src="../image1/cr3.jpeg" class="w-100 d-block" alt="Third slide">
                                        <div class="carousel-caption ">
                                            <h3>Mì Ý</h3>
                                            <p>Còn được gọi là pasta, là một món ăn đặc trưng của ẩm thực Ý và đã trở thành một phần quan trọng trong nền văn hóa ẩm thực toàn cầu. Mì Ý 
                                                được làm từ bột mì và nước, có nhiều hình dạng và kích cỡ khác nhau như spaghetti, fettuccine, penne, linguine, và nhiều hơn nữa.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img style="width: 300px; height: 600px;" src="../image1/cr5.jpg" class="w-100 d-block" alt="4">
                                        <div class="carousel-caption ">
                                            <h3>Bánh Mì</h3>
                                            <p>Bánh mì là một loại thực phẩm cơ bản và phổ biến trên toàn thế giới. Đây là một loại bánh được làm từ bột mì, nước, men và muối, sau đó được nướng trong lò nhiệt độ cao. 
                                                Bánh mì có nhiều loại và hình dạng khác nhau, từ bánh mì mềm và giòn đến bánh mì có vỏ cứng và hỗn hợp.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img style="width: 300px; height: 600px;" src="../image1/cr4.jpg" class="w-100 d-block" alt="5">
                                        <div class="carousel-caption ">
                                            <h3>Bánh Xèo</h3>
                                            <p>Bánh xèo là một món ăn truyền thống của Việt Nam, có xuất xứ từ miền Nam nước ta. Đây là một loại bánh mỏng giòn, được làm từ bột gạo, nước dừa và màu ớt tạo nên màu 
                                                và vị đặc trưng. Bánh xèo thường được nhân với các thành phần như tôm, thịt, giá, hành, vài món rau sống.</p>
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
    </div>
<?php include('footer.php') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
<script>

    
</script>
</body>
</html>