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

   <h1 class="heading">Cập nhật sản phẩm</h1>

   <?php
      $id = $_GET['id'];
      $conn = mysqli_connect("localhost", "root", "", "fooddrink");

      //2.truy vấn
      $sql = "SELECT * FROM sanpham WHERE id = " . $id;
      // $sql = "SELECT * FROM sanpham";
      $kq = mysqli_query($conn, $sql);

      //3.hiển thị
      $row = mysqli_fetch_array($kq);
   ?>
   <form action="update_pro.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <img src="../image1/<?php echo $row['hinhanh'] ?>" alt="">
      
      <span>Cập nhật tên</span>
      <input type="text"  placeholder="enter product name" name="tensanpham" maxlength="100" class="box" value="<?php echo $row['tensanpham']; ?>">
      <span>Cập nhật ảnh</span>
      <input type="file"  value="<?php echo $row['hinhanh']; ?>" name="hinhanh" class="box"  >
<span>Cập nhật giá</span>
   <input type="number" min="0" max="9999999999"  placeholder="enter product price" name="gia" onkeypress="if(this.value.length == 10) return false;" class="box" value="<?php echo $row['gia']; ?>" >
   <span>Cập nhật số lượng</span>
   <input type="number" min="0" max="9999999999"  placeholder="enter product price" name="soluong" onkeypress="if(this.value.length == 10) return false;" class="box" value="<?php echo $row['soluong']; ?>">
   <span>Cập nhật chi tiết</span>
   <div class="box" ><textarea name="mota" id="editor">
    <?php
    echo $row['mota'];
    ?>
        </textarea></div>
        <span>Cập nhật danh mục</span>
        <select name="iddanhmuc" class="box" id="" placeholder="Category">
        <option value="<?php echo $row['iddanhmuc']?>" > <?php echo $row['iddanhmuc']?></option>
        <?php
            //1.kết nối
            $conn = mysqli_connect("localhost", "root", "", "fooddrink");

            //2.truy vấn
            $sql1 = "SELECT * FROM danhmuc";
            $kq1 = mysqli_query($conn, $sql1);

            //3.hiển thị
            while($row1 = mysqli_fetch_array($kq1)){
                echo '<option value = "' . $row1['id'] . '">' . $row1['tendanhmuc'] . '</option>';
            }
        ?>
        </select>
      
      <div class="flex-btn">
         <input type="submit" value="Sửa" class="btn1" name="update">
         <a href="admin_product.php" class="option-btn">Trở về</a>
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