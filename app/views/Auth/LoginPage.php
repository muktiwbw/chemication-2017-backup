<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/img/contents/ceo_favicon.png" type="image/x-icon">
    <link rel="icon" href="/img/contents/ceo_favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous">
    </script>
    <title>Login</title>
    <style>
        /*DOWNLOADED ELEMENTS*/
        @-webkit-keyframes lds-dual-ring {
            0% {
                -webkit-transform: rotate(0);
                transform: rotate(0);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
            }
            @keyframes lds-dual-ring {
            0% {
                -webkit-transform: rotate(0);
                transform: rotate(0);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
            }
            .lds-dual-ring {
            position: relative;
            }
            .lds-dual-ring div {
            /*position: absolute;*/
            display: inline-block;
            width: 40px;
            height: 40px;
            top: 30px;
            left: 30px;
            border-radius: 50%;
            border: 5px solid #000;
            border-color: #333 transparent #333 transparent;
            -webkit-animation: lds-dual-ring 1.3s linear infinite;
            animation: lds-dual-ring 1.3s linear infinite;
            }

        a{
            text-decoration: none !important;
        }
        body{
            background: url('/img/contents/banner-smol.jpeg');
            background-size: cover;
        }

        #login-box{
            background: rgba(220, 220, 220, 0.8);
            border-radius: 4px;
            width: 285px;
            /*box-shadow: 0px 0px 10px black;*/
            margin-left: 37.5%;
        }
        #heading-logo{
            width: 150px;
            display: inline-block;
        }
        #brand-image{
            display: inline;
            width: 40px;
            margin-left: 10px;
            margin-right: 20px;
        }
        #navigation-bar{
            position: fixed;
            z-index: 1;
            background: #fff;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #main-content{
            margin-top: 70px;
        }
        #loading-popup>.popup-content{
            padding-top: 40px;
        }

        .hidden{
            display: none;
        }
        .navigation-link{
            transition: 0.3s;
            padding: 23px 15px;
            color: #444;
        }
        .navigation-link:hover, .mini-tab-active{
            background: #337ab7;
            color: #fff !important;
        }
        .form-warning{
            font-style: italic;
            color: red;
            padding-bottom: 15px;
            display: none;
        }
        
        .popup-overlay{
            position: fixed;
            z-index: 1;
            background: rgba(0, 0, 0, 0.4);
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            display: none;
        }
        .popup-text{
            padding-bottom: 15px;
            font-size: 18px;
            text-align: center;
        }
        .popup-content{
            width: 500px;
            background: #fff;
            padding: 20px;
            border-radius: 4px;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-250px, -250px);
        }
        .navigation-guest-view, .navigation-inactive-view, .navigation-active-view{
            margin-left: 940px;
        }
        @media(max-width: 980px){
            body{
                background: none;
            }

            #heading-logo{
                width: 120px;
                display: inline-block;
            }
            #nav-register, #nav-login{
                display: none;
            }

            #login-box{
                width: auto;
                /*box-shadow: 0px 0px 10px black;*/
                margin: 0;
                padding-top: 10px;
                padding-bottom: 10px;
            }
            
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- NAVBAR START -->
        <div class="row">
            <nav id="navigation-bar" class="col-md-12">
                <img src="/img/contents/ceo.jpg" alt="" class="img-responsive img-circle" id="brand-image">
                <a class="navigation-link" href="/ceo">Home</a>
                <a id="nav-register" class="navigation-link navigation-guest-view" href="/ceo/registrasi" data-toggle-mini-tab="register">Registrasi</a>
                <a id="nav-login" class="navigation-link" href="/ceo/login" data-toggle-mini-tab="login">Login</a>
            </nav>
        </div>
        <!-- NAVBAR END -->
        <div class="container">
            <div class="row">
                <div id="main-content" class="col-md-12">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4 text-center">
                            <img id="heading-logo" src="/img/contents/ceo.jpg" alt="ceo logo" class="img-responsive img-circle">
                        </div>
                    </div>
                    <div class="row">
                        <div id="login-box" class="col-md-4 col-md-offset-4">
                            <h3 class="navigation-form-heading">Login</h3>
                            <span class="custom-horizontal-rule hr-main-form"></span>
                            <div class="form-group">
                                <label for="login-email">Email address</label>
                                <input type="email" class="form-control" id="login-email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="login-password">Password</label>
                                <input type="password" class="form-control" id="login-password" placeholder="Password">
                            </div>
                            <div class="form-warning login-empty">Isi email dan password untuk login.</div>
                            <div class="form-warning login-failed">Gagal login. Coba masukkan email dan password yang benar.</div>
                            <div class="form-group">
                                <button class="form-submit-button btn btn-primary btn-block" id="login-button" data-form-submit="login">Login</button>
                            </div>
                        </div>
                    </div> 
                    <div id="loading-popup" class="popup-overlay">
                        <div class="popup-content text-center">
                            <div class="lds-css">
                                <div style="width:100%;height:100%" class="lds-dual-ring">
                                    <div></div>
                                </div>
                            </div>
                            <div class="popup-text"><span>Harap tunggu...</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){

            $('#login-button').click(function(){

                email = $('#login-email').val();
                password = $('#login-password').val();

                var mistake = 0;

                if(email == "" || password == ""){
                    $('.login-empty').fadeIn('fast');
                    mistake++;
                }
                
                if(mistake <= 0){
                    
                    $('#loading-popup').fadeIn('fast');

                    $.post('/ceo/login', {
                        email: email,
                        password: password
                    })
                    .done(function(response){

                        $('.login-empty').fadeOut('fast');
                        $('#loading-popup').fadeOut('fast');
                        
                        switch (response) {
                            case 'success':
                                location = '/ceo/profile'; //diganti full url pas udah post produksi
                                break;
                            default:
                                $('.login-failed').fadeIn('fast');
                                break;
                        }
                    });
                }
            });

        });
    </script>
</body>
</html>