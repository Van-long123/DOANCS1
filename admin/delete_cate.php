<html>
    <head>
        <title>Xóa Sản Phẩm</title>
        
    </head>
    <body>
    
            
        <?php
        $iddanhmuc = $_GET['id'];
        $conn = mysqli_connect("localhost", "root", "", "fooddrink");

        //2.truy vấn
        $sql = "DELETE FROM danhmuc WHERE id = " . $_GET['id'];
        
        $kq = mysqli_query($conn, $sql);
            
        header("Location: admin_category.php");
        ?>
    </body>
</html>