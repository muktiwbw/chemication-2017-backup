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
    <title>Lembar Kerja Peserta</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Lembar Jawaban <?=$data['main_info']->paket_id == 5 ? 'Try Out' : 'Penyisihan'?></h1>
            </div>
        </div>
        <div class="row" style="margin-bottom:20px">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2" style="font-weight:bold">Username</div>
                    <div class="col-md-10">: <?=$data['main_info']->username?></div>
                </div>
                <div class="row">
                    <div class="col-md-2" style="font-weight:bold">Email</div>
                    <div class="col-md-10">: <?=$data['main_info']->email?></div>
                </div>
                <div class="row">
                    <div class="col-md-2" style="font-weight:bold">Region</div>
                    <div class="col-md-10">: <?=$data['main_info']->region_id?></div>
                </div>
                <div class="row">
                    <div class="col-md-2" style="font-weight:bold">Rayon</div>
                    <div class="col-md-10">: <?=$data['main_info']->rayon?></div>
                </div>
                <div class="row">
                    <div class="col-md-2" style="font-weight:bold">Sekolah</div>
                    <div class="col-md-10">: <?=$data['main_info']->sekolah?></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2" style="font-weight:bold">Mulai</div>
                    <div class="col-md-10">: <?=date('H:i:s', strtotime($data['main_info']->start_time))?></div>
                </div>
                <div class="row">
                    <div class="col-md-2" style="font-weight:bold">Selesai</div>
                    <div class="col-md-10">: <?=date('H:i:s', strtotime($data['main_info']->end_time))?></div>
                </div>
                <div class="row">
                    <div class="col-md-2" style="font-weight:bold">Skor</div>
                    <div class="col-md-10">: <?=$data['main_info']->score?></div>
                </div>
                <div class="row">
                    <div class="col-md-2" style="font-weight:bold">Salah</div>
                    <div class="col-md-10">: <?=$data['score_count'][0]?></div>
                </div>
                <div class="row">
                    <div class="col-md-2" style="font-weight:bold">Benar</div>
                    <div class="col-md-10">: <?=$data['score_count'][1]?></div>
                </div>
                <div class="row">
                    <div class="col-md-2" style="font-weight:bold">Kosong</div>
                    <div class="col-md-10">: <?=$data['score_count'][2]?></div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
                $pages = 4;
                $data_per_page = ceil(count($data['lembar_jawaban'])/$pages);
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
                        if (!isset($data['lembar_jawaban'][$j])) {
                            break;
                        }
                        $paginated_data[$i][] = $data['lembar_jawaban'][$j];
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
                    switch ($pd_data->score) {
                        case 4:
                            echo 'bg-success';
                            break;
                        case -1:
                            echo 'bg-danger';
                            break;
                    }
                    ?>" toggle-id="<?=$pd_data->id?>">
                        <td><?=$pd_data->nomor?></td>
                        <td><?php echo $pd_data->jawaban != null ? $pd_data->jawaban : '-' ?></td>
                        <td><?=$pd_data->score?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>