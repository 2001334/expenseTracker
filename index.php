<?php
    $info= array(
        'title'=> 'Expense Tracker Web Application'
    );
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#2ba9ff" />
        
        <meta http-equiv="x-ua-compatible" content="ie=edge, chrome=1">
        
        <title><?= $info['title']?></title>

        <!-- animate css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" />

        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- shortcut icon -->
        <link rel="shortcut icon" href="./pictures/icon.jpg" type="image/x-icon">
        
        <!-- jquery cdn -->
		<script src = "scripts/jquery-3.3.1.js" type = text/javascript></script>
        
        <!-- bootstrap css -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		
        <!-- bootstrap js -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <!--  validation.js script  -->
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>
        
        <!--my style-->
        <link rel="stylesheet" type="text/css" href="styles/index.css">
    </head>

    <body>
        <div class="containa">
            <div class="forms-container">
                <div class="signin-signup">
                    <!-- this is log in form -->
                    <form action="" class="sign-in-form" id="loginForm">
                        <div id="error2"></div>

                        <h2 class="title">Sign in</h2>
                        
                        <div class="input-field">
                            <i class="fa fa-user"></i>
                            <input type="text" name="email" placeholder="Email Address" />
                        </div>

                        <div class="input-field">
                            <i class="fa fa-lock"></i>
                            <input type="password" name="pwd" placeholder="Password" />
                        </div>

                        <div id="forgotPwd">
                            <a href="forgotpwd" class="clWhite">Forgot password?</a>
                        </div>
                                
                        <div>
                            <button class="bttn solid" type="submit" id="logBtn" name="logonBtn">login</button>
                        </div>
                        <!-- <input type="submit" value="Login"  /> -->
                    </form>

                    <!-- this is the sign up form -->
                    <form action="#" class="sign-up-form" id="registerUserForm">
                        <h2 class="title">Sign up</h2>
                        <div id="error"></div>
                        
                        <div class="input-field">
                            <i class="fa fa-user"></i>
                            <input type="text" name="fname" placeholder="First Name" />
                        </div>

                        <div class="input-field">
                            <i class="fa fa-user"></i>
                            <input type="text" name="lname" placeholder="Last Name" />
                        </div>

                        <div class="input-field">
                            <i class="fa fa-envelope"></i>
                            <input type="email" name="email" placeholder="Email" />
                        </div>

                        <div class="input-field">
                            <i class="fa fa-lock"></i>
                            <input type="password" id="pwd" name="psword" placeholder="Password" />
                        </div>

                        <div class="input-field">
                            <i class="fa fa-lock"></i>
                            <input type="password" name="confirmPwd" placeholder="Confirm Password" />
                        </div>

                        <div>
                            <button class="bttn solid" type="submit" id="regBtn" name="regBtn">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="panels-container">
                <div class="panel left-panel">
                    <div class="content">
                        <h3>New here ???</h3>
                        <p>
                            Use our simple register form to enable us reach you in due time and also make you enjoy our wonderful offers. Join Us today.
                        </p>
                        <button class="bttn transparent" id="registerBtn">
                            Sign up
                        </button>
                    </div>
                    <img src="pictures/svgdesk.svg" class="image" alt="register image file" />
                </div>

                <div class="panel right-panel">
                    <div class="content">
                        <h3>Already a user ?</h3>
                        <p>
                            Login to your dashboard
                        </p>
                        <button class="bttn transparent" id="loginBtn">
                            Sign in
                        </button>
                    </div>
                    <img src="pictures/svglogin.svg" class="image" alt="login image file" />
                </div>
            </div>
        </div>

        <!-- my scripts file -->
        <script src="scripts/app.js"></script>
        <script src="scripts/controller.js"></script>
    </body>
</html>