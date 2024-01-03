<?php
session_start();
   if(!empty($_POST)){
      $fullname=$_POST['fullname'];
      $password=sha1($_POST['password']);
      if(isset($fullname)&&isset($password)){
         $error=[];
         $conn=mysqli_connect('localhost','root','','fooddrink');
         $sql="SELECT * FROM dangnhap WHERE username='$fullname'";
         $result=mysqli_query($conn,$sql);

         $sql1="SELECT * FROM dangnhap WHERE pass='$password' AND username='$fullname'";
         $result1=mysqli_query($conn,$sql1);
         $row=mysqli_fetch_array($result1);
        //  if(mysqli_num_rows($result)>0 && mysqli_num_rows($result1)>0){
          if(mysqli_num_rows($result1)>0){
            if($row['role']==0){
              $_SESSION['user_id'] = $row['id'];
              $_SESSION['user']=$fullname;
              header("location:/DOANCS22/user/home.php");
            }
            else{
              $_SESSION['name_admin']=$row['username'];
              $_SESSION['id_admin']=$row['id'];
              header("location:/DOANCS22/admin/admin_dashboard.php");
            }
         }
         else{
            if(!mysqli_num_rows($result)){
               $error['fullname']['required']="Tên người dùng không tồn tại.";
            }
            if(!mysqli_num_rows($result1)){
               $error['password']['ispassword']="Mật khẩu không chính xác.";
            }
         }

      }
   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="../css/LS.css">
  <link rel="stylesheet" href="../css/reponsiveLS.css">
  <title>Form</title>
</head>

<body>
  <form action="formL.php" method="post" id="forml">
    <section class="sectionLogin">
      <div class="section-L-left">
        <img src="../image1/back1.jpg" alt="">
      </div>
      <div class="section-L-right">
        <div class="text-info">
          <h1 style="text-align: left; color: #FFC800;">Đăng nhập</h1>
          <p style="text-align: left;">
            <b style="color: black;">Xin chào bạn</b>
          </p>
          <p style="font-weight: lighter; color: black; text-align: left;">Nhập thông tin cá nhân của bạn và bắt đầu tham gia với chúng tôi</p>
        </div>
        <div class="input-type">
          <div class="input-type-email form-group pt-2">
            <i class="fa-regular fa-envelope"></i>
            <input id="fullname" type="text" name="fullname" placeholder="         Tên đăng nhập"
              value="<?php if(isset($_POST['fullname'])){echo $_POST['fullname'];} ?>">
            <span class="form-message">
              <br>
              <?php
                    echo !empty($error['fullname']['required'])?$error['fullname']['required']:'';
                    ?>
            </span>
          </div>
          <p></p>
          <div class="input-type-password form-group pb-3">
            <i class="fa-solid fa-eye"></i>
            <input id="password" type="password" name="password" placeholder="         Nhập mật khẩu"
              value="<?php if(isset($_POST['password'])){echo $_POST['password'];} ?>">
            <span class="form-message pb-3">
              <br>
              <?php
                    echo !empty($error['password']['ispassword'])?$error['password']['ispassword']:'';
                    ?>
            </span>
          </div>
          <!-- <p class="forgotPassword">
                  <a href="Forgotpassword.php">Forgot password/ Username</a>
               </p> -->
        </div>
        <!-- <a href="DOAN.html"> -->
          <button type="submit">Đăng nhập</button>
        <!-- </a> -->
        <p class="not-account">
          <a href="formS.php">Không có tài khoản? Hãy tạo ngay!</a>
        </p>
      </div>
    </section>
  </form>
  <!-- <script src="..js/Formvalidate.js"></script> -->

  <script>
    validator({
      form: '#forml',
      formGroupselector: '.form-group',
      rulers: [
        validator.isRequired('#fullname'),
        validator.isRequired('#password'),
      ],
    })
  </script>
</body>

</html>