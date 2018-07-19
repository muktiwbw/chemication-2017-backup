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
    <title>Aktivasi Akun</title>
<!--/////////////////////////////////////////////////////////////////////////////////////
//
//  Status Akses: nonactive, pending.
//
////////////////////////////////////////////////////////////////////////////////////////-->
    <style>
        ul{
            list-style: decimal;
            padding-left: 17px;
        }
        #activation-input-box{
            margin-top: 10px;
            /*border: 1px solid;*/
            border-radius: 4px;
            padding: 10px 25px;
            background: #ddd;
        }
        #text-box{
            background: #ffb172;
            border-radius: 4px;
            padding-bottom: 8px;
            margin-bottom: 20px;
        }
        #form-content{
            border-radius: 4px;
        }
        #error-message{
            background: #f76565;
            border-radius: 4px;
            margin-bottom: 8px;
            color: #000;
            padding-bottom: 10px;
        }
        .form-control.file-field{
            /*padding: 15px 0;*/
            /*height: 50px;*/
            background: none;
            border: none;
            box-shadow: none;
            /*display: block;*/
            overflow: visible;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <?php require_once '../app/views/Components/CEONavbar.php'; ?>
        <div class="row">
            <div class="col-md-12" id="main-content">
                <div class="row">
                    <div id="activation-input-box" class="col-md-6 col-md-offset-3">
                        <div class="row">
                            <?php if(isset($_SESSION['errors']['file_upload'])): ?>
                            <div id="error-message" class="col-md-12 bg-danger">
                                <h2>Error!</h2>
                                <p>Terjadi kesalahan pada saat mengupload file. Mohon untuk memperhatikan keterangan upload terlebih dahulu lalu coba lagi.</p>
                            </div>
                            <?php endif; ?>
                            <div id="text-box" class="col-md-12 text-left">
                                <?php if($_SESSION['user']['status'] == 'nonactive'): ?>
                                <h2>Keterangan aktivasi</h2>
                                <ul>
                                    <li>Setelah proses verifikasi email, Anda mendapatkan nomor unik, yaitu <?=$_SESSION['user']['unique_code']?>.</li>
                                    <li>Harap untuk membayarkan biaya pendaftaran sebesar nomor unik anda, yaitu <b>Rp <?=$_SESSION['user']['currency_price']?>,-</b> ke no. <b>Rekening BNI 0400098400</b> atas nama <b>Khurniawati</b> sesuai dengan nominal yang ada pada <i>tab</i> aktivasi yang ada.</li>
                                    <li>Foto atau scan struk transfer Anda sebagai bukti transfer. Pastikan gambar yang dihasilkan jelas dan mudah dibaca.</li>
                                    <li>Pastikan juga <b>ukuran gambar tidak melebihi 1MB</b></li>
                                    <li>Upload gambar bukti transfer ke halaman ini.</li>
                                    <li>Harap untuk menunggu konfirmasi dari panitia karena bukti transfer akan dicek secara manual.</li>
                                    <li>Konfirmasi aktivasi akun akan dikirim melalui email yang anda daftarkan.</li>
                                </ul>
                                <?php elseif($_SESSION['user']['status'] == 'pending'): ?>
                                <h2>Sedang diproses</h2>
                                <p>Submisi bukti transfer Anda saat ini sedang diproses. Harap untuk menunggu konfirmasi dari panitia. Konfirmasi aktivasi email akan dikirimkan melalui email Anda.</p>
                                <?php endif; ?>
                            </div>
                            <?php if($_SESSION['user']['status'] == 'nonactive'): ?>
                            <div id="form-content" class="col-md-12">
                                <form action="/ceo/aktivasi" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="file-field">Upload bukti transfer</label>
                                        <input id="file-field" class="form-control file-field" type="file" name="reg_picture">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control btn btn-primary" type="submit" name="submit" value="Kirim">
                                    </div>
                                </form>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    
        if(isset($_SESSION['errors']['file_upload'])){
            unset($_SESSION['errors']['file_upload']);
        }

     ?>
</body>
</html>