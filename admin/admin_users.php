<?php



session_start();

$id_admin = $_SESSION['id_admin'];

if(!isset($id_admin)){
   header('location: ../admin/admin_accounts.php');
}

if(isset($_GET['delete'])){
//    $delete_id = $_GET['delete'];
//    $delete_users = $conn->prepare("DELETE FROM `users` WHERE id = ?");
//    $delete_users->execute([$delete_id]);
//    $delete_order = $conn->prepare("DELETE FROM `orders` WHERE user_id = ?");
//    $delete_order->execute([$delete_id]);
//    $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
//    $delete_cart->execute([$delete_id]);
$conn = mysqli_connect("localhost", "root", "", "fooddrink");

//2.truy vấn
$sql = "DELETE FROM dangnhap WHERE id = " . $_GET['delete'];

$kq = mysqli_query($conn, $sql);
    header('location:admin_users.php');
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


<!-- user accounts section starts  -->

<section style="margin-top: 70px;" class="accounts">

   <h1 class="heading">Tài khoản người dùng</h1>

   <div class="box-container">

   <?php
     

     //1.kết nối
     $conn = mysqli_connect("localhost", "root", "", "fooddrink");

     //2.truy vấn
     $sql1 = "SELECT * FROM dangnhap ";
     // $sql = "SELECT * FROM sanpham";
     $kq1 = mysqli_query($conn, $sql1);

     //3.hiển thị
     while($row1 = mysqli_fetch_array($kq1)){
             
       ?>
   <div class="box">
      <p> ID người dùng : <span><?php echo $row1['id']; ?></span> </p>
      <p> Tên người dùng : <span><?php echo $row1['username']; ?></span> </p>
      <a href="admin_users.php?delete=<?php echo $row1['id']; ?>" class="delete-btn" onclick="return confirm('delete this account?');">Xóa</a>
   </div>
   <?php
            }
            
            ?>

   </div>

</section>

<!-- user accounts section ends -->







<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>