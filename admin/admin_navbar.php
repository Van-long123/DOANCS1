
<html>
    <head>
        <title>

        </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">


<!-- <link rel="stylesheet" href="style_admin.css"> -->
    </head>
    <body>
        <div class="home-section position-fixed w-100">
            <nav class="navbar navbar-expand-lg" id="navbar">
                <div class="container">
                    <a class="navbar-brand" href="../user/home.php" id="logo"><img src="logo.png" alt="" width="30px"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i style="font-size: 35px;" class="bi bi-list i"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a id="navb" style="font-size: 15px;" class="nav-link active" aria-current="page" href="../admin/admin_dashboard.php" id="first-child">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a id="navb" style="font-size: 15px;" class="nav-link" href="admin_category.php">Danh mục</a>
                            </li>
                            <li class="nav-item">
                                <a id="navb" style="font-size: 15px;" class="nav-link" href="admin_product.php">Sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a id="navb" style="font-size: 15px;" class="nav-link" href="admin_order.php">Đơn hàng</a>
                            </li>
                            <li class="nav-item">
                                <a id="navb" style="font-size: 15px;" class="nav-link" href="../admin/admin_admins.php">Quản trị viên</a>
                            </li>
                            <li class="nav-item">
                                <a id="navb" style="font-size: 15px;" class="nav-link" href="../admin/admin_users.php">Người dùng</a>
                            </li>
                            
                        </ul>
        
                        <div class="d-flex" role="search" class="icons">
                            
                            <div class="icons-user">
                                <a style="color: rgb(38, 36, 36);" href="../user/formL.php"><i style="font-size: 26px;"
                                        class="bi bi-person-fill"></i></a>
                                
                                <div class="icons-user-board">
                                <a><?php
                                    echo $_SESSION['name_admin'];
                                ?></a>
                                    <a href="cart.php" class="mt-1">Đăng kí</a>
                                    <a href="../user/handlelogout.php">Đăng xuất   </a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </body>
</html>