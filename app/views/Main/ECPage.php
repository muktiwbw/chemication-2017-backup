<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/img/contents/ec_favicon.png" type="image/x-icon">
    <link rel="icon" href="/img/contents/ec_favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous">
    </script>
    <title>Energy Competition 2017</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div id="navigation-bar" class="col-md-12">
                <style>
                    #main-content{
                        padding-top: 60px;
                    }
                    #navigation-bar{
                        background-color: #fff;
                        height: 50px;
                        color: #3A9C55;
                        font-weight: bold;
                        position: fixed;
                        z-index: 1;
                    }
                    #brand-icon{
                        height: 23px;
                    }
                    #brand-container{
                        padding-top: 12px;
                    }
                    .navigation-menu{
                        font-size: 15px;
                        padding-top: 13px;
                    }
                    .navigation-menu:hover{
                        color: #74CB8D;
                        cursor: pointer;
                    }
                    #navigation-brand{
                        cursor: pointer;
                        padding-top: 0;
                        width: 57px;
                    }
                    #navigation-brand:hover{
                        cursor: pointer;
                        padding-top: 0;
                    }
                    /*.navigation-menu{
                        padding-top: 14px;
                    }*/
                    #navigation-ketentuan-hover{
                        display: none;
                        width: 200px;
                        position: fixed;
                        background-color: #3A9C55;
                        color: #fff;
                        font-weight: bold;
                        z-index: 1;
                        margin-left: 166px;
                        margin-top: 50px;
                    }
                    #navigation-ketentuan-hover>.row>.col-md-12:hover{
                        background-color: #0C203F;
                        cursor: pointer;
                    }
                    #navigation-ketentuan-hover>.row>.col-md-12{
                        padding-top: 15px;
                        padding-bottom: 15px;
                    }
                    #header-theme{
                        font-size: 25px; font-style: italic; margin-top: 10px; margin-bottom: 0;
                    }
                    #header-subtheme{
                        font-size: 18px; margin-bottom: 25px;
                    }
                    .navbar-link{
                        color: #3A9C55 !important;
                    }
                    .navbar-link:visited{
                        color: #3A9C55 !important;
                    }
                    #menu-icon{
                        width: 30px;
                        padding-top: 10px;
                        padding-bottom: 10px;
                    }
                    .mobile-dropdown{
                        display: none;
                        background: #fff;
                        padding-top: 10px;
                        padding-bottom: 10px;
                    }
                    #mobile-navigation-menu{
                        display: none;
                    }
                    @media (max-width: 980px){
                        #main-content{
                            padding-top: 43px;
                        }
                        #navigation-bar{
                            background-color: #fff;
                            height: 50px;
                            width: 100%;
                            color: #3A9C55;
                            font-weight: bold;
                            position: fixed;
                            z-index: 1;
                            box-shadow: 2px 2px 2px #444;
                        }
                        p#header-theme{
                            font-size: 18px;
                        }
                        p#header-subtheme{
                            font-size: 12px;
                        }
                        #navigation-ketentuan-hover{
                            margin: 0;
                        }
                        .non-mobile{
                            display: none;
                        }
                        #img-mekanisme-pendaftaran>img{
                            height: 400px;
                        }
                        #img-mekanisme-pendaftaran{
                            overflow: scroll;
                            padding-top: 15px !important;
                        }
                        .img-banner-container>img{
                            width: 250px;
                        }
                        .col-md-12.content>.row.content-heading>.col-md-12.text-center>h1{
                            font-size: 36px;
                            padding: 0;
                        }
                        .row.content-body>.icon>.fa, .row.content-body>.icon>.glyphicon{
                            font-size: 120px;
                        }
                        #section-banner-content>.header-text{
                            padding: 0 15px;
                            text-align: justify;
                        }
                        #main-content>.content>.content-body>.col-md-8{
                            padding-right: 15px;
                        }
                        #header-subtheme>.sub-theme-delimiter{
                            padding: 0 5px;
                        }
                        #section-header>#section-banner-content{
                            padding-top: 10px !important;
                            padding-bottom: 10px !important;
                        }
                        #main-content>.content{
                            padding-top: 20px !important;
                            padding-bottom: 20px !important;
                        }
                        .content-body>.icon{
                            padding-top: 15px !important;
                            padding-bottom: 15px !important;
                        }
                        #footer-copyright{
                            font-size: 12px;
                        }
                        #navigation-brand{
                            position: fixed;
                            top: 0;
                        }
                        #mobile-navigation-menu{
                            display: block;
                        }
                    }
                </style>
                <div id="mobile-navigation-menu" class="row">
                    <div class="col-md-12">
                        <img id="menu-icon" src="/img/contents/menu-icon.svg" alt="" class="img-responsive img-rounded">
                    </div>
                    <div class="col-md-12 navigation-menu mobile-dropdown" data-toggle-scroll="section-timeline" >Timeline</div>
                    <div class="col-md-12 navigation-menu mobile-dropdown" data-toggle-scroll="section-ketentuan-peserta">Ketentuan Peserta</div>
                    <div class="col-md-12 navigation-menu mobile-dropdown" data-toggle-scroll="section-ketentuan-kompetisi">Ketentuan Kompetisi</div>
                    <div class="col-md-12 navigation-menu mobile-dropdown" data-toggle-scroll="section-mekanisme-pendaftaran">Mekanisme Pendaftaran</div>
                    <div class="col-md-12 navigation-menu mobile-dropdown" data-toggle-scroll="section-hadiah-penghargaan">Hadian &amp; Penghargaan</div>
                    <div class="col-md-12 mobile-dropdown"><a class="navbar-link" href="https://intip.in/GuidanceBookEC2017">Guidance Book</a></div>
                    <div class="col-md-12 mobile-dropdown"><a class="navbar-link" href="https://intip.in/TemplateAbstrakEnergyCompetition2017">Template Abstrak</a></div>
                </div>
                <div id="navigation-menu" class="row">
                    <div id="navigation-brand" data-toggle-scroll="section-header" class="navigation-menu col-xs-2 col-xs-offset-5 col-md-1 col-md-offset-0"><div id="brand-container"><img src="/img/contents/ec_brand.png" alt="ec" id="brand-icon" class="img-responsive"></div></div>
                    <div class="non-mobile navigation-menu col-md-1" data-toggle-scroll="section-timeline"><span>Timeline</span></div>
                    <div class="non-mobile navigation-menu col-md-1" data-toggle-scroll="section-ketentuan"><span>Ketentuan</i></span></div>
                    <div class="non-mobile navigation-menu col-md-2" data-toggle-scroll="section-mekanisme-pendaftaran"><span>Mekanisme Pendaftaran</span></div>
                    <div class="non-mobile navigation-menu col-md-2" data-toggle-scroll="section-hadiah-penghargaan"><span>Hadiah &amp; Penghargaan</span></div>
                    <a class="navbar-link" href="https://intip.in/GuidanceBookEC2017"><div class="non-mobile navigation-menu col-md-1 true-link"><span>Guidance Book</span></div></a>
                    <a class="navbar-link" href="https://intip.in/TemplateAbstrakEnergyCompetition2017"><div class="non-mobile navigation-menu col-md-2 true-link"><span>Template Abstrak</span></div></a>
                </div> 
            </div>
            <div id="navigation-ketentuan-hover" class="col-md-12">
                <div class="row">
                    <div class="navigation-menu col-md-12" data-toggle-scroll="section-ketentuan-peserta"><span>Ketentuan Peserta</span></div>
                    <div class="navigation-menu col-md-12" data-toggle-scroll="section-ketentuan-kompetisi"><span>Ketentuan Kompetisi</span></div>
                </div>
            </div>
        </div>
        <div id="main-content" class="row">
            <div id="section-header" class="col-md-12 text-center">
                <style>
                    #section-header>#section-banner-content{
                        padding-top: 60px;
                        padding-bottom: 60px;
                    }
                    #notification>p{
                        margin-top: 10px;
                    }
                    .img-main-banner{
                        width: 500px;
                        display: inline-block;
                    }
                    .img-banner-container{
                        padding-top: 20px;
                        padding-bottom: 20px;
                    }
                    .header-text{
                        padding: 0 120px;
                        font-size: 16px;
                        line-height: 1.5;
                    }
                    .sub-theme-delimiter{
                            padding: 0 10px;
                        }
                </style>
                <!-- <div class="row">
                    <div id="notification" class="col-md-12 bg-danger">
                        <p><i class="fa fa-exclamation-circle" aria-hidden="true"></i> [ 13 Juli 2017 ] Link download Template Abstrak mengalami perubahan. Bagi yang sudah mendownload Template Abstrak harap untuk mendownload ulang.</p>
                    </div>
                </div> -->
                <div id="section-banner-content" class="row">
                    <div class="img-banner-container col-md-12">
                        <img src="/img/contents/ec_ratio_resized.png" alt="" class="img-responsive img-main-banner">
                    </div>
                    <!--<div class="col-md-12">
                        <h1 style="color: #3A9C55;"><b>ENERGY COMPETITION 2017</b></h1>
                    </div>-->
                    <div class="col-md-12">
                        <p id="header-theme">
                            “Inovasi Teknologi Tepat Guna dengan Mengoptimalkan Sumber Daya Alam”
                        </p>
                        <p id="header-subtheme"> 
                            Energi <span class="sub-theme-delimiter">&bull;</span> Material <span class="sub-theme-delimiter">&bull;</span> Lingkungan <span class="sub-theme-delimiter">&bull;</span> Kelautan
                        </p>
                    </div>
                    <div style="background: #aaa; height: 2px; margin-bottom: 20px;" class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1"></div>
                    <div class="header-text col-md-12">
                        <p><b>Energy Competition</b> adalah adalah sebuah kompetisi karya tulis ilmiah dalam bidang teknologi yang ditujukan untuk Mahasiswa/Mahasiswi S1/Diploma se-Indonesia dan merupakan serangkaian acara <b>CHEMICATION</b> yang diadakan oleh <b>Himpunan Mahasiswa Teknik Kimia <br>UPN “Veteran” Jawa Timur</b>.</p>
                    </div>
                </div>
                <!--<div id="section-theme-content" class="row">
                    <style>
                        #section-theme-content{
                            background-color: #0C203F;
                            color: #eee;
                            padding: 20px 0;
                        }
                        .sub-theme-delimiter{
                            padding: 0 10px;
                        }
                        .theme-sub-content{
                            padding: 10px 0;
                        }
                        .theme-content-heading{
                            font-size: 20px;
                            font-weight: bold;
                        }
                        .theme-content-body{
                            font-size: 16px;
                            font-style: italic;
                        }
                        #theme-content-sub-theme>.theme-content-body>p{
                            font-style: normal;
                        }
                    </style>
                    <div id="theme-content-theme" class="theme-sub-content col-md-12">
                        <div class="theme-content-heading">- TEMA -</div>
                        <div class="theme-content-body">
                            
                        </div>
                    </div>

                    <div id="theme-content-sub-theme" class="theme-sub-content col-md-12">
                        <div class="theme-content-heading">- SUB-TEMA -</div>
                        <div class="theme-content-body">
                            
                        </div>
                    </div>
                </div>-->
            </div>
            <div id="section-finalis" class="col-md-12 content">
                <style>
                    a.ec-button{
                        color: #fff;
                        text-decoration: none;
                        background: #3A9C55;
                        padding: 16px;
                        border-radius: 5px;
                    }
                    #finalis-caption{
                        margin-bottom: 30px;
                    }
                </style>
                <div class="row content-heading">
                    <div class="col-md-12 text-center">
                        <h1>PENGUMUMAN FINALIS DAN GUIDANCE BOOK FINALIS</h1>
                    </div>
                </div>
                <div class="row content-body text-center">
                    <div class="col-md-6" style="margin-bottom:30px;">
                        <h2>Daftar Finalis</h2>
                        <p id="finalis-caption">Daftar Finalis Energy Competition dapat dilihat di halaman berikut</p>
                        <a class="ec-button" target="_blank" href="/ec/finalis">Lihat Daftar Finalis</a>
                    </div>
                    <div class="col-md-6">
                        <h2>Guidance Book Finalis</h2>
                        <p id="finalis-caption">Guidance Book Finalis dapat didownload pada halaman berikut</p>
                        <a class="ec-button" target="_blank" href="/uploaded_contents/ec/GUIDANCE_BOOK_FINALIS_ENERGY_COMPETITION_2017.pdf">Download Guidance Book Finalis</a>
                    </div>
                </div>  
            </div>
            <div id="section-pemenang" class="col-md-12 content">
                <style>
                    a.ec-button{
                        color: #fff;
                        text-decoration: none;
                        background: #3A9C55;
                        padding: 16px;
                        border-radius: 5px;
                    }
                    #pemenang-caption{
                        margin-bottom: 30px;
                    }
                </style>
                <div class="row content-heading">
                    <div class="col-md-12 text-center">
                        <h1>SELEKSI ABSTRAK</h1>
                    </div>
                </div>
                <div class="row content-body text-center">
                    <p id="pemenang-caption">Daftar peserta yang lolos seleksi abstrak dapat dilihat di halaman berikut</p>
                    <a class="ec-button" href="https://www.chemication.com/ec/lolos-abstrak">Lihat Daftar Peserta Yang Lolos</a>
                </div>  
            </div>
            <div id="section-timeline" class="col-md-12 content">
                <style>
                    .content{
                        padding-top: 90px;
                        padding-bottom: 90px;
                    }
                    .icon>.fa{
                        font-size: 300px;
                    }
                    .content-body>.icon{
                        padding-top: 47px;
                        color: #666;
                    }
                    .content-heading>.col-md-12>h1{
                        font-size: 52px;
                        padding-bottom: 20px;
                        font-weight: bold;
                        color: #3A9C55;
                    }
                    .content-body>.col-md-8{
                        padding-right: 77px;
                    }
                </style>
                <div class="row content-heading">
                    <div class="col-md-12 text-center">
                        <h1>TIMELINE</h1>
                    </div>
                </div>
                <div class="row content-body">
                    <div class="icon col-md-4 text-center">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </div>
                    <div class="col-md-8">
                        <table class="table table-striped table-hover table-bordered">
                            <tr>
                                <th>Kegiatan</th>
                                <th>Pelaksanaan</th>
                            </tr>
                            <tr>
                                <td>Pendaftaran Peserta dan Pengumpulan Abstrak</td>
                                <td>1 - 21 Agustus 2017</td>
                            </tr>
                            <tr>
                                <td>Seleksi Abstrak</td>
                                <td>2 - 9 September 2017</td>
                            </tr>
                            <tr>
                                <td>Pengumuman Seleksi Abstrak</td>
                                <td>10 September 2017</td>
                            </tr>
                            <tr>
                                <td>Pengumpulan Proposal dan Pembayaran</td>
                                <td>11 September - 1 Oktober 2017</td>
                            </tr>
                            <tr>
                                <td>Seleksi Proposal</td>
                                <td>9 - 15 Oktober 2017</td>
                            </tr>
                            <tr>
                                <td>Pengumuman 10 Besar Finalis</td>
                                <td>16 Oktober 2017</td>
                            </tr>
                            <tr>
                                <td>Pembuatan Demo Karya</td>
                                <td>16 Oktober - 11 November 2017</td>
                            </tr>
                            <tr>
                                <td>Technical Meeting</td>
                                <td>10 November 2017</td>
                            </tr>
                            <tr>
                                <td>Grand Final</td>
                                <td>12 November 2017</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div id="section-ketentuan-peserta" class="col-md-12 content">
                <style>
                    ul{
                        list-style: decimal;
                        padding-left: 23px;
                    }
                    ul>li>p{
                        text-align: justify;
                        line-height: 2;
                    }
                    .fa.fa-users{
                        font-size: 200px;
                    }
                    #section-ketentuan-peserta>.content-body>.icon{
                        padding-top: 33px;
                    }
                </style>
                <div class="row content-heading">
                    <div class="col-md-12 text-center">
                        <h1>KETENTUAN PESERTA</h1>
                    </div>
                </div>
                <div class="row content-body">
                    <div class="icon col-md-4 text-center">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                    <div class="col-md-8">
                        <ul>
                            <li>
                                <p>Setiap tim terdiri dari 2-3 orang mahasiswa aktif yang sedang menempuh pendidikan diploma atau S1 dalam institusi pendidikan yang sama (beda jurusan dan angkatan diperbolehkan), dan dapat dibuktikan dengan Kartu Tanda Mahasiswa atau Surat Keterangan yang menyatakan bahwa mahasiswa masih aktif.</p>
                            </li>
                            <li>
                                <p>Setiap tim memiliki 1 orang ketua.</p>
                            </li>
                            <li>
                                <p>Setiap tim didampingi oleh 1 orang dosen pendamping.</p>
                            </li>
                            <li>
                                <p>Setiap mahasiswa hanya boleh terdaftar dalam 1 tim dan 1 karya.</p>
                            </li>
                            <li>
                                <p>Peserta tidak diperkenankan mengikuti Lomba Karya Tulis Ilmiah selain Energy Competition selama kompetisi berlangsung.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="section-ketentuan-kompetisi" class="col-md-12 content">
                <style>
                    ul{
                        list-style: decimal;
                        padding-left: 23px;
                    }
                    ul>li>p{
                        text-align: justify;
                    }
                    .fa.fa-flag-checkered{
                        font-size: 270px;
                        display: inline-block;
                        transform: rotate(-10deg);
                    }
                    #section-ketentuan-kompetisi>.content-body>.icon{
                        padding-top: 74px;
                    }
                </style>
                <div class="row content-heading">
                    <div class="col-md-12 text-center">
                        <h1>KETENTUAN KOMPETISI</h1>
                    </div>
                </div>
                <div class="row content-body">
                    <div class="icon col-md-4 text-center">
                        <i class="fa fa-flag-checkered" aria-hidden="true"></i>
                    </div>
                    <div class="col-md-8">
                        <ul>
                            <li>
                                <p>Kompetisi dibagi menjadi 3 tahap yang meliputi tahap <b style="color: red;">Seleksi Abstrak</b>, <b style="color: red;">Seleksi Proposal</b> dan <b style="color: red;">Grand Final</b>. <br>Pada tahap <b style="color: red;">Seleksi Abstrak</b>, setiap tim mengirimkan abstrak kemudian dilakukan penjurian untuk menentukan peserta yang lolos ke tahap selanjutnya. <br>Pada tahap <b style="color: red;">Seleksi Proposal</b>, peserta yang dinyatakan lolos seleksi abstrak mengirimkan proposal lengkap beserta berkas yang ada. Kemudian, dilakukan penjurian kedua untuk menentukan 10 karya terbaik yang akan diundang ke Universitas Pembangunan Nasional “Veteran” Jawa Timur untuk memperebutkan juara 1, 2, 3, dan favorit demo karya pada grand final.<br>Pada tahap <b style="color: red;">Grand Final</b>, 10 karya terbaik mempresentasikan proposal dan demo karya.</p>
                            </li>
                            <li>
                                <p>Tim yang lolos pada tahap seleksi proposal wajib mengenakan almamater dari institusi pendidikan masing-masing pada saat acara Energy Competition berlangsung.</p>
                            </li>
                            <li>
                                <p>Segala urusan keuangan menyangkut pembuatan karya tulis dan pembuatan demo karya BUKAN tanggung jawab panitia.</p>
                            </li>
                            <li>
                                <p>Segala tindak kecurangan yang dilakukan oleh peserta akan dikenakan pengurangan nilai atau diskualifikasi.</p>
                            </li>
                            <li>
                                <p>Keputusan juri bersifat mutlak dan tidak dapat diganggu gugat.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="section-mekanisme-pendaftaran" class="col-md-12 content">
                <style>
                    ul{
                        list-style: decimal;
                        padding-left: 23px;
                    }
                    ul>li>p{
                        text-align: justify;
                    }
                    .glyphicon.glyphicon-list-alt{
                        font-size: 270px;
                    }
                    #section-mekanisme-pendaftaran>.content-body>.icon{
                        padding-top: 12px;
                    }
                    #img-mekanisme-pendaftaran{
                        padding-top: 40px;
                    }
                </style>
                <div class="row content-heading">
                    <div class="col-md-12 text-center">
                        <h1>MEKANISME PENDAFTARAN</h1>
                    </div>
                </div>
                <div class="row content-body">
                    <div class="icon col-md-4 text-center">
                        <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-8">
                        <ul>
                            <li>
                                <p>Setiap tim wajib mengisi formulir secara online yang dapat diakses pada <a href="https://intip.in/FormulirPendaftaranEC2017">Formulir Pendaftaran</a></p>
                            </li>
                            <li>
                                <p>Setiap tim mengirimkan berkas pendaftaran dan abstrak ke chemication.upnvjatim@gmail.com</p>
                            </li>
                            <li>
                                <p>Setiap tim yang telah mengirimkan berkas wajib melakukan konfirmasi ke nomor 089608999033 atas nama Nur Fadhillah dengan format (Nama Ketua Tim)_(Institusi Pendidikan)_(Judul).<br>Contoh: Fahrizal Afdholu S.A._Universitas Pembangunan Nasional “Veteran” Jawa Timur_Pemanfaatan Biogas.</p>
                            </li>
                            <li>
                                <p>Setelah konfirmasi, peserta akan mendapatkan nomor id yang dikirim melalui SMS.</p>
                            </li>
                        </ul>
                    </div>
                    <div id="img-mekanisme-pendaftaran" class="col-md-12 text-center">
                        <img src="/img/contents/alur_ec_online.png" alt="" class="img responsive">
                    </div>
                </div>
            </div>
            <div id="section-hadiah-penghargaan" class="col-md-12 content">
                <style>
                    ul{
                        list-style: decimal;
                        padding-left: 23px;
                    }
                    ul>li>p{
                        text-align: justify;
                    }
                    .fa.fa-trophy{
                        font-size: 270px;
                    }
                    #section-hadiah-penghargaan>.content-body>.icon{
                        padding-top: 0;
                    }
                    #section-hadiah-penghargaan>.content-body>.col-md-8>ul{
                        list-style: none;
                    }
                    #section-hadiah-penghargaan>.content-body>.col-md-8>ul>li{
                        padding: 10px;
                        font-size: 20px;
                    }
                </style>
                <div class="row content-heading">
                    <div class="col-md-12 text-center">
                        <h1>HADIAH &amp; PENGHARGAAN</h1>
                    </div>
                </div>
                <div class="row content-body">
                    <div class="icon col-md-4 text-center">
                        <i class="fa fa-trophy" aria-hidden="true"></i>
                    </div>
                    <div class="col-md-8">
                        <ul>
                            <li>
                                <div class="row">
                                    <div class="col-md-4"><b>Juara 1</b></div>
                                    <div class="col-md-6">: Rp 4.000.000,00 + Trophy + Sertifikat</div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-4"><b>Juara 2</b></div>
                                    <div class="col-md-6">: Rp 2.500.000,00 + Trophy + Sertifikat</div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-4"><b>Juara 3</b></div>
                                    <div class="col-md-6">: Rp 1.500.000,00 + Trophy + Sertifikat</div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-4"><b>Demo Karya Favorit</b></div>
                                    <div class="col-md-6">: Rp 500.000,00 + Sertifikat</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer" class="row">
            <style>
                #footer{
                    background-color: #444;
                    color: #eee;
                    padding-top: 25px;
                    padding-bottom: 0;
                    margin-top: 170px;
                }
                #footer>.col-md-3>ul, #footer>.col-md-4>ul{
                    list-style: none;
                    padding-left: 0;
                }
                #footer>.col-md-3>ul>li>a{
                    text-decoration: none;
                    color: #eee;
                }
                #footer>.col-md-3>ul>li, #footer>.col-md-4>ul>li{
                    line-height: 1.5;
                }
                #footer>.col-md-3>ul>li>a:hover{
                    color: #fff;
                }
                #footer>.col-md-3>span, #footer>.col-md-4>span{
                    font-size: 18px;
                    font-weight: bold;
                }
                #footer>.col-md-3, #footer>.col-md-4{
                    padding-bottom: 15px;
                }
                #footer-copyright{
                    padding-top: 15px;
                    padding-bottom: 15px;
                    background-color: #3A9C55;
                }
            </style>
            <div class="col-md-4">
                <span>Contact Person:</span>
                <ul>
                    <li><b>Fahrizal</b> (082234791664) / LINE : afdholu_15</li>
                    <li><b>Azra</b> (085741666900) / LINE : azramuhammadd</li>
                    <li><b>Email</b> : chemication.upnvjatim@gmail.com</li>
                </ul>
            </div>
            <div class="col-md-3">
                <span>Sites:</span>
                <ul>
                    <li><a href="https://www.chemication.com/">Chemication</a></li>
                    <li><a href="https://www.chemication.com/ec/">Energy Competition</a></li>
                    <li><a href="https://www.chemication.com/ceo/">Chemical Engineering Olympiad</a></li>
                    <li><a href="https://www.chemication.com/hsfc/">High School Futsal Competition</a></li>
                </ul>
            </div>
            <div id="footer-copyright" class="col-md-12 text-center">
                Copyright 2017 - HIMATEKK UPN "Veteran" Jawa Timur
            </div>
        </div>
    </div>
    <script>
        $(function(){

            $('.navigation-menu').click(function(){
                if($(this).attr('data-toggle-scroll') == 'section-ketentuan'){
                    $('#navigation-ketentuan-hover').fadeToggle('fast');
                }else if(!$(this).hasClass('true-link')){
                    if($(this).parent().parent().attr('id') == 'navigation-ketentuan-hover'){
                        $('#navigation-ketentuan-hover').fadeToggle('fast');
                    }
                    var target_name = $(this).attr('data-toggle-scroll');
                    var section_target = $(this).attr('id') == 'navigation-brand' ? $('body') : $('#'+target_name);
                    var offset = $(this).hasClass('mobile-dropdown') ? -20 : 0;

                    $('html, body').animate({
                        scrollTop: section_target.offset().top + offset
                    }, 500);
                }
            });

            $('#menu-icon').click(function(){
                $('.mobile-dropdown').fadeToggle('fast');
            });

            $('.mobile-dropdown').click(function(){
                $('.mobile-dropdown').fadeOut('fast');
            });

        })
    </script>
</body>
</html>