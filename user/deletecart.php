<?php 
    session_start();    
    $idsp=$_POST['idsp'];
    $conn=mysqli_connect("localhost","root","","fooddrink");
    if($idsp==0){
        $sql="DELETE FROM cart ";
        mysqli_query($conn,$sql);
        echo 0;
    }
    else{
        $sql="DELETE FROM cart WHERE pid=$idsp";
        mysqli_query($conn,$sql);
        $sqlcount="SELECT COUNT(pid) FROM cart WHERE user_id=".$_SESSION['user_id'];
        $resultcount=mysqli_query($conn,$sqlcount);
        $rowcount=mysqli_fetch_array($resultcount);
        // echo $rowcount[0];
        if($rowcount[0]>=1){
            $sqlcountid="SELECT COUNT(pid) FROM cart WHERE user_id=".$_SESSION['user_id'];
            $resultcountid=mysqli_query($conn,$sqlcountid);
            $sp=mysqli_fetch_array($resultcountid);
            $totalproduct=$sp[0];
            echo $totalproduct;
        }
        else{
            echo 0;
        }
    }
    
    // header("location:/DOANCS22/user/cart.php");
?>