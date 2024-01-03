<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="Description" content="Enter your description here" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- link cua https://fontawesome.com/icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="../css/thanhtoan.css">
  <link rel="stylesheet" href="../css/navbar.css">
  <title>Title</title>
</head>
<body>
  <?php 
  session_start();
  if(isset($_SESSION['user_id'])){
      $user_id = $_SESSION['user_id'];
   }else{
      $user_id = '';
   };
   if($user_id==''){
    header('location:/DOANCS22/user/formL.php');
}
    $conn = mysqli_connect('localhost','root','','fooddrink');
    $sqlinfo="SELECT * FROM info WHERE user_id=".$_SESSION['user_id'];
    $rsinfo = mysqli_query($conn,$sqlinfo);
    $rowinfo = mysqli_fetch_array($rsinfo);
    // echo "111";
    // print_r($rowinfo);
    if(!isset($rowinfo['user_name']) ){
      if(isset($_GET['idsp'])){
        header('location:/DOANCS22/user/forminfo.php?idsp='.$_GET['idsp']);
      }
      else{
        header('location:/DOANCS22/user/forminfo.php');
      }
     
    }
    include("navbar.php");
  ?>
  <div class="main">
    <div class="container">
      <div class="row">
        <div class="col-12">
            <div class="info-user">
                <div class="map">
                    <i class="fa-solid fa-location-dot me-1"></i>
                    <span>Địa Chỉ Nhận Hàng</span>
                </div>
                <div class="info">
                    <span class="info-name"><?php echo $rowinfo['user_name'] ?></span>
                    <span class="thanh">|</span>
                    <span class="info-std"><?php echo $rowinfo['phone'] ?></span>
                    <span class="info-address ps-3 pe-5"><?php echo $rowinfo['address'] ?></span>
                    <a href="info_update.php" class="info-change">Thay đổi</a>
                </div>
            </div>
        </div>
      </div>
    </div>
<?php 
    $total=0;
    $conn=mysqli_connect('localhost','root','','fooddrink');
    if(isset($_GET['idsp'])){
      $sql="SELECT * FROM sanpham WHERE id=".$_GET['idsp'];
      $result=mysqli_query($conn,$sql);
    }
    else{
      $sql="SELECT * FROM cart WHERE user_id=$user_id";
      $result=mysqli_query($conn,$sql);
    }
?>
    <div class="info-product">
      <div class="container">
        <div class="row">
            
          <div class=" col-12">
            <div class="cart-header">
              <label>
                <span class="ms-3">Sản phẩm</span>
              </label>
              <span class="cart-header-text">Đơn giá</span>
              <span class="cart-header-text">Số lượng</span>
              <span class="cart-header-text ms-3">Thành tiền</span>
              <!-- <a href="deletecart.php?idsp=0"><img class="trash-img" src="../image1/trash.svg" alt=""></a> -->
            </div>
            <?php 
                while ($row=mysqli_fetch_array($result)){
            ?>
            <div class="cart-product">
              <div class="cart-body">
                <div class="cart-item ms-2">
                  <img class="mx-2 " src="../image1/<?php echo (isset($_GET['idsp'])) ? $row['hinhanh'] :  $row['image']  ?>" alt="">
                  <a href=""><?php echo (isset($_GET['idsp']))?$row['tensanpham']:$row['name']  ?></a>
                </div>
                <div class="cart-gia">
                  <span><?php echo (isset($_GET['idsp'])) ? $row['gia'] :  $row['price']  ?></span><sup>đ</sup>
                </div>
                <div class="cart-sl">
                  <span><?php echo (isset($_GET['idsp'])) ? 1 :  $row['quantity']  ?> </span>
                </div>
                <div class="cart-tt ms-2">
                  <span class="cart-tt-price"><?php echo (isset($_GET['idsp'])) ? $row['gia']*1 :  $row['price']*$row['quantity']  ?></span><sup style="color: #FF424E;">đ</sup>
                </div>
                <div class="cart-img">
                <!-- <a href="deletecart.php?idsp=<?php echo (isset($_GET['idsp'])) ? $row['id'] :  $row['pid']  ?> "><img class="trash-img" src="../image1/trash.svg" -->
                    <!-- alt=""></a> -->
              </div>
              </div>
              <div style="background-color: #F5F5FA;display: block;height:15px;"></div>
            </div>
  
<?php
  $total+=(isset($_GET['idsp'])) ? $row['gia']*1 :  $row['price']*$row['quantity'];
  $_SESSION['total'] = $total;
}?>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                
                <div class="total-product">
                    <div>
                        <p>Tổng thanh toán: <span style="color: #EE4D2D;font-size: 30px;
    font-weight: 400;margin-left: 26px;" class="product-money"><?php echo $total ?><sup>đ</sup></span></p>
                    </div>
                </div>
                <div class="order">
                    <span>Nhấn "Đặt hàng" đồng nghĩa với việc bạn đồng ý tuân theo Điều khoản Food</span>
                    <button id="btngui" value="gui"><a style="text-decoration: none; display: block;color: #F5F5FA;" href="order.php<?php echo (isset($_GET['idsp'])) ?'?idsp='.$_GET['idsp'] :'' ?>">Đặt hàng</a></button>
                    <!-- <button id="btngui" value="gui">Đặt hàng</button> -->
                </div>
            </div>
        </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>