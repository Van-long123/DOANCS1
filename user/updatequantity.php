<?php 
    session_start();
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id = '';
    };
    $pid=$_POST['idsp'];
    $newquantity=$_POST['newquantity'];
    $conn=mysqli_connect('localhost','root','','fooddrink');

    $query="SELECT soluong FROM sanpham WHERE id=$pid";
    $kq=mysqli_query($conn,$query);
    $hang=mysqli_fetch_array($kq);
    if($newquantity<=$hang['soluong']){
        $sql="UPDATE cart SET quantity=$newquantity WHERE user_id=$user_id AND pid=$pid";
        mysqli_query($conn,$sql);
        echo $newquantity;
    }
    else{
        $sql="SELECT quantity FROM cart WHERE pid=$pid AND user_id=$user_id";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
        $newquantity=$row['quantity'];
        echo $newquantity;
    }
    
?>