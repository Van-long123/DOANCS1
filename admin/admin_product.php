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
  <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
  <link rel="stylesheet" href="style_admin2.css">
  <link rel="stylesheet" href="style_admin.css">
  <style>
    .pagination {
    display: flex;
    justify-content: center;
    text-align: center;
}

.pagination a {
color: black;
float: left; /* Thay thế float: left; */
padding: 8px 16px;
text-decoration: none;
transition: background-color .3s;
}

.pagination a:hover {
background-color: #ddd;
}
  </style>
  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <!-- <link rel="stylesheet" href="css/menu.css"> -->
  <title>Title</title>
  <style>
    .page-item a:focus {
      box-shadow: none;
  }
  </style>
</head>
<?php
include("admin_navbar.php");
?>
<body style="height: auto;" >


<section class="add-products" style="margin-top: 80px;">

<form action="add_pro.php" method="POST" enctype="multipart/form-data">
   <h3>Thêm sản phẩm</h3>
   <input type="text" required placeholder="Nhập tên sản phẩm" name="tensanpham" maxlength="100" class="box">
   <input type="file" name="hinhanh" class="box"  required>
   <input type="number" min="0" max="9999999999" required placeholder="Giá" name="gia" onkeypress="if(this.value.length == 10) return false;" class="box">
   <input type="number" min="0" max="9999999999" required placeholder="Số lượng" name="soluong" onkeypress="if(this.value.length == 10) return false;" class="box">
   <div class="box" ><textarea name="mota" id="editor">
        </textarea></div>
        <select name="iddanhmuc" class="box" id="" placeholder="Category">
        <option value="" disabled selected>Chọn danh mục --</option>
        <?php
            //1.kết nối
            $conn = mysqli_connect("localhost", "root", "", "fooddrink");

            //2.truy vấn
            $sql = "SELECT * FROM danhmuc";
            $kq = mysqli_query($conn, $sql);

            //3.hiển thị
            while($row = mysqli_fetch_array($kq)){
                echo '<option value = "' . $row['id'] . '">' . $row['tendanhmuc'] . '</option>';
            }
        ?>
        </select>
   
   <input type="submit" value="Thêm sản phẩm" name="add_product" class="btn1">
</form>

</section>
<section class="show-products" style="padding-top: 0;">

   <div class="box-container">

   <?php
            $p=1;
            if(isset($_GET['p']))
                $p = $_GET['p'];
            $sosp = 6;
            $start = ($p - 1) * $sosp;

            //1.kết nối
            $conn = mysqli_connect("localhost", "root", "", "fooddrink");

            //2.truy vấn
            $sql1 = "SELECT * FROM sanpham LIMIT $start, $sosp ";
            // $sql = "SELECT * FROM sanpham";
            $kq1 = mysqli_query($conn, $sql1);

            //3.hiển thị
            while($row1 = mysqli_fetch_array($kq1)){
                    
              ?>
   <div class="box">
      <img src="../image1/<?php echo $row1['hinhanh'] ?>" alt="">
      <div class="flex">
         <div class="price"><span></span><?php echo $row1['gia']; ?><span><sup>đ</sup></span></div>
      </div>
      <div class="name"><?php echo $row1['tensanpham']; ?></div>
      <div class="flex-btn">
         <a href="admin_updatepro.php?id=<?php echo $row1['id'] ; ?>" class="option-btn">Sửa</a>
         <a href="delete_pro.php?id=<?php echo $row1['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">Xóa</a>
      </div>
   </div>
   <?php } ?>

   </div>
   

</section>
<?php
            $conn=mysqli_connect('localhost','root','','fooddrink');
            $sql="SELECT COUNT(id) FROM sanpham";
            $result=mysqli_query($conn,$sql);
            $sosp=mysqli_fetch_array($result);
            $total=ceil($sosp[0]/6);
            if(!empty($total)&& $total> 0){
          ?>
          <nav aria-label="Page navigation example mt-2">
            <ul class="pagination">
              <?php
              if($p>1){
                $new_page=$p-1;
              ?>
              <li class="page-item">
                <a class="page-link" href="admin_product.php?p= <?php echo $new_page ?>" aria-label="Previous">
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
                <li class="page-item <?php echo ($p==$i)?'active':FALSE ?>"><a class="page-link" href="admin_product.php?p= <?php echo $i ?>"><?php echo $i ?></a></li>
                <?php
              }
              if($p<$total){
                $new_page=$p+1;
                ?>
              <li class="page-item">
                <a class="page-link" href="admin_product.php?p=<?php echo $new_page ?>" aria-label="Next">
                  &raquo;
                </a>
              </li>
                <?php } ?>
            </ul>
          </nav>  
<?php 
            }
?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
  <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
</body>

</html>
