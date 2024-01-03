<html>
    <head>
        <title>Thêm Sản Phẩm</title>
        
    </head>
    
    
    <?php    
            $id = $_POST['id'];
            $tendanhmuc = $_POST['tendanhmuc'];
            $hinhanh = $_FILES['hinhanh']['name'];
            move_uploaded_file($_FILES['hinhanh']['tmp_name'],'D:\mysql20062023\choluucocode\htdocs\DOANCS2\image1'.$_FILES['hinhanh']['name']);
            // echo"$hinhanh";
            //1.kết nối
            $conn = mysqli_connect("localhost", "root", "", "fooddrink");

            //2.truy vấn
            $sql = "UPDATE danhmuc SET tendanhmuc='$tendanhmuc', hinhanh = '$hinhanh' WHERE id=$id";
            
            $kq = mysqli_query($conn, $sql);

            //3.hiển thị
            header("Location: admin_category.php");
            
        ?>
    </body>
</html>