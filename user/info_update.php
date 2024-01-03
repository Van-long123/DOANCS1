<?php 
    session_start();
    if(isset($_POST['btngui'])){
        $user_id = $_SESSION['user_id'];
        $user_name = $_POST['user_name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $payment = $_POST['payment'];
        $conn = mysqli_connect('localhost','root','','fooddrink');
        $sql1="UPDATE info SET user_id = $user_id, user_name = '$user_name', address = '$address', phone=$phone,payment = '$payment'  WHERE user_id = $user_id";
        mysqli_query($conn,$sql1);
        header("location:/DOANCS22/user/thanhtoan.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="../css/forminfo.css">
<title>Title</title>
</head>
<body>
    <?php 
        $user_id = $_SESSION['user_id'];
        $conn = mysqli_connect('localhost','root','','fooddrink');
        $sql ="SELECT * FROM info WHERE user_id = $user_id";
        $rs=mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($rs);
        $user_name = $row['user_name'];
        $address = $row['address'];
        $phone = $row['phone'];
        $payment = $row['payment'];
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a class="logo" href="thanhtoan.php"><img src="../image1/logo.png" alt=""></a>
                <span class="info">Information</span>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-5">
                <form method="post" action="info_update.php" style="margin-left: 70px; display: flex;justify-content: center;background-color: rgb(247, 247, 247);border: rgb(221, 221, 221);">
                    <table>
                        <tr>
                            <td><label for="">Họ tên</label></td>
                            <td> <input class="input-item" type="text" name="user_name" value="<?php echo $user_name ?>"></td>
                        </tr>
                        <tr>
                            <td> <label for="">Điện thoại di động</label></td>
                            <td ><input class="input-item" type="text" name="phone" value="<?php echo $phone ?>"></td>
                        </tr>
                        
                        <tr>
                            <td><label for="">Địa chỉ</label></td>
                            <td ><textarea  name="address" ><?php echo $address ?></textarea> <br> <span class="paraitem">Để nhận hàng thuận tiện hơn, bạn vui lòng cho Food biết loại địa chỉ.</span></td>
                            
                        </tr>
                        <tr>
                            <td><label for="">Phương thức thanh toán</label></td>
                            <td>
                                
                                <select name="payment" id="pttt" value="<?php echo  $payment ?>">
                                    <option value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option>
                                    <option value="Thanh toán bằng ví Viettel Money">Thanh toán bằng ví Viettel Money</option>
                                    <option value="Thanh toán bằng ví MoMo">Thanh toán bằng ví MoMo</option>
                                    <option value="Thanh toán bằng ví ZaloPay">Thanh toán bằng ví ZaloPay</option>
                                    <option value="Thanh toán bằng VNPAY">Thanh toán bằng VNPAY</option>
                                    <option value="Thanh toán bằng thẻ quốc tế Visa, Master, JCB">Thanh toán bằng thẻ quốc tế Visa, Master, JCB</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;" colspan="2">
                                <button class="create-update" type="submit" name="btngui">Cập nhật</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>