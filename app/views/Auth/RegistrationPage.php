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
    <title>Registrasi</title>
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
            position: relative;
            margin-left: 37.5%;
        }
        #heading-logo{
            width: 87px;
            position: relative;
            left: 50%;
            transform: translate(-50%, 0);
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
        .hidden{
            display: none;
        }

        @media(max-width: 980px){
            body{
                background: none;
            }

            #heading-logo{
                width: 100px;
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
                        <div class="col-md-12">
                            <img id="heading-logo" src="/img/contents/ceo.jpg" alt="ceo logo" class="img-responsive img-circle">
                        </div>
                    </div>
                    <div class="row">
                        <div id="login-box" class="col-md-4">
                            <h3 class="navigation-form-heading">Registrasi</h3>
                            <span class="custom-horizontal-rule hr-main-form"></span>
                            <div class="form-group">
                                <label for="register-email">Email address</label>
                                <input type="email" class="form-control" id="register-email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="register-password">Password</label>
                                <input type="password" class="form-control" id="register-password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="register-confirm-password">Confirm password</label>
                                <input type="password" class="form-control" id="register-confirm-password" placeholder="Confirm password">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="register-agreement"> Saya setuju untuk mendaftar.
                            </div>
                            <div class="form-warning register-empty">Harap mengisi semua field pada form pendaftaran akun.</div>
                            <div class="form-warning register-password-length">Password harus minimal 8 karakter.</div>
                            <div class="form-warning register-password-not-match">Password yang anda masukkan tidak cocok.</div>
                            <div class="form-warning register-agreement">Harap untuk mencentang checkbox untuk menyetujui pendaftaran akun.</div>
                            <div class="form-warning register-email-exists">Email yang anda masukkan telah terdaftar.</div>
                            <div class="form-warning register-failed">Terjadi kesalahan pada saat pendaftaran. Mohon coba lagi.</div>
                            <div class="form-group">
                                <button class="form-submit-button btn btn-primary btn-block" id="register-button" data-form-submit="register">Daftar</button>
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
                    <div id="registered-popup" class="popup-overlay">
                        <div class="popup-content">
                            <div class="popup-text"><span>Akun Anda berhasil terdaftar!<br>Silahkan cek email anda untuk melakukan <br><b>verifikasi email</b>.</span></div>
                            <button data-wipe-form="yes" class="popup-button btn btn-block btn-primary">Ok</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){

            $('#register-button').click(function(){
            
                var email = $('#register-email').val();
                var password = $('#register-password').val();
                var confirm_password = $('#register-confirm-password').val();
                var agreed = $('#register-agreement').prop('checked'); // boolean datatype

                $('.register-empty').fadeOut('fast');
                $('.register-password-length').fadeOut('fast');
                $('.register-password-not-match').fadeOut('fast');
                $('.register-agreement').fadeOut('fast');

                var mistake = 0;

                if(email == "" || password == "" || confirm_password == ""){
                    $('.register-empty').fadeIn('fast');
                    mistake++;
                }else if(password.length < 8){
                    $('.register-password-length').fadeIn('fast');
                    mistake++;
                }else if(password != confirm_password){
                    $('.register-password-not-match').fadeIn('fast');
                    mistake++;
                }else if(!agreed){
                    $('.register-agreement').fadeIn('fast');
                    mistake++;
                }
                
                if(mistake <= 0){

                    $('#loading-popup').fadeIn('fast');

                    $.post('/ceo/registrasi', {
                        email: email,
                        password: password
                    })
                    .done(function(response){

                        $('.register-empty').fadeOut('fast');
                        $('.register-password-length').fadeOut('fast');
                        $('.register-password-not-match').fadeOut('fast');
                        $('.register-agreement').fadeOut('fast');
                        $('.register-email-exists').fadeOut('fast');
                        $('.register-failed').fadeOut('fast');
                        
                        switch (response) {
                            case 'success':
                                $('#loading-popup').fadeOut('fast');
                                $('#registered-popup').fadeIn();
                                break;
                            case 'failed':
                                $('#loading-popup').fadeOut('fast');
                                $('.error-popup').fadeIn('fast');
                                $('.register-email-exists').fadeIn('fast');
                                break;
                        }
                    })
                }
            });

            $('.popup-button').click(function(e){

                e.stopPropagation();

                $('.popup-overlay').fadeOut('fast');

                if($(this).attr('data-wipe-form') == 'yes'){
                    $('#register-email').val('');
                    $('#register-password').val('');
                    $('#register-confirm-password').val('');
                    $('#register-agreement').prop('checked', false);
                }else{
                    $('#mini-tab-'+$(this).parent().parent().attr('data-error-form')).show();
                }

            });
        });
    </script>
</body>
</html>