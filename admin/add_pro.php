<html>
    <head>
        <title>Thêm Sản Phẩm</title>
        
    </head>
    
    
    <?php        
            $tensanpham = $_POST['tensanpham'];
            $gia = $_POST['gia'];
            $soluong = $_POST['soluong'];
            $iddanhmuc = $_POST['iddanhmuc'];
            $mota = $_POST['mota'];
            $hinhanh = $_FILES['hinhanh']['name'];
            move_uploaded_file($_FILES['hinhanh']['tmp_name'],'D:\mysql20062023\choluucocode\htdocs\DOANCS2\image1'.$_FILES['hinhanh']['name']);
            // echo"$hinhanh";
            //1.kết nối
            $conn = mysqli_connect("localhost", "root", "", "fooddrink");

            //2.truy vấn
            $sql = "INSERT INTO sanpham(tensanpham, gia, soluong, iddanhmuc, mota, hinhanh) VALUES ('$tensanpham', $gia, $soluong, $iddanhmuc, '$mota', '$hinhanh')";
            
            $kq = mysqli_query($conn, $sql);

            //3.hiển thị
            header("Location: admin_product.php");
            
        ?>
    </body>
</html>