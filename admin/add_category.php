<html>
    <head>
        <title>Thêm Sản Phẩm</title>
        
    </head>
    
    
    <?php        
            $tendanhmuc = $_POST['tendanhmuc'];
            $hinhanh = $_FILES['hinhanh']['name'];
            move_uploaded_file($_FILES['hinhanh']['tmp_name'],'D:\Phan_mem_lap_trinh\soft\xampp\htdocs\DOANCS2 (2)\DOANCS2\image1'.$_FILES['hinhanh']['name']);
            // echo"$hinhanh";
            //1.kết nối
            $conn = mysqli_connect("localhost", "root", "", "fooddrink");

            //2.truy vấn
            $sql = "INSERT INTO danhmuc(tendanhmuc, hinhanh) VALUES ('$tendanhmuc', '$hinhanh')";
            
            $kq = mysqli_query($conn, $sql);

            //3.hiển thị
            header("Location: admin_category.php");
            
        ?>
    </body>
</html>