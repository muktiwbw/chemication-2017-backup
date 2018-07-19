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
    <title>Mulai Pengerjaan </title>
    <style>
        .pilihan-bar:hover{
            cursor: pointer;
        }
        .btn-idx{
            border-radius: 0px;
        }
        #soal-section{
            /* border-bottom: 2px solid #333; */
            padding-top: 15px;
            font-size: 24px;
            margin-bottom: 10px;
        }
        #nomor-section{
            padding-top: 15px;
            padding-bottom: 10px;
        }
        #main-sheet{
            /* border: 2px solid #333;
            border-radius: 5px; */
            padding-top: 15px;
            padding-bottom: 15px;
        }
        #tool-sheet{
            border: 2px solid #337ab7;
            border-radius: 5px;
            padding-top: 15px;
            padding-bottom: 15px;
            margin-top: 20px;
        }
        #timer{
            font-size: 36px;
        }
        #index-number-section{
            overflow-y: scroll;
            height: 300px;
        }
        #notif-proses{
            display: none;
            padding-top: 15px;
            padding-bottom: 15px;
            border-radius: 5px;
            font-size: 18px;
        }
        #detail-jawaban-tab{
            position: fixed;
            z-index: 2;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            border-radius: 5px;
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
        #done-ok{
            display: none;
        }
        .answered{
            border-bottom: 4px solid #d9534f !important;
            font-size: 20px !important;
            color: #d9534f !important;
        }
        .bullet-list-md{
            font-size: 24px;
        }
        .konten-section:hover{
            border-bottom: 4px solid #337ab7;
            color: #2e6da4;
            font-size: 22px;
        }
        .konten-section{
            transition: 0.15s;
            border-bottom: 2px solid #333;
            padding-top: 15px;
            padding-left: 10px;
            font-size: 18px;
            margin-bottom: 7px;
        }
        .poin-section{
            padding-top: 10px;
            padding-bottom: 15px;
        }
        .tool-section{
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?php echo $data['paket_id'] == 5 ? 'Try Out' : 'Penyisihan'; ?></h1>
            </div>
        </div>
        <div class="row">
            <div id="notif-proses" class="col-md-12 text-center bg-success">Sedang memproses...</div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div id="main-sheet" class="col-md-12">
                    <div class="col-md-12">
                        <div id="nomor-section" class="col-md-1 text-right bullet-list-md"></div>
                        <div id="soal-section" class="col-md-11"></div>
                    </div>
                    <div class="col-md-12">
                        <div id="pilihan-section" class="col-md-12">
                            <div class="row">
                                <?php 
                                $poin;
                                for($i=0; $i<5; $i++): 

                                        switch ($i) {
                                            case 0:
                                                $poin = "a";
                                                break;
                                            case 1:
                                                $poin = "b";
                                                break;
                                            case 2:
                                                $poin = "c";
                                                break;
                                            case 3:
                                                $poin = "d";
                                                break;
                                            case 4:
                                                $poin = "e";
                                                break;
                                        }    
                                ?>
                                <div class="col-md-12 pilihan-bar" poin="<?=$poin?>">
                                    <div class="row">
                                        <div class="col-md-1 col-md-offset-1 poin-section text-center bullet-list-md"></div>
                                        <div class="col-md-10 konten-section"></div>
                                    </div>
                                </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div id="tool-sheet" class="col-md-12">
                    <div id="timer" class="col-md-12 text-center tool-section"></div>
                    <div id="index-number-section" class="col-md-12 tool-section">
                        <?php for($i=0; $i<$data['jumlah_soal']; $i++): ?>
                        <div class="col-md-3">
                        <div class="row">
                            <button class="btn <?php 
                            if(in_array(($i+1), $data['nomor_terjawab'])){
                                echo 'btn-success';
                            }else{
                                echo $i == 0 ? 'btn-info' : 'btn-primary';
                            }
                            ?> btn-block btn-idx<?php echo $i == 0 ? " active" : ""; ?>" idx="<?=($i+1)?>"><?=($i+1)?></button>
                        </div>
                        </div>
                        <?php endfor; ?>
                        <div>
                            <div>
                                <div>
                                    <div>
                                        <div>
                                            <div>
                                                <div>
                                                    <div>
                                                        <div>
                                                            <div>
                                                                <div>
                                                                <input id="lembar-kerja-id" type="hidden" value="<?=$data['lk_id']?>">
                                                                <input id="paket-id" type="hidden" value="<?=$data['paket_id']?>">
                                                                <input id="jumlah-soal" type="hidden" value="<?=$data['jumlah_soal']?>">
                                                                <input id="nomor-soal" type="hidden" value="1">
                                                                <input id="et" type="hidden" value="<?=$data['end_time']?>">
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
                    </div>
                    <div class="col-md-12 tool-section"><button id="nullifier-button" class="btn btn-default btn-block">Kosongkan</button></div>
                    <div class="col-md-6 tool-section" style="padding-right:6px;"><button class="nav-button btn btn-primary btn-block" role="prev">Prev</button></div>
                    <div class="col-md-6 tool-section" style="padding-left:6px;"><button class="nav-button btn btn-primary btn-block" role="next">Next</button></div>
                    <div id="finish-section" class="col-md-12">
                        <button id="finish-button" class="btn btn-danger btn-block">Selesai</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="detail-jawaban-area">
                    <div id="detail-jawaban-tab" style="background:#fff;">
                        <div class="row">
                            <div class="col-md-12">
                                <h2><b>Selesai <?php echo $data['paket_id'] == 5 ? 'Try Out' : 'Penyisihan'; ?><b></h2>
                                <p style="font-style:normal !important; margin-bottom: 40px;">Apakah Anda yakin untuk mengakhiri <?php echo $data['paket_id'] == 5 ? 'Try Out' : 'Penyisihan'; ?> ini? <?php echo $data['paket_id'] == 5 ? 'Try Out' : 'Penyisihan'; ?> tidak dapat dikerjakan kembali jika anda memutuskan untuk selesai.</p>
                            </div>
                            <div class="col-md-12">
                                <input id="done-check" type="checkbox">&nbsp&nbspSaya yakin untuk mengakhiri <?php echo $data['paket_id'] == 5 ? 'Try Out' : 'Penyisihan'; ?>.
                            </div>
                            <div class="col-md-12 text-right">
                                <button id="done-ok" class="btn btn-danger">Selesai</button>&nbsp&nbsp<button id="done-cancel" class="btn btn-default">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <script>
        $(function(){

            var lk_id = $('#lembar-kerja-id').val();
            var paket_id = $('#paket-id').val();
            var jumlah_soal = $('#jumlah-soal').val();
            var nomor_soal = $('#nomor-soal').val();
            var end_time = new Date($('#et').val());

            var timeInterval = setInterval(function(){
                var current_time = new Date();
                var time_diff = end_time - current_time;
                if(time_diff > 0){
                    var tsecond = Math.floor((time_diff/1000)%60) < 10 ? '0'+Math.floor((time_diff/1000)%60) : Math.floor((time_diff/1000)%60);
                    var tminute = Math.floor((time_diff/60/1000)%60) < 10 ? '0'+Math.floor((time_diff/60/1000)%60) : Math.floor((time_diff/60/1000)%60);
                    var thour = Math.floor(time_diff/60/60/1000) < 10 ? '0'+Math.floor((time_diff/60/60/1000)%60) : Math.floor((time_diff/60/60/1000)%60);
                    $('#timer').html(thour+':'+tminute+':'+tsecond);
                }else{
                    // alert('waktu habis');
                    clearInterval(timeInterval);
                    finish();
                    // location = '/ceo/profile'; // nanti dicomment aja kalo pake finish()
                }
            }, 1000);

            change_idx(nomor_soal, $('#index-number-section').find('button[idx="1"]'));

            function update_nomor_soal(nomor){
                $('#nomor-soal').val(nomor);
                nomor_soal = $('#nomor-soal').val();
            }

            function finish(){
                var end_time = new Date();
                var ey = end_time.getFullYear();
                var em = (end_time.getMonth()+1) < 10 ? '0'+(end_time.getMonth()+1) : (end_time.getMonth()+1);
                var ed = end_time.getDate() < 10 ? '0'+end_time.getDate() : end_time.getDate();
                var eh = end_time.getHours() < 10 ? '0'+end_time.getHours() : end_time.getHours();
                var ei = end_time.getMinutes() < 10 ? '0'+end_time.getMinutes() : end_time.getMinutes();
                var es = end_time.getSeconds() < 10 ? '0'+end_time.getSeconds() : end_time.getSeconds();
                var reformat_end_time = ey+'-'+em+'-'+ed+' '+eh+':'+ei+':'+es;
                // alert(reformat_end_time);
                $.post(
                    '/ceo/mulai/api/finish',
                    {
                        lk_id: lk_id,
                        jumlah_soal: jumlah_soal,
                        end_time: reformat_end_time
                    }
                )
                .done(function(){
                    location = '/ceo/finish_page';
                });
            }

            function get_soal(paket, nomor){
                $.get('/ceo/mulai/api/soal/'+paket+'/'+nomor)
                .done(function(response){
                    var soal = JSON.parse(response);
                    var nomor_soal = soal.soal.nomor;
                    var isi_soal = soal.soal.gambar != null ? '<img class="img-responsive img-rounded" src="/'+soal.soal.gambar+'">' : '<p>'+soal.soal.isi+'</p>';
                    $('#nomor-section').html(nomor_soal+'.');
                    $('#soal-section').html(isi_soal);

                    $.each(soal.pilihans, function(index, pilihan){
                        var pilihan_poin = pilihan.poin;
                        var pilihan_isi = pilihan.gambar != null ? '<img class="img-responsive img-rounded" src="/'+pilihan.gambar+'">' : '<p>'+pilihan.isi+'</p>';
                        var pilihan_konteks = $('#pilihan-section').find('div[poin="'+pilihan_poin+'"]');
                        pilihan_konteks.find('.poin-section').html(pilihan_poin.toUpperCase()+'.');
                        pilihan_konteks.find('.konten-section').html(pilihan_isi);
                    });

                    $('#pilihan-section').find('.konten-section').removeClass('answered');
                    // alert(soal.jawaban);
                    if(soal.jawaban != null){
                        var answered = $('#pilihan-section').find('div[poin="'+soal.jawaban+'"]');
                        // alert(soal.jawaban+' == '+answered.attr('poin'));
                        answered.find('.konten-section').addClass('answered');
                    }
                    
                });
            }

            function change_idx(nomor, idx_button){
                var recent_index = $('#index-number-section').find('.active');
                update_nomor_soal(nomor);
                // Jika tombol lama berwarna cyan, tambahkan warna biru
                // Selain itu jika tombol lama berwarna kuning, tambahkan warna hijau
                if(recent_index.hasClass('btn-info')){
                    recent_index.addClass('btn-primary');
                }else if(recent_index.hasClass('btn-warning')){
                    recent_index.addClass('btn-success');
                }

                // Jika tombol lama berwarna cyan atau kuning, hapus warna cyan dan kuning
                if(recent_index.hasClass('btn-info') || recent_index.hasClass('btn-warning')){
                    recent_index.removeClass('btn-info');
                    recent_index.removeClass('btn-warning');
                }

                // Jika tombol baru berwarna hijau, beri warna kuning
                // Selain itu jika tombol baru berwarna biru, beri warna cyan
                if(idx_button.hasClass('btn-success')){
                    idx_button.addClass('btn-warning');
                }else if(idx_button.hasClass('btn-primary')){
                    idx_button.addClass('btn-info');
                }

                // Jika tombol baru punya warna hijau atau biru, hapus warna hijau dan birunya
                if(idx_button.hasClass('btn-success') || idx_button.hasClass('btn-primary')){
                    idx_button.removeClass('btn-success');
                    idx_button.removeClass('btn-primary');
                }

                // Pemindahan status active
                recent_index.removeClass('active');
                idx_button.addClass('active');

                get_soal(paket_id, nomor_soal);
            }

            $('#index-number-section').find('.btn-idx').click(function(){
                var nomor = $(this).attr('idx');
                change_idx(nomor, $(this));
            });

            $('#pilihan-section').find('.pilihan-bar').click(function(){
                $('#notif-proses').slideDown('fast');
                var poin = $(this).attr('poin');
                var recent_index = $('#index-number-section').find('.btn-info');
                // insert lembar jawaban dengan ajax
                $.post(
                    '/ceo/mulai/api/store',
                    {
                        lk_id: lk_id,
                        paket_id: paket_id,
                        nomor: nomor_soal,
                        jawab: poin
                    }
                )
                .done(function(response){
                    if(response == "success"){
                        $('#notif-proses').slideUp('fast');
                        recent_index.removeClass('btn-info');
                        recent_index.addClass('btn-success');
                        // next
                        navigate_idx('next');
                    }
                })
            });

            function navigate_idx(navigation){
                var int_nomor_soal = parseInt(nomor_soal);
                var int_jumlah_soal = parseInt(jumlah_soal);
                var next_nomor = navigation == 'next' ? (int_nomor_soal+1) : (int_nomor_soal-1);
                if(next_nomor > int_jumlah_soal){
                    next_nomor = 1;
                }else if(next_nomor <= 0){
                    next_nomor = int_jumlah_soal;
                }
                var idx_button = $('#index-number-section').find('button[idx="'+next_nomor+'"]');
                change_idx(next_nomor, idx_button);
            }

            $('#nullifier-button').click(function(){
                $.post(
                    '/ceo/mulai/api/nullify',
                    {
                        lk_id: lk_id,
                        nomor: nomor_soal
                    }
                )
                .done(function(){
                    var idx_button = $('#index-number-section').find('button[idx="'+nomor_soal+'"]');
                    navigate_idx('next');
                    idx_button.removeClass('btn-success');
                    idx_button.addClass('btn-primary');
                });
            })

            $('.nav-button').click(function(){
                navigate_idx($(this).attr('role'));
            });

            $('#finish-button').click(function(){
                $('#detail-jawaban-area').fadeIn('fast');
                // finish();
            });

            $('#done-cancel').click(function(){
                $('#detail-jawaban-area').fadeOut('fast');
                $('#done-check').prop('checked', false);
                $('#done-ok').fadeOut('fast');
            });

            $('#done-check').click(function(){
                if($(this).is(':checked')){
                    // alert('it is checked');
                    $('#done-ok').fadeIn('fast');
                }else{
                    // alert('it is NOT checked');
                    $('#done-ok').fadeOut('fast');
                }
            });

            $('#done-ok').click(function(){
                finish();
            });

        })
    </script>

</body>
</html>