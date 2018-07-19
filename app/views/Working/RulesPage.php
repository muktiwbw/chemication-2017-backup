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
    <title>Mekanisme <?=$data['subject']?></title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Peraturan Pengerjaan Soal <?=$data['subject']?> Online</h1>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <?php if($data['subject'] == "Try Out"): ?>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <h3>Teknis</h3>
                                <ul class="sub-list">
                                    <li><p>Pengerjaan Try Out hanya dapat dilakukan pada PC/Laptop.</p></li>
                                    <li><p>Peserta disarankan menggunakan browser Google Chrome atau Mozilla Firefox.</p></li>
                                    <li><p>Pastikan untuk menggunakan browser yang paling up-to-date.</p></li>
                                </ul>
                                <h3>Try Out (Online)</h3>
                                <ul class="sub-list">
                                    <li><p>Peserta tidak dapat melakukan pengerjaan soal pada waktu selain dari waktu yang telah ditentukan.</p></li>
                                    <li><p>Apabila terdapat kendala pada jam yang telah ditentukan tersebut harap melakukan konfirmasi ke contact person yang tersedia.</p></li>
                                    <li><p>Peserta <i>log in</i> ke <a href="https://www.chemication.com">www.chemication.com</a> menggunakan <i>e-mail</i> yang digunakan dan <i>password</i> yang telah dibuat saat pendaftaran.</p></li>
                                    <li><p>Peserta masuk pada tab Tryout</p></li>
                                    <li><p><i>Log in</i> dapat dilakukan lebih dari 1 (satu) kali pada suatu waktu. Peserta mengerjakan soal bersama-sama dengan anggota timnya masing-masing, dan hanya dapat digunakan di satu device saja.</p></li>
                                    <li><p>Tryout terdiri dari 50 soal.</p></li>
                                    <li><p>Model soal adalah <i>multiple choice</i>.</p></li>
                                    <li><p>Peserta langsung meng-<i>input</i> dan men-<i>submit</i> jawaban melalui <i>web</i> dalam jangka waktu yang telah disebutkan di atas.</p></li>
                                    <li><p>Setelah jawaban di-submit , hasil try out langsung muncul.</p></li>
                                </ul>
                            </div>
                        </div>
                        <?php elseif($data['subject'] == "Penyisihan"): ?>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <h3>Teknis</h3>
                                <ul class="sub-list">
                                    <li><p>Pengerjaan Try Out hanya dapat dilakukan pada PC/Laptop.</p></li>
                                    <li><p>Peserta disarankan menggunakan browser Google Chrome atau Mozilla Firefox.</p></li>
                                    <li><p>Pastikan untuk menggunakan browser yang paling up-to-date.</p></li>
                                </ul>
                                <h3>Tahap Penyisihan (Online)</h3>
                                <ul class="sub-list">
                                    <li><p>Peserta mengerjakan soal tahap penyisihan berdasarkan pembagian waktu per region yang telah ditentukan</p></li>
                                    <li><p>Peserta tidak dapat melakukan pengerjaan soal pada waktu selain dari waktu yang telah ditentukan di atas</li>
                                    <li><p>Apabila terdapat kendala pada jam yang telah ditentukan tersebut harap melakukan konfirmasi ke contact person yang tersedia.</p></li>
                                    <li><p>Peserta <i>log in</i> ke <a href="https://www.chemication.com">www.chemication.com</a> menggunakan <i>e-mail</i> yang digunakan dan <i>password</i> yang telah dibuat saat pendaftaran.</p></li>
                                    <li><p>Peserta masuk pada <i>tab</i> Tahap Penyisihan.</p></li>
                                    <li><p><i>Log in</i> tidak dapat dilakukan lebih dari 1 (satu) kali pada suatu waktu. Peserta mengerjakan soal bersama-sama dengan anggota timnya masing-masing, dan hanya dapat digunakan di satu device saja.</p></li>
                                    <li><p>Tahap penyisihan terdiri dari 90 soal dengan waktu pengerjaan 120 menit.</p></li>
                                    <li><p>Model soal adalah <i>multiple choice</i>.</p></li>
                                    <li><p>Peserta langsung meng-<i>input</i> dan men-<i>submit</i> jawaban melalui <i>web</i> dalam jangka waktu yang telah disebutkan di atas.</p></li>
                                    <li><p>Peserta yang terlambat tidak mendapatkan tambahan waktu pengerjaan soal.</p></li>
                                    <li><p>Peserta yang lolos ke tahap selanjutnya akan diumumkan melalui website Chemication</p></li>
                                    <li><p>Peserta yang lolos ke tahap Semi Final sebanyak 20 tim. Dan akan ada Juara tiap Rayon dan tiap Region.</p></li>
                                    <li><p>Peserta yang lolos ke tahap selanjutnya akan diumumkan melalui <a href="https://www.chemication.com">www.chemication.com</a>.</p></li>
                                    <li><p>Keputusan panitia mutlak dan tidak dapat diganggu gugat.</p></li>
                                </ul>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1" style="margin-bottom:20px">
                                <h3>Tester</h3>
                                <h4>Jika anda melihat halaman ini, berarti anda merupakan tester website.</h4>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <a class="btn btn-primary btn-block" href="/ceo/mulai">Lanjutkan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>