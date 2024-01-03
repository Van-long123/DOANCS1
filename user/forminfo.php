<?php 
    session_start();
    $conn = mysqli_connect('localhost','root','','fooddrink');
    if(isset($_POST['btngui'])){
        $user_id = $_SESSION['user_id'];
        $user_name = $_POST['user_name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $payment = $_POST['payment'];
        $conn = mysqli_connect('localhost','root','','fooddrink');
        $sql1="INSERT INTO info(user_id, user_name, address, phone, payment)  VALUES ($user_id, '$user_name', '$address', $phone, '$payment')";
        $rs = mysqli_query($conn,$sql1);
        if(!empty($_POST['id_product'])){
            header('location:/DOANCS22/user/thanhtoan.php?idsp='.$_POST['id_product']);
        }
        else{
            header('location:/DOANCS22/user/thanhtoan.php');
        }
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
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a class="logo" href="menu.php"><img src="../image1/logo.png" alt=""></a>
                <span class="info">Information</span>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-5">
                <form method="post" action="forminfo.php" style="margin-left: 70px; display: flex;justify-content: center;background-color: rgb(247, 247, 247);border: rgb(221, 221, 221);">
                <input type="hidden" name="id_product" value="<?php echo (isset($_GET['idsp'])) ? $_GET['idsp'] :'' ?>">    
                <table>
                        <tr>
                            <td><label for="">Họ tên</label></td>
                            <td> <input class="input-item" type="text" name="user_name" id=""></td>
                        </tr>
                        <tr>
                            <td> <label for="">Điện thoại di động</label></td>
                            <td ><input class="input-item" type="text" name="phone" id=""></td>
                        </tr>
                        
                        <tr>
                            <td><label for="">Địa chỉ</label></td>
                            <td ><textarea  name="address" id="" ></textarea> <br> <span class="paraitem">Để nhận hàng thuận tiện hơn, bạn vui lòng cho Tiki biết loại địa chỉ.</span></td>
                            
                        </tr>
                        <tr>
                            <td><label for="">Phương thức thanh toán</label></td>
                            <td>
                                
                                <select name="payment" id="pttt">
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

<?php 
    // }
?>