<html>
    <head>
        <title>Xóa Sản Phẩm</title>
        
    </head>
    <body>
    
            
        <?php
        
        $conn = mysqli_connect("localhost", "root", "", "fooddrink");

        //2.truy vấn
        $sql = "DELETE FROM sanpham WHERE id = " . $_GET['id'];
        
        $kq = mysqli_query($conn, $sql);
            
        header("Location: admin_product.php");
        ?>
    </body>
</html>