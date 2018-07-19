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
    <title>Admin Login</title>
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
            /*CUSTOMED*/
            .popup-overlay{
                position: fixed;
                z-index: 1;
                background: rgba(0, 0, 0, 0.4);
                width: 100%;
                height: 100%;
                display: none;
            }
            #loading-popup>.popup-content{
                padding: 20px 0;
                border-radius: 4px;
                position: relative;
                background: #fff;
                width: 300px;
                top: 50%;
                left: 50%;
                transform: translate(-150px, -150px);
            }

        /*Ids*/
        #form-content{
            margin-top: 50px;
            background: #ddd;
            border-radius: 4px;
            padding-top: 5px;
            padding-bottom: 15px;
            box-shadow: 0 0 10px #666;
        }
        #notif{
            display: none;
            padding: 1px 15px;
            margin-bottom: 10px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
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
    <div class="container-fluid">
        <div class="row">
            <div id="form-content" class="col-md-4 col-md-offset-4">
                <h1>Admin Login</h1>
                <div id="notif" class="bg-danger">
                    <h3>Error!</h3>
                    <p>Terdapat kesalahan pada username atau password</p>
                </div>
                <div class="form-group">
                    <input id="username" class="form-control" type="text" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <input id="password" class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <button id="login-button" class="form-control btn btn-block btn-primary">Masuk</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            
            $('#login-button').click(function(){
                $('#loading-popup').fadeIn('fast');
                $.post(
                    '/admin/ceo/portal',
                    {
                        username: $('#username').val(),
                        password: $('#password').val()
                    }
                )
                .done(function(response){
                    $('#loading-popup').fadeOut('fast');
                    if(response == 'success'){
                        location = '/admin/ceo/dashboard';
                    }else{
                        $('#notif').fadeIn();
                    }
                });
            });

        });
    </script>
</body>
</html>