<?php
    session_start();
    $total=$_SESSION['total'];
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id = '';
    };
    if($user_id==''){
        header('location:/DOANCS22/user/formL.php');
    }
    $conn = mysqli_connect('localhost','root','','fooddrink');
    

    $sqlinfo="SELECT * FROM info WHERE user_id=$user_id";
    $resultinfo = mysqli_query($conn,$sqlinfo);
    $rowinfo=mysqli_fetch_array($resultinfo);
    $min = 1;
    $max = 10000;
    $randomNumber = rand($min, $max);
    $previousNumbers = []; 
    while (in_array($randomNumber, $previousNumbers)) {
        $randomNumber = rand($min, $max);
        }
    $previousNumbers[] = $randomNumber;
    $addressinfo = $rowinfo['address'];
    $phoneinfo = $rowinfo['phone'];
    $paymentinfo = $rowinfo['payment'];
    $sqlorders = "INSERT INTO orders (id,user_id, address, phone, payment, total) VALUES ($randomNumber,$user_id, '$addressinfo', $phoneinfo, '$paymentinfo', $total)";
    mysqli_query($conn, $sqlorders);

    if(isset($_GET['idsp'])){
        $idsp=$_GET['idsp'];
        $sql="SELECT gia FROM sanpham WHERE id = $idsp";
        $result= mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
        $price=$row['gia'];
        $sqlorder_detail="INSERT INTO orders_detail (idorder,idproduct,quantity,price) VALUES ($randomNumber,$idsp,1,$price)";
        mysqli_query($conn,$sqlorder_detail);
        $sqlproduct = "UPDATE sanpham SET soluong = soluong - 1 WHERE id =$idsp";
        mysqli_query($conn,$sqlproduct);
        header("location:/DOANCS22/user/orderinfo.php");
    }
    else{
        $sqlcart = "SELECT * FROM cart WHERE user_id=$user_id";
        $resultcart = mysqli_query($conn,$sqlcart);
        while($rowcart = mysqli_fetch_array($resultcart)){
            $sqlorder_detail="INSERT INTO orders_detail (idorder,idproduct,quantity,price) VALUES ($randomNumber,{$rowcart['pid']},{$rowcart['quantity']},{$rowcart['price']})";
            mysqli_query($conn,$sqlorder_detail);
            $soluongcart = $rowcart['quantity'];
            $idcart = $rowcart['pid'];
            $sqlproduct = "UPDATE sanpham SET soluong = soluong - $soluongcart WHERE id = $idcart ";
            mysqli_query($conn,$sqlproduct);
        }
        $rscart = mysqli_query($conn,$sqlcart);
        $sql="DELETE FROM cart WHERE user_id=$user_id";
        mysqli_query($conn,$sql);
        header("location:/DOANCS22/user/orderinfo.php");
    }
  ?>