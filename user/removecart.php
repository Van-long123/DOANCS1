<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
     }else{
        $user_id = '';
     };
     if($user_id==''){
        header('location:/DOANCS22/user/formL.php');
    }
    $pid=$_POST['idsp'];
    $conn=mysqli_connect('localhost','root','','fooddrink');    
    $sql="SELECT * FROM cart WHERE pid=$pid AND user_id=$user_id";
    $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)){
            $row=mysqli_fetch_array($result);
            $qty=$row['quantity']-1;
            $sql="UPDATE cart SET quantity=$qty WHERE user_id=$user_id AND pid=$pid";
            mysqli_query($conn,$sql);
            // if($qty==0){
            //     $sql="DELETE FROM cart WHERE  user_id=$user_id AND pid=$pid";
            //     mysqli_query($conn,$sql);
            // }
            echo $qty;
        } 

?>