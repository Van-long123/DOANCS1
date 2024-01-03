<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
     }else{
        $user_id = '';
     };
     
     if(isset($_POST['add_to_cart'])){
        if($user_id==''){
            echo 'redirect';
        }
        else{
            $pid=$_POST['pid'];
            $name=$_POST['name'];
            $price=$_POST['price'];
            $image=$_POST['image'];
            $qty=$_POST['qty'];
            $conn=mysqli_connect('localhost','root','','fooddrink');
            $sqlproduct="SELECT soluong FROM sanpham WHERE id=$pid";
            $rsproduct=mysqli_query($conn,$sqlproduct);
            $rowproduct=mysqli_fetch_array($rsproduct);
            if($rowproduct['soluong']==0){
                // header('location:/DOANCS22/user/cart.php?request');
                echo 'request';
            }
            else if($rowproduct['soluong']==1){
                $sql="SELECT * FROM cart WHERE name='$name' AND user_id=$user_id";
                $result=mysqli_query($conn,$sql);
                // true 
                if(mysqli_num_rows($result)){
                    // echo "dung";
                    // header('location:/DOANCS22/user/cart.php?request');
                    echo 'request';
                }   
                else{
                    // echo "sai";
                    $sql="INSERT INTO cart(user_id,pid,name,price,image,quantity) VALUES ($user_id,$pid,'$name',$price,'$image',$qty)";
                    mysqli_query($conn,$sql);
                    $sqlcountid="SELECT COUNT(pid) FROM cart WHERE user_id=$user_id";
                    $resultcountid=mysqli_query($conn,$sqlcountid);
                    $sp=mysqli_fetch_array($resultcountid);
                    $totalproduct=$sp[0];
                    echo $totalproduct;
                    // header('location:/DOANCS22/user/cart.php');
                }
            }
            else{
                $sql="SELECT * FROM cart WHERE pid=$pid AND user_id=$user_id";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_array($result);
                    if(mysqli_num_rows($result)){
                        // echo "dung";
                        if($rowproduct['soluong']==$row['quantity']){
                            // header('location:/DOANCS22/user/cart.php?request');
                            echo 'request';
                        }
                        else{
                            $qty=$row['quantity']+1;
                            $sql="UPDATE cart SET quantity=$qty WHERE user_id=$user_id AND pid=$pid";
                            mysqli_query($conn,$sql);
                            $sqlcountid="SELECT COUNT(pid) FROM cart WHERE user_id=$user_id";
                            $resultcountid=mysqli_query($conn,$sqlcountid);
                            $sp=mysqli_fetch_array($resultcountid);
                            $totalproduct=$sp[0];
                            echo $totalproduct;
                        }
                        
                    }   
                    else{
                        // echo "sai";
                        $sql="INSERT INTO cart(user_id,pid,name,price,image,quantity) VALUES ($user_id,$pid,'$name',$price,'$image',$qty)";
                        mysqli_query($conn,$sql);
                        $sqlcountid="SELECT COUNT(pid) FROM cart WHERE user_id=$user_id";
                        $resultcountid=mysqli_query($conn,$sqlcountid);
                        $sp=mysqli_fetch_array($resultcountid);
                        $totalproduct=$sp[0];
                        echo $totalproduct;
                    }
                    
                    // header('location:/DOANCS22/user/cart.php');
                
            }
        }
     }
    else{
        $pid=$_POST['idsp'];
        $conn=mysqli_connect('localhost','root','','fooddrink');    
        $query="SELECT soluong FROM sanpham WHERE id=$pid";
        $kq=mysqli_query($conn,$query);
        $hang=mysqli_fetch_array($kq);
        $sql="SELECT * FROM cart WHERE pid=$pid AND user_id=$user_id";
        $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)){
                $row=mysqli_fetch_array($result);
                $qty=$row['quantity']+1;
                if($qty<=$hang['soluong']){
                    $sql="UPDATE cart SET quantity=$qty WHERE user_id=$user_id AND pid=$pid";
                    mysqli_query($conn,$sql);
                    echo $qty;
                }
                else{
                    echo 0;
                }
                
            } 
    }
?>