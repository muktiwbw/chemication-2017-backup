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
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet"> 
    <title>Chemical Engineering Olympiad</title>
</head>
<body>
    <div class="container-fluid">
        <!-- NAVBAR START -->
        <?php require_once '../app/views/Components/CEONavbar.php'; ?>
        <!-- NAVBAR END -->
        <div class="row">
            <style>

                /*Downloaded Elements*/

                /*Pure Elements*/
                a{
                    text-decoration: none;
                }
                a:hover{
                    color: #fff;
                }

                /*Ids*/
                #notification-email-verification{
                    background: #f76565;
                    color: #fff;
                }
                #notification-account-activation{
                    background: #ffb172;
                    color: #000;
                }
                #section-banner{
                    background: url('/img/contents/banner-smol.jpg');
                    background-size: cover;
                    padding-top: 200px;
                    padding-bottom: 200px;
                }
                #banner-heading{
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                }
                .banner-title{
                    background: rgba(255, 255, 255, 0.5);
                    /*width: 87%;
                    position: absolute;
                    top:50%;
                    left: 50%;
                    transform: translate(-50%, -50%);*/
                    padding: 23px 20px 10px 20px;
                    font-size: 55px;
                    font-family: 'Josefin Sans', sans-serif;
                    color: #333;
                }
                #section-thumbnail>.row>.section-content{
                    padding-top: 80px;
                    padding-bottom: 80px;
                }
                #fixed-background{
                    background: url('/img/contents/banner-smol.jpg');
                    position: fixed;
                    height: 500px;
                    width: 500px;
                }
                #banner-navigation{
                    position: absolute;
                    top: 48.5%;
                    left: 0;
                    transform: translate(0, -50%);
                    width: 100%;
                }
                #banner-description{
                    background: rgba(0, 0, 0, 0.8);
                    position: absolute;
                    top: 0;
                    left: 0;
                    height: 100%;
                    width: 100%;
                    color: #fff;
                    display: none;
                }
                #banner-description-text{
                    margin-top: 30px;
                    font-size: 18px;
                }
                #banner-description-text-1, #banner-description-text-2{
                    display: none;
                }
                #banner-description-logo{
                    margin-top: 44px;
                    display: inline-block;
                    height: 150px;
                }

                /*Classes*/
                .fa-exclamation-circle{
                    font-size: 60px;
                    padding-top: 30px;
                    padding-left: 22px;
                }
                .notification{
                    padding-top: 8px;
                    padding-bottom: 15px;
                }
                .learn-more-button{
                    padding: 10px;
                    background: #3784c6;
                    color: #eee;
                    border-radius: 4px;
                    cursor: pointer;
                }
                .circle-thumbnail{
                    transition: 0.5s ease;
                    width: 50px;
                    height: 50px;
                    padding: 50px;
                    border-radius: 100%;
                    display: inline-block;
                    font-size: 36px;
                }
                .circle-thumbnail:hover{
                    cursor: pointer;
                    margin-bottom: 10px;
                    box-shadow: 0 0 0 10px #337ab7;
                    background: #fff !important;
                    color: #337ab7;
                }
                .circle-thumbnail>.fa{
                    position: relative;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -65%);
                }
                .thumbnail-title{
                    font-size: 16px;
                    padding-top: 10px;
                }
                .root-list{
                    list-style: decimal;
                }
                .root-list-list{
                    font-size: 20px;
                    font-weight: bold;
                    padding-top: 20px;
                }
                .sub-list{
                    font-size: 16px;
                    font-weight: normal;
                }
                .reward-rows{
                    padding-top: 5px;
                    padding-bottom: 5px;
                }
                .section-heading{
                    font-size: 36px;
                    padding-top: 30px;
                    padding-bottom: 30px;
                    text-align: center;
                }
                .section-content{
                    padding-top: 30px;
                    padding-bottom: 30px;
                }
                .hidden, .reward-set{
                    display: none;
                }
                .banner-arrow{
                    transition: 0.5s ease;
                    background: #999;
                    border-radius: 100%;
                    color: #fff;
                    display: inline-block;
                    width: 50px;
                    height: 50px;
                    font-size: 20px;
                    padding: 12px 10px 10px 10px;
                }
                .banner-arrow:hover{
                    background: none;
                    color: #999;
                    box-shadow: 0 0 0 3px #999;
                    cursor: pointer;
                }
                .banner-arrow-space{
                    display: inline-block;
                    margin: 0 42%;
                }
                .desktop-hidden{
                    display: none;
                }
                @media (max-width: 980px){
                    
                    ul{
                        padding-left: 10px;
                    }
                    #banner-description-logo{
                        height: 100px;
                    }
                    .mobile-hidden{
                        display: none;
                    }
                    .banner-title{
                        background: none;
                        font-size: 40px;
                        padding: 0;
                    }
                    .banner-text{
                        font-size: 14px;
                    }
                    .section-content{
                        padding-top: 0;
                    }
                    .section-content>h2{
                        text-align: center;
                    }
                    .reward-set{
                        display: block;
                    }
                    .navigation-arrow{
                        display: none;
                    }
                    .reward-item{
                        padding-top: 10px;
                        padding-bottom: 10px;
                    }
                    .thumbnail-title{
                        padding-bottom: 20px;
                    }

                }

            </style>

            <div id="main-content" class="col-md-12">
                <?php if(isset($_SESSION['user'])): ?>
                <?php if($_SESSION['user']['status'] == 'unverified'): ?>
                <div id="notification-email-verification" class="row notification">
                    <div class="col-md-1">
                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                    </div>
                    <div class="col-md-11 notification">
                        <h2><b>Verifikasi Email</b></h2>
                        <p>Email anda belum terverifikasi. Silahkan cek inbox anda untuk melakukan verifikasi email.<br>Akun ini akan dihapus dalam waktu 7 hari jika tidak segera melakukan verifikasi dan aktivasi.</p>
                    </div>
                </div>
                <?php elseif($_SESSION['user']['status'] == 'nonactive'): ?>
                <div id="notification-account-activation" class="row notification">
                    <div class="col-md-1">
                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                    </div>
                    <div class="col-md-11 notification">
                        <h2><b>Aktivasi Akun</b></h2>
                        <p>Email anda telah diverifikasi. Silahkan ke tahap selanjutnya, yaitu Aktivasi Akun. Klik tab <a href="/ceo/aktivasi"><b>Aktivasi</b></a> di atas untuk melakukan Aktivasi Akun.<br>Akun ini akan dihapus dalam waktu 7 hari jika tidak segera melakukan aktivasi.</p>
                    </div>
                </div>
                <?php endif; ?>
                <?php endif; ?>
                
                <div class="row">
                    <div id="section-banner" class="col-md-12 text-center">
                        <div id="banner-heading" class="col-md-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="banner-title" >CHEMICAL ENGINEERING OLYMPIAD</span>
                                </div>
                            </div>
                        </div>
                        <div id="banner-description" class="col-md-10">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2 text-center">
                                    <img id="banner-description-logo" src="/img/contents/ceo.jpg" alt="ceo" class="img-responsive img-circle">
                                </div>
                            </div>
                            <div class="row">
                                <div id="banner-description-text" class="col-md-8 col-md-offset-2 text-center">
                                    <p id="banner-description-text-1" class="banner-text">Chemical Engineering Olympiad (CEO) 2017 merupakan olimpiade ke-Teknik Kimia-an yang ditujukan bagi pelajar SMA / MA / SMK sederajat di seluruh Indonesia. CEO 2017 bertujuan untuk memperkenalkan dunia ke-Teknik Kimia-an kepada pelajar sebagai persiapan untuk melanjutkan ke jenjang Perguruan Tinggi, khususnya Teknik Kimia Universitas Pembangunan Nasional “Veteran” Jawa Timur.</p>
                                    <p id="banner-description-text-2" class="banner-text">CEO 2017 dengan tema <b>“Get Your Chemistry With Chemical Engineering”</b> terdiri dari 3 tahapan seleksi, yaitu tahap Penyisihan, tahap Semifinal, dan Grand Final. Untuk tahap penyisihan menggunakan sistem online, sedangkan tahap Semifinal dan Grand Final akan dilaksanakan di Fakultas Teknik (FT) UPN “Veteran” Jawa Timur.</p>
                                </div>
                            </div>
                        </div>
                        <div id="banner-navigation">
                            <input id="banner-slide-counter" type="hidden" value="1">
                            <div class="banner-arrow mobile-hidden" arrow-command="prev">
                                <span><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                            </div>
                            <div class="banner-arrow-space mobile-hidden"></div>
                            <div class="banner-arrow mobile-hidden" arrow-command="next">
                                <span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="section-thumbnail" class="col-md-12 section-area">
                        <div class="row">
                            <div class="col-md-12 section-content">
                                <div class="col-xs-6 col-md-2 col-md-offset-2 text-center">
                                    <div class="row">
                                        <div class="circle-thumbnail text-center" style="background: rgb(255, 91, 91);" scroll-target="section-timeline">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="thumbnail-title">Timeline</div>
                                </div>
                                <div class="col-xs-6 col-md-2 text-center">
                                    <div class="row">
                                        <div class="circle-thumbnail text-center" style="background: rgb(168, 224, 175);" scroll-target="section-ketentuan">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="thumbnail-title">Ketentuan &amp; Persyaratan</div>
                                </div>
                                <div class="col-xs-6 col-md-2 text-center">
                                    <div class="row">
                                        <div class="circle-thumbnail text-center" style="background: rgb(158, 211, 255);" scroll-target="section-info">
                                            <i class="fa fa-info" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="thumbnail-title">Info Olimpiade</div>
                                </div>
                                <div class="col-xs-6 col-md-2 text-center">
                                    <div class="row">
                                        <div class="circle-thumbnail text-center" style="background: rgb(239, 222, 146);" scroll-target="section-rewards">
                                            <i class="fa fa-trophy" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="thumbnail-title">Rewards</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="section-timeline" class="col-md-12 section-area">
                        <div class="row">
                            <div class="col-md-12 section-heading"> 
                                <span>Timeline</span>
                            </div>
                        </div>
                        <div class="row">
                            <style>
                                .parallax-background{
                                    background: url('/img/contents/banner-smol.jpg') fixed;
                                    background-size: cover;
                                }
                                .epic-shadow{
                                    box-shadow: 0px 0px 71px -12px #333;
                                }
                            </style>
                            <div id="timeline-content" class="col-md-12 section-content parallax-background">
                                <div class="col-md-8 col-md-offset-2">
                                    <table style="margin-bottom: 0;" class="table table-bordered table-striped table-hover epic-shadow text-center">
                                        <tr class="active">
                                            <td><b>Waktu</b></td>
                                            <td><b>Kegiatan</b></td>
                                        </tr>
                                        <tr class="active">
                                            <td>17 Juli 2017 - 22 Agustus 2017</td>
                                            <td>Pendaftaran CEO (Early Bird)</td>
                                        </tr>
                                        <tr class="active">
                                            <td>23 Agustus 2017 - 22 Oktober 2017</td>
                                            <td>Pendaftaran CEO (Normal)</td>
                                        </tr>
                                        <tr class="active">
                                            <td>8 Oktober 2017</td>
                                            <td>Try Out Peserta</td>
                                        </tr>
                                        <tr class="active">
                                            <td>29 Oktober 2017</td>
                                            <td>Tahap Penyisihan (Online)</td>
                                        </tr>
                                        <tr class="active">
                                            <td>3 November 2017</td>
                                            <td>Pengumuman Hasil Penyisihan</td>
                                        </tr>
                                        <tr class="active">
                                            <td>10 November 2017</td>
                                            <td>Tahap Semi Final, TTG Tour, &amp; Seminar</td>
                                        </tr>
                                        <tr class="active">
                                            <td>11 November 2017</td>
                                            <td>Technical Meeting Final</td>
                                        </tr>
                                        <tr class="active">
                                            <td>12 November 2017</td>
                                            <td>Grand Final</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <style>
                        .ketentuan-box>ul{
                            padding-left: 17px;
                        }
                    </style>
                    <div id="section-ketentuan" class="col-md-12 section-area">
                        <div class="row">
                            <div class="col-md-12 section-heading"> 
                                <span>Ketentuan &amp; Persyaratan</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container">
                                <div id="sub-section-ketentuan-olimpiade" class="col-md-6 section-content text-justify">
                                    <h2>Ketentuan Kompetisi</h2>
                                    <ul style="list-style: decimal;">
                                        <li><p>Tahap penyisihan adalah penentuan awal untuk menentukan peserta yang akan melanjutkan tahap Semifinal, dan terdapat 20 tim yang lolos dari tahap penyisihan. Penentuan tim yang lolos tahap penyisihan berdasarkan nilai tertinggi dari nilai keseluruhan.</p></li>
                                        <li>
                                            <p>Kisi-kisi materi yang diujikan:
                                                <ul style="list-style: lower-alpha">
                                                    <li>
                                                        Kimia
                                                        <ul style="list-style: decimal">
                                                            <li>Struktur Kimia</li>
                                                            <li>Sistem Periodik</li>
                                                            <li>Ikatan Kimia &amp; Geometri Molekul</li>
                                                            <li>Stokiometri</li>
                                                            <li>Redoks</li>
                                                            <li>Elektrokimia</li>
                                                            <li>Kimia Unsur</li>
                                                            <li>Termodinamika</li>
                                                            <li>Kinetika &amp; Kesetimbangan Kimia</li>
                                                            <li>Teori &amp; Kesetimbangan Asam Basa</li>
                                                            <li>Kimia Larutan</li>
                                                            <li>Kimia Organik</li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        Fisika
                                                        <ul style="list-style: decimal">
                                                            <li>Gerak Lurus</li>
                                                            <li>Gerak Melingkar Beraturan</li>
                                                            <li>Hukum Newton &amp; Gravitasi</li>
                                                            <li>Usaha &amp; Energi</li>
                                                            <li>Dinamika Partikel &amp; Hukum Newton</li>
                                                            <li>Listrik Dinamis</li>
                                                            <li>Listrik Statis</li>
                                                            <li>Suhu &amp; Kalor</li>
                                                            <li>Optika Fisis</li>
                                                            <li>Optika Geometris</li>
                                                            <li>Elastisitas</li>
                                                            <li>Bunyi</li>
                                                            <li>Gelombang Mekanik</li>
                                                            <li>Fluida Dinamis</li>
                                                            <li>Teori Kinetik Gas</li>
                                                            <li>Impuls &amp; Momentum</li>
                                                            <li>Fisika Modern</li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        Matematika
                                                        <ul style="list-style: decimal">
                                                            <li>Deret</li>
                                                            <li>Logika</li>
                                                            <li>Eksponen &amp; Logaritma</li>
                                                            <li>Trigonometri</li>
                                                            <li>Integral</li>
                                                            <li>Diferensial</li>
                                                            <li>Limit</li>
                                                            <li>Fungsi</li>
                                                            <li>Persamaan Garis</li>
                                                            <li>Polynomial</li>
                                                            <li>Bangun</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                Semua soal berstandar SBM
                                            </p>
                                        </li>
                                        <li><p>Selain 20 tim yang lolos ke tahap Semifinal, terdapat juara 1,2, dan 3 tiap Rayon dan Region</p></li>
                                        <li><p>Tim yang lolos ke tahap semifinal tidak akan mendapatkan juara rayon maupun region.</p></li>
                                        <li><p>Dari 20 tim yang lolos di semifinal akan diambil 5 tim terbaik untuk melanjutkan ke Grand Final.</p></li>
                                        <li><p>Tim yang lolos pada tahap penyisihan dan tahap semifinal diwajibkan menggunakan seragam dan atribut sekolahnya masing-masing pada saat pelaksanaan tahap semifinal dan grand final.</p></li>
                                        <li><p>Keputusan panitia mutlak dan tidak dapat diganggu gugat.</p></li>
                                    </ul>
                                </div>
                                <div id="sub-section-ketentuan-peserta" class="col-md-6 section-content text-justify">
                                    <h2>Ketentuan &amp; Persyaratan Peserta</h2>
                                    <ul style="list-style: decimal;">
                                        <li><p>Peserta CEO 2017 adalah pelajar Sekolah Menengah Atas (SMA) / Madrasah Aliyah (MA) / Sekolah Menengah Kejuruan (SMK) sederajat dari kelas 10/11/12 di seluruh wilayah Indonesia.</p></li>
                                        <li><p>Peserta berasal dari jurusan IPA/IPS/Bahasa/Kejuruan.</p></li>
                                        <li><p>Satu tim terdiri maksimal 3 orang pelajar SMA / MA / SMK sederajat seluruh Indonesia yang berasal dari sekolah yang sama.</li>
                                        <li><p>Satu tim boleh terdiri dari pelajar kelas 10, 11, dan 12 saja atau campuran dari ketiganya.</p></li>
                                        <li><p>Setiap sekolah diperbolehkan mengirimkan lebih dari 1 tim.</p></li>
                                        <li><p>Tim yang telah terdaftar tidak diperbolehkan untuk melakukan pergantian anggota.</p></li>
                                        <li><p>Peserta hanya boleh tergabung didalam satu tim saja.</p></li>
                                        <li><p>Jika peserta melanggar Ketentuan dan Persyaratan yang telah ditetapkan maka peserta akan di diskualifikasi</p></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <style>
                        .info-box{
                            transition: 0.5s ease;
                            background: rgba(255, 255, 255, 0.6);
                            height: 200px;
                            text-align: center;
                        }
                        .info-box:hover{
                            background: rgba(255, 255, 255, 1);
                            height: 220px;
                        }
                        .info-box-content>p{
                            padding-top: 20px;
                        }
                        .info-box-content{
                            position: relative;
                            top: 50%;
                            transform: translate(0, -80%);
                        }
                        #ceo-poster{
                            display: inline-block;
                            width: 814px;
                        }
                    </style>
                    <div id="section-info" class="col-md-12 section-area">
                        <div class="row">
                            <div class="col-md-12 section-heading">
                                <span>Info Olimpiade</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 section-content parallax-background">
                                <div class="col-md-4 col-md-offset-2">
                                    <div class="col-md-12 info-box epic-shadow">
                                        <div class="info-box-content">
                                            <h3>Mekanisme Pendaftaran</h3>
                                            <p><a href="/ceo/mekanisme-pendaftaran" target="_blank" class="learn-more-button">Lebih lanjut</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12 info-box epic-shadow">
                                        <div class="info-box-content">
                                            <h3>Jadwal Pelaksanaan</h3>
                                            <p><a href="/ceo/jadwal-pelaksanaan" target="_blank" class="learn-more-button">Lebih lanjut</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div style="margin-top: 20px;" class="col-md-12 text-center">
                                        <img id="ceo-poster" src="/img/contents/ceo_poster.jpg" alt="" class="img-responsive img-thumbnail epic-shadow">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <style>
                        #section-rewards{
                            transition: 0.5s ease;
                        }
                        .reward-thumbnail{
                            transition: 0.5s ease;
                            border-radius: 5%;
                            display: inline-block;
                            width: 100px;
                            height: 100px;
                            padding: 10px 0;
                            margin-bottom: 10px;
                        }
                        .reward-thumbnail:hover{
                            border-radius: 100%;
                            width: 120px;
                            height: 120px;
                        }
                        .reward-thumbnail-inner{
                            display: inline-block;
                            position: relative;
                            top: 50%;
                            transform: translate(0, -50%);
                            font-size: 40px;
                        }
                        .reward-thumbnail-title{
                            font-size: 20px;
                            font-weight: bold;
                        }
                        .navigation-arrow{
                            transition: 0.5s;
                            margin-top: 40px;
                            font-size: 50px;
                            color: #999;
                        }
                        .navigation-arrow:hover{
                            color: #333;
                            cursor: pointer;
                        }
                    </style>
                    <div id="section-rewards" class="col-md-12 section-area">
                        <div class="row">
                            <div class="col-md-12 section-heading">
                                <span>Rewards</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container">
                                <div class="col-md-12 section-content text-center">
                                    <input type="hidden" id="reward-set-page" value="1">
                                    <div class="row">
                                        <div class="col-md-2 navigation-arrow" arrow-command="prev">
                                            <span><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="col-md-8 reward-set" reward-set-id="1">
                                            <div class="row">
                                                <div class="col-md-4 reward-item">
                                                    <div class="reward-thumbnail" style="background: rgb(255,215,0);"><span class="reward-thumbnail-inner"><i class="fa fa-trophy" aria-hidden="true"></i></span></div>
                                                    <div class="reward-thumbnail-title">Juara 1</div>
                                                    <div class="reward-thumbnail-description">+ Rp 2.500.000,00<br>+ Trophy<br>+ Sertifikat</div>
                                                </div>
                                                <div class="col-md-4 reward-item">
                                                    <div class="reward-thumbnail" style="background: rgb(232, 232, 232);"><span class="reward-thumbnail-inner"><i class="fa fa-trophy" aria-hidden="true"></i></span></div>
                                                    <div class="reward-thumbnail-title">Juara 2</div>
                                                    <div class="reward-thumbnail-description">+ Rp 1.500.000,00<br>+ Trophy<br>+ Sertifikat</div>
                                                </div>
                                                <div class="col-md-4 reward-item">
                                                    <div class="reward-thumbnail" style="background: rgb(204, 187, 97);"><span class="reward-thumbnail-inner"><i class="fa fa-trophy" aria-hidden="true"></i></span></div>
                                                    <div class="reward-thumbnail-title">Juara 3</div>
                                                    <div class="reward-thumbnail-description">+ Rp 1.250.000,00<br>+ Trophy<br>+ Sertifikat</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 reward-set" reward-set-id="2">
                                            <div class="row">
                                                <div class="col-md-4 reward-item">
                                                    <div class="reward-thumbnail" style="background: rgb(255, 91, 91);"><span class="reward-thumbnail-inner"><i class="fa fa-trophy" aria-hidden="true"></i></span></div>
                                                    <div class="reward-thumbnail-title">Juara Harapan 1</div>
                                                    <div class="reward-thumbnail-description">+ Rp 750.000,00<br>+ Trophy<br>+ Sertifikat</div>
                                                </div>
                                                <div class="col-md-4 reward-item">
                                                    <div class="reward-thumbnail" style="background: rgb(114, 255, 145);"><span class="reward-thumbnail-inner"><i class="fa fa-trophy" aria-hidden="true"></i></span></div>
                                                    <div class="reward-thumbnail-title">Juara Harapan 2</div>
                                                    <div class="reward-thumbnail-description">+ Rp 500.000,00<br>+ Trophy<br>+ Sertifikat</div>
                                                </div>
                                                <div class="col-md-4 reward-item">
                                                    <div class="reward-thumbnail" style="background: rgb(91, 189, 255);"><span class="reward-thumbnail-inner"><i class="fa fa-trophy" aria-hidden="true"></i></span></div>
                                                    <div class="reward-thumbnail-title">Semi Finalis</div>
                                                    <div class="reward-thumbnail-description">+ Sertifikat Semi Finalis</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 reward-set" reward-set-id="3">
                                            <div class="row">
                                                <div class="col-md-4 reward-item">
                                                    <div class="reward-thumbnail" style="background: rgb(193, 154, 83);"><span class="reward-thumbnail-inner"><i class="fa fa-trophy" aria-hidden="true"></i></span></div>
                                                    <div class="reward-thumbnail-title">Juara Region 1, 2, 3</div>
                                                    <div class="reward-thumbnail-description">+ Sertifikat Juara Region</div>
                                                </div>
                                                <div class="col-md-4 reward-item">
                                                    <div class="reward-thumbnail" style="background: rgb(211, 179, 122);"><span class="reward-thumbnail-inner"><i class="fa fa-trophy" aria-hidden="true"></i></span></div>
                                                    <div class="reward-thumbnail-title">Juara Rayon 1, 2, 3</div>
                                                    <div class="reward-thumbnail-description">+ Sertifikat Juara Rayon</div>
                                                </div>
                                                <div class="col-md-4 reward-item">
                                                    <div class="reward-thumbnail" style="background: rgb(175, 175, 175);"><span class="reward-thumbnail-inner"><i class="fa fa-trophy" aria-hidden="true"></i></span></div>
                                                    <div class="reward-thumbnail-title">Peserta</div>
                                                    <div class="reward-thumbnail-description">+ Sertifikat Peserta</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 navigation-arrow" arrow-command="next">
                                            <span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div style="margin-top: 60px;" class="col-md-6 col-md-offset-3 text-center">
                                            <p><i>*Untuk sertifikat peserta yang terdaftar, juara region, dan juara rayon akan dikirim dalam bentuk soft file melalui email ketua tim</i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="section-map" class="col-md-12 section-area">
                        <style>
                            #section-map{
                                margin-top: 30px;
                            }
                            #map-container{
                                background: #333;
                                position: relative;
                                top: 0;
                                left: 0;
                                overflow: scroll;
                            }
                        </style>
                        <div class="row">
                            <div id="map-container" class="col-md-12 section-content text-center">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.18385735856!2d112.78779374983861!3d-7.333237894681846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fab87edcad15%3A0xb26589947991eea1!2sNational+Development+University+%22Veteran%22+East+Java!5e0!3m2!1sen!2sid!4v1500198851109" width="1000" height="480" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- INSERT NEW ROW HERE -->
            </div>     
        </div>

        <div class="row">
            <div class="col-md-12" id="footer">
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
                        background-color: #337ab7;
                        color: #fff;
                    }
                    a.socmed-icon, a.socmed-icon:hover, a.socmed-icon:active, a.socmed-icon:visited{
                        font-size: 40px;
                        margin-right: 8px;
                        text-decoration: none;
                        color: #fff;
                    }
                </style>
                <div class="col-md-4">
                    <span>Contact Person:</span>
                    <ul>
                        <li><b>Lucky</b> (085875994181) / ID Line : lbriantino</li>
                        <li><b>Dony</b> (085852281654) / ID Line : abriantoyanto</li>
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
                <div class="col-md-4">
                    <span>Social Media:</span><br>
                    <a href="https://twitter.com/chemication" target="_blank" class="socmed-icon"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                    <a href="https://www.facebook.com/chemication" target="_blank" class="socmed-icon"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/chemication/" target="_blank" class="socmed-icon"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>
            <div id="footer-copyright" class="col-md-12 text-center">
                Copyright 2017 - HIMATEKK UPN "Veteran" Jawa Timur
            </div>
        </div>

    </div>
    <script>

        $(function(){

            var bannerSlideInterval = setInterval(function(){

                var current_slide = parseInt($('#banner-slide-counter').val());
                var next_slide = current_slide < 3 ? (current_slide + 1) : 1;

                $('#banner-slide-counter').val(next_slide);

                change_banner_slide(next_slide);

            }, 15000);
            
            $('#section-rewards').find('div[reward-set-id="'+parseInt($('#reward-set-page').val())+'"]').fadeIn();

            $('#section-rewards').find('.navigation-arrow').click(function(){

                var current_set = parseInt($('#reward-set-page').val());
                var next_set = 0;

                if($(this).attr('arrow-command') == 'next'){
                    if(current_set < 3){
                        next_set = current_set + 1;
                    }else{
                        next_set = 1;
                    }
                }else{
                    if(current_set > 1){
                        next_set = current_set - 1;
                    }else{
                        next_set = 3;
                    }
                }

                $('#section-rewards').find('.reward-set').not('div[reward-set-id="'+next_set+'"]').hide();

                $('#section-rewards').find('div[reward-set-id="'+next_set+'"]').fadeIn();

                $('#reward-set-page').val(next_set);
            });

            $('.circle-thumbnail, .navigation-scroll').click(function(){

                var section_target = $('#'+$(this).attr('scroll-target'));

                $('html, body').animate({
                    scrollTop: section_target.offset().top - 60
                }, 500);

            });

            function change_banner_slide(next_slide){

                switch (next_slide) {
                    case 1:
                        $('#banner-description-text-1').fadeOut();
                        $('#banner-description-text-2').fadeOut();
                        $('#banner-description').fadeOut();
                        $('#banner-heading').fadeIn();
                        break;
                
                    case 2:
                        $('#banner-heading').fadeOut();
                        $('#banner-description').fadeIn();
                        $('#banner-description-logo').fadeIn();
                        $('#banner-description-text-2').fadeOut(function(){
                            $('#banner-description-text-1').fadeIn();
                        });
                        break;

                    case 3:
                        $('#banner-heading').fadeOut();
                        $('#banner-description').fadeIn();
                        $('#banner-description-logo').fadeIn();
                        $('#banner-description-text-1').fadeOut(function(){
                            $('#banner-description-text-2').fadeIn();
                        });
                        break;
                }

            }

            $('#banner-navigation').find('.banner-arrow').click(function(){

                var current_slide = parseInt($('#banner-slide-counter').val());
                var arrow_command = $(this).attr('arrow-command');
                var next_slide = 0;

                if(arrow_command == 'next'){
                    if(current_slide < 3){
                        next_slide = current_slide + 1;
                    }else{
                        next_slide = 1;
                    }
                }else if(arrow_command == 'prev'){
                    if(current_slide > 1){
                        next_slide = current_slide - 1;
                    }else{
                        next_slide = 3;
                    }
                }
                
                $('#banner-slide-counter').val(next_slide);

                change_banner_slide(next_slide);

            });

        })

    </script>
</body>
</html>