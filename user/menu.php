<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="Description" content="Enter your description here" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="../css/newtest.css">
  <!-- <link rel="stylesheet" href="css/home.css">   -->
  <!-- <link rel="stylesheet" href="css/menu.css"> -->
  <title>Title</title>
  <style>
    .page-item a:focus {
      box-shadow: none;
  }
  .addsucces-text{
    margin: 0;
    font-size: 14px;
    margin-bottom: 4px;
  }
  .fa-circle-check{
    color: green;
    margin-right: 4px;
    font-size: 16px;
  }
  .addsucces-actions{
    background-color: #FF3945;
    border-radius: 5px;
    padding: 7px;
    margin-top: 15px;
    margin-bottom: 3px;
    cursor: pointer;
  }
  .addsucces-actions a{
    color: #FFFFFF;
    text-decoration: none;
  }
  #addsucces p{
    margin: 0;
  }
  .addsucces-xmark{
    margin-bottom: 10px;
  }
  .fa-xmark{
    position: absolute;
    right: 7px;
    top: 4px;
  }
  #addsucces{
    display: none;
    position: absolute;
    width: 250px;
    top: 50px;
    right: 10px;
    background-color: rgb(255, 255, 255);
    border-radius: 6px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 10px;
    height: 100px;
  }


  </style>
</head>

<body style="height: auto;">

<?php
session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 };
  include("navbar.php");
?>
  <div id="Menu" class="menu section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="our-menu">
            <h1> <span>Thực đơn</span></h1>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <!-- sidebar  -->
        <div class="sidebar  col-lg-2 ms-5">
          <div class="d-flex flex-column flex-shrink-0 text-black bg-white">
            <a href="/" class="d-flex align-items-center   text-black text-decoration-none">
              <svg class="bi " width="40" height="32">
                <use xlink:href="#bootstrap" />
              </svg>
              <span class="fs-4">Danh muc</span>
            </a>
            <!-- <hr> -->
            <ul class="nav nav-pills flex-column mb-auto mt-3">
              <?php
              
                $conn=mysqli_connect('localhost','root','','fooddrink');
                $sql="SELECT * FROM danhmuc";
                $result=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_array($result)){
              ?>
              <li class="nav-sidebar">
                <a href="sanpham.php?iddanhmuc=<?php echo $row['id'] ?>" class="nav-link text-black a-sidebar">
                  <img class="nav-sidebar-img" src="../images4/<?php echo $row['hinhanh'] ?>" alt="">
                  <?php echo $row['tendanhmuc'] ?>
                </a>
              </li>
              <?php
                }
              ?>
            </ul>
          </div>
        </div>
        <!-- content  -->
        <div class="content  col-lg-9 ">
          <div class="row">

            <?php
                $p=1;
                if(isset($_GET['p'])){
                $p= $_GET['p'];
              } 
                $moitrang=6;
                $start=($p-1)*$moitrang;
                $conn=mysqli_connect('localhost','root','','fooddrink');
                $sql="SELECT * FROM sanpham  LIMIT $start,$moitrang";
                $result=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_array($result)){
              ?>
            <div class="col-lg-4 col-md-6 col-12 mb-3">
              <div class="h-100 card">
                <a href="mota.php?idsp=<?php echo $row['id']; ?>">
                    <input type="hidden" name="qty" class="qty" value="1" >
                    <input type="hidden" name="pid" value="<?php echo $row['id'] ?>">
                    <input type="hidden" name="name" value="<?php echo $row['tensanpham'] ?>">
                    <input type="hidden" name="price" value="<?php echo $row['gia'] ?>">
                    <input type="hidden" name="image" value="<?php echo $row['hinhanh'] ?>">
                      <div class="menu-image">
                      <img src="../image1/<?php echo $row['hinhanh'] ?>" class="card-img-top " alt="...">
                </a>
                
                      <!-- <a href="addcart.php?action=increase&idsp=<?php echo $row['id'] ?>"><i class="bi bi-cart-check-fill cart-menu" id="clickcart"></i></a> -->
                      <button class="btn-add rounded" ><i class="bi bi-cart-check-fill"></i></button>
                      <!-- <a href="addcart.php?idsp=<?php echo $row['id'] ?>"><i class="bi bi-cart-check-fill cart-menu" id="clickcart"></i></a> -->
                      <a href="mota.php?idsp=<?php echo $row['id']; ?>">
                      <div class="money-menu"><?php echo $row['gia'] ?><sup>đ</sup></div>
                    </div>
                    <div class="card-body">
                      <a href="mota.php?idsp=<?php echo $row['id']; ?>">
                        <h5 class="card-title">
                          <?php echo $row['tensanpham'] ?>
                        </h5>
                      </a>
                      <!-- <div class="menu_icon">
                        <p>
                          <?php echo $row['mota'] ?>
                        </p>
                      </div> -->
                  </a>
                  <button class="btn btn-pay border border-primary mt-2">Mua ngay</button>
                    <!-- <a href="handlepay.php?idsp=<?php echo $row['id'] ?>" class="btn border border-primary">order now</a> -->
                  </div>
                </a>
              </div>
            </div>
            <?php 
                }
          ?>

          </div>
          <?php
            $conn=mysqli_connect('localhost','root','','fooddrink');
            $sql="SELECT COUNT(id) FROM sanpham";
            $result=mysqli_query($conn,$sql);
            $sosp=mysqli_fetch_array($result);
            $total=ceil($sosp[0]/6);
            if(!empty($total)&& $total> 0){
          ?>
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <?php
              if($p>1){
                $new_page=$p-1;
              ?>
              <li class="page-item">
                <a class="page-link" href="menu.php?p= <?php echo $new_page ?>" aria-label="Previous">
                  &laquo;
                </a>
              </li>
              
                <?php 
              }
              $part=2;
              $begin=$p-$part;
              if($begin<1){
                $begin=1;
              }
              $end=$p+$part;
              if($end>$total){
                $end=$total;
              }
              for($i=$begin;$i<=$end;$i++){
                ?>
                <li class="page-item <?php echo ($p==$i)?'active':FALSE ?>"><a class="page-link" href="menu.php?p= <?php echo $i ?>"><?php echo $i ?></a></li>
                <?php
              }
              if($p<$total){
                $new_page=$p+1;
                ?>
              <li class="page-item">
                <a class="page-link" href="menu.php?p= <?php echo $new_page ?>" aria-label="Next">
                  &raquo;
                </a>
              </li>
                <?php } ?>
            </ul>
          </nav>  
<?php 
            }
?>
        </div>
      </div>
    </div>
  </div>
  <!-- footer  -->
  <div class="Footer">
    <div class="container-fluid">
      <div class="row ">
          <div class="col-lg-3 col-md-6 col-12 Footer-body">
            <h6 class="h6">CHĂM SÓC KHÁCH HÀNG</h6>
            <div class="Footer-content">
              <p>Trung tâm trợ giúp</p>
            <p>Food mail</p>
            <p>Hướng dẫn mua hàng</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12 Footer-body">
            <h6 class="h6">VỀ WEBSITE ONLINE FOOD</h6>
            <div class="Footer-content">
              <p>giới thiệu về food việt nam</p>
            <p>tuyển dụng</p>
            <p>điều khoản food</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12 Footer-body">
            <h6 class="h6">THEO DÕI CHÚNG TÔI</h6>
            <div class="Footer-icons">
                <a href="#"><i class="bi bi-facebook"><span>Facebook</span></i></a>
                <a href="#"><i class="bi bi-instagram"><span>Instagram</span></i></a>
                <a href="#"><i class="bi bi-linkedin"><span>LinkedIn</span></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12 Footer-body">
            <h6 class="h6">VÀO CỬA HÀNG TRÊN ỨNG DỤNG FOOR</h6>
            <div class="Footer-images">
              <div class="image-qr">
                <img src="../image1/QR2.png" alt="">
              </div>
              <div class="image-app">
                <div class="app-image"><img class="image-app-one" src="../image1/apple1.png"><span>App store</span></div>
                <div class="app-image"><img class="image-app-two" src="../image1/chplay.png"><span>Coogle Play</span></div>
              </div>
            </div>
          </div>
          
      </div>
    </div>
    <div class="footer-bootom">
        <div class="footer-bootom-content">
          <p>chính sách bảo mật <span>|</span></p>
          <p>quy chế hoạt động <span>|</span></p>
          <p>chính sách vận chuyển <span>|</span></p>
          <p>Chính sách trả hàng và hoàn tiền <span></span></p>
        </div>
        <div class="footer-bootom-image mt-4">
          <img src="../image1/logo.png" alt="">
          <p>Công ty yamete</p>
        </div>
    </div>
  </div>
  <div id="notificationmethod" class="method">
    <div class="method-content">
      <p class="method-text">sản phẩm đã hết!</p>
      <div class="method-actions">
        <button class="confirm" onclick="closemethod()">Xác nhận</button>
      </div>
    </div>
  </div>
  
  <script src="../js/menu.js"></script>
  <script>
    // const btn_pay=document.querySelectorAll('.btn-pay');
    // btn_pay.forEach(function(button,index){
    //   button.addEventListener('click',function(){
    //     $.ajax({
    //       type:'post',
    //       url:'handlepay.php',
    //       data:{idsp:product_id[index].value},
    //     })
    //     .done(function(data){
    //       console.log(data=='request');
    //       if(data){
    //         if(data==0){
    //           document.getElementById("notificationmethod").style.display = "block";
    //         }
    //         else if(data==1){
    //           window.location.href = '/DOANCS22/user/formL.php';
    //         }
    //         else if(data==2){
    //           window.location.href = '/DOANCS22/user/thanhtoan.php?idsp='+product_id[index].value;
    //         }
    //       }
    //     })
    //     .fail(function(data){

    //     })
    //   })
    // })
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>
<?php
if(isset($_GET['request'])){
  ?>
  <script>
    document.getElementById("notificationmethod").style.display = "block";
  </script>
  <?php
}
?>

