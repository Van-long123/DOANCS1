<?php
    session_start();
    $idsp = $_POST['idsp'];
    $noidung = $_POST['content'];
    $iduser = $_SESSION['user_id'];
    $user = $_SESSION['user'];
    //1.kết nối
    $conn = mysqli_connect("localhost", "root", "", "fooddrink");
    echo "$user ";
    //2.truy vấn
    $sql = "INSERT INTO binhluan (idsp, user, iduser, noidung) VALUES ($idsp, '$user', $iduser,'$noidung' )";
    
    $kq = mysqli_query($conn, $sql);
?>