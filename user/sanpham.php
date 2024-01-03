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
  <!-- <link rel="stylesheet" href="css/style.css">  -->
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
?>
  <div id="Menu" class="menu section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="our-menu">
            <h1>Our <span> Menu</span></h1>
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
              if (isset($_GET['iddanhmuc'])) {
                $iddm=$_GET['iddanhmuc'];
                $moitrang=6;
                $start=($p-1)*$moitrang;
                $conn=mysqli_connect('localhost','root','','fooddrink');
                $sql="SELECT * FROM sanpham WHERE iddanhmuc=$iddm  LIMIT $start,$moitrang";
                $result=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_array($result)){
              ?>
          <div class="col-lg-4 col-md-6 col-12 mb-3">
            <div class="h-100 card ">
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
                      <a href="mota.php">
                        <h5 class="card-title">
                          <?php echo $row['tensanpham'] ?>
                        </h5>
                      </a>
                      <!-- <div class="menu_icon">
                        <p>
                          <?php echo $row['mota'] ?>
                        </p>
                      </div> -->
                  <button class="btn btn-pay border border-primary mt-2">Mua ngay</button>
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
            $sql="SELECT COUNT(id) FROM sanpham WHERE iddanhmuc=$iddm";
            $result=mysqli_query($conn,$sql);
            $sosp=mysqli_fetch_array($result);
            $total=ceil($sosp[0]/6);
            if(!empty($total) && $total> 1){
          ?>
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <?php
              if($p>1){
                $new_page=$p-1;
              ?>
              <li class="page-item">
                <a class="page-link" href="sanpham.php?p= <?php echo $new_page ?>&iddanhmuc=<?php echo $iddm ?>" aria-label="Previous">
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
                <li class="page-item <?php echo ($p==$i)?'active':'' ?>"><a class="page-link" href="sanpham.php?p= <?php echo $i ?>&iddanhmuc=<?php echo $iddm ?>"><?php echo $i ?></a></li>
                <?php
              }
              if($p<$total){
                $new_page=$p+1;
                ?>
              <li class="page-item">
                <a class="page-link" href="sanpham.php?p= <?php echo $new_page ?>&iddanhmuc=<?php echo $iddm ?>" aria-label="Next">
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
        <?php
              }
        ?>
      </div>
    </div>
  </div>

  <?php 
    include("footer.php");
  ?>
<div id="notificationmethod" class="method">
    <div class="method-content">
      <p class="method-text">sản phẩm đã hết!</p>
      <div class="method-actions">
        <button class="confirm" onclick="closemethod()">Xác nhận</button>
      </div>
    </div>
  </div>
  <!-- <script src="../js/Sanpham.js"></script> -->
<script>
  const btn_add = document.querySelectorAll('.btn-add');
const quantity = document.querySelectorAll('input[name="qty"]');
const product_id = document.querySelectorAll('input[name="pid"]');
const name = document.querySelectorAll('input[name="name"]');
const price = document.querySelectorAll('input[name="price"]');
const image = document.querySelectorAll('input[name="image"]');
btn_add.forEach(function (button, index) {
  button.addEventListener('click', function () {
    $.ajax({
      type: 'post',
      url: 'addcart.php',
      data: {
        add_to_cart: 'add_to_cart', pid: product_id[index].value, name: name[index].value, price: price[index].value,
        image: image[index].value, qty: quantity[index].value
      },
    })
      .done(function (data) {
        // alert(data);
        if (data) {
          if (data == 'request') {
            document.getElementById("notificationmethod").style.display = "block";
          }
          else if (data == 'redirect') {
            window.location.href = '/DOANCS22/user/formL.php';
          }
          else {
            document.querySelector('.countsp').innerText = data;
            document.getElementById("addsucces").style.display = "block";
          }
        }
      })
      .fail(function (data) {
      });
  })
})


const btn_pay = document.querySelectorAll('.btn-pay');
btn_pay.forEach(function (button, index) {
  button.addEventListener('click', function () {
    $.ajax({
      type: 'post',
      url: 'handlepay.php',
      data: { idsp: product_id[index].value },
    })
      .done(function (data) {
        console.log(data == 'request');
        if (data) {
          if (data == 0) {
            document.getElementById("notificationmethod").style.display = "block";
          }
          else if (data == 1) {
            window.location.href = '/DOANCS22/user/formL.php';
          }
          else if (data == 2) {
            window.location.href = '/DOANCS22/user/thanhtoan.php?idsp=' + product_id[index].value;
          }
        }
      })
      .fail(function (data) {

      })
  })
})

function closemethod() {
  document.getElementById("notificationmethod").style.display = "none";
}
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>