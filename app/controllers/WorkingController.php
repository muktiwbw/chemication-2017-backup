<?php

class WorkingController extends Controller{

    public function display_rules(){

        $this->open_session();

        $event_occured = $this->check_event($_SESSION['user']['user_session']);

        if($event_occured == null){
            header('Location: /ceo');
        }

        $useragent = $_SERVER['HTTP_USER_AGENT'];
        if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
        header('Location: /ceo/mobile-warning');

        $subject = null;
        
        switch ($event_occured) {
            case 'tryout':
                $subject = "Try Out";
                break;
    
            case 'penyisihan':
                $subject = "Penyisihan";
                break;
    
            default:
                $subject = "";
                break;
        }

        $this->view('Working/RulesPage', ['subject' => $subject]);

    }

    public function display_mobile_warning(){

        $this->view('Working/MobileSite');

    }

    public function display_workspace(){

        $this->open_session();
        
        $mlk = $this->model('LembarKerja');
        $c_paket_id = $mlk->only_where('paket_id', 'user_id = '.$_SESSION['user']['user_id'].' and paket_id <> 5'); // cari lembar kerja yang bukan tryout
        $temp_paket_id = $mlk->to_single_row($c_paket_id);
        $paket_id = $temp_paket_id->paket_id;
        $sesi_id = $_SESSION['user']['user_session'];
        
        $event_occured = $this->check_event($_SESSION['user']['user_session']);
        
        if($event_occured == 'tryout'){
            $paket_id = 5;
            $sesi_id = 1;
        }
        // elseif($event_occured == 'testing'){
        //     $paket_id = 5;
        // }
        
        $lk = $mlk->find('user_id = '.$_SESSION['user']['user_id'].' and paket_id = '.$paket_id);

        if($event_occured == null){
            header('Location: /ceo');
        }
        
        if($lk->finished != 0){
            header('Location: /ceo/profile');
        }

        if($lk->start_time == NULL){
            $mlk->update([
                'start_time' => date('Y-m-d H:i:s')
            ], 'id = '.$lk->id);
        }

        $updated_lk = $mlk->find('user_id = '.$_SESSION['user']['user_id'].' and paket_id = '.$paket_id);

        $workspace_content;
        $mlj = $this->model('LembarJawaban');
        $msoal = $this->model('Soal');
        $msesi = $this->model('Sesi');
        $lj = $mlj->where('lembar_kerja_id = '.$lk->id);
        $sesi = $msesi->find('id = '.$sesi_id);
        
        $absolute_end_time = $sesi->end_time;
        $relative_end_time = date('Y-m-d H:i:s', strtotime($updated_lk->start_time)+(2*60*60));

        $jumlah_soal = $msoal->count('paket_id = '.$paket_id);

        $nomor_terjawab = [];
        foreach($lj as $lembarjawaban){
            if($lembarjawaban->jawaban != NULL){
                $nomor_terjawab[] = $lembarjawaban->nomor;
            }
        }

        $workspace_content = [
            'lk_id' => $lk->id,
            'paket_id' => $paket_id,
            'jumlah_soal' => $jumlah_soal,
            'nomor_terjawab' => $nomor_terjawab,
            'end_time' => $absolute_end_time
        ];

        $this->view('Working/Workspace', $workspace_content);

    }

    public function store_lembar_jawab($request){

        $paket_id = $request->paket_id;
        $lk_id = $request->lk_id;
        $nomor = $request->nomor;
        $jawaban = $request->jawab; // berupa poin pilihan

        $mlj = $this->model('LembarJawaban');
        $msoal = $this->model('Soal');

        $soal = $msoal->find('paket_id = '.$paket_id.' and nomor = '.$nomor);
        $kunci = $soal->jawaban;

        $skor = ($jawaban == $kunci) ? 4 : -1;

        if($mlj->count('lembar_kerja_id = '.$lk_id.' and nomor = '.$nomor) <= 0){
            $mlj->create([
                'lembar_kerja_id' => $lk_id,
                'nomor' => $nomor,
                'jawaban' => $jawaban,
                'score' => $skor
            ]);
        }else{
            $mlj->update([
                'jawaban' => $jawaban
            ], 'lembar_kerja_id = '.$lk_id.' and nomor = '.$nomor);
            $mlj->update([
                'score' => $skor
            ], 'lembar_kerja_id = '.$lk_id.' and nomor = '.$nomor);
        }

        echo "success";

    }

    public function get_soal($request){

        $paket_id = $request[0];
        $nomor = $request[1];
        $jawaban = NULL;

        $msoal = $this->model('Soal');
        $mpilihan = $this->model('Pilihan');
        $mlj = $this->model('LembarJawaban');
        $mlk = $this->model('LembarKerja');

        $soal = $msoal->find('paket_id = '.$paket_id.' and nomor = '.$nomor);
        $pilihans = $mpilihan->where('soal_id = '.$soal->id);

        $this->open_session();
        $lk = $mlk->find('user_id = '.$_SESSION['user']['user_id'].' and paket_id = '.$paket_id);
        if($mlj->count('lembar_kerja_id = '.$lk->id.' and nomor = '.$nomor) > 0){
            $lj = $mlj->find('lembar_kerja_id = '.$lk->id.' and nomor = '.$nomor);
            $jawaban = $lj->jawaban;
        }

        echo json_encode([
            'soal' => $soal,
            'pilihans' => $pilihans,
            'jawaban' => $jawaban
        ]);

    }

    public function nullify_lembar_jawab($request){

        $lembar_kerja_id = $request->lk_id;
        $nomor = $request->nomor;

        $mlj = $this->model('LembarJawaban');

        $mlj->nullify('jawaban', 'lembar_kerja_id = '.$lembar_kerja_id.' and nomor = '.$nomor);
        
        $mlj->update([
            'score' => 0
        ], 'lembar_kerja_id = '.$lembar_kerja_id.' and nomor = '.$nomor);

    }

    public function finish($request){

        $lk_id = $request->lk_id;
        $jumlah_soal = $request->jumlah_soal;
        $end_time = $request->end_time;

        $mlk = $this->model('LembarKerja');
        $mlj = $this->model('LembarJawaban');

        $answered = [];

        $ljs = $mlj->where('lembar_kerja_id = '.$lk_id);

        foreach($ljs as $lj){
            $answered[] = $lj->nomor;
        }

        for($i=1; $i<=$jumlah_soal; $i++){
            if(!in_array($i, $answered)){
                $mlj->create([
                    'lembar_kerja_id' => $lk_id,
                    'nomor' => $i
                ]);
            }
        }

        $score = $mlj->sum('score', 'lembar_kerja_id = '.$lk_id);

        $mlk->update([
            'end_time' => $end_time
        ], 'id = '.$lk_id);

        $mlk->update([
            'finished' => 1
        ], 'id = '.$lk_id);
        
        $mlk->update([
            'score' => $score
        ], 'id = '.$lk_id);

    }

    public function get_soal_detail($request){

        /*
            soal (nomor, isi, jawaban) butuh: nomor, paket_id
            pilihan (poin, isi) butuh: soal_id
            lj (jawaban) butuh: lk_id, nomor

            solusi:
            1. ambil lembar kerja dari id lembar kerja id menggunakan id lembar jawab
            2. 
        */

        $lj_id = $request[0];

        $mlj = $this->model('LembarJawaban');
        $mlk = $this->model('LembarKerja');
        $msoal = $this->model('Soal');
        $mpilihan = $this->model('Pilihan');

        $lj = $mlj->find('id = '.$lj_id);
        $lj_lk_id = $lj->lembar_kerja_id;
        $lj_nomor = $lj->nomor;
        $lj_jawaban = $lj->jawaban;
        
        $lk = $mlk->find('id = '.$lj_lk_id);
        $lk_user_id = $lk->user_id;
        $lk_paket_id = $lk->paket_id;
        
        $soal = $msoal->find('paket_id = '.$lk_paket_id.' and nomor = '.$lj_nomor);
        $soal_id = $soal->id;
        $soal_isi = $soal->isi;
        $soal_gambar = $soal->gambar;
        $soal_jawaban = $soal->jawaban;
        
        $dijawab;
        $dijawab_isi;
        $dijawab_gambar;

        if($lj_jawaban != NULL){
            $dijawab = $mpilihan->find('soal_id = '.$soal_id.' and poin = \''.$lj_jawaban.'\'');
            $dijawab_isi = $dijawab->isi;
            $dijawab_gambar = $dijawab->gambar;
        }else{
            $dijawab_isi = NULL;
            $dijawab_gambar = NULL;
        }

        $jawaban = $mpilihan->find('soal_id = '.$soal_id.' and poin = \''.$soal_jawaban.'\'');
        $jawaban_isi = $jawaban->isi;
        $jawaban_gambar = $jawaban->gambar;

        $detail_view = [
            'no_soal' => $lj_nomor,
            'isi_soal_text' => $soal_isi,
            'isi_soal_gambar' => $soal_gambar,
            'dijawab_poin' => $lj_jawaban,
            'dijawab_isi' => $dijawab_isi,
            'dijawab_gambar' => $dijawab_gambar,
            'jawaban_poin' => $soal_jawaban,
            'jawaban_isi' => $jawaban_isi,
            'jawaban_gambar' => $jawaban_gambar,
        ];

        echo json_encode($detail_view);

    }

    public function display_finish_page(){
        $this->view('Working/FinishPage');
    }

    // ABANDONED CODE ZONE    

    public function display_problems($request){

        $this->open_session();
        if(!isset($_SESSION['user_id'])){
            header('Location: /login');
        }

        if(!isset($_SESSION['lembar_kerja_id']) && !isset($_SESSION['paket_id'])){
            header('Location: /');
        }

        $nomor_soal = $request[0];
        $paket_soal = $_SESSION['paket_id'];

        $soal = $this->model('Soal');
        $pilihan = $this->model('Pilihan');

        if($nomor_soal > $soal->max('nomor', "paket_id = '$paket_soal'")){
            header('Location: /mulai/1');
        }elseif($nomor_soal < 1){
            header('Location: /mulai/'.$soal->max('nomor', "paket_id = '$paket_soal'"));
        }

        $this_soal = $soal->find("paket_id = '$paket_soal' and nomor = '$nomor_soal'");
        $this_pilihan = $pilihan->where("soal_id = $this_soal->id");

        $data = [
            'soal' => $this_soal,
            'pilihan' => $this_pilihan
        ];

        $this->view('Working/WorkingPage', $data);

    }

    public function store_answer($request){

        // var_dump($request);

        $this->open_session();
        $id_soal = $request->_soal_id;
        // $nomor_soal = $request->_nomor;
        $picked = $request->_picked == "" ? "n" : $request->_picked;
        $lembar_kerja_id = $_SESSION['lembar_kerja_id'];
        $paket_id = $_SESSION['paket_id'];
        $skor = 0;

        // $lembarkerja = $this->model('LembarKerja');
        // $lk = $lembarkerja->find("id = $lembar_kerja_id");

        $soal = $this->model('Soal');
        $this_soal = $soal->find("id = $id_soal");

        $jawaban = $this_soal->jawaban;

        if($picked == $jawaban){
            $skor = 2;
        }elseif($picked != $jawaban){
            if($picked == "n"){
            $skor = 0;
            }else $skor = -1;
        }

        // echo $skor;
        $lembarjawaban = $this->model('LembarJawaban');

        $lj = $lembarjawaban->find("lembar_kerja_id = $lembar_kerja_id and soal_id = $id_soal");
        $lj_id = $lj->id;
        $lembarjawaban->update([
            'jawaban' => $picked
        ], "id = $lj_id");
        $lembarjawaban->update([
            'skor' => $skor
        ], "id = $lj_id");
        
        // header("Location: /mulai/$next");

    }

    public function store_finished_work($request){

        // var_dump($request);
        $this->open_session();
        $lembar_kerja_id = $_SESSION['lembar_kerja_id'];

        $lembarjawaban = $this->model('LembarJawaban');
        $sum_skor = $lembarjawaban->sum('skor', "lembar_kerja_id = $lembar_kerja_id");
        // $sum_skor = $lembarjawaban->where("lembar_kerja_id = $lembar_kerja_id");

        // echo $sum_skor;
         $laporan = $this->model('Laporan');
         $laporan->create([
            'user_id' => $_SESSION['user_id'],
            'paket_id' => $_SESSION['paket_id'],
            'skor' => $sum_skor
         ]);

         $_SESSION['has_finished'] = 1;

         header('Location: /');

    }   

}