<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous">
    </script>
    <title>Edit Soal</title>
    <style>
        input.input-file{
            display: none;
        }
        label.mode-switch:hover{
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top:20px;">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <a class="btn btn-default" href="/admin/ceo/dashboard#type-<?php echo $data['soal']->paket_id == 5 ? 'tryout' : 'penyisihan'; ?>">Kembali</a>
                                <h1>Edit Soal <?php echo $data['soal']->paket_id == 5 ? 'Try Out' : 'Penyisihan'; ?> No. <?=$data['soal']->nomor?></h1>
                            </div>
                            <div id="edit-soal-section" class="col-md-12">
                                <form action="/admin/ceo/soal/update" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="soal_id" value="<?=$data['soal']->id?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="label-control mode-switch" switch-id="soal" switch-index="0" mode="text">Soal No. <?=$data['soal']->nomor?></label>
                                                        <?php if($data['soal']->gambar != null): ?>
                                                        <a href="/admin/ceo/soal/nullify/soal/<?=$data['soal']->id?>" class="text-danger"> (hapus)</a>
                                                        <br><img src="/<?=$data['soal']->gambar?>" alt="" class="img-responsive img-rounder img-thumbnail" style="height:150px;">
                                                        <?php elseif($data['soal']->isi != null): ?>
                                                        <a href="/admin/ceo/soal/nullify/soal/<?=$data['soal']->id?>" class="text-danger"> (hapus)</a>
                                                        <br><p><?=$data['soal']->isi?></p>
                                                        <?php else: ?>
                                                        <span status-id="soal"> (text mode)</span>
                                                        <textarea class="form-control input-textarea" name="textarea_0" cols="100" rows="5"><?php echo $data['soal']->isi == NULL ? '' : $data['soal']->isi; ?></textarea>
                                                        <input class="form-control input-file" type="file" name="image_0">
                                                        <input type="hidden" name="form-0" form-index="0" value="text/0">
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <?php $index = 1; ?>
                                                    <?php foreach($data['pilihan'] as $pilihan): ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="radio" name="jawaban" value="<?=$pilihan->poin?>" <?php echo ($pilihan->poin == $data['soal']->jawaban) ? 'checked' : ''; ?>> <label class="control-label mode-switch" switch-id="<?=$pilihan->poin?>" switch-index="<?=$index?>" mode="text" style="text-transform: uppercase;">Poin <?=$pilihan->poin?></label>
                                                                <?php if($pilihan->gambar != null): ?>
                                                                <br><img src="/<?=$pilihan->gambar?>" alt="" class="img-responsive img-rounder img-thumbnail" style="height:100px;">
                                                                <a href="/admin/ceo/soal/nullify/pilihan/<?=$pilihan->id?>" class="text-danger"> (hapus)</a>
                                                                <?php elseif($pilihan->isi != null): ?>
                                                                <br><p><?=$pilihan->isi?></p>
                                                                <a href="/admin/ceo/soal/nullify/pilihan/<?=$pilihan->id?>" class="text-danger"> (hapus)</a>
                                                                <?php else: ?>
                                                                <span status-id="<?=$pilihan->poin?>"> (text mode)</span>
                                                                <textarea class="form-control input-textarea" name="textarea_<?=$index?>" cols="100" rows="5"><?php echo $pilihan->isi == NULL ? '' : $pilihan->isi; ?></textarea>
                                                                <input class="form-control input-file" type="file" name="image_<?=$index?>">
                                                                <input type="hidden" name="form-<?=$index?>" form-index="<?=$index?>" value="text/<?=$index?>">
                                                                <?php $index++; ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input class="form-control btn btn-primary" type="submit" name="submit" value="Kirim">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
    <script>
        $(function(){
            
            $('#edit-soal-section').find('.mode-switch').click(function(){
                // alert($(this).attr('switch-id'));
                var switch_id = $(this).attr('switch-id');
                var switch_index = $(this).attr('switch-index');
                var mode = $(this).attr('mode');

                switch (mode) {
                    case 'text':
                        $('#edit-soal-section').find('textarea[name="textarea_'+switch_index+'"]').hide();
                        $('#edit-soal-section').find('input[name="image_'+switch_index+'"]').show();
                        $('#edit-soal-section').find('input[form-index="'+switch_index+'"]').val('image/'+switch_index);
                        $(this).attr('mode', 'image');
                        break;
                    
                    case 'image':
                        $('#edit-soal-section').find('input[name="image_'+switch_index+'"]').hide();
                        $('#edit-soal-section').find('textarea[name="textarea_'+switch_index+'"]').show();
                        $('#edit-soal-section').find('input[form-index="'+switch_index+'"]').val('text/'+switch_index);
                        $(this).attr('mode', 'text');
                        break;
                }

                $('span[status-id="'+switch_id+'"]').html(' ('+$(this).attr('mode')+' mode)');

            });

        })
    </script>
</body>
</html>