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
    <title>Profile</title>
    <style>
        a{
            text-decoration: none !important;
        }
        option.rayon-option{
            display: none;
        }
        input.file-form{
            border: none;
            overflow: visible;
        }
        #submit-button{
            display: none;
        }
        #notification-error{
            /*background: #f76565;
            color: #000;*/
            padding-bottom: 30px !important;
            padding-left: 25px !important;
            margin-bottom: 10px !important;
            border-radius: 5px !important;
        }
        #notification-error>ul{
            list-style: decimal;
            padding-left: 17px;
        }
        #navigation-bar{
            position: fixed;
            z-index: 1;
            background: #fff;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #brand-image{
            display: inline;
            width: 40px;
            margin-left: 10px;
            margin-right: 20px;
        }
        #main-content{
            margin-top: 60px;
        }

        #event-section{
            margin-bottom: 10px;
        }

        #detail-jawaban-tab{
            position: fixed;
            z-index: 2;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            border-radius: 1%;
            padding: 15px;
        }

        #detail-jawaban-area{
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.75);
            display: none;
        }

        .jawaban-tables{
            cursor: pointer;
        }

        .hide-panel{
            display: none;
        }
        .user-data{
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .master-tab{
            display: none;
        }
        .navigation-link{
            transition: 0.3s;
            padding: 23px 15px;
            color: #333;
        }
        .navigation-link:hover, .mini-tab-active{
            background: #337ab7;
            color: #fff !important;
        }
        .nav.nav-pills.nav-stacked>li>a{
            color: #333 !important;
        }
        .nav.nav-pills.nav-stacked>li.active>a{
            color: #fff !important;
        }
        .sub-list{
            list-style: decimal;
            text-align: justify;
        }

        .even-button{
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .detail-jawaban-content{
            margin-bottom: 10px;
            padding: 15px;
            background: #fff;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="navigation-bar" class="col-md-12">
                <img src="/img/contents/ceo.jpg" alt="" class="img-responsive img-circle" id="brand-image">
                <a style="margin-left: 1030px;" class="navigation-link" href="/ceo">Home</a>
                <a class="navigation-link" href="/ceo/logout">Logout</a>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div id="main-content" class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h1>Profile</h1>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($_SESSION['flashed_data'])) : ?>
                    <div class="col-md-12">
                        <div id="notification-error" class="col-md-12 alert alert-danger">
                            <h3>Error!</h3>
                            <ul>
                                <?php foreach ($_SESSION['flashed_data']['errors'] as $error_message) : ?>
                                <li><?=$error_message?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div id="nav-menu-master" class="col-md-3">
                        <?php if ($_SESSION['user']['status'] == 'registered' && $data['event_occured'] != null) : ?>
                        <div id="event-section" class="row">
                            <div class="col-md-12">
                                <a href="<?php echo $data['enable_start_button'] ? '/ceo/mekanisme-pengerjaan' : '#'; ?>" class="event-button btn btn-danger btn-block" <?php echo $data['enable_start_button'] ? '' : 'disabled'; ?>>Mulai 
                                <?php 
                                if($data['event_occured'] == "tryout"){
                                    echo 'Try Out';
                                }elseif ($data['event_occured'] == "penyisihan"){
                                    echo 'Penyisihan';
                                }elseif ($data['event_occured'] == "testing"){
                                    echo 'Testing';
                                }
                                ?>!
                                </a>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills nav-stacked">
                                    <?php if (isset($data['reregister_data'])) : ?>
                                    <li role="reregister-tab" class="active nav-menu"><a href="#user"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Pendaftaran</a></li>
                                    <li role="user-tab" class="nav-menu"><a href="#user"><i class="fa fa-user-circle-o" aria-hidden="true"></i> User</a></li>
                                    <?php else : ?>
                                    <li role="user-tab" class="active nav-menu"><a href="#user"><i class="fa fa-user-circle-o" aria-hidden="true"></i> User</a></li>
                                    <?php endif; ?>
                                    <li role="participant-tab" class="nav-menu"><a href="#soal"><i class="fa fa-users" aria-hidden="true"></i> Anggota</a></li>
                                    <li role="lembar-kerja-tab" class="nav-menu"><a href="#lembar-jawaban"><i class="fa fa-book" aria-hidden="true"></i> Penyisihan</a></li>
                                    <li role="tryout-tab" class="nav-menu"><a href="#tryout"><i class="fa fa-book" aria-hidden="true"></i> Try Out</a></li>
                                    <li role="mekanisme-tab" class="nav-menu"><a href="#mekanisme"><i class="fa fa-cog" aria-hidden="true"></i> Mekanisme</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="data-panel" class="col-md-9">
                        <div class="row">
                            <?php if ($_SESSION['user']['status'] == 'active' && isset($data['reregister_data'])) : ?>
                            <div id="reregister-tab" class="col-md-12 master-tab init-panel" style="padding-bottom: 50px;">
                                <form class="form-horizontal" action="/ceo/profile" method="POST" enctype="multipart/form-data">
                                    <div id="user-panel" class="panel panel-default">
                                        <div class="panel-heading">TEAM</div>
                                        <div class="panel-body">
                                                <p>Disarankan agar mengisi form pendaftaran menggunakan browser <b>Google Chrome</b> atau <b>Mozilla Firefox</b> yang terupdate pada PC. Jika menggunakan smartphone, hindari penggunaan browser aplikasi bawaan (ex: LINE, Facebook, Gmail) dan gunakan aplikasi internet browser (ex: Chrome Mobile).</p>
                                            <div class="form-group">
                                                <label for="user-sekolah" class="col-md-2 control-label">Sekolah</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" id="user-sekolah" name="sekolah" placeholder="Sekolah" value="<?php echo isset($_SESSION['flashed_data']['team']['sekolah']) ? $_SESSION['flashed_data']['team']['sekolah'] : ''; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="user-region" class="col-md-2 control-label">Region</label>
                                                <div class="col-md-10">
                                                    <select name="region" id="user-region">
                                                        <?php foreach ($data['reregister_data']['region_data'] as $region) : ?>
                                                        <option class="region-option" value="<?=$region['id']?>"<?php echo (isset($_SESSION['flashed_data']['team']['region']) && $region['id'] == $_SESSION['flashed_data']['team']['region']) ? ' selected' : ''; ?>><?=$region['nama']?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-md-offset-2">
                                                <p>*Gunakan huruf kapital untuk field <b>Kabupaten/Kota</b></p>
                                            </div>
                                            <div class="form-group">
                                                <label for="user-rayon" class="col-md-2 control-label">Kabupaten/Kota</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="rayon" placeholder="Kabupaten/Kota" value="<?php echo isset($_SESSION['flashed_data']['team']['rayon']) ? $_SESSION['flashed_data']['team']['rayon'] : ''; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="participant-panel" class="panel panel-default">
                                        <div class="panel-heading">PESERTA</div>
                                        <div class="panel-body">
                                            <p>Anda dapat menambahkan peserta. <br>Jumlah maksimal peserta dalam satu team adalah 3 orang.</p>
                                            <?php for ($i=1; $i<=3; $i++) : ?>
                                            <div id="participant<?=$i?>" class="panel panel-<?php echo $i == 1 ? 'success' : 'primary'; ?> participant-panel<?php echo $i == 1 ? '' : ' hide-panel'; ?>" data-participant-number="<?=$i?>">
                                                <div class="panel-heading"><?php echo $i == 1 ? 'KETUA' : 'ANGGOTA'; ?></div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Nama</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" name="nama<?=$i?>" placeholder="Nama" value="<?php echo isset($_SESSION['flashed_data']['participant'][$i]['nama']) ? $_SESSION['flashed_data']['participant'][$i]['nama'] : ''; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Nomor Telepon</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" name="telp<?=$i?>" placeholder="Nomor Telepon" value="<?php echo isset($_SESSION['flashed_data']['participant'][$i]['telp']) ? $_SESSION['flashed_data']['participant'][$i]['telp'] : ''; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Line ID</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" name="lineid<?=$i?>" placeholder="Line ID" value="<?php echo isset($_SESSION['flashed_data']['participant'][$i]['lineid']) ? $_SESSION['flashed_data']['participant'][$i]['lineid'] : ''; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Email</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" name="email<?=$i?>" placeholder="Email" <?php echo isset($_SESSION['flashed_data']['participant'][$i]['email']) ? $_SESSION['flashed_data']['participant'][$i]['email'] : ''; ?>>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Kartu Pelajar</label>
                                                        <div class="col-md-10">
                                                            <input type="file" name="kartu_pelajar<?=$i?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Foto Peserta</label>
                                                        <div class="col-md-10">
                                                            <input type="file" name="foto<?=$i?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 col-md-offset-2">
                                                        <span>*Ekstensi gambar untuk <b>Kartu Pelajar</b> dan <b>Foto Peserta</b> diwajibkan <b>.jpg</b>, <b>.jpeg</b>, atau <b>.png</b> dan <b>tidak melebihi ukuran 1MB</b></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endfor; ?>
                                            <div class="row">
                                                <div id="participant-control" class="col-md-12">
                                                    <input id="participant-counter" type="hidden" name="participant_count" value="<?php echo isset($_SESSION['flashed_data']['team']['participant_count']) ? $_SESSION['flashed_data']['team']['participant_count'] : '1'; ?>">
                                                    <span style="margin: 0 1px;" class="participant-control btn btn-danger" data-toggle-control="remove"><i class="fa fa-minus-square" aria-hidden="true"></i> Kurangi Peserta</span>
                                                    <span style="margin: 0 1px;" class="participant-control btn btn-success" data-toggle-control="add"><i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Peserta</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input id="agreement-checkbox" type="checkbox" name="agreement" value="agreed">
                                                <span>Saya menyetujui bahwa data yang diisikan adalah valid.</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input id="submit-button" type="submit" class="btn btn-primary" name="submit" value="Kirim Form">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php endif; ?>
                            <div id="user-tab" class="col-md-12 master-tab<?php echo isset($data['reregister_data']) ? '' : ' init-panel'; ?>">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Data User</div>
                                    <div class="panel-body">
                                        <?php if ($_SESSION['user']['status'] == 'registered' && !isset($data['reregister_data']) && isset($data['user_data'])) : ?>
                                        <div class="row user-data">
                                            <div class="col-md-3">Username</div>
                                            <div class="col-md-9">
                                                : <?=$data['user_data']['username']?>
                                            </div>
                                        </div>
                                        <div class="row user-data">
                                            <div class="col-md-3">Email</div>
                                            <div class="col-md-9">
                                                : <?=$data['user_data']['email']?>
                                            </div>
                                        </div>
                                        <div class="row user-data">
                                            <div class="col-md-3">Region</div>
                                            <div class="col-md-9">
                                                : <?=$data['user_data']['region']?>
                                            </div>
                                        </div>
                                        <div class="row user-data">
                                            <div class="col-md-3">Rayon</div>
                                            <div class="col-md-9">
                                                : <?=$data['user_data']['rayon']?>
                                            </div>
                                        </div>
                                        <div class="row user-data">
                                            <div class="col-md-3">Sekolah</div>
                                            <div class="col-md-9">
                                                : <?=$data['user_data']['sekolah']?>
                                            </div>
                                        </div>
                                        <div class="row user-data">
                                            <div class="col-md-3">Waktu Daftar</div>
                                            <div class="col-md-9">
                                                : <?=$data['user_data']['created_at']?>
                                            </div>
                                        </div>
                                        <div class="row user-data">
                                            <div class="col-md-3">Waktu Aktivasi</div>
                                            <div class="col-md-9">
                                                : <?=$data['user_data']['activated_at']?>
                                            </div>
                                        </div>
                                        <?php elseif ($_SESSION['user']['status'] == 'submitted') : ?>
                                        <h4><b>Data User</b> telah terkirim. Dimohon untuk menunggu proses validasi dari pihak panitia.</h4>
                                        <?php else : ?>
                                        <h4><b>Data User</b> saat ini belum tersedia. Silahkan mengisi form <b>Pendaftaran Ulang</b> terlebih dahulu.</h4>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div id="participant-tab" class="col-md-12 master-tab">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Data Anggota</div>
                                    <div class="panel-body">
                                        <?php if ($_SESSION['user']['status'] == 'registered' && !isset($data['reregister_data']) && isset($data['participant_data'])) : ?>
                                        <?php foreach ($data['participant_data'] as $participant) : ?>
                                        <div class="panel panel-<?php echo $participant['peserta_status'] == 'Ketua' ? 'success' : 'default' ?>">
                                            <div class="panel-heading"><b>[ <?=$participant['peserta_status']?> ] <?=$participant['nama']?></b></div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img src="/<?=$participant['foto_pelajar']?>" alt="foto pelajar" class="img-responsive img-rounded img-thumbnail">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="row user-data">
                                                            <div class="col-md-3">Nama</div>
                                                            <div class="col-md-9">
                                                                : <?=$participant['nama']?>
                                                            </div>
                                                        </div>
                                                        <div class="row user-data">
                                                            <div class="col-md-3">Status</div>
                                                            <div class="col-md-9">
                                                                : <?=$participant['peserta_status']?>
                                                            </div>
                                                        </div>
                                                        <div class="row user-data">
                                                            <div class="col-md-3">Nomor Telepon</div>
                                                            <div class="col-md-9">
                                                                : <?=$participant['nomor_telepon']?>
                                                            </div>
                                                        </div>
                                                        <div class="row user-data">
                                                            <div class="col-md-3">LINE ID</div>
                                                            <div class="col-md-9">
                                                                : <?=$participant['lineid']?>
                                                            </div>
                                                        </div>
                                                        <div class="row user-data">
                                                            <div class="col-md-3">Email</div>
                                                            <div class="col-md-9">
                                                                : <?=$participant['email']?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                        <?php elseif ($_SESSION['user']['status'] == 'submitted') : ?>
                                        <h4><b>Data Anggota</b> telah terkirim. Dimohon untuk menunggu proses validasi dari pihak panitia.</h4>
                                        <?php else : ?>
                                        <h4><b>Data Anggota</b> saat ini belum tersedia. Silahkan mengisi form <b>Pendaftaran Ulang</b> terlebih dahulu.</h4>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div id="lembar-kerja-tab" class="col-md-12 master-tab">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Penyisihan</div>
                                    <div class="panel-body">
                                        <?php if (!isset($data['penyisihan_data']) || $data['penyisihan_data'] == []) : ?>
                                        <h4>Hasil <b>Penyisihan</b> dapat diakses 2 hari setelah pengerjaan soal <b>Tahap Penyisihan</b>.</h4>
                                        <?php else : ?>
                                        <!-- copy from here -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <b>Skor</b>
                                                            </div>
                                                            <div class="col-md-9">
                                                                : <?=$data['penyisihan_data']['score']?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <b>Waktu Pengerjaan</b>
                                                            </div>
                                                            <div class="col-md-9">
                                                                : <?=$data['penyisihan_data']['start_time']?> - <?=$data['penyisihan_data']['end_time']?><br>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <b>Status</b>
                                                            </div>
                                                            <div class="col-md-9">
                                                                : <b><?=$data['penyisihan_data']['status']?><b><br>
                                                            </div>
                                                        </div>
                                                        <?php if($data['penyisihan_data']['reward'] != []): ?>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <b>Peringkat</b>
                                                            </div>
                                                            <div class="col-md-9">
                                                                : <b><?=$data['penyisihan_data']['reward']['peringkat'].' '.$data['penyisihan_data']['reward']['reward']?><b><br><br>
                                                            </div>
                                                        </div>
                                                        <?php endif; ?>
                                                        <?php if($data['penyisihan_data']['status'] == 'Lolos'): ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <br><p style="font-weight:normal;">Untuk peserta yang lolos diharap untuk mencetak kartu bukti lolos penyisihan pada <a href="/ceo/user/bukti_lolos/<?=$data['user_data']['id']?>" target="_blank">link ini</a>.</p>
                                                            </div>
                                                        </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-12">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row jawaban-tables">
                                                <?php
                                                    $pages = 4;
                                                    $data_per_page = ceil($data['penyisihan_data']['jumlah_soal']/$pages);
                                                    $paginated_data = [];

                                                    /*
                                                        jumlah soal: 50
                                                        pages: 3
                                                        data per page: 17

                                                        page 1: (i) 0, (j) 0-16
                                                        page 2: (i) 1, (j) 17-33
                                                        page 3: (i) 2, (j) 34-49
                                                    */

                                                    for ($i=0; $i<$pages; $i++) {
                                                        for ($j=(($i+1)*$data_per_page)-$data_per_page; $j<($i+1)*$data_per_page; $j++) {
                                                            if (!isset($data['penyisihan_data']['lj'][$j])) {
                                                                break;
                                                            }
                                                            $paginated_data[$i][] = $data['penyisihan_data']['lj'][$j];
                                                        }
                                                    }
                                                ?>
                                            <?php foreach ($paginated_data as $pd) : ?>
                                            <div class="col-md-<?=12/$pages?>">
                                                <table class="table table-responsive table-bordered table-hover text-center">
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Jawaban</th>
                                                        <th>Poin</th>
                                                    </tr>
                                                    <?php foreach ($pd as $pd_data) : ?>
                                                    <tr class="data-row <?php
                                                    switch ($pd_data['score']) {
                                                        case 4:
                                                            echo 'bg-success';
                                                            break;
                                                        case -1:
                                                            echo 'bg-danger';
                                                            break;
                                                    }
                                                    ?>" toggle-id="<?=$pd_data['id']?>">
                                                        <td><?=$pd_data['nomor']?></td>
                                                        <td><?php echo $pd_data['jawaban'] != null ? $pd_data['jawaban'] : '-' ?></td>
                                                        <td><?=$pd_data['score']?></td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </table>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div id="tryout-tab" class="col-md-12 master-tab">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Try Out</div>
                                    <div class="panel-body">
                                        <?php if (!isset($data['tryout_data']) || $data['tryout_data'] == []) : ?>
                                        <h4>Hasil <b>Try Out</b> dapat diakses setelah Anda mengerjakan soal <b>Try Out</b>.</h4>
                                        <?php else : ?>
                                        <!-- copy from here -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <b>Skor</b>
                                                            </div>
                                                            <div class="col-md-9">
                                                                : <?=$data['tryout_data']['score']?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <b>Waktu Pengerjaan</b>
                                                            </div>
                                                            <div class="col-md-9">
                                                                : <?=$data['tryout_data']['start_time']?> - <?=$data['tryout_data']['end_time']?><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row jawaban-tables">
                                                <?php
                                                    $pages = 4;
                                                    $data_per_page = ceil($data['tryout_data']['jumlah_soal']/$pages);
                                                    $paginated_data = [];

                                                    /*
                                                        jumlah soal: 50
                                                        pages: 3
                                                        data per page: 17

                                                        page 1: (i) 0, (j) 0-16
                                                        page 2: (i) 1, (j) 17-33
                                                        page 3: (i) 2, (j) 34-49
                                                    */

                                                    for ($i=0; $i<$pages; $i++) {
                                                        for ($j=(($i+1)*$data_per_page)-$data_per_page; $j<($i+1)*$data_per_page; $j++) {
                                                            if (!isset($data['tryout_data']['lj'][$j])) {
                                                                break;
                                                            }
                                                            $paginated_data[$i][] = $data['tryout_data']['lj'][$j];
                                                        }
                                                    }
                                                ?>
                                            <?php foreach ($paginated_data as $pd) : ?>
                                            <div class="col-md-<?=12/$pages?>">
                                                <table class="table table-responsive table-bordered table-hover text-center">
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Jawaban</th>
                                                        <th>Poin</th>
                                                    </tr>
                                                    <?php foreach ($pd as $pd_data) : ?>
                                                    <tr class="data-row <?php
                                                    switch ($pd_data['score']) {
                                                        case 4:
                                                            echo 'bg-success';
                                                            break;
                                                        case -1:
                                                            echo 'bg-danger';
                                                            break;
                                                    }
                                                    ?>" toggle-id="<?=$pd_data['id']?>">
                                                        <td><?=$pd_data['nomor']?></td>
                                                        <td><?php echo $pd_data['jawaban'] != null ? $pd_data['jawaban'] : '-' ?></td>
                                                        <td><?=$pd_data['score']?></td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </table>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div id="detail-jawaban-area">
                                <div id="detail-jawaban-tab" class="bg-info">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-12 detail-jawaban-content">
                                                <div class="row">
                                                    <div class="col-md-1 text-right" style="font-size: 24px;">
                                                        <span id="detail-nomor-soal"></span>.)
                                                    </div>
                                                    <div id="detail-isi-soal" class="col-md-11" style="font-size: 24px;">
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 detail-jawaban-content" style="font-size: 18px;">
                                                <div class="row">
                                                    <div class="col-md-3">Jawaban Anda (<span id="detail-poin-user"></span>): </div>
                                                    <div id="detail-pilihan-user" class="col-md-9"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 detail-jawaban-content" style="font-size: 18px;">
                                                <div class="row">
                                                    <div class="col-md-3">Jawaban Benar (<span id="detail-poin-benar"></span>): </div>
                                                    <div id="detail-pilihan-benar" class="col-md-9"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <button id="btn-close-detail-jawaban" class="btn btn-danger">Kembali</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="mekanisme-tab" class="col-md-12 master-tab">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Mekanisme</div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1">
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
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1">
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
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1">
                                                <h3>Tahap Semi Final</h3>
                                                <ul class="sub-list">
                                                    <li><p>Informasi akan diberikan lebih lanjut kepada 20 tim yang lolos dari tahap penyisihan</p></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1">
                                                <h3>Tahap Grand Final</h3>
                                                <ul class="sub-list">
                                                    <li><p>Informasi akan diberikan pada Technical Meeting kepada 5 tim yang lolos dari tahap Semi Final</p></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_SESSION['flashed_data'])) {
        unset($_SESSION['flashed_data']);
    }
    ?>
    <script>
    
        $(function(){

            $('#data-panel').find('.init-panel').fadeIn();

            $('#nav-menu-master').find('.nav-menu').click(function(){
                
                $('#nav-menu-master').find('.nav-menu').not($(this)).removeClass('active');
                $(this).addClass('active');
                $('#data-panel').find('.master-tab').not($('#'+$(this).attr('role'))).hide();
                $('#'+$(this).attr('role')).fadeIn();
            
            });

    ///////////////////////////////////////////////////////////////////////////////////////////
    //
    //  FORM DAFTAR ULANG ANGGOTA TEAM!!
    //
    //
    //////////////////////////////////////////////////////////////////////////////////////////

            control_participant(parseInt($('#participant-counter').val()));
            select_region($('#user-region').find('option:selected').val());

            $(window).keydown(function(e){
                if(e.keyCode == 13){
                    e.preventDefault();
                    return false;
                }
            });

            // $('#user-region').find('.region-option').click(function(){
            //     var region_id = $(this).val();
            //     select_region(region_id);
            // });

            function select_region(region_id){
                $('#user-rayon').find('option:selected').removeAttr('selected');
                $('option[data-region-id="0"]').prop('selected', true);
                $('.rayon-option').not('option[data-region-id="'+region_id+'"]').hide();
                $('option[data-region-id="'+region_id+'"]').show();
            }

            $('#agreement-checkbox').click(function(){
                if($('#agreement-checkbox').prop('checked')){
                    $('#submit-button').fadeIn('fast');
                }else{
                    $('#submit-button').fadeOut('fast');
                }
            });

            $('#participant-control').find('.participant-control').click(function(){
                var command = $(this).attr('data-toggle-control');
                var last_participant = parseInt($('#participant-counter').val());
                var current_participant;

                if(command == 'add'){
                    if(last_participant >= 3){
                        current_participant = 3;
                    }else{
                        current_participant = last_participant + 1;
                    }
                }else{
                    if(last_participant <= 1){
                        current_participant = 1;
                    }else{
                        current_participant = last_participant - 1;
                    }
                }
                $('#participant-counter').val(current_participant);
                
                control_participant(current_participant);
            });

            function control_participant(participant_count){

                for(var i=1; i<=3; i++){
                    var participant_panel = $('#participant'+i);
                    var participant_number = parseInt(participant_panel.attr('data-participant-number'));

                    if(i > participant_count){
                        participant_panel.slideUp();
                    }else{
                        participant_panel.slideDown();
                    }
                }

            }

    ////////////////////////////////////////////////////////////////////////////////////////////////

            $('.jawaban-tables').find('.data-row').click(function(){
                var lj_id = $(this).attr('toggle-id');
                $.get('/ceo/api/get_soal_detail/'+lj_id)
                .done(function(response){
                    var detail_view = JSON.parse(response);
                    var isi_soal = detail_view.isi_soal_gambar != null ? '<img class="img-responsive" src="/'+detail_view.isi_soal_gambar+'">' : detail_view.isi_soal_text;
                    var isi_terjawab = detail_view.dijawab_gambar != null ? '<img class="img-responsive" src="/'+detail_view.dijawab_gambar+'">' : detail_view.dijawab_isi;
                    var isi_jawaban = detail_view.jawaban_gambar != null ? '<img class="img-responsive" src="/'+detail_view.jawaban_gambar+'">' : detail_view.jawaban_isi;
                    var poin_user = detail_view.dijawab_poin != null ? detail_view.dijawab_poin : '-';
                    $('#detail-nomor-soal').html(detail_view.no_soal);
                    $('#detail-isi-soal').html(isi_soal);
                    $('#detail-poin-user').html(poin_user);
                    $('#detail-poin-benar').html(detail_view.jawaban_poin);
                    $('#detail-pilihan-user').html(isi_terjawab);
                    $('#detail-pilihan-benar').html(isi_jawaban);
                    $('#detail-jawaban-area').fadeIn('fast');
                });
            });

            $('#btn-close-detail-jawaban').click(function(){
                $('#detail-jawaban-area').fadeOut('fast');
                $('#detail-nomor-soal').html('');
                $('#detail-isi-soal').html('');
                $('#detail-poin-user').html('');
                $('#detail-poin-benar').html('');
                $('#detail-pilihan-user').html('');
                $('#detail-pilihan-benar').html('');
            });

        })
    
    </script>
</body>
</html>
