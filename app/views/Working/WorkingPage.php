<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/css/styling.css">
    <title>Paket <?=$_SESSION['paket_id']?> Nomor <?=$data['soal']->nomor?></title>
</head>
<body>
    <div>
        <div>
            <div><?=$data['soal']->nomor?></div>
            <div><?=$data['soal']->isi?></div>
        </div>
        <div>
            <?php foreach($data['pilihan'] as $pilihan): ?>
            <div class="pilihan" id="<?=$pilihan->poin?>">
                <div><?=$pilihan->poin?></div>
                <div><?=$pilihan->isi?></div>
            </div>
            <?php endforeach; ?>
        </div>
        <div>
            <input type="hidden" id="id_soal" name="_soal_id" value="<?=$data['soal']->id?>">
            <input type="hidden" id="nomor" name="_nomor" value="<?=$data['soal']->nomor?>">
            <input type="hidden" id="picked" name="_picked" value="">
            <input id="empty-btn" class="pilihan" type="button" name="empty" value="Kosongkan">
            <input id="continue-btn" type="button" name="submit" value="Selanjutnya">
            <input id="done-btn" type="button" name="done" value="Selesai">
            <div id="popup" class="hide">
                <form action="/mulai/finish" method="POST">
                    <input id="agree" type="checkbox" name="agreement" value="agreed"> Saya yakin untuk menyudahi ujian ini.
                    <input id="submit-popup"type="submit" name="done" value="Ok" disabled>
                    <input type="button" id="cancel-popup" value="Batal">
                </form>
            </div>
        </div>
    </div>
    <script>
        $(function(){

            $('.pilihan').on('click', function(){

                $('#continue-btn').prop('disabled', true);

                var picked;

                if($(this).attr('id') == 'empty-btn'){
                    picked = "";
                }else picked = $(this).attr('id');
                
                var nomor = $("#nomor").val();
                var soal_id = $("#id_soal").val();

                var answer = {
                    _soal_id: soal_id,
                    _nomor: nomor,
                    _picked: picked
                };

                $.ajax({
                    type: "POST",
                    url: "/mulai/store",
                    data: answer,
                    success: function(response){
                        $('#continue-btn').prop('disabled', false);
                    }
                });

            });

            $('#done-btn').on('click', function(){

                $("#popup").removeClass("hide");

            });

            $('#cancel-popup').on('click', function(){

                $("#popup").addClass("hide");

            });

            $('#agree').on('click', function(){

                if($('#agree').prop('checked')){
                    $('#submit-popup').prop('disabled', false);
                }else $('#submit-popup').prop('disabled', true);

            });

            $('#continue-btn').on('click', function(){

                var next_page = parseInt($('#nomor').val()) + 1;
                window.location = '/mulai/'+next_page;

            });

        });
    </script>
</body>
</html>