<?php
session_start();
// $id_admin = $_SESSION['id_admin'];

if(!isset($_SESSION['id_admin'])){
   header('location:admin_accounts.php');
}
if(isset($_GET['delete'])){
    $conn = mysqli_connect("localhost", "root", "", "fooddrink");

            //2.truy vấn
            $sql = "DELETE FROM acc_admin WHERE id = " . $_GET['delete'];
            
            $kq = mysqli_query($conn, $sql);
    header('location:admin_admins.php');
 }


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tài khoản người dùng</title>

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

<!-- admins accounts section starts  -->

<section style="margin-top: 70px;" class="accounts">

   <h1 class="heading">Tài khoản quản trị viên</h1>

   <div class="box-container">

   <div class="box">
      <p>Đăng ký quản trị viên mới</p>
      <a href="admin_sign.php" class="option-btn">Đăng ký</a>
   </div>

   <?php
     

      //1.kết nối
      $conn = mysqli_connect("localhost", "root", "", "fooddrink");

      //2.truy vấn
      $sql1 = "SELECT * FROM dangnhap WHERE role = 1";
      // $sql = "SELECT * FROM sanpham";
      $kq1 = mysqli_query($conn, $sql1);

      //3.hiển thị
      while($row1 = mysqli_fetch_array($kq1)){
              
        ?>
   <div class="box">
      <p> Id quản trị viên : <span><?php echo $row1['id']; ?></span> </p>
      <p> Tên : <span><?php echo $row1['username']; ?></span> </p>
      <div class="flex-btn"></div>
      
         <a href="admin_admins.php?delete=<?php echo $row1['id']; ?>" class="delete-btn" onclick="return confirm('delete this account?');">Xóa</a>
         <!-- <a href="update_profile.php" class="option-btn">update</a> -->
      </div>
      <?php
            }
            //1.kết nối
            
            ?>
   </div>
   
           
            
        



</section>

<!-- admins accounts section ends -->




















<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>