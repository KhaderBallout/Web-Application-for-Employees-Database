<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link rel="stylesheet" href="css2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <meta charset="utf-8">
    <link rel="icon"  href="employee.png" sizes="16x16">
    <title>GK</title>
</head>

<body>
    
    <div class="wrapper">
        <div class="title-text">
            <div class="title login">
                Login Form
            </div>
            <div class="title signup">Signup Form
            </div>
        </div>
        <div class="form-container">
            <div class="slide-controls">
                <input type="radio" name="slide" id="login" checked>
                <input type="radio" name="slide" id="signup">
                <label for="login" class="slide login">Login</label>
                <label for="signup" class="slide signup">Signup</label>
                <div class="slider-tab">

                </div>
            </div>
            <div class="form-inner">
                <form action="login.php" method="POST" class="login">
                    <div class="field">
                        <input type="username" name="username" placeholder="username" required>
                    </div>
                    <div class="field">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <?php 
                if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
                  echo "<p> <i class =\"fas fa-exclamation-triangle\" style=\"color: #ffcc00\"></i> <span style=\"font-weight: bold\">Wrong email or password</span></p>";
                  }
                ?>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Login">
                    </div>
                    <div class="signup-link">
                        Not a member? <a href="">Signup now</a>
                    </div>

                </form>

                <form action="sign-up.php" method="POST" class="signup">
                    <div class="field">
                        <input type="email" name="email" placeholder="Email Address"  required>
                    </div>
                    <div class="field">
                        <input type="password" name="password" id="password" placeholder="Password"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            oninvalid="this.setCustomValidity('password must contain 8 or more characters that are of at least one number, and one uppercase and lowercase letter')" oninput="this.setCustomValidity('')"
                            required>
                    </div>
                    <div class="field">
                        <input type="password" id="confirm_password" placeholder="Confirm password"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            oninvalid="this.setCustomValidity('password must contain 8 or more characters that are of at least one number, and one uppercase and lowercase letter')" oninput="this.setCustomValidity('')"
                            required>
                        <span id='message'></span>
                    </div>
                    <div class="field btn">
                        <div class="btn-layer">
                        </div>
                        <input type="submit" value="Signup">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php 
      if (isset($_GET["msg"]) && $_GET["msg"] == 'failedEmail') {
      echo '<script>alert("This Email Address already Exists")</script>';
    
    //   header("location:index2.php");
      }
      ?>
    <?php 
      if (isset($_GET["msg"]) && $_GET["msg"] == 'addEmail' ) {
      echo '<script>alert("Signed Up Successfully")</script>';
    
    //   header("location:index2.php");
      }
      ?>
    <script>
    $('#password, #confirm_password').on('keyup', function() {
        if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Matching').css('color', 'green');
        } else
            $('#message').html('Not Matching').css('color', 'red');
    });
    </script>
    <script>
    const loginText = document.querySelector(".title-text .login");
    const loginForm = document.querySelector("form.login");
    const loginBtn = document.querySelector("label.login");
    const signupBtn = document.querySelector("label.signup");
    const signupLink = document.querySelector("form .signup-link a");
    signupBtn.onclick = (() => {
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
    });
    loginBtn.onclick = (() => {
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
    });
    signupLink.onclick = (() => {
        signupBtn.click();
        return false;
    });
    </script>

</body>

</html>
<!--   -->