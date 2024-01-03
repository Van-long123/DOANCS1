<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="Description" content="Enter your description here" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="../css/orderinfo.css">
  <link rel="stylesheet" href="style_admin.css">
  <!-- <link rel="stylesheet" href="style_admin2.css"> -->
  <title>Title</title>
  <style>
    p{
      text-align: left;
    }
  </style>
</head>

<body>
  <?php
session_start();
// $id_admin = $_SESSION['id_admin']
if(isset($_SESSION['id_admin'])){
   $id_admin = $_SESSION['id_admin'];
 }else{
   $id_admin = '';
 };
      if($id_admin == ''){
         header('location:/DOANCS22/admin/admin_accounts.php');
      }else{
        $conn = mysqli_connect('localhost','root','','fooddrink');
        $sql= "SELECT * FROM orders";
        $rs = mysqli_query($conn,$sql);
   ?>

  <?php  include("admin_navbar.php")?>
  <div class="container-fluid my-5  d-flex  justify-content-center">
    <div style="margin-top: 80px;" class="card card-1">
      <!-- <div class="card-header bg-white">
        <div class="media flex-sm-row flex-column-reverse justify-content-between  ">
          <div class="col my-auto">
            <h4 class="mb-0">Thanks for your Order,<span class="change-color">
                <?php echo $_SESSION['user'] ?>
              </span> !</h4>
          </div>
        </div>
      </div> -->
      <div class="card-body">
        <div class="row justify-content-between mb-3">
          <div class="col-auto">
            <h6 class="color-1 mb-0 change-color">Hóa đơn</h6>
          </div>
        </div>
        <?php 
                while($row = mysqli_fetch_array($rs)){
                    $sqldetail = "SELECT * FROM orders_detail WHERE idorder = " . $row['id'];
                    $rsdetail = mysqli_query($conn,$sqldetail);
                ?>
        <div class="row mt-4">
          <div class="col">
            <div class="card card-2">
              <div class="card-body">
                <div class="media">
                  <div class="media-body my-auto text-right">
                    <div class="row  my-auto flex-column flex-md-row">
                      <p>id : <span>
                          <?php echo $row['id'] ?>
                        </span></p>
                      <p>Tên : <span>
                          <?php echo $row['user_id'] ?>
                        </span></p>
                      <p>SDT : <span>
                          <?php echo $row['phone'] ?>
                        </span></p>
                      <p>Địa chỉ : <span>
                          <?php echo $row['address']; ?>
                        </span></p>
                      <p>Phương thức thanh toán : <span>
                          <?php echo $row['payment'];; ?>
                        </span></p>
                      <p>Chi tiết : <span>
                          <?php 
                                        $details = array();
                                                while($rowdetail = mysqli_fetch_array($rsdetail)){
                                                $sqlProduct= "SELECT tensanpham FROM sanpham WHERE id =".$rowdetail["idproduct"];
                                                $rsProduct = mysqli_query($conn,$sqlProduct);
                                                $rowProduct=mysqli_fetch_array($rsProduct);
                                                $details[] = $rowProduct['tensanpham'].' ('.$rowdetail['price'] . '*' . $rowdetail["quantity"].')';
                                                    // print_r($rowdetail);
                                                }
                                                echo implode(',', $details);
                                        ?>
                        </span></p>
                      <p>Tổng tiền : <span>
                          <?php  echo $row['total']; ?>
                        </span><sup>đ</sup></p>
                    </div>
                  </div>
                </div>
                <hr class="my-3 ">

              </div>
            </div>
          </div>
        </div>
        <?php 
               }?>
      </div>

    </div>
  </div>
  <?php }?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>