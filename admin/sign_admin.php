<?php        
    if(!empty($_POST)){
        $error=[];
        $pass = sha1($_POST["pass"]);
        $name_admin=$_POST["name_admin"];
        $conn=mysqli_connect('localhost','root','','fooddrink');
        $sql = "SELECT * FROM dangnhap WHERE username = '$name_admin'"; 
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==0){
            $sql1="INSERT INTO dangnhap(username, pass ,role) VALUES ('$name_admin', '$pass',1)";
            mysqli_query($conn,$sql1);
            header("Location: ../user/formL.php");
        }
        else{
            $error['fullname']['required']="Tên đã tồn tại";
        }
    }
?>