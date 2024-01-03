<?php 
    session_start();
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id = '';
    };
    if($user_id==''){
        echo 0;
    }
    else{
        if(isset($_POST['password'])) {
            $password=sha1($_POST['password']);
            $confirmPassword = sha1($_POST['confirmPassword']);
            $conn=mysqli_connect('localhost','root','','fooddrink');
            $sql="UPDATE dangnhap SET pass='$password',confirmpass='$confirmPassword' WHERE id=$user_id";
            $result=mysqli_query($conn,$sql);
            echo 1;
            // echo '<script>document.getElementById("notificationmethod").style.display = "block";</script>';
        }
    }
?>