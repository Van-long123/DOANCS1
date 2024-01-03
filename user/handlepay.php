<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
     }else{
        $user_id = '';
     };
        if($user_id==''){
            echo 1;
        }
        else{
            $pid=$_POST['idsp'];
            $conn=mysqli_connect('localhost','root','','fooddrink');
            $sqlproduct="SELECT * FROM sanpham WHERE id=$pid";
            
            $rsproduct=mysqli_query($conn,$sqlproduct);
            $rowproduct=mysqli_fetch_array($rsproduct);

            $name=$rowproduct['tensanpham'];
            $price=$rowproduct['gia'];
            $image=$rowproduct['hinhanh'];
            $qty=1;

            if($rowproduct['soluong']==0){
                echo 0;
            }
            else{
                echo 2;
            }
        }
?>

