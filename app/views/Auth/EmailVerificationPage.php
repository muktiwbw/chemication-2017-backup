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
    <title>Verifikasi Email</title>
</head>
<body>
    <div class="container">
        
        <div class="row">
            <div style="margin-top: 40px; margin-bottom: 10px;" class="col-md-12 text-center">
                
                <img style="display: inline-block; width: 200px;" src="/img/contents/ceo.jpg" alt="" class="img-responsive img-circle">

            </div>
            <div class="col-md-12 text-center">
                <p style="font-size: 22px;">Proses verifikasi email telah berhasil. Akun anda siap untuk digunakan.<br>Mengalihkan secara otomatis ke halaman utama dalam <span id="countdown"></span>...</p>
            </div>
        </div>

    </div>
    <script>
        $(function(){

            var time = 3;
            var countdownInterval = setInterval(function() {
                if(time >= 0){
                    $('#countdown').html(time);
                    time--;
                }else{
                    clearInterval(countdownInterval);
                    location = 'https://chemication-backup.herokuapp.com/ceo';
                }
            }, 1000);

        });
    </script>
</body>
</html>