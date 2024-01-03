<div class="home-section position-fixed w-100">
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="home.php" id="logo"><img src="../image1/logo.png" alt="" width="30px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i style="font-size: 35px;" class="bi bi-list i"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php" id="first-child">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu.php">Thực đơn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php #bosuutap">Bộ sưu tập</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="home.php #Gallary">Gallary</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="home.php #sec-wp">Thông tin cửa hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php #Footer">Liên hệ</a>
                    </li>
                </ul>

                <div class="d-flex" role="search" class="icons">
                      <div class="icon-search d-flex">
                        <input name="spsearch" class="form-control me-2 searchInput" type="search1" placeholder="Search" aria-label="Search">
                        <button style="border: none;" type="submit" >
                          <i style="font-size: 22px;" class="bi bi-search"></i> 
                        </button>
                      </div>
                    <div class="icons-cart">
                        <a style="color: rgb(38, 36, 36);" href="cart.php"><i style="font-size: 23px; "
                                class="bi bi-cart-check-fill"></i></a>
                        <span class="countsp">
                            <?php
                                if(isset($_SESSION['user_id'])){
                                    $conn=mysqli_connect('localhost','root','','fooddrink');
                                    $sql="SELECT COUNT(pid) FROM cart WHERE user_id=$user_id";
                                    $result=mysqli_query($conn,$sql);
                                    $sp=mysqli_fetch_array($result);
                                    $totalproduct=$sp[0];
                                    echo $totalproduct;
                                }
                            ?>
                        </span>
                        <div id="addsucces">
                            <p class="addsucces-xmark"><i class="fa-solid fa-xmark" onclick="closeaddsucces()"></i></p>
                            <p class="addsucces-text"><i class="fa-solid fa-circle-check"></i>Thêm vào giỏ hàng thành công!</p>
                            <div class="addsucces-actions" >
                                <a href="cart.php">Xem giỏ hàng và thanh toán</a>
                            </div>
                        </div>
                    </div>
                    <div class="icons-user">
                        <a style="color: rgb(38, 36, 36);" href="formL.php"><i style="font-size: 26px;"
                                class="bi bi-person-fill"></i></a>
                        <?php
                            if(isset($_SESSION['user_id'])){
                        ?>
                        <div class="icons-user-board">
                            <a href="orderinfo.php" class="mt-1">Đơn hàng của tôi</a>
                            <a href="formS.php">Đăng ký</a>
                            <a href="handlelogout.php" >Đăng xuất</a>
                            <a href="changepass.php"class="mb-1">Đổi mật khẩu</a>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>


<script>
    var Search=document.querySelector('.icon-search')
    var searchInput=document.querySelector('.searchInput')
    Search.addEventListener('click', function(e){
        if(searchInput.value!=''){
            window.location.href='/DOANCS22/user/search.php?spsearch='+searchInput.value;
        }
    })
</script>