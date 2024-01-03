<html>
    <head>
        <title>Sửa Sản Phẩm</title>
        
    </head>
    <body>
       
    <?php        
            $tensanpham = $_POST['tensanpham'];
            $gia = $_POST['gia'];
            $soluong = $_POST['soluong'];
            $iddanhmuc = $_POST['iddanhmuc'];
            $id = $_POST['id'];
            $mota = $_POST['mota'];
            $hinhanh = $_FILES['hinhanh']['name'];
            move_uploaded_file($_FILES['hinhanh']['tmp_name'],'D:\Phan_mem_lap_trinh\soft\xampp\htdocs\DOANCS2 (2)\DOANCS2\image1/'.$_FILES['hinhanh']['name']);
            //1.kết nối
            $conn = mysqli_connect("localhost", "root", "", "fooddrink");

            //2.truy vấn
            $sql = "UPDATE sanpham SET tensanpham='$tensanpham', gia=$gia, soluong=$soluong, mota='$mota', iddanhmuc=$iddanhmuc, hinhanh='$hinhanh' WHERE id=$id";
            $kq = mysqli_query($conn, $sql);

            

            //3.hiển thị
            header("Location: admin_product.php");
        ?>
    </body>
</html>