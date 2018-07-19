<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/img/contents/ec_favicon.png" type="image/x-icon">
    <link rel="icon" href="/img/contents/hsfc_favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous">
    </script>
    <title>High School Futsal Competition 2017</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div id="navigation-bar" class="col-md-12">
                <style>
                    #main-content{
                        padding-top: 50px;
                        padding-bottom: 0 !important;
                        /*background-color: #fff'*/
                    }
                    #navigation-bar{
                        background-color: #fff;
                        height: 50px;
                        color: #d34b4b;;
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
                        color: #0C203F;
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
                    #img-mekanisme-pendaftaran-online, #img-mekanisme-pendaftaran-offline{
                        padding-top: 25px !important;
                        padding-bottom: 25px !important;
                    }
                    @media (max-width: 980px){
                        #main-content{
                            padding-top: 50px;
                        }
                        #navigation-bar{
                            background-color: #f58e8e;
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
                        #img-mekanisme-pendaftaran-online>img, #img-mekanisme-pendaftaran-offline>img{
                            height: 400px;
                        }
                        #img-mekanisme-pendaftaran-online, #img-mekanisme-pendaftaran-offline{
                            overflow: scroll !important;
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
                        #rp-300-rb{
                            font-size: 55px !important;
                            line-height: 70px !important;
                        }
                        .banner-text>span{
                            display: none !important;
                        }
                        #section-banner-content{
                            background: #fff !important;
                        }
                        #section-banner-content>.header-text>h2, #section-banner-content>.header-text>p{
                            color: #444 !important;
                        }
                        ul{
                            padding-left: 20px;
                        }
                        
                    }
                </style>
                <div id="navigation-menu" class="row">
                    <div id="navigation-brand" data-toggle-scroll="section-header" class="navigation-menu col-xs-2 col-xs-offset-5 col-md-1 col-md-offset-0"><div id="brand-container"><img src="/img/contents/resized-hsfc-icon.png" alt="ec" id="brand-icon" class="img-responsive"></div></div>
                    <div class="non-mobile navigation-menu col-md-1 text-center" data-toggle-scroll="section-banner-content"><span>Overview</span></div>
                    <div class="non-mobile navigation-menu col-md-2 text-center" data-toggle-scroll="title-info-kompetisi"><span>Info Kompetisi</span></div>
                    <div class="non-mobile navigation-menu col-md-2 text-center" data-toggle-scroll="title-syarat-pendaftaran"><span>Syarat Pendaftaran</span></div>
                    <div class="non-mobile navigation-menu col-md-2 text-center" data-toggle-scroll="title-mekanisme"><span>Mekanisme &amp; Peraturan</span></div>
                    <div class="non-mobile navigation-menu col-md-2 text-center" data-toggle-scroll="title-hadiah"><span>Hadiah &amp; Penghargaan</span></div>
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
                    .img-main-banner{
                        width: 500px;
                        display: inline-block;
                    }
                    .img-banner-container{
                        padding-top: 20px;
                        padding-bottom: 20px;
                    }

                    .header-text{
                        padding-top: 74px;
                    }
                    .header-text>p{
                        padding-right: 33px;
                        font-size: 18px;
                        line-height: 1.5;
                        color: #fff;
                    }
                    .header-text>h2{
                        font-size: 40px;
                        line-height: 1.5;
                        color: #fff;
                    }

                    /*HSFC Section*/
                    .img-banner-container{
                        padding-top: 50px;
                    }
                    #section-banner-content{
                        background-color:  #f58e8e ;
                    }
                    .web-banner{
                        background-color: #eee;
                        padding-top: 170px;
                        padding-bottom: 170px;
                    }
                    .banner-text>span{
                        display: inline-block;
                        padding: 15px 35px;
                        background: #d34b4b;
                        color: #fff;
                        font-size: 41px;
                        font-weight: bold;
                        margin: 137px 0;
                    }
                    .banner-frame{
                        height: 100px;
                        background: #444;
                    }
                    .banner-image{
                        background: url('/img/contents/futsal-banner.jpg');
                        height: 600px;
                        background-position-y: 65%;
                        position: fixed;
                        z-index: -1;
                    }
                </style>
                <div class="row">
                    <div class="banner-text col-md-12">
                        <span>HIGH SCHOOL FUTSAL COMPETITION</span>
                    </div>
                    <div class="banner-image col-md-12"></div>
                </div>
                <div id="section-banner-content" class="row">
                    <div class="img-banner-container col-md-6">
                        <img src="/img/contents/hsfc.png" alt="" class="img-responsive img-main-banner">
                    </div>
                    <div class="header-text col-md-6 text-left">
                        <h2>Overview</h2>
                        <p>High School Futsal Competition (HSFC) 2017 adalah pertandingan futsal tingkat SMA/SMK/MA sederajat se-Jawa Timur, dimana tidak hanya bersaing dalam pertandingan futsalnya saja, tetapi bersaing dalam menjadi top score dan juga best player dalam kompetisi futsal ini. Selain itu ada juga pemilihan best supporter.</p>
                    </div>
                </div>
            </div>
            <div id="title-info-kompetisi" class="col-md-12 section-heading text-center">
                <style>
                    .section-heading{
                        background-color: #d34b4b;
                        padding-top: 20px;
                        padding-bottom: 20px;
                        color: #fff;
                        font-size: 36px;
                    }
                </style>
                <span>INFO KOMPETISI</span>
            </div>
            <div id="section-info-kompetisi" class="col-md-12">
                <style>
                    #section-info-kompetisi{
                        background-color:  #fff ;
                        padding-top: 25px;
                        padding-bottom: 25px;
                    }
                    .section-body{
                        padding-top: 40px;
                        padding-bottom: 40px;
                    }
                    #num-32, #rp-300-rb{
                        display: inline-block;
                        font-size: 160px;
                        font-weight: bold;
                        line-height: 160px;
                    }
                    #rp-300-rb{
                        font-size: 105px;
                        line-height: 134px;
                    }
                    #num-32-desc, #rp-300-rb-desc{
                        display: inline-block;
                        font-size: 25px;
                    }
                    #jumlah-peserta, #biaya-pendaftaran, #timeline, #ketentuan-peserta, #syarat-pendaftaran, #hadiah{
                        font-size: 25px;
                        font-weight: bold;
                    }
                    .fa.fa-users, .fa.fa-money, .fa.fa-calendar, .fa.fa-id-card, .fa.fa-check, .fa.fa-trophy{
                        font-size: 235px !important;
                    }
                    .fa.fa-money, .fa.fa-id-card{
                        display: inline-block;
                        transform: rotate(-10deg);
                    }
                    .fa.fa-calendar{
                        padding-top: 64px;
                    }
                    #timeline-table{
                        display: inline-block;
                        width: auto;
                        line-height: 40px;
                        font-size: 16px;
                    }
                    #timeline{
                        font-size: 50px;
                    }
                    #isi-ketentuan>li>p{
                        line-height: 1.5;
                    }
                    #grouped-ketentuan>.col-md-12>ul, #syarat-pendaftaran-grouped>.col-md-12>ul>, #syarat-pendaftaran-grouped>.col-md-12>ul>li>ul{
                        font-size: 22px;
                    }
                    #grouped-ketentuan>.col-md-12>ul>li>p, #syarat-pendaftaran-grouped>.col-md-12>ul>li>p, #syarat-pendaftaran-grouped>.col-md-12>ul>li>ul>li>p{
                        padding-right: 66px;
                    }
                </style>
                <div class="section-body row">
                    <div class="col-md-4 text-center">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12"><span id="jumlah-peserta" style="color:#d34b4b;">Jumlah Peserta</span></div>
                            <div class="col-md-12"><span id="num-32">32</span></div>
                            <div class="col-md-12"><span id="num-32-desc"><b>TEAM</b> dengan mengunakan sistem <i>knock-out</i> (sistem gugur)</span></div>
                        </div>
                    </div>
                </div>
                <div class="section-body row">
                    <div class="col-md-4 text-center">
                        <i class="fa fa-money" aria-hidden="true"></i>
                    </div>
                    <div class="col-md-8">
                        <div class="col-md-12"><span id="biaya-pendaftaran" style="color:#d34b4b;">Biaya Pendaftaran</span></div>
                        <div class="col-md-12"><span id="rp-300-rb">Rp 300.000</span></div>
                        <div class="col-md-12"><span id="rp-300-rb-desc">per team</span></div>
                    </div>
                </div>
                <div class="section-body row">
                    <div class="col-md-4 text-center">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12"><span id="timeline" style="color:#d34b4b;">Timeline</span></div>
                            <div class="col-md-12">
                                <div id="timeline-table">
                                    <table class="table table-hover table-striped table-bordered">
                                        <tr>
                                            <th>Tanggal Pelaksanaan</th>
                                            <th>Kegiatan</th>
                                        </tr>
                                        <tr>
                                            <td>23 Juli - 11 Oktober 2017</td>
                                            <td>Pendaftaran HSFC Online</td>
                                        </tr>
                                        <tr>
                                            <td>11 September - 11 Oktober 2017</td>
                                            <td>Pendaftaran HSFC Offline</td>
                                        </tr>
                                        <tr>
                                            <td>11 Oktober 2017</td>
                                            <td>Pengumpulan Terakhir Formulir <br>Pendaftaran dan Persyaratan Pendaftaran</td>
                                        </tr>
                                        <tr>
                                            <td>18 Oktober 2017</td>
                                            <td>Technical Meeting</td>
                                        </tr>
                                        <tr>
                                            <td>25 Oktober - 29 Oktober 2017</td>
                                            <td>Pelaksanaan Pertandingan</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-body row">
                    <div class="col-md-4 text-center">
                        <i class="fa fa-id-card" aria-hidden="true"></i>
                    </div>
                    <div id="grouped-ketentuan" class="col-md-8">
                        <div class="col-md-12"><span id="ketentuan-peserta" style="color:#d34b4b;">Ketentuan Peserta</span></div>
                        <div class="col-md-12">
                            <ul id="isi-ketentuan">
                                <li><p>Peserta merupakan siswa/pelajar aktif dari SMA/SMK/MA sederajat di Jawa Timur</p></li>
                                <li><p>Setiap tim terdiri dari 12 orang yang terdaftar, dengan 2 orang official</p></li>
                                <li><p>Peserta wajib mematuhi peraturan yang ditetapkan oleh panitia dan sanggup menerima sanksi yang telah ditentukan jika melanggar</p></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="title-syarat-pendaftaran" class="col-md-12 section-heading text-center">
                <span>SYARAT PENDAFTARAN</span>
            </div>
            <style>
                #section-syarat-pendaftaran, #section-hadiah{
                    background-color: #fff;
                }
                #syarat-pendaftaran-grouped{
                    padding-top: 11px;
                }
            </style>
            <div id="section-syarat-pendaftaran" class="col-md-12">
                <div class="section-body row">
                    <div class="col-md-4 text-center">
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </div>
                    <div id="syarat-pendaftaran-grouped" class="col-md-8">
                        <div class="col-md-12"><span id="syarat-pendaftaran" style="color:#d34b4b;">Syarat Pendaftaran</span></div>
                        <div class="col-md-12">
                            <ul id="isi-syarat-pendaftaran">
                                <li>
                                    <p>Setiap pemain diwajibkan melampirkan :</p>
                                    <p>a. Fotocopy Kartu Tanda Pelajar (1 lembar)</p>
                                    <p>b. Foto berwarna 3X4 (2 Lembar)</p>
                                    <p>c. Fotocopy rapor semester terakhir (1 lembar)</p>
                                    <p>d. Surat rekomendasi/perizinan dari sekolah</p>
                                    <p>e. Formulir pendaftaran dan formulir data pemain dan official</p>
                                </li>
                                <li><p>Melengkapi formulir pendaftaran dan juga lampiran sesuai persyaratan paling lambat tanggal 11 Oktober 2017</p></li>
                            </ul>
                        </div>
                    </div>
                    <div id="img-mekanisme-pendaftaran-online" class="col-md-12 text-center">
                        <img src="/img/contents/alur_hsfc_online.png" alt="" class="img responsive img-rounded">
                    </div>
                    <div id="img-mekanisme-pendaftaran-offline" class="col-md-12 text-center">
                        <img src="/img/contents/alur_hsfc_offline.png" alt="" class="img responsive img-rounded">
                    </div>
                </div>
            </div>
            <div id="title-mekanisme" class="col-md-12 section-heading text-center">
                <span>MEKANISME &amp; PERATURAN</span>
            </div>
            <div id="section-mekanisme" class="col-md-12">
                <style>
                    /*#section-hadiah-grouped>.col-md-12.reward-list>p{
                        font-style: normal !important;
                    }
                    #section-hadiah-grouped>.col-md-12.reward-list>p>b{
                        font-size: 18px !important;
                    }
                    #section-hadiah-grouped{
                        padding-top: 10px;
                    }
                    #section-hadiah{
                        padding-bottom: 150px;
                    }*/
                    #section-mekanisme{
                        background: #fff;
                    }
                    #section-mekanisme>div>div>h2{
                        text-align: center;
                    }
                    #section-mekanisme>div>div>ul{
                        list-style: decimal;
                        line-height: 2;
                        text-align: justify;
                    }
                </style>
                <div class="section-body row">
                    <div class="col-md-6">
                        <h2><i class="fa fa-cogs" aria-hidden="true"></i> Mekanisme Pertandingan</h2>
                        <ul>
                            <li>Tim diwajibkan datang 30 menit sebelum jadwal yang ditentukan untuk registrasi serta melakukan pemanasan dan persiapan.</li>
                            <li>Jika tim yang akan bertanding telah dipanggil 3x dalam jangka waktu 10 menit dan tidak segera menuju ke tempat perlombaan maka peserta akan didiskualifikasi .</li>
                            <li>Setiap tim yang bertanding wajib membawa seluruh KartuTandaPelajar pemain dalam tim. Jika tidak membawa KartuTandaPelajar maka pemain yang bersangkutan tidak diizinkan untuk mengikuti pertandingan.</li>
                            <li>Sebelum melakukan pertandingan, pada saat registrasi official wajib menyerahkan uang jaminan Rp 50.000.</li>
                            <li>Bola yang boleh digunakan hanya bola yang disediakan panitia.</li>
                            <li>Jumlah pemain yang ada di lapangan adalah 5 orang termasuk 1 kiper dan 7 orang untuk cadangan.</li>
                            <li>Jumlah pergantian pemain adalah tidak terbatas.</li>
                            <li>Wasit adalah pemimpin tertinggi di lapangan dan keputusan wasit tidak dapat diganggu gugat.</li>
                            <li>Setiap kejadian di lapangan diselesaikan berdasarkan keputusan wasit.</li>
                            <li>Setiap tim berhak meminta time-out 1(satu) kali dalam masing-masing babak. Lama waktu time out adalah 1 menit.</li>
                            <li>Waktu istirahat adalah 5 menit.</li>
                            <li>Waktu pertandingan adalah 2 x 15 menit digunakan pada penyisihan sampai semi final dan 2 x 20 menit untuk final dan perebutan juara 3.</li>
                            <li>Dua kartu kuning dalam 1 pertandingan dianggap 1 kartu merah.</li>
                            <li>Kartu kuning denda Rp 10.000, kartu merah denda Rp15.000.</li>
                            <li>Pemain yang terkena kartu merah atau terakumulasi kartu kuning 2 kali, maka tidak diperbolehkan mengikuti 1 kali pertandingan selanjutnya.</li>
                            <li>Pemain cadangan dapat masuk kelapangan dua menit setelah rekan setimnya dikeluarkan, kecuali tercipta gol oleh lawannya sebelum masa dua menit berakhir dan pemain telah secara sah diizinkan oleh time keeper.</li>
                            <li>Pada pertandingan final, hukuman larangan bermain akibat kartu, <b>diputihkan</b>.</li>
                            <li>Jika pertandingan seri maka akan langsung dilanjutkan dengan adu penalty 5 pemain terakhir dilapangan dan diambil 3 pemain untuk menembak. Jika penalty imbang, dilakukan adu koin untuk menentukan penembak (2 pemain sisa yang belum menendang). Dan Jika penembak gagal maka musuh dinyatakan menang dan sebaliknya.</li>
                            <li>Apabila sebelum technical meeting, tim mengundurkan diri dari kompetisi, maka panitia akan mengembalikan uang pendaftaran sebesar 50% kepada tim yang mengundurkan diri tersebut.</li>
                            <li>Tim dan pendukungnya yang membuat keributan dan diputuskan bersalah oleh panitia akan didiskualifikasi.</li>
                            <li>Setiap tim WAJIB menjunjung tinggi SPORTIVITAS dengan tidak memicu dan tidak melakukan keributan.</li>
                            <li>DILARANG membawa senjata tajam, senjata api, minuman keras, obat-obatan terlarang maupun benda lain yang dapat membahayakan keamanan dan kenyamanan pertandingan.</li>
                            <li>Setiap tim WAJIB membayar denda atau menerima konsekuensi atas pelanggaran yang dilakukan terhadap peraturan yang telah disepakati.</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h2><i class="fa fa-list-ol" aria-hidden="true"></i> Peraturan Pertandingan</h2>
                        <ul>
                            <li>Pergantian pemain dapat dilakukan sewaktu-waktu selama pertandingan berlangsung.</li>
                            <li>Pergantian pemain dapat dilakukan pada saat bola didalam atau diluar permainan</li>
                            <li>Pemain yang ingin meninggalkan dan memasuki lapangan harus melakukannya pada daerah pergantiannya sendiri, tetapi dilakukan setelah pemain yang diganti telah melewati batas lapangan.</li>
                            <li>Pergantian dianggap sah ketika pemain pengganti telah masuk lapangan, dimana saat itu pemain tersebut telah menjadi pemain aktif dan pemain yang ia gantikan telah keluar dan berhenti menjadi pemain aktif.</li>
                            <li>Penjaga gawang boleh berganti tempat dengan pemain lainnya.</li>
                            <li>Ketika pergantian pemain sedang dilakukan, seorang pemain cadangan masuk lapangan sebelum pemain yang akan digantikannya meninggalkan lapangan secara sempurna maka pemain pengganti mendapatkan kartu kuning.</li>
                            <li>Setiap tim berhak meminta waktu untuk time-out selama satu menit disetiap babak.</li>
                            <li>Tim yang tidak meminta time-out pada babak pertama, pada babak kedua tim tersebut hanya berhak mendapatkan satu kali time-out.</li>
                            <li>Bola diluar permainan, jika: bola secara keseluruhan melewati garis gawang, apakah menggelinding atau melayang, permainan telah dihentikan sementara oleh wasit. Permainan akan dilanjutkan kembali dengan tendangan kedalam, diberikan kepada lawan dari tim yang terakhir menyentuh bola.</li>
                            <li>Tendangan bebas langsung diberikan kepada tim lawan, jika seorang pemain melakukan salah satu dari enam bentuk pelanggaran dibawah ini, dengan pengamatan wasit dan itu merupakan tindakan yang kurang berhati-hati, kasar atau menggunakan tenaga yang berlebihan: Menendang atau mencoba menendang lawan, mengganjal atau mencoba mengganjal lawan, menerjang lawan, Mendorong lawan, meskipun dengan bahunya, memukul atau mencoba memukul lawan, mendorong lawan.</li>
                            <li>Tendangan bebas langsung dilakukan dari tempat dimana terjadinya pelanggaran.</li>
                            <li>Semua pelanggaran yang disebutkan diatas merupakan kumpulan pelanggaran yang diakumulasikan.</li>
                            <li>Jika seorang pemain telah melakukan pelanggaran keenam bagi timnya maka penalty akan diberikan pada posisi diantara garis tengah lapangan dan titik pinalti kedua 10 meter dari garis gawang tendangan bebas dilakukan dari titik pinalti kedua.</li>
                            <li>Jika tendangan bebas langsung dilakukan kearah gawang dan gol terjadi, maka gol tersebut dinyatakan sah.</li>
                            <li>Tendangan bebas tidak langsung diberikan pada tim lawan, jika seorang penjaga gawang telah melakukan salah satu pelanggaran dibawah ini : Setelah melepaskan bola dari tangannya, ia menerima kembali dari rekan tim (dengan kaki/tangan), sebelum melewati garis tengah atau sebelum dimainkan atau belum disentuh oleh pemain lawan, menyentuh atau menguasai bola dengan tangannya, dengan secara sengaja dikembalikan kepadanya oleh rekan tim (back pass), menyentuh atau menguasai bola dengan tangannya, setelah ia menerima bola langsung dari tendangan kedalam yang dilakukan oleh rekan tim, menyentuh atau menguasai bola dengan tangannya atau kaki, lebih dari empat detik.</li>
                            <li>Tendangan pinalti diberikan, jika seorang pemain telah melakukan pelanggaran didaerah pinaltinya sendiri, tidak peduli dimana posisi bola, tetapi asalkan bola dalam permainan atau bola hidup.</li>
                            <li>Tendangan bebas tidak langsung diberikan kepada tim lawan, dari tempat dimana terjadinya pelanggaran. Kecuali, terjadi didalam daerah pinalti, maka tendangan bebas tidak langsung dilakukan dari garis daerah pinalti ditempat yang terdekat dimana pelanggaran terjadi.</li>
                            <li>Untuk Tendangan Bebas Tidak Langsung, gol hanya dapat tercetak dan dinyatakan sah, apabila bola tersebut sudah menyentuh/tersentuh pemain lainnya sebelum masuk kegawang.</li>
                            <li>Seorang pemain diperingatkan dan menunjukkan kartu kuning, jika ia melakukan pelanggaran-pelanggaran sebagai berikut: bersalah karena melakukan tindakan yang tidak sportif, memperlihatkan perbedaan pendapatnya dengan melontarkan perkataan atau aksi yang tidak baik, tetap melanggar Peraturan Permainan, memperlambat atau mengulur-ulur waktu pada saat memulai kembali permainan, tidak mengikuti perintah untuk menjaga jarak yang ditentukan ketika dilakukan tendangan sudut-tendangan kedalam-tendangan bebas atau tendangan gawang, masuk atau kembali ke lapangan tanpa ijin wasit atau melanggar prosedur pergantian pemain, Secara sengaja meninggalkan lapangan tanpa ijin dari wasit.</li>
                            <li>Seorang pemain atau pemain cadangan dikeluarkan dengan menunjukkan kartu merah, jika ia melakukan salah satu pelanggaran sebagai berikut : pemain bermain sangat kasar, pemain melakukan tindakan kasar, meludah pada lawan atau orang lain, menghalangi lawan untuk mencetak gol atau kesempatan mencetak gol dengan sengaja memegang bola dengan cara yang tidak diperkenankan dalam peraturan (hal ini tidak berlaku kepada penjaga gawang didalam daerah pinaltinya sendiri), mengeluarkan kata-kata yang sifatnya menghina atau kata-kata caci-maki, menerima peringatan (Kartu Kuning) kedua didalam pertandingan yang sama.</li>
                            <li>Seorang pemain yang dikeluarkan oleh wasit (send off) tidak dapat ikut kembali kepermainan yang sedang berjalan, maupun duduk dibangku pemain cadangan dan harus meninggalkan sekitar lapangan. Pemain cadangan dapat masuk ke lapangan dua menit setelah rekan timnya dikeluarkan, kecuali tercipta gol oleh lawannya sebelummasa dua menitnya berakhir, dan pemain secara sah telah diijinkan oleh wasit atau pencatat waktu.</li>
                            <li>Pemain boleh sodorkan/operkan bola ke penjaga sendiri dengan kepala (sundulan pada bola dengan kepala), dengan dada atau lutut dan cara lain, asalkan bola telah melewati garis tengah (lapangan) atau telah menyentuh/disentuh atau dimainkan oleh pemain lawan.</li>
                            <li>Menyerang yang dapat membahayakan keselamatan lawannya, harus diberikan sanksi sebagai pemain sangat kasar (must be sanctioned as serious foul play).</li>
                            <li>Tiap tindakan pura-pura di dalam lapangan adalah berniat menipu wasit, harus diberikan sangsi sebagai kelakuan tidak sportif (must be sanctioned as unsporting behaviour).</li>
                            <li>Pemain yang melepaskan baju kaos/shirt ketika merayakan suatu gol, akan diberikan kartu kuning.</li>
                            <li>Tendangan kedalam adalah cara untuk memulai kembali permainan. Gol tidak dapat disahkan langsung dari tendangan kedalam.</li>
                            <li>Bola harus ditempatkan pada garis pembatas lapangan (garis samping), pada saat menendang bola, bagian dari setiap kakinya berada pada garis pembatas lapangan atau di luar garis pembatas lapangan, pemain/penendang kedalam harus melakukannya dalam waktu 4 detik dari saat menempatkan bola.</li>
                            <li>Tendangan sudut adalah cara untuk memulai kembali permainan. Gol dapat tercetak langsung dari tendangan sudut, tetapi hanya dilakukan terhadap tim lawan, tendangan sudut dilakukan dalam waktu tidak lebih 4 detik oleh pemain yang akan melaksanakan tendangan menempatkan bola</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="title-hadiah" class="col-md-12 section-heading text-center">
                <span>HADIAH &amp; PENGHARGAAN</span>
            </div>
            <div id="section-hadiah" class="col-md-12">
                <style>
                    #section-hadiah-grouped>.col-md-12.reward-list>p{
                        font-style: normal !important;
                    }
                    #section-hadiah-grouped>.col-md-12.reward-list>p>b{
                        font-size: 18px !important;
                    }
                    #section-hadiah-grouped{
                        padding-top: 10px;
                    }
                    #section-hadiah{
                        padding-bottom: 150px;
                    }
                </style>
                <div class="section-body row">
                    <div class="col-md-4 text-center">
                        <i class="fa fa-trophy" aria-hidden="true"></i>
                    </div>
                    <div id="section-hadiah-grouped" class="col-md-8">
                        <div class="col-md-12"><span id="hadiah" style="color:#d34b4b;">Hadiah &amp; Penghargaan</span></div>
                        <div class="col-md-12 reward-list">
                            <p><b>Futsal:<b></p>
                            <p>1. Juara 1 Futsal (Rp. 1.800.000 + trophy + sertifikat)</p>
                            <p>2. Juara 2 Futsal (Rp. 1.000.000 + trophy + sertiikat)</p>
                            <p>3. Juara 3 Futsal (Rp 700.000 + trophy + sertiikat)</p>
                            <p>4. Top Score (Rp 200.000)</p>
                            <p>5. Best Player (Rp 250.000)</p>
                            <p><b>Supporter:</b></p>
                            <p>1. Best Supporter (Rp. 500.000)</p>
                        </div>
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
                    background-color: #d34b4b;
                }
            </style>
            <div class="col-md-4">
                <span>Contact Person:</span>
                <ul>
                    <li><b>Rizqi Mubaroq</b> (087755372575) / LINE : 087755372575</li>
                    <li><b>Yunita Dewi</b> (085732945074) / LINE : yunitaadw</li>
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
                
                var target_name = $(this).attr('data-toggle-scroll');
                var section_target = $(this).attr('id') == 'navigation-brand' ? $('body') : $('#'+target_name);

                $('html, body').animate({
                    scrollTop: section_target.offset().top-49
                }, 500);
            });

        })
    </script>
</body>
</html>