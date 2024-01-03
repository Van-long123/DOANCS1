<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/changepass.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <a class="logo" href="menu.php"><img src="../image1/logo.png" alt=""></a>
    <span class="info">Change pass</span>
    <div class="mainDiv">
        <div class="cardStyle">
            <form name="signupForm" id="signupForm">

                <img src="../image1/SHIPSY_LOGO_BIRD_BLUE.png" id="signupLogo" />

                <h2 class="formTitle">
                    Login to your account
                </h2>

                <div class="inputDiv">
                    <label class="inputLabel" for="password">New Password</label>
                    <input type="password" id="password" name="password">
                    <span class="form-message">
                    </span>
                </div>

                <div class="inputDiv">
                    <label class="inputLabel" for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword">
                    <span class="form-message">
                    </span>
                </div>

                <div class="buttonWrapper">
                    <button type="button" name="submitButton" class="submitButton pure-button pure-button-primary">
                        <span>Continue</span>
                    </button>
                </div>

            </form>
        </div>
    </div>
    <div id="notificationmethod" class="method">
        <div class="method-content">
            <p class="method-text">Đổi mật khẩu thành!</p>
            <div class="method-actions">
                <button class="confirm" onclick="closemethod()">Xác nhận</button>
            </div>
        </div>
    </div>
</body>

</html>

<script src="../js/Formvalidate.js"></script>
<script>
    validator({
        form: '#signupForm',
        subMitBtn:'.submitButton',
        formGroupselector: '.inputDiv',
        rulers: [
            validator.isRequired('#password'),
            validator.minLength('#password', 8),
            validator.isRequired('#confirmPassword'),
            validator.confirmPass('#confirmPassword', function () {
                return document.querySelector('#password').value
            }, 'Mật khẩu nhập lại ko chính xác'),
        ],
    })
    function closemethod() {
        document.getElementById("notificationmethod").style.display = "none";
    }
</script>


