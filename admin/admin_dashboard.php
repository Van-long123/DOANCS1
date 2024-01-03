<?php


session_start();

$name_admin = $_SESSION['name_admin'];

if(!isset($name_admin)){
   header('location:admin_accounts.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style_admin2.css">
    <link rel="stylesheet" href="style_admin.css">


</head>
<body>
<?php
include("admin_navbar.php");
?>


<!-- admin dashboard section starts  -->

<section style="margin-top: 70px;" class="dashboard">

    <h1 class="heading">Trang chủ</h1>

    <div class="box-container">

    <div class="box">
        <h3>Chào mừng!</h3>
        <p><?php
        echo $_SESSION['name_admin'];
            
        ?></p>
        <!-- <a class="bt" href="update_profile.php" class="btn">update profile</a> -->
    </div>

   <!-- <div class="box">
      <?php
        //  $total_pendings = 0;
        //  $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
        //  $select_pendings->execute(['pending']);
        //  while($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)){
        //     $total_pendings += $fetch_pendings['total_price'];
        //  }
      ?>
      <h3><span></span><?php
    //    $total_pendings;
        ?><sup>đ</sup></h3>
      <p>total pendings</p>
      <a class="bt" href="placed_orders.php" class="btn">see orders</a>
   </div> -->

   <div class="box">
      <?php
        $conn = mysqli_connect("localhost", "root", "", "fooddrink");
        //
       $sql_sumod = "SELECT SUM(price) AS total FROM orders_detail ";

       $rs_sumod = mysqli_query($conn, $sql_sumod);
       
       $sumod = mysqli_fetch_array($rs_sumod);
      ?>
      <h3><span></span><?php
      echo $sumod[0];?><sup>đ</sup></h3>
      <p>Tổng doanh thu</p>
      <a class="bt" href="../admin/admin_order.php" class="btn">Xem đơn hàng</a>
   </div>

   <div class="box">
      <?php
        $conn = mysqli_connect("localhost", "root", "", "fooddrink");
        //
       $sql_addod = "SELECT COUNT(*) FROM orders ";

       $rs_addod = mysqli_query($conn, $sql_addod);
       
       $count_addod = mysqli_fetch_array($rs_addod);
      ?>
      <h3><?php
    //   $numbers_of_orders; 
    echo $count_addod[0];
    //   ?></h3>
      <p>Tổng đơn hàng</p>
      <a class="bt" href="../admin/admin_order.php" class="btn">Xem đơn hàng</a>
   </div>

   <div class="box">
      <?php
        $conn = mysqli_connect("localhost", "root", "", "fooddrink");
         //
        $sql_addcate = "SELECT COUNT(*) FROM danhmuc ";

        $rs_addcate = mysqli_query($conn, $sql_addcate);
        
        $count_addcate = mysqli_fetch_array($rs_addcate);
            
      ?>
      <h3><?php echo $count_addcate[0]; ?></h3>
      <p>Số danh mục</p>
      <a class="bt" href="../admin/admin_category.php" class="btn">Xem danh mục</a>
   </div>
   <div class="box">
      <?php
        $conn = mysqli_connect("localhost", "root", "", "fooddrink");
         //
        $sql_addpro = "SELECT COUNT(*) FROM sanpham ";

        $rs_addpro = mysqli_query($conn, $sql_addpro);
        
        $count_addpro = mysqli_fetch_array($rs_addpro);
            
      ?>
      <h3><?php echo $count_addpro[0]; ?></h3>
      <p>Số sản phẩm</p>
      <a class="bt" href="../admin/admin_product.php" class="btn">Xem sản phẩm</a>
   </div>

   <div class="box">
      <?php
        $conn = mysqli_connect("localhost", "root", "", "fooddrink");
         //
        $sql_user = "SELECT COUNT(*) FROM dangnhap ";

        $rs_user = mysqli_query($conn, $sql_user);
        
        $count_user = mysqli_fetch_array($rs_user);
      ?>
      <h3><?php echo $count_user[0]; ?></h3>
      <p>Người dùng</p>
      <a class="bt" href="../admin/admin_users.php" class="btn">Xem người dùng</a>
   </div>

   <div class="box">
    <?php
    $conn = mysqli_connect("localhost", "root", "", "fooddrink");
         $sql_admin = "SELECT COUNT(*) FROM dangnhap WHERE role = 1";

         $rs_admin = mysqli_query($conn, $sql_admin);
         
         $count_admin = mysqli_fetch_array($rs_admin);
         
      ?>
      <h3><?php echo $count_admin[0]; ?></h3>
      <p>Quản trị viên</p>
      <a class="bt" href="../admin/admin_admins.php" class="btn">Xem quản trị viên</a>
   </div>

   

   </div>

</section>

<!-- admin dashboard section ends -->









<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>