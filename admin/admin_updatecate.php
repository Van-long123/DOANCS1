<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update product</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="style_admin2.css">

</head>
<body>


<!-- update product section starts  -->

<section class="update-product">

   <h1 class="heading">Cập nhật</h1>

   <?php
      $id = $_GET['id'];
      $conn = mysqli_connect("localhost", "root", "", "fooddrink");

      //2.truy vấn
      $sql = "SELECT * FROM danhmuc WHERE id = " . $id;
      // $sql = "SELECT * FROM sanpham";
      $kq = mysqli_query($conn, $sql);

      //3.hiển thị
      $row = mysqli_fetch_array($kq);
   ?>
   <form action="update_category.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $row['id']; ?>">
      <img src="../images4/<?php echo $row['hinhanh'] ?>" alt="">
      <span>Cập nhật tên</span>
      <input type="text"  placeholder="enter product name" name="tendanhmuc" maxlength="100" class="box" value="<?php echo $row['tendanhmuc']; ?>">
      <span>Cập nhật ảnh</span>
      <input type="file" name="hinhanh" class="box"  >

      
      <div class="flex-btn">
         <input type="submit" value="Sửa" class="btn1" name="update">
         <a href="admin_category.php" class="option-btn">Trở về</a>
      </div>
   </form>
   

</section>

<!-- update product section ends -->








<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>


<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>