<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/newtest.css">
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
    include("navbar.php");
?>
    <?php
    $total=0;
    $conn=mysqli_connect("localhost","root","","fooddrink");
    $sql="SELECT * FROM cart WHERE user_id=$user_id";
    $result=mysqli_query($conn,$sql);
?>
    <div class="cart">
        <?php 
        if(mysqli_num_rows($result)==0){
            ?>
        <div class="container px-0" style="border-bottom: 13px solid #efefef;">
            <div class=" cart-title py-2 mb-3">
                <h4>GIỎ HÀNG</h4>
            </div>
            <div class="cart-empty py-4 rounded">
                <img src="../image1/cart1.png">
                <p class="Cart-Empty-Notification">Giỏ hàng trống</p>
                <p style="font-size: 16px;">Bạn tham khảo thêm các sản phẩm được Food gợi ý bên dưới nhé!</p>
            </div>
        </div>
        <?php
                include('suggestedproducts.php');
            ?>

        <?php
        }
        else{

        ?>
        <div id="main_cart">
            <div class="container mb-3 ">
                <div class="cart-title mb-2">
                    <h4>GIỎ HÀNG</h4>
                </div>
                <div class="row">
                    <!-- <input type="checkbox" name="" id=""> -->
                    <div class="col-lg-9 col-12">
                        <div class="cart-header">
                            <label>
                                <!-- <input type="checkbox" class="checkbox" id=checkboxall> -->
                                <?php 
                  $sql1="SELECT COUNT(pid) FROM cart WHERE user_id=$user_id";
                  $result1=mysqli_query($conn,$sql1);
                  $sp=mysqli_fetch_array($result1);
                  $totalproduct=$sp[0];
                  ?>
                                <span class="ms-1">Tất cả <span class="all-sp">(
                                        <?php echo $totalproduct ?> sản phẩm)
                                    </span></span>
                            </label>
                            <span class="cart-header-text">Đơn giá</span>
                            <span class="cart-header-text">Số lượng</span>
                            <span class="cart-header-text">Thành tiền</span>
                            <span onclick="showConfirmation(0)"><img class="trash-img" src="../image1/trash.svg"
                                    alt=""></span>
                        </div>
                        <div style="background-color: #F5F5FA;display: block;padding: 5px;"></div>
                        <?php
                          while($row=mysqli_fetch_array($result)){
                      ?>
                        <div class="cart-product" id="product_<?php echo $row['pid'] ?>">
                            <div class="cart-body">
                                <div class="cart-item">
                                    <label>
                                        <!-- <input type="checkbox" value="<?php echo $row['price']*$row['quantity'] ?>" class="checkbox product" onchange="updatetotal()"> -->
                                    </label>
                                    <img class="mx-2 " src="../image1/<?php echo $row['image'] ?>" alt="">
                                    <a href="mota.php?idsp=<?php echo $row['pid'] ?>">
                                        <?php echo $row['name'] ?>
                                    </a>
                                </div>
                                <div class="cart-gia">
                                    <span>
                                        <?php echo $row['price'] ?>
                                    </span><sup>đ</sup>
                                </div>
                                <div class="cart-sl" data-product-id="<?php echo $row['pid']; ?>">
                                    <span class="rounded-start decrease-btn">
                                        <img src="../image1/decrease.svg" alt="">
                                    </span>
                                    <!-- chú ý oninput .replace(/[^0-9]/g,''): Phương thức replace được gọi trên giá trị hiện tại của trường nhập liệu và sử dụng biểu thức chính quy (/[^0-9]/g) để tìm kiếm và thay thế các ký tự không phải số ([^0-9]) bằng một chuỗi rỗng ''.
                              Ký tự "^" khi nằm trong một tập hợp [] có ý nghĩa phủ định. Nó chỉ định rằng các ký tự không được phép nằm trong tập hợp. -->
                                    <!-- <?php echo $row['quantity'] ?></span><sup>đ</sup> -->
                                    <input type="text" class="qty-input" value="<?php echo $row['quantity']?>"
                                        oninput="this.value = this.value.replace(/[^0-9]/g,'');">
                                    <input type="hidden" class="qty-input-hidden" value="<?php echo $row['quantity']?>">
                                    <span class="rounded-end increase-btn">
                                        <img src="../image1/increase.svg" alt="">
                                    </span>
                                </div>
                                <?php
                  $SQL="SELECT soluong FROM sanpham WHERE id=".$row['pid'];
                  $RESULT=mysqli_query($conn,$SQL);
                  $ROW=mysqli_fetch_array($RESULT)
                ?>
                                <input type="hidden" class="qty-product" value="<?php echo $ROW['soluong'] ?>">
                                <div class="cart-tt ms-2">
                                    <span class="cart-tt-price" id="price-product-<?php echo $row['pid'] ?>">
                                        <?php echo $row['price']*$row['quantity'] ?>
                                    </span><sup style="color: #FF424E;">đ</sup>
                                </div>
                                <div class="cart-img">
                                    <span onclick="showConfirmation(<?php echo $row['pid'] ?>)"><img class="trash-img"
                                            src="../image1/trash.svg" alt=""></span>
                                </div>
                            </div>
                            <div style="background-color: #efefef;display: block;height: 1px;"></div>

                            <div class="cart-bootom">
                                <p>Shop Khuyến mãi</p>
                                <span class="vlcsp">Vui lòng chọn sản phẩm trước</span>
                            </div>
                        </div>
                        <?php
                      $total+= $row['price']*$row['quantity'];
          }
          $_SESSION['total']=$total;
                  ?>
                    </div>
                    <div class="col-lg-3 col-12">
                        <div>
                            <?php 

                              $sqlinfo="SELECT * FROM info WHERE user_id = $user_id" ;
                              $rsinfo = mysqli_query($conn,$sqlinfo);
                              if(mysqli_num_rows($rsinfo)>0){
                                  $rowinfo = mysqli_fetch_array($rsinfo);
                                  ?>
                            <div class="info-user">
                                <span class="header-title">Giao tới</span>
                                <a class="header-nav" href="info_update.php">Thay đổi</a>
                                <div class="customer-infor mt-1">
                                    <p>
                                        <?php echo $rowinfo['user_name'] ?>
                                    </p>
                                    <span>|</span>
                                    <p>
                                        <?php echo $rowinfo['phone'] ?>
                                    </p>
                                </div>
                                <div class="address mt-2">
                                    <span class="address-home">Nhà</span>
                                    <span class="">
                                        <?php echo $rowinfo['address'] ?>
                                    </span>
                                </div>
                            </div>
                            <?php
                              }
                          ?>
                            <div class="cart-sidebar-bottom">
                                <p>Tổng tiền

                                </p>
                                <span class="total total-money">
                                    <?php  echo $_SESSION['total'] ?>
                                </span><sup>đ</sup>
                                <!-- <p>Tổng tiền <span class="total-money"><?php  echo $_SESSION['total'] ?></span></p> -->
                            </div>
                            <div class="cart-sidebar-btn">
                                <button class=""><a href="thanhtoan.php">Mua hàng( <span class="total-btn">
                                            <?php
                                  if(isset($_SESSION['user_id'])){
                                      $conn=mysqli_connect('localhost','root','','fooddrink');
                                      $sql="SELECT COUNT(pid) FROM cart WHERE user_id=$user_id";
                                      $result=mysqli_query($conn,$sql);
                                      $sp=mysqli_fetch_array($result);
                                      $totalproduct=$sp[0];
                                      echo $totalproduct;
                                  }
                              ?>
                                        </span> )</a></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php
            include('suggestedproducts.php');
        ?>
    </div>
    <?php
    }
    ?>

    <?php include('footer.php') ?>

    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <!-- <span class="close" onclick="closeConfirmation()">&times;</span> -->
            <p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Xóa sản phẩm</p>
            <p class="modal-text">Bạn có muốn xóa sản phẩm đang chọn?</p>
            <div class="modal-actions">
                <button class="confirm" onclick="confirmDelete()">Xác nhận</button>
                <button class="cancel" onclick="closeConfirmation()">Hủy</button>
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

    <script src="../js/cartt.js"></script>
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

<!-- phương thức closest() sẽ tìm thằng cha gần nhất 
có selector được chỉ định. Nếu không tìm thấy thằng cha nào khớp với
 selector, nó sẽ trở lên thằng cha tiếp theo và tiếp tục tìm kiếm cho 
 đến khi tìm thấy thằng cha mà selector khớp -->