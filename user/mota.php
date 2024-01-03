<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- <link rel="stylesheet" href="../css/style.css"> -->
<link rel="stylesheet" href="../css/newtest.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
   />
<link rel="stylesheet" href="../css/styleCTF.css">
<link rel="stylesheet" href="../css/navbar.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
   include("navbar.php");
   $idsp=$_GET['idsp'];
//    echo $_GET['idsp'];
    $conn=mysqli_connect("localhost","root","","fooddrink");
    $sql="SELECT * FROM sanpham WHERE id=$idsp";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
   
   ?>
   <!-- <div style="clear: both"></div> -->
   <input type="hidden" name="qty" class="qty" value="1" >
   <input type="hidden" name="pid" value="<?php echo $row['id'] ?>">
   <input type="hidden" name="name" value="<?php echo $row['tensanpham'] ?>">
   <input type="hidden" name="price" value="<?php echo $row['gia'] ?>">
   <input type="hidden" name="image" value="<?php echo $row['hinhanh'] ?>">
   <main class="main">
      <div class="food-details" style="padding-top: 100px;">
         <div class="container">
            <div class="row d-sm-flex m-auto">
               <div class="img-details col-md-6">
                  <aside class="aside-img">
                     <div class="img">
                        <img src="../image1/<?php echo $row['hinhanh'] ?>" alt="" style="width: 100%;" />
                     </div>
                     
                  </aside>
               </div>
               <!-- <div style="clear: both;"></div> -->
               <div class="text-food-details col-md-6">
                  
                  <p class="title-food"><?php echo $row['tensanpham']; ?></p>
                  
                  
                  <p class="price-food">
                     <span>
                        <b>Giá bán: </b><?php echo $row['gia']; ?> VNĐ </span>
                  </p>
                  
                  <p>
                  
                     <button class="buy-now">order now</button>
                  </p>
                  <div class="book-a-table-now">
                     <div class="new">New</div>
                     
                     <button class="btn_add show-menu common-button">Thêm vào giỏ</button>
                  </div>
                  <hr>
                  <p>
                  
                  </p>
               </div>
            </div>
         </div>
         <div></div>
      </div>
      <!-- <div style="clear: both;"></div> -->
      <div class="restaurant-information">
         <div class="container">
            <div class="row d-md-flex">
               <div class="restaurant-information-left col-md-6">
                  <span>
                     <b>Mô tả sản phẩm</b>
                  </span>
                  <p>
                  <?php echo $row['mota']; ?>
                  </p>
                  
               </div>
               <div class="restaurant-information-right col-md-6">
                  <span>
                     <b>Đánh giá từ khách hàng</b>
                  </span>
                  <div class="judge" id="dsbinhluan">
                  <?php
    // 1.kết nối
    $conn = mysqli_connect("localhost", "root", "", "fooddrink");
    //2.truy vấn
    $sql1 = "SELECT * FROM binhluan WHERE idsp=".$_GET['idsp'];
    $kq1 = mysqli_query($conn, $sql1);
    //3.hiển thị
    while($row1 = mysqli_fetch_array($kq1)){
    //   echo '<p>' .$row['iduser']. '.'.$row['noidung']. '</p>';
    
    ?>
                     <div class="info-profile" id="dsbinhluan">
                        <span class="name-tag"><?php echo $row1['user'] ?></span>
                        <p class="person-rate">
                        
                        
                        <span class="prize"><?php echo $row1['noidung'] ?></span>
                        </p>
                     </div>
                     <?php 
                    }   
                  ?>
                  </div>
                  
                  
                  <?php 
                     if(isset($_SESSION['user_id'])){
                        ?>
                        <div class="judge-comment">
                           <div class="img-profile">
                              <!-- <img src="./images/profile1.jpg" alt=""> -->
                              <span class="name-tag"><?php $idus = $_SESSION['user']; echo $idus; ?></span>
                           </div>
                           <div class="input-judge">
                           <input type="hidden" value="<?php echo $_GET['idsp']; ?>" id="idsp"> 
                           <input class="ip" type="text" placeholder="       Nhận xét" name="content" id="content">
                           <input class="bt" type="button" value="Gửi" id="btnGui"></input>
                           </div>
                        </div>
                        <?php

                     }
                  ?>
               </div>
            </div>
         </div>
      </div>
      <script>
      $("#btnGui").click(function(){
        $.ajax({
          method: "post",
          url: '../user/Addcm.php',
          data: {idsp: $('#idsp').val(), content: $('#content').val()}
        })
        .done(function(data){
          $('#dsbinhluan').append('<span class="name-tag">' + data + '</span>' +'<p class="prize">' + $('#content').val() + '</p>');
         //  alert($('#content').val());
          $('#content').val('');
          // alert("oke");
         //  alert(data);mót
          
          
        })
        .fail(function(data){

        });
      });
    </script>
      <!-- <div style="clear: both;"></div> -->
      <div class="about-content-container">
         <div class="about-content">
            <!-- <div style="clear: both;"></div> -->
            <?php
            include('suggestedproducts.php');
        ?>
         </div>
         
      </div>
   </main>
   <div id="notificationmethod" class="method">
    <div class="method-content">
      <p class="method-text">sản phẩm đã hết!</p>
      <div class="method-actions">
        <button class="confirm" onclick="closemethod()">Xác nhận</button>
      </div>
    </div>
  </div>
   <script src="../js/mota.js"></script>
   <!-- <script src="appCTF.js"></script> -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>