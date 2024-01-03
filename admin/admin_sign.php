<?php 
    include('sign_admin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="style_admin_log.css">
<title>Title</title>
<style>
    .form-message{
  /* float: left; */
  color: #f33a58;
  font-size:12px;
  position: absolute;
  left: 10px;
  bottom: -25px;
  margin-bottom: 4px;
}
</style>
</head>
<body>
    <div class="header-logo">
        <a href="admin_dashboard.php">
            <img src="logo.png" style="margin-bottom: 10px; width: 100px;" width="160" height="36" alt="Logo">
        </a>
    </div>
    <div class="wrapper">
        <div  class="form-box login">
            <h2>Đăng Ký</h2>
            <form id="formdangnhap" action="admin_sign.php" method="POST">
                <div class="input-box form-group">
                    <span class="icon"><i class="uil uil-envelope"></i></span>
                    <input id="name_admin" name="name_admin" type="text" required
                    value="<?php if(isset($_POST['name_admin'])){echo $_POST['name_admin'];} ?>">
                    <label>Tên ADMIN</label>
                    <span class="form-message ">
                    <?php
                    echo !empty($error['fullname']['required'])?$error['fullname']['required']:'';
                    ?>
                    </span>
                </div>
                <div class="input-box form-group">
                    <span class="icon"><i class="uil uil-lock"></i></span>
                    <input id="password" name="pass" type="password" required
                    value="<?php if(isset($_POST['pass'])){echo $_POST['pass'];} ?>">
                    <label>Mật Khẩu</label>
                    <span class="form-message">
                    
                    </span>
                </div>
                
                <button type="submit" class="btn">Tạo ADMIN</button>
                
            </form>
        </div>

        
    </div>
    <script>
        function Display(){
            var register = document.getElementsByClassName("register");
            var login = document.getElementsByClassName("login");
            login.style.cssText = "Display: none";
            register.style.cssText = "Display: block;"
        }
    </script>
    <script src="../js/Formvalidate.js"></script>
    <script>
    validator({
      form: '#formdangnhap',
      formGroupselector: '.form-group',
      rulers: [
        validator.minLength('#name_admin', 5),
        validator.minLength('#password', 8),
      ],
    })
  </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>