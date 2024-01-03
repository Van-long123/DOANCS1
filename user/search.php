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
  include("navbar.php");
        $sp=$_GET["spsearch"];
    ?>
  <div class="xysearch">
    <div class="result-search container mb-4">
      <span><a href="home.php">Trang chủ</a> &gt Kết quả tìm kiếm "
        <?php echo $sp?>"
      </span>
    </div>
    <?php
    // include("navbar.php");
    if(isset($sp)){
        $conn=mysqli_connect("localhost","root","","fooddrink");
        $p=1;
        if(isset($_GET['p'])){
        $p= $_GET['p'];
        } 
        $moitrang=12;
        $start=($p-1)*$moitrang;
        $sql="SELECT * FROM sanpham WHERE tensanpham LIKE '%$sp%'  LIMIT $start,$moitrang";
        $result=mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0) {
            // Có dữ liệu từ cơ sở dữ liệu
            ?>
    <div class="container ">
      <div class="row">
        <div class="col-lg-10">
          <div class="row">

            <?php
            while ($row = mysqli_fetch_array($result)) {
                // Xử lý dữ liệu ở đây
                ?>
            
                <div class="col-lg-2 col-md-3 search-items">
                <a class="mota" href="mota.php?idsp=<?php echo $row['id']; ?>">
                <img class="search-item-img" src="../image1/<?php echo $row['hinhanh']?>" alt="">
                <img class="img-ch" src="../image1/chinhhang.png" alt="">
                <p class="search-item-name mt-1 ms-1">
                    <?php echo $row['tensanpham'] ?>
                </p>
                <p class="search-item-price ms-1 mt-1">
                    <?php echo $row['gia'] ?><sup>đ</sup>
                </p>
                </a>
                </div>
                
            <?php
            }
            ?>
          </div>
        </div>
        <div class="col-lg-2 card pb-4">
            <div class="sidebar-search ">
              <?php 
                $conn=mysqli_connect('localhost','root','','fooddrink');
                $sql = "SELECT * FROM sanpham ORDER BY RAND() LIMIT 1";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_array($result)
              ?>
                <img src="../image1/<?php echo $row['hinhanh']?>" alt="">
                <div class="sidebar-content">
                    <h4>So tasty!</h4>
                    <p>A delicious beverage</p>
                    <a href="mota.php?idsp=<?php echo $row['id'] ?>"><button>More Info</button></a>
                </div>
            </div>
        </div>
      </div>
      
           <?php
            $conn=mysqli_connect('localhost','root','','fooddrink');
            $sql="SELECT COUNT(id) FROM sanpham WHERE tensanpham LIKE '%$sp%'";
            $result=mysqli_query($conn,$sql);
            $sosp=mysqli_fetch_array($result);
            $total=ceil($sosp[0]/12);
            if(!empty($total)&& $total> 0){
          ?>
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <?php
              if($p>1){
                $new_page=$p-1;
              ?>
              <li class="page-item">
                <a class="page-link" href="search.php?p= <?php echo $new_page ?>&spsearch=<?php echo $sp ?>" aria-label="Previous">
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
                <li class="page-item <?php echo ($p==$i)?'active':FALSE ?>"><a class="page-link" href="search.php?p= <?php echo $i ?>&spsearch=<?php echo $sp ?>"><?php echo $i ?></a></li>
                <?php
              }
              if($p<$total){
                $new_page=$p+1;
                ?>
              <li class="page-item">
                <a class="page-link" href="search.php?p= <?php echo $new_page ?>&spsearch=<?php echo $sp ?>" aria-label="Next">
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
        else {
            ?>
            <div class="container d-flex justify-content-center py-4">
                <div class="search-empty">
                    <img src="../image1/search.png" alt="">
                    <span>Ố ồ! Không có sản phẩm nào cho từ khóa '<?php echo $sp?>'</span>
                </div>
            </div>
            <?php
        }
    }
?>
  </div>
  <?php
    include("footer.php");
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>