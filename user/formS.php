<?php 
    if(!empty($_POST)){
        if(isset($_POST['fullname'])){
            $error=[];
            $fullname=$_POST['fullname'];
            $password=sha1($_POST['password']);
            $email=$_POST['email'];
            // $phone=$_POST['phone'];
            $confirmpass=sha1($_POST['confirmpass']);
            $conn=mysqli_connect('localhost','root','','fooddrink');
            $sql="SELECT * FROM dangnhap WHERE username='$fullname'";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)==0){
                $sql1="INSERT INTO dangnhap(username,pass,confirmpass,email) VALUES ('$fullname','$password','$confirmpass','$email')";
                mysqli_query($conn,$sql1);
                header("location:/DOANCS22/user/formL.php");
            }
            else{
                $error['fullname']['required']="Tên đã tồn tại";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="../css/LS.css">
    <!-- <link rel="stylesheet" href="../css/styleLS1.css"> -->
    <link rel="stylesheet" href="../css/reponsiveLS.css">
    <title>Form</title>
</head>

<body>
    <form id="formsig" action="formS.php" method="post">
        <section class="sectionSigin">
            <div class="section-S-right">
                <div class="text-info">
                    <h1 style="color: #FFC800;">Đăng ký</h1>
                    <p><b style="color: black;">xin chào bạn!</b></p>
                    <p style="color: #FFC800;">Nhập thông tin cá nhân của bạn và bắt đầu tham gia với chúng tôi</p>
                </div>
                <div class="input-type ">
                    <p>
                    <div class="input-type-name form-group">
                        <i class="fa-solid fa-user"></i>
                        <input id="fullname" type="text" placeholder="         Nhập tài khoản" name="fullname"
                            value="<?php if(isset($_POST['fullname'])){echo $_POST['fullname'];} ?>">
                        <span class="form-message" style="color: #f33a58;">
                            <br>
                            <?php
                    echo !empty($error['fullname']['required'])?$error['fullname']['required']:'';
                    ?>
                        </span>
                    </div>
                    </p>
                    <p>
                        <!-- <div class="input-type-phone form-group">
                    <i class="fa-solid fa-phone"></i>
                    <input id="phone" type="tel" placeholder="         Enter your phone" name="phone" value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];} ?>">
                    <span class="form-message">
                    <br>
                    
                    </span>
                </div> -->
                    </p>
                    <p>
                    <div class="input-type-email form-group">
                        <i class="fa-regular fa-envelope"></i>
                        <input id="email" type="text" placeholder="         Email" name="email"
                            value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
                        <br>
                        <span class="form-message">
                        </span>
                    </div>
                    </p>
                    <p>
                    <div class="input-type-password form-group">
                        <i class="fa-solid fa-eye"></i>
                        <input id="password" type="password" placeholder="         Nhập mật khẩu" name="password"
                            value="<?php if(isset($_POST['password'])){echo $_POST['password'];} ?>">
                        <span class="form-message">
                            <br>
                        </span>
                    </div>
                    </p>
                    <p>
                    <div class="input-type-password form-group">
                        <i class="fa-solid fa-arrow-rotate-left"></i>
                        <input id="confirmpass" type="password" placeholder="         Nhập lại mật khẩu"
                            name="confirmpass"
                            value="<?php if(isset($_POST['confirmpass'])){echo $_POST['confirmpass'];} ?>">
                        <span class="form-message">
                            <br>
                        </span>
                    </div>
                    </p>
                    <p></p>
                </div>
                <a href="DOAN.html">
                    <button>Đăng ký</button>
                </a>
                <p class="not-account"><a href="formL.html">Bạn đã có tài khoản chưa? đăng nhập ngay bây giờ!</a></p>
            </div>
        </section>
    </form>
    <script src="../js/FORMVALIDATION.js"></script>
    <script>
        validator({
            form: '#formsig',
            formGroupselector: '.form-group',
            rulers: [
                validator.isRequired('#fullname'),
                validator.minLength('#fullname', 5),
                // validator.isRequired('#phone'),
                // validator.isPhone('#phone'),
                validator.isRequired('#email'),
                validator.isEmail('#email'),
                validator.isRequired('#password'),
                validator.minLength('#password', 8),
                validator.isRequired('#confirmpass'),
                validator.confirmPass('#confirmpass', function () {
                    return document.querySelector('#password').value
                }, 'Mật khẩu nhập lại ko chính xác'),
            ],
        })
    </script>
</body>

</html>