<?php
    require_once "lib/config.php";
?>

<!doctype html>
<html>
    <head>
        <title>Admin Authentication | Riversideagropro</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#2ba9ff" />
        <meta http-equiv="x-ua-compatible" content="ie=edge, chrome=1">
        <meta property="og:title" content="Reliable livestocks farmer &amp; veterinarian : Riverside Agropro">
        <meta name="description" property="og:description" content="Crystal Wonders is an active electrical company in located Lagos, Nigeria, committed to providing top class residential, industrial and commercial electrical service solutions across the country. We also specialize in providing technical trainings.">
        <meta name="target" content="Best Electrical Company Nigeria, Electrical Services in Lagos, Best Electrical Services in Island, Electrical Services in Island, Ikeja, Top 10 Electrical Installation companies in Nigeria, Electrical maintenance, Emergency lighting systems">
        <meta name="classification" content="electrical services, electrical services in Ajah, electrical services in Ikeja, Electrical Servicess, Mobile emergency lighting systems developer, Electrical Installation Nigeria, software developer Nigeria">
        <meta name="keywords" content="Crystal Wonders, Best Electrical Services, electrical service, Best Electrical Services in lagos, intercom systems, emergency lighting systems developer, electrical intercom systems, Electrical Services, Electrical Installation, Electrical Installation Lagos, Electrical Installation Nigeria, electrical service in Lagos, electrical service in ikeja, Electrical Company in nigeria, Electrical Installation Promo, Electrical Services in Lagos, Electrical Installation company in Lagos, responsive electrical service, Electrical Company in lagos, top 10 Electrical Services in Lagos, top Electrical Services in Nigeria, best Electrical Installation company in Nigeria, best Electrical Installation training center in lagos, best Electrical Company in lagos, list of top Electrical Services, top Electrical Installation firm, top web firm, top design firms, Nigeria Electrical Services, access control nigeria, e-commerce website, responsive, fire alarm systems in Nigeria, Electrical Installation company, list of Electrical Servicess in Nigeria, access control companies in nigeria, Electrical Installation companies in nigeria, electrical services in Island, Lagos, 100% practical access control training in lagos, lagos electrical service, electrical design agency lagos, Electrical Installation firm, religious access control,  mosque access control, church access control, school electrical service, institute electrical service, institution electrical service, educational electrical service, intercom systems developer, health emergency lighting systems, health intercom systems, data wiring in lagos, data wiring in nigeria, Business campaign marketing, farmers emergency lighting systems, farmers intercom systems in lagos, farm intercom systems, IT support in lagos, IT support">
        <meta name="copyright" content="Copyright by Riverside Agropro. All Rights Reserved.">
        <meta name="format-detection" content="telephone=no">

        <link rel="dns-prefetch" href="http://fonts.googleapis.com/">
        <link rel="dns-prefetch" href="https://riversideagropro.com/">

        <!-- animate css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" />

        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- shortcut icon -->
        <link rel="shortcut icon" href="./pictures/icon.jpg" type="image/x-icon">
        
        <!-- jquery cdn -->
        <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src = "scripts/jquery-3.3.1.js" type = text/javascript></script>
        
        <!-- bootstrap css -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		
        <!-- bootstrap js -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <!-- my scripts file -->
        <script src="scripts/loginadmin.js"></script>
        
        <!--  validation.js script  -->
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>

        <!--my style-->
        <link rel="stylesheet" type="text/css" href="styles/alogin.css">


    </head>

    <body>
        <div id="header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div id="homepage">
                            <a href="https://www.riversideagropro.com" id="companyName" class="animate__animated animate__zoomInDown animate__delay-1s">riversideagropro</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- container for the form -->
        <div id="body" class="">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 offset-md-4 col-md-4">
                        <!-- the form content container -->
                        <div id="formContent">
                            <form action="" method="post" id="adminLogin" class="pd-25">
                                <!-- display error and success messages -->
                                <div>
                                    <h3 class="title">Provide your registered email address</h3>
                                </div>

                                <div id="error"></div>

                                <div class="form-group input-field">
                                    <i class="fa fa-user"></i>
                                    <input type="email" name="email" placeholder="Email Address"/>
                                </div>

                                <div class="form-group decor">
                                    <button type="submit" name="login" id="loginBtn">Submit</button>
                                </div>

                            </form>

                            <img src="pictures/svgdesk.svg" alt="login image file" class="image"/>
                        </div>
                        <div id="forgotPwd">
                            <a href="auth" class="clWhite">Go back to the login page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>