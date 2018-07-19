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
    <!-- DATETIMEPICKER -->
    <script type="text/javascript" src="/bootstrap_datepicker/jquery.js"></script>
    <script type="text/javascript" src="/bootstrap_datepicker/moment.js"></script>
    <script type="text/javascript" src="/bootstrap_datepicker/transition.js"></script>
    <script type="text/javascript" src="/bootstrap_datepicker/collapse.js"></script>
    <script type="text/javascript" src="/bootstrap_datepicker/bootstrap.min.js"></script>
    <script type="text/javascript" src="/bootstrap_datepicker/locales/id.js"></script>
    <link rel="stylesheet" href="/bootstrap_datepicker/bootstrap-datetimepicker.min.css">
    <script type="text/javascript" src="/bootstrap_datepicker/bootstrap-datetimepicker.min.js"></script>
    <!-- ///////////////////////// -->
    <style>
        body{
            margin-bottom: 50px;
        }
        #settings-view, #detail-view, #soal-view, #lembarjawaban-view, #leaderboard-view, #activation-button, #registration-button, #reset-activation-button, #reset-registration-button, #text-copy-success, #soal-list-penyisihan, .tester-notif{
            display: none;
        }
        #detail-view{
            padding-top: 20px;
            padding-bottom: 20px;
        }
        #logout-button{
            margin-top: 20px;
            margin-right: 20px;
        }
        .toggle-status-block{
            padding-right: 0;
        }
        .table-row:hover{
            cursor: pointer;
        }
        .participant-data{
            /*font-size: 18px;*/
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .table-row.default.bg-custom-darker{
            background-color: #eee !important;
        }
        .table-row.default.bg-custom-darker:hover{
            background-color: #ddd !important;
        }
        .popup-overlay{
            position: fixed;
            z-index: 2;
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
        .btn-group{
            margin-bottom: 15px;
        }
    </style>
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div id="main-content" class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h1>DASHBOARD</h1>
                            </div>
                            <div class="col-md-6 text-right"><a id="logout-button" class="btn btn-default" href="/admin/ceo/logout">Logout</a></div>
                        </div>
                    </div>
                    <div style="padding-top: 5px;padding-bottom: 5px;" id="nav-menu-master" class="col-md-12">
                        <ul class="nav nav-tabs">
                            <li role="table" class="active"><a href="#user">User</a></li>
                            <li role="soal"><a href="#soal">Soal</a></li>
                            <li role="lembarjawaban"><a href="#lembar-jawaban">Lembar Jawaban</a></li>
                            <li role="leaderboard"><a href="#leaderboard">Leaderboard</a></li>
                            <li role="settings"><a href="#settings">Settings</a></li>
                        </ul>
                    </div>
                    <div style="padding-top: 15px;padding-bottom: 5px;" id="table-view" class="col-md-12 master-view">
                        <div class="row">
                            <div id="nav-menu-user" class="col-md-12">
                                <ul class="nav nav-pills">
                                    <li role="row_all" class="toggle-status all active"><a href="#user">Semua</a></li>
                                    <li role="row_registered" class="toggle-status registered"><a href="#user">Registered</a></li>
                                    <li role="row_submitted" class="toggle-status submitted"><a href="#user">Submitted</a></li>
                                    <li role="row_active" class="toggle-status aktif"><a href="#user">Aktif</a></li>
                                    <li role="row_pending" class="toggle-status pending"><a href="#user">Pending</a></li>
                                    <li role="row_nonactive" class="toggle-status nonaktif"><a href="#user">Nonaktif</a></li>
                                    <li role="row_unverified" class="toggle-status unverified"><a href="#user">Unverified</a></li>
                                    <li role="row_expired" class="toggle-status expired"><a href="#user">Expired</a></li>
                                </ul>
                            </div>
                            <div class="col-md-12">
                                <h3 id="page-header" page-number="1">Halaman 1</h3>
                                <table id="user-table" class="table table-hover table-bordered">
                                    <tr>
                                        <th>No.</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Region</th>
                                        <th>Rayon</th>
                                        <th>Sekolah</th>
                                        <th>Status</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Tanggal Diaktifkan</th>
                                        <th>Tanggal Expired</th>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-12 text-right">
                                <button id="prev-button" class="page-navigation btn">Prev</button>
                                <button id="next-button" class="page-navigation btn">Next</button>
                            </div>
                        </div>
                    </div>
                    <div id="soal-view" class="col-md-12 master-view">
                        <div class="row">
                            <div id="nav-menu-type" class="col-md-12">
                                <ul class="nav nav-tabs">
                                    <li soal-type="tryout" class="active"><a href="#type-tryout">Try Out</a></li>
                                    <li soal-type="penyisihan"><a href="#type-penyisihan">Penyisihan</a></li>
                                </ul>
                            </div>
                            <div class="col-md-12 soal-title-section">
                                <h1>Try Out</h1>
                            </div>
                            <div id="soal-list-tryout" class="col-md-12 soal-list-section" load-status="0">
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////
//////////////////////////////
////////////////////////////// SOAL TRYOUT
//////////////////////////////
//////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                            </div>
                            <div id="soal-list-penyisihan" class="col-md-12 soal-list-section" load-status="0">
                                <div id="paket-penyisihan-selection" class="btn-group" role="group" aria-label="...">
                                    <a href"#" class="btn btn-default" disabled>Paket</a>
                                    <a href"#penyisihan-1" paket-id="1" load-status="0" class="btn-paket btn btn-default">1</a>
                                    <a href"#penyisihan-2" paket-id="2" load-status="0" class="btn-paket btn btn-default">2</a>
                                    <a href"#penyisihan-3" paket-id="3" load-status="0" class="btn-paket btn btn-default">3</a>
                                    <a href"#penyisihan-4" paket-id="4" load-status="0" class="btn-paket btn btn-default">4</a>
                                </div>
                                <div class="row">
                                    <div id="soal-list-penyisihan-container" class="col-md-12"></div>
                                </div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////
//////////////////////////////
////////////////////////////// SOAL PENYISIHAN
//////////////////////////////
//////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                            </div>
                        </div>
                    </div>
                    <div id="lembarjawaban-view" class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 id="lembar-jawaban-title">Try Out</h2>
                                <div id="lembarjawaban-type-button" class="btn-group">
                                    <button lj-type="tryout" type="button" class="lembarjawaban-type-button btn btn-default active">Try Out</button>
                                    <button lj-type="penyisihan" type="button" class="lembarjawaban-type-button btn btn-default">Penyisihan</button>
                                </div>
                                <div id="lembarjawaban-order-button" class="btn-group">
                                    <button order="username" type="button" class="lembarjawaban-order-button btn btn-default active">Username</button>
                                    <button order="email" type="button" class="lembarjawaban-order-button btn btn-default">Email</button>
                                    <button order="region_id" type="button" class="lembarjawaban-order-button btn btn-default">Region</button>
                                    <button order="rayon" type="button" class="lembarjawaban-order-button btn btn-default">Rayon</button>
                                    <button order="score" type="button" class="lembarjawaban-order-button btn btn-default">Skor</button>
                                </div>
                                <div id="lembarjawaban-order-type-button" class="btn-group">
                                    <button order-type="asc" type="button" class="lembarjawaban-order-type-button btn btn-default active"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
                                    <button order-type="desc" type="button" class="lembarjawaban-order-type-button btn btn-default"><i class="fa fa-arrow-down" aria-hidden="true"></i></button>
                                </div>
                                <input id="lembarkerja-type" type="hidden" value="tryout">
                                <input id="lembarkerja-order" type="hidden" value="username">
                                <table id="lembarkerja-table" class="table table-hover">
                                    <tr>
                                        <td>Username</td>
                                        <td>Email</td>
                                        <td>Region</td>
                                        <td>Rayon</td>
                                        <td>Sekolah</td>
                                        <td>Paket</td>
                                        <td>Mulai</td>
                                        <td>Selesai</td>
                                        <td>Status</td>
                                        <td>Skor</td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="leaderboard-view" class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Ini halaman leaderboard</h1>
                            </div>
                        </div>
                    </div>
                    <!-- // SETTINGS!! /////////////////////////////////  -->
                    <div id="settings-view" class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Paket penyisihan belum diacak.</h2>
                                <p>Sebelum mengacak paket penyisihan, sebaiknya pastikan dulu paket 1 penyisihan sudah benar-benar fix.</p>
                                <a href="#" class="btn btn-info" disabled>Acak paket penyisihan</a>
                                <a href="#" class="btn btn-info" disabled>Reset paket penyisihan</a>
                            </div>
                            <div class="col-md-12">
                                <h2>Manajemen Tester</h2>
                                <p>Tambahkan email tester untuk menguji fungsionalitas website. Tester dapat melakukan pengujian Try Out dan Penyisihan sesuai tanggal yang ditentukan Admin.</p>
                                <div class="form-inline">
                                    <input id="tester-email" class="form-control" type="text" style="width:30%;">
                                    <button id="tester-email-submit" class="btn btn-info">Tambahkan Menjadi Tester</button>
                                </div>
                                <h5 class="text-success tester-notif" tester-notif-type="success">Sukses menambahkan user menjadi tester.</h5>
                                <h5 class="text-danger tester-notif" tester-notif-type="failed">Email tidak ditemukan.</h5>
                            </div>
                            <div class="col-md-12">
                                <h2>Manajemen Sesi</h2>
                                <div class="row">
                                    <form action="/admin/ceo/update_sesi" class='col-md-6 form'>
                                        <div class="form-inline form-group">
                                            <label class="radio-inline"><input type="radio" name="sesi" value="1">Try Out</label>
                                            <label class="radio-inline"><input type="radio" name="sesi" value="2">Penyisihan Pagi</label>
                                            <label class="radio-inline"><input type="radio" name="sesi" value="3">Penyisihan Sore</label>
                                            <label class="radio-inline"><input type="radio" name="sesi" value="4" checked>Testing</label>
                                        </div>
                                        <div class="form-inline form-group">
                                            <div class='input-group date' id='test_starts'>
                                                <input type='text' class="form-control" name="start_time" size="15" placeholder="Kosongi jika tetap"/>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                            <span>&nbsp&nbsp s/d &nbsp&nbsp</span>
                                            <div class='input-group date' id='test_ends'>
                                                <input type='text' class="form-control" name="end_time" size="15" placeholder="Kosongi jika tetap"/>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-info" name="submit" value="Ubah Waktu">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-striped table-hover">
                                            <tr>
                                                <td><b>ID</b></td>
                                                <td><b>Nama</b></td>
                                                <td><b>Mulai</b></td>
                                                <td><b>Selesai</b></td>
                                            </tr>
                                            <?php foreach($data['sesis'] as $sesi): ?>
                                            <tr>
                                                <td><?=$sesi->id?></td>
                                                <td><?=$sesi->nama?></td>
                                                <td><?php echo date('d F Y, H:i', strtotime($sesi->start_time)); ?></td>
                                                <td><?php echo date('d F Y, H:i', strtotime($sesi->end_time)); ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h2>Daftar Akun Tester</h2>
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <table class="table table-responsive table-hover">
                                            <tr>
                                                <td><b>Username</b></td>
                                                <td><b>Email</b></td>
                                                <td><b>Password</b></td>
                                                <td></td>
                                            </tr>
                                            <?php foreach($data['tester_data'] as $tester): ?>
                                            <tr class="<?php echo $tester['finished'] == 1 ? 'bg-success"' : ''; ?>">
                                                <td><?=$tester['username']?></td>
                                                <td><?=$tester['email']?></td>
                                                <td><?=$tester['password']?></td>
                                                <td><a title="reset pengerjaan" href="<?php echo $tester['finished'] == 1 ? '/admin/ceo/rollback_lembar_kerja/'.$tester['id'].'/tester' : '#settings'; ?>" class="btn btn-xs <?php echo $tester['finished'] == 1 ? 'btn-success"' : 'btn-default" disabled'; ?>"><i class="fa fa-undo" aria-hidden="true"></i></a>&nbsp<a href="/admin/ceo/tester/delete/<?=$tester['id']?>" class="btn btn-xs btn-danger" title="hapus tester"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <tr>
                                                <td colspan="4" class="text-right">
                                                    <div class="form-inline">
                                                        <span>Tambah tester sebanyak: </span>
                                                        <div class="form-group">
                                                            <input id="tester-qnt" class="form-control" type="text" size="2" placeholder="0">
                                                        </div>
                                                        <div class="form-group">
                                                            <a id="tester-add-button" class="btn btn-info" href="/admin/ceo/create_tester/0"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="detail-view" class="col-md-12">
                        <div class="row">
                            <input type="hidden" id="selected-user-id" value="">
                            <div class="col-md-12">
                                <button class="back-button btn btn-default">Kembali</button><br><br>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="team-panel" class="panel panel-primary">
                                            <div class="panel-heading">TEAM</div>
                                            <div class="panel-body">
                                                <div class="row participant-data">
                                                    <div class="col-md-4"><b>Username</b></div>
                                                    <div id="team-username" class="col-md-7">: </div>
                                                </div>
                                                <div class="row participant-data">
                                                    <div class="col-md-4"><b>Email</b></div>
                                                    <div id="team-email" class="col-md-7">: </div>
                                                </div>
                                                <div class="row participant-data">
                                                    <div class="col-md-4"><b>Region</b></div>
                                                    <div id="team-region" class="col-md-7">: </div>
                                                </div>
                                                <div class="row participant-data">
                                                    <div class="col-md-4"><b>Rayon</b></div>
                                                    <div id="team-rayon" class="col-md-7">: </div>
                                                </div>
                                                <div class="row participant-data">
                                                    <div class="col-md-4"><b>Sekolah</b></div>
                                                    <div id="team-sekolah" class="col-md-7">: </div>
                                                </div>
                                                <div class="row participant-data">
                                                    <div class="col-md-4"><b>Status</b></div>
                                                    <div id="team-status" class="col-md-7">: </div>
                                                </div>
                                                <div class="row participant-data">
                                                    <div class="col-md-4"><b>Tanggal Dibuat</b></div>
                                                    <div id="team-dibuat" class="col-md-7">: </div>
                                                </div>
                                                <div class="row participant-data">
                                                    <div class="col-md-4"><b>Tanggal Diaktifkan</b></div>
                                                    <div id="team-diaktifkan" class="col-md-7">: </div>
                                                </div>
                                                <div class="row participant-data">
                                                    <div class="col-md-4"><b>Tanggal Expired</b></div>
                                                    <div id="team-expired" class="col-md-7">: </div>
                                                </div>
                                                <div class="row participant-data">
                                                    <div class="col-md-4"><b>Link Verifikasi</b></div>
                                                    <div id="team-verification" class="col-md-7">: 
                                                        <input id="verification-link" type="text">
                                                        <button id="verification-link-copy">Copy</button>
                                                        <span id="text-copy-success" class="text-success">Copied!</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="activation-panel" class="panel panel-primary">
                                            <div class="panel-heading">AKTIVASI</div>
                                            <div class="panel-body participant-data">
                                                <div class="row participant-data">
                                                    <div class="col-md-4"><b>Tanggal Request</b></div>
                                                    <div id="tanggal-request" class="col-md-7">: </div><br><br>
                                                </div>
                                                <div class="row participant-data">
                                                    <div class="col-md-12">
                                                        <img id="bukti-pembayaran" class="img-responsive img-thumbnail" src="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div id="participant-panel" class="panel panel-primary">
                                    <div class="panel-heading">ANGGOTA</div>
                                    <div id="panel-anggota-body" class="panel-body">
                                    </div>
                                </div>
                            </div>
                            <div style="padding-top: 20px;padding-bottom: 20px;" class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="back-button btn btn-default">Kembali</button>
                                    </div>
                                    <div id="important-button-section" class="col-md-6 text-right">
                                        <button id="activation-button" class="btn btn-primary important-button">Aktifkan User</button>
                                        <button id="registration-button" class="btn btn-primary important-button">Validasi Pendaftaran</button>
                                        <button id="reset-activation-button" class="btn btn-warning reset-button important-button" toggle-reset="activation">Reset Aktivasi User</button>
                                        <button id="reset-registration-button" class="btn btn-warning reset-button important-button" toggle-reset="registration">Reset Validasi Pendaftaran</button>
                                        <button id="delete-button" class="btn btn-danger important-button">Hapus Akun</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="confirmation-popup" class="popup-overlay">
                        <div class="popup-content text-right">
                            <div class="popup-text"><span>text</span></div>
                            <button button-command="confirm" confirm-target="" class="popup-button btn btn-success">confirmation</button>
                            <button button-command="cancel" class="popup-button btn btn-danger">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){

            var status_filter = 'row_all';
            var pagination = [];
            var rowsPerPage = 10;
            var pageAmount = 0;
            var updateInterval = 1000*60*5; /* Update every 1 second x 60 * 5 (which means 5 minutes)*/
            var updateUserList = setInterval(function(){
                
                getUserList();
                
            }, updateInterval);

            var lj_type = 'tryout';
            var lj_order = 'username';
            var lj_order_type = 'asc';
            var lembarkerja_user_id;
            var lembarkerja_paket_id;
            getLembarKerja();
            
            if(window.location.hash) {
                switch (window.location.hash) {
                    case '#user':
                        $('.master-view').not('#table-view').hide();
                        $('#table-view').show();
                        click_master_tab($('#nav-menu-master').find('li[role="table"]'));
                        break;

                    case '#soal':
                        $('.master-view').not('#soal-view').hide();
                        $('#soal-view').show();
                        click_master_tab($('#nav-menu-master').find('li[role="soal"]'));
                        break;
                    
                    case '#type-tryout':
                        $('.master-view').not('#soal-view').hide();
                        $('#soal-view').show();
                        $('.soal-list-section').not('#soal-list-tryout').hide();
                        $('#soal-list-tryout').show();
                        click_master_tab($('#nav-menu-master').find('li[role="soal"]'));
                        break;

                    case '#type-penyisihan':
                        $('.master-view').not('#soal-view').hide();
                        $('#soal-view').show();
                        $('.soal-list-section').not('#soal-list-tryout').hide();
                        $('#soal-list-tryout').show();
                        click_master_tab($('#nav-menu-master').find('li[role="soal"]'));
                        click_soal_type_tab($('#nav-menu-type').find('li[soal-type="penyisihan"]'));
                        break;

                    case '#lembar-jawaban':
                        $('.master-view').not('#lembar-jawaban-view').hide();
                        $('#lembar-jawaban').show();
                        click_master_tab($('#nav-menu-master').find('li[role="lembarjawaban"]'));
                        break;

                    case '#settings':
                        $('.master-view').not('#settings-view').hide();
                        $('#settings-view').show();
                        click_master_tab($('#nav-menu-master').find('li[role="settings"]'));
                        break;
                }
            } else {
                getUserList();
            }

            function getUserList(){

                var rowOffset = (parseInt($('#page-header').attr('page-number')) - 1) * rowsPerPage;

                $.get('/admin/ceo/api/userlist/'+rowOffset+'/'+rowsPerPage+'/'+status_filter)
                .done(function(response){
                    var data = JSON.parse(response);
                    if(data.main_data == ''){
                        // alert('data kosong');
                    }
                    // var rowAmount = 10;
                    pageAmount = Math.ceil(data.data_count/rowsPerPage);
                    
                    // for(i=0;i<pageAmount;i++){
                    //     pagination[i] = [];
                    //     for(j=((i+1)*rowAmount)-rowAmount;j<(i+1)*rowAmount;j++){
                    //         if(typeof data[j] === 'undefined'){ // Ngecek tipe data. Undefined merupakan tipe data tersendiri di JS
                    //             break;
                    //         }
                    //         pagination[i].push(data[j]);
                    //     }
                    // }
                    
                    getDataByPage(data.main_data);
                    
                });

            }

            function getSoalList(paket){

                var selector = (paket == 5) ? '#soal-list-tryout' : '#soal-list-penyisihan-container';
                
                if(selector == '#soal-list-penyisihan-container'){
                    $(selector).html('');
                }

                $.get('/admin/ceo/api/soal/list/'+paket)
                .done(function(json_data){
                    // $(selector).html('');
                    if(json_data == ''){
                        var generate_button = '<div class="col-md-12 text-center"><a href="/admin/ceo/soal/generate/'+paket+'" class="btn btn-primary">Generate Soal</a></div>';
                        $(selector).append(generate_button);
                    }else{
                        var data = JSON.parse(json_data);
                        $.each(data, function(i, row){
                            var soal_content = (row.gambar != null) ? '<img class="img-responsive img-rounded img-thumbnail" src="/'+row.gambar+'" style="height:150px">' : '<p>'+row.isi+'</p>';
                            var additional_attr = paket == 5 ? '' : 'paket-soal="'+paket+'"';
                            var heading = '<a class="soal-panel" '+additional_attr+' soal-number="'+row.nomor+'" href="/admin/ceo/soal/edit/'+row.paket_id+'/'+row.nomor+'"><div class="panel panel-primary"><div class="panel-body"><div class="row"><div class="col-md-1 text-right">'+row.nomor+'.)</div><div class="col-md-11"><div class="row"><div class="col-md-12">'+soal_content+'</div><div class="col-md-12">';

                            $.each(row.pilihan, function(i_pilihan, row_pilihan){
                                var pilihan_poin;
                                var pilihan_content;
                                if(row_pilihan.poin == row.jawaban){
                                    pilihan_poin = '<b style="color:red;">'+row_pilihan.poin+'</b>';
                                    pilihan_content = (row_pilihan.gambar != null) ? '<img class="img-responsive img-rounded img-thumbnail" src="/'+row_pilihan.gambar+'" style="height:100px;">' : '<b style="color:red;"><span>'+row_pilihan.isi+'</span></b>';
                                }else{
                                    pilihan_poin = row_pilihan.poin;
                                    pilihan_content = (row_pilihan.gambar != null) ? '<img class="img-responsive img-rounded img-thumbnail" src="/'+row_pilihan.gambar+'" style="height:100px;">' : '<span>'+row_pilihan.isi+'</span>';
                                }
                                var each_pilihan = '<div class="row"><div class="col-md-12"><span>'+pilihan_poin+'.) </span>'+pilihan_content+'</div></div>';
                                heading += each_pilihan;

                            });

                            var footer = '</div></div></div></div></div></div></a>';

                            var soal_panel = heading+footer;

                            $(selector).append(soal_panel);

                        });
                    }

                    $(selector).attr('load-status', 1);

                });

            }

            function getLembarKerja(){
                $.get('/admin/ceo/api/lembar_kerja_list/'+lj_type+'/'+lj_order+'/'+lj_order_type)
                .done(function(response){
                    $('#lembarkerja-table').find('.lembarkerja-row').remove();
                    var lembarkerjas = JSON.parse(response);
                    // console.log(lembarkerjas);
                    $.each(lembarkerjas, function(i, row){
                        var bg_color = row.status == 'Selesai' ? 'bg-success' : '';
                        var header = '<tr class="lembarkerja-row '+bg_color+'">';
                        var content = '';
                        var footer = '</tr>';
                        $.each(row, function(j, col){
                            if(j != 'id'){
                                content += '<td>'+col+'</td>';
                            }
                        });
                        var link = row.status == 'Selesai' ? '/admin/ceo/view_lembar_kerja/'+row.id+'/'+row.paket : '#lembar-jawaban';
                        var btn = row.status == 'Selesai' ? 'btn-success' : 'btn-default';
                        var ahref = row.status == 'Selesai' ? 'btn-primary' : 'btn-default';
                        content += '<td width="70"><button rollback="'+row.id+'" rollback-paket="'+row.paket+'" title="reset pengerjaan" class="rollback-button btn btn-xs '+btn+'"><i class="fa fa-undo" aria-hidden="true"></i></button>&nbsp<a href="'+link+'" title="lihat pengerjaan" class="btn btn-xs '+ahref+'"><i class="fa fa-book" aria-hidden="true"></i></a></td>';
                        var full_row = header+content+footer;
                        $('#lembarkerja-table').append(full_row);
                    });
                });
            }

            function getDataByPage(data){
                $('.table-row').remove();
                $.each(data, function(i, row_val){
                    var td = "";
                    var row_class = "";
                    var row_id ="";
                    $.each(row_val, function(key, col_val){
                        td += key == 'id' ? "<td>"+(i+1)+"</td>" : "<td>"+col_val+"</td>";
                        if(key == "status"){
                            switch (col_val) {
                                case "expired":
                                    row_class = "row_expired";
                                    break;
                                case "nonactive":
                                    row_class = "row_nonactive";
                                    break;
                                case "unverified":
                                    row_class = "row_unverified";
                                    break;
                                case "pending":
                                    row_class = "row_pending";
                                    break;
                                case "active":
                                    row_class = "row_active";
                                    break;
                                case "submitted":
                                    row_class = "row_submitted";
                                    break;
                                case "registered":
                                    row_class = "row_registered";
                                    break;
                            }
                        }
                        if(key == "id"){
                            row_id = col_val;
                        }
                    });
                    var tr = '<tr class="table-row '+row_class+'" data-user-id="'+row_id+'">'+td+"</tr>";
                    $('#user-table').append(tr);
                });
            }

            function click_master_tab(element){

                var current_view = $('#nav-menu-master').find('li.active');
                var current_view_name = current_view.attr('role');
                var clicked_view_name = element.attr('role');
                current_view.removeClass('active');
                element.addClass('active');

                $('#detail-view').hide();

                $('#'+current_view_name+"-view").hide();
                $('#'+clicked_view_name+"-view").show();

                switch(clicked_view_name){
                    case "soal":
                        getSoalList(5);
                        break;

                    case "table":
                        getUserList();
                        break;
                }

            }

            function click_soal_type_tab(element){

                element.siblings().removeClass('active');
                element.addClass('active');

                var selected_type = $('#soal-list-'+element.attr('soal-type'));
                var load_status = selected_type.attr('load-status');
                var new_title = (element.attr('soal-type') == 'tryout') ? 'Try Out' : 'Penyisihan';

                $('.soal-list-section').not(selected_type).hide();
                $(selected_type).show();

                // if(load_status == 0){
                //     getSoalList(1);
                // }

                $('.soal-title-section').find('h1').html(new_title);

            }

            function click_paket_penyisihan(element){

                element.siblings().removeClass('active');
                element.addClass('active');

                var paket_id = element.attr('paket-id');
                // var load_status = element.attr('load-status');

                // if(load_status == 0){
                    // load soal list penyisihan semua paket
                // }

                    getSoalList(paket_id);

                // $('#soal-list-penyisihan').find('.soal-panel').not('a[paket-soal="'+paket_id+'"]').hide();
                // $('#soal-list-penyisihan').find('a[paket-soal="'+paket_id+'"]').show();

            }

            $('#nav-menu-master').find('li').click(function(){
                click_master_tab($(this));
            });

            $('#nav-menu-type').find('li').click(function(){
                click_soal_type_tab($(this));
            });

            $('#paket-penyisihan-selection').find('.btn-paket').click(function(){
                click_paket_penyisihan($(this));
            });

            // Khusus table dan elemen2nya pake delegate
            $('#user-table').delegate('.table-row', 'click', function(){

                var user_id = $(this).attr('data-user-id');

                $('#selected-user-id').val(user_id);
                
                $.get('/admin/ceo/api/userdetail/'+user_id)
                .done(function(response){
                    
                    data = JSON.parse(response);
                    $('#team-username').html(': '+data.username);
                    $('#team-email').html(': '+data.email);
                    $('#team-region').html(': '+data.region);
                    $('#team-rayon').html(': '+data.rayon);
                    $('#team-sekolah').html(': '+data.sekolah);
                    $('#team-status').html(': '+data.status);
                    $('#team-dibuat').html(': '+data.created);
                    $('#team-diaktifkan').html(': '+data.activated);
                    $('#team-expired').html(': '+data.expired);
                    $('#verification-link').val(data.verification_link);
                    if(data.status == 'pending' || data.status == 'active' || data.status == 'submitted' || data.status == 'registered'){
                        $('#activation-panel').show();
                        $('#tanggal-request').html(': '+data.data_aktivasi.requested);
                        $('#bukti-pembayaran').attr('src', '/'+data.data_aktivasi.bukti_pembayaran);
                        if(data.status == 'pending' || data.status == 'active'){
                            $('#participant-panel').hide();
                            if(data.status == 'pending'){
                                $('#activation-button').show();
                                $('#reset-activation-button').show();
                            }
                        $('#registration-button').hide();
                        $('#reset-registration-button').hide();
                        }else if(data.status == 'submitted' || data.status == 'registered'){
                            $('#participant-panel').show();
                            if(typeof data.data_peserta != 'undefined'){

                                var upper_frame = '<div class="row participant-data"><div class="col-md-4"><b>';
                                var middle_frame = '</b></div><div class="col-md-7">: ';
                                var lower_frame = '</div></div>';
                                
                                $.each( data.data_peserta, function( i, obj ){
                                    var inner_panels = [];
                                    var img_src = [];
                                    var inner_panel_string = '';

                                    inner_panels[0] = upper_frame+'ID'+middle_frame+obj.id+lower_frame;
                                    inner_panels[1] = upper_frame+'User ID'+middle_frame+obj.user_id+lower_frame;
                                    inner_panels[2] = upper_frame+'Status Peserta'+middle_frame+obj.peserta_status+lower_frame;
                                    inner_panels[3] = upper_frame+'Nama'+middle_frame+obj.nama+lower_frame;
                                    inner_panels[4] = upper_frame+'Nomor Telepon'+middle_frame+obj.nomor_telepon+lower_frame;
                                    inner_panels[5] = upper_frame+'LINE ID'+middle_frame+obj.lineid+lower_frame;
                                    inner_panels[6] = upper_frame+'Email'+middle_frame+obj.email+lower_frame;
                                    img_src[0] = obj.kartu_pelajar;
                                    img_src[1] = obj.foto_pelajar;

                                    $.each(inner_panels, function(key, value){
                                        if(key > 1){
                                            inner_panel_string += value;
                                        }
                                    });

                                    var panel_color = obj.peserta_status == 'Ketua' ? 'success' : 'primary';
                                    var upper_panel = '<div class="panel panel-'+panel_color+' appended-panel"><div class="panel-heading"><b>'+(i+1)+'.) [ '+obj.peserta_status.toUpperCase()+' TEAM ] '+obj.nama.toUpperCase()+'</b></div><div class="panel-body participant-data"><div class="col-md-6"><div class="col-md-6 image-panel"><a href="/'+img_src[0]+'" target="_blank"><img class="img-responsive img-thumbnail" src="/'+img_src[0]+'"></a></div><div class="col-md-6 image-panel"><a href="/'+img_src[1]+'" target="_blank"><img class="img-responsive img-thumbnail" src="/'+img_src[1]+'"></a></div></div><div class="col-md-6">';
                                    var lower_panel = '</div></div></div>';
                                    var full_panel = upper_panel+inner_panel_string+lower_panel;
                                    $('#panel-anggota-body').append(full_panel);
                                });
                            }
                            if(data.status == 'submitted'){
                                $('#registration-button').show();
                                $('#reset-registration-button').show();
                            }
                            $('activation-button').hide();
                            $('#reset-activation-button').hide();
                        }
                    }else{
                        $('#activation-panel').hide();
                        $('#participant-panel').hide();
                    }
                });

                $('#table-view').slideToggle();
                $('#detail-view').slideToggle();

            });

            $('#verification-link-copy').click(function(){
                // doesn't work with jequery selector
                var target = document.getElementById('verification-link');

                target.focus();
                target.setSelectionRange(0, target.value.length);
                if(document.execCommand('copy')){
                    $('#text-copy-success').show();
                }
            });

            function toggleRows(rowClass){
                $('tr.table-row').fadeOut('fast');
                if(rowClass == 'all'){
                    $('tr.table-row').fadeToggle('fast');
                }else $('tr.'+rowClass).fadeToggle('fast');
            }

            function manage_account(target){

                /*
                    target: aktivasi, registrasi, delete
                */
                
                $('#confirmation-popup').find('.popup-text>span').html('Sedang memproses. Harap tunggu.');
                $('#confirmation-popup').find('.popup-button').prop('disabled', true);

                var selected_id = $('#selected-user-id').val();

                $.post('/admin/ceo/api/user/'+target+'/confirmed', {id: selected_id})
                .done(function(){
                    location = '/admin/ceo/dashboard';
                });

            }

            function reset_account(toBeReset){

                $('#confirmation-popup').find('.popup-text>span').html('Sedang memproses. Harap tunggu.');
                $('#confirmation-popup').find('.popup-button').prop('disabled', true);
                
                var user_id = $('#selected-user-id').val();
                var reset = toBeReset;

                $.post(
                    '/admin/ceo/api/user/reset/confirmed',
                    {id: user_id, reset: reset}
                )
                .done(function(){
                    location = '/admin/ceo/dashboard';
                });

            }

            $('.back-button').click(function(){
                $('#table-view').slideDown();
                $('#detail-view').slideUp();
                $('#activation-button').hide();
                $('#reset-activation-button').hide();
                $('#registration-button').hide();
                $('#reset-registration-button').hide();
                $('.appended-panel').remove();
                $('#text-copy-success').hide();
            });

            $('#nav-menu-user').find('.toggle-status').click(function(){

                $('#nav-menu-user').find('.toggle-status').not($(this)).removeClass('active');
                $(this).addClass('active');

                status_filter = $(this).attr('role');

                // if($(this).attr('role') == 'all'){
                //     $('#user-table').find('.table-row').fadeIn('fast');
                // }else{
                //     $('#user-table').find('.table-row').not('.'+$(this).attr('role')).hide();
                //     $('#user-table').find('.'+$(this).attr('role')).fadeIn();
                // }
                $('#page-header').attr('page-number', 1);
                $('#page-header').html('Halaman '+1);
                // get user with new filter
                getUserList();

            });

            $('.page-navigation').click(function(){

                var currentPageNumber = parseInt($('#page-header').attr('page-number'));

                var futurePageNumber = $(this).attr('id') == 'next-button' ? (currentPageNumber+1) : (currentPageNumber-1);

                if(futurePageNumber < 1){
                    futurePageNumber = pageAmount;
                }else if(futurePageNumber > pageAmount){
                    futurePageNumber = 1;
                }
                
                $('#page-header').attr('page-number', futurePageNumber);
                $('#page-header').html('Halaman '+futurePageNumber);

                // getDataByPage(pagination[futurePageNumber-1]);
                getUserList();

            });

            $('#important-button-section').find('.important-button').click(function(){

                switch ($(this).attr('id')) {
                    case 'activation-button':
                        $('#confirmation-popup').find('button[button-command="confirm"]').attr('confirm-target', 'activate');
                        $('#confirmation-popup').find('button[button-command="confirm"]').html('Konfirmasi Aktivasi');
                        $('#confirmation-popup').find('.popup-text>span').html('Anda yakin untuk <b>MENGAKTIFKAN</b> akun ini?');
                        break;
                
                    case 'registration-button':
                        $('#confirmation-popup').find('button[button-command="confirm"]').attr('confirm-target', 'register');
                        $('#confirmation-popup').find('button[button-command="confirm"]').html('Validasi Pendaftaran');
                        $('#confirmation-popup').find('.popup-text>span').html('Anda yakin untuk <b>MEMVALIDASI PENDAFTARAN</b> pada akun ini?');
                        break;

                    case 'reset-activation-button':
                        $('#confirmation-popup').find('button[button-command="confirm"]').attr('confirm-target', 'reset-activation');
                        $('#confirmation-popup').find('button[button-command="confirm"]').html('Reset Aktivasi');
                        $('#confirmation-popup').find('.popup-text>span').html('Anda yakin untuk <b>MERESET AKTIVASI</b> pada akun ini?');
                        break;
                    
                    case 'reset-registration-button':
                        $('#confirmation-popup').find('button[button-command="confirm"]').attr('confirm-target', 'reset-registration');
                        $('#confirmation-popup').find('button[button-command="confirm"]').html('Reset Pendaftaran');
                        $('#confirmation-popup').find('.popup-text>span').html('Anda yakin untuk <b>MERESET PENDAFTARAN</b> pada akun ini?');
                        break;

                    case 'delete-button':
                        $('#confirmation-popup').find('button[button-command="confirm"]').attr('confirm-target', 'delete');
                        $('#confirmation-popup').find('button[button-command="confirm"]').html('Hapus');
                        $('#confirmation-popup').find('.popup-text>span').html('Anda yakin untuk <b>MENGHAPUS</b> akun ini?');
                        break;
                }
                
                $('#confirmation-popup').fadeIn('fast');

            });

            $('#confirmation-popup').find('.popup-button').click(function(){

                switch ($(this).attr('button-command')) {
                    case 'confirm':
                        var target = $(this).attr('confirm-target');
                        
                        switch (target) {
                            case 'activate':
                                manage_account('aktivasi');
                                break;
                            
                            case 'register':
                                manage_account('registrasi');
                                break;
                            
                            case 'reset-activation':
                                reset_account('activation');
                                break;
                            
                            case 'reset-registration':
                                reset_account('registration');
                                break;
                            
                            case 'delete':
                                manage_account('delete');
                                break;

                            case 'rollback_lembarkerja':
                                location = '/admin/ceo/rollback_lembar_kerja/'+lembarkerja_user_id+'/'+lembarkerja_paket_id+'/user';
                                break;
                        }
                        break;
                
                    case 'cancel':
                        $('#confirmation-popup').fadeOut('fast');
                        break;
                }

            });

            $('#tester-email-submit').click(function(){
                var tester_email = $('#tester-email').val();

                $.post('/admin/ceo/api/make_tester', {email:tester_email})
                .done(function(response){
                    if(response == 'null'){
                        $('#settings-view').find('h5[tester-notif-type="failed"]').fadeIn('fast');
                        setTimeout(function() {
                            $('#settings-view').find('h5[tester-notif-type="failed"]').fadeOut('fast');
                        }, 3000);
                    }else{
                        $('#settings-view').find('h5[tester-notif-type="success"]').fadeIn('fast');
                        setTimeout(function() {
                            $('#settings-view').find('h5[tester-notif-type="success"]').fadeOut('fast');
                        }, 3000);
                    }
                })
            });

            $('#tester-qnt').keyup(function(){
                if($(this).val() == ''){
                    $('#tester-add-button').attr('href', '/admin/ceo/create_tester/0');
                }else{
                    $('#tester-add-button').attr('href', '/admin/ceo/create_tester/'+$(this).val());
                }
            });

            $('#lembarkerja-table').delegate('.rollback-button', 'click', function(){
                lembarkerja_user_id = $(this).attr('rollback');
                lembarkerja_paket_id = $(this).attr('rollback-paket');
                // alert(lembarkerja_user_id);
                if($(this).hasClass('btn-success')){
                    $('#confirmation-popup').find('button[button-command="confirm"]').attr('confirm-target', 'rollback_lembarkerja');
                    $('#confirmation-popup').find('button[button-command="confirm"]').html('Reset Pengerjaan');
                    $('#confirmation-popup').find('.popup-text>span').html('Anda yakin untuk <b>MERESET PENGERJAAN</b> akun ini?');
                    $('#confirmation-popup').fadeIn('fast');
                }
            });

            $('#lembarjawaban-type-button').find('.lembarjawaban-type-button').click(function(){
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
                lj_type = $(this).attr('lj-type');
                getLembarKerja();
            });

            $('#lembarjawaban-order-button').find('.lembarjawaban-order-button').click(function(){
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
                lj_order = $(this).attr('order');
                getLembarKerja();
            });

            $('#lembarjawaban-order-type-button').find('.lembarjawaban-order-type-button').click(function(){
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
                lj_order_type = $(this).attr('order-type');
                getLembarKerja();
            });

            // DATETIMEPICKER/////////////////////////

            $('#test_starts').datetimepicker({
                locale: 'id',
                format: 'YYYY-MM-DD HH:mm:ss'
            });

            $('#test_ends').datetimepicker({
                locale: 'id',
                format: 'YYYY-MM-DD HH:mm:ss'
            });

            // DATETIMEPICKER////////////////////////

        });
    </script>
</body>
</html>