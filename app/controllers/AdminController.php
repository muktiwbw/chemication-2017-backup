<?php

// require_once('../app/packages/pdf/fpdf.php');

class AdminController extends Controller{

    public function display_admin_login_form(){

        $this->view('Admin/AdminLoginPage');

    }

    public function handle_admin_login($request){

        $username = $request->username;
        $password = $request->password;

        $admin = $this->model('Admin');

        if($admin->count("username = '$username'") > 0){
            $found_admin = $admin->find("username = '$username'");
            if(password_verify($password, $found_admin->password)){
                $this->open_session();
                session_destroy();
                $this->open_session();
                $_SESSION['admin']['id'] = $found_admin->id;
                $_SESSION['admin']['username'] = $found_admin->username;
                $_SESSION['admin']['login_attempt'] = date('Y-m-d h:i:s');

                echo 'success';
            }else{
                echo "failed";
            }
        }else{
            echo "failed";
        }

    }

    public function handle_admin_logout(){

        $this->open_session();

        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']['id']);
            unset($_SESSION['admin']['username']);
            unset($_SESSION['admin']['login_attempt']);
            session_destroy();
        }

        header('Location: /admin/ceo/portal');

    }

    public function display_dashboard(){

        $this->open_session();

        if(!isset($_SESSION['admin'])){
            header('location: /ceo');
        }

        $muser = $this->model('User');
        $msesi = $this->model('Sesi');
        $mlk = $this->model('LembarKerja');

        $testers = $muser->where('email like "tester%" order by username asc');
        $tester_data = [];

        foreach($testers as $tester){
            // MODIFIKASI DISINI PAS PENYISIHAN
            $lk = $mlk->find('user_id = '.$tester->id.' and paket_id = 5');

            $tester_email_exp = explode('@', $tester->email);
            $tester_data[] = [
                'id' => $tester->id,
                'username' => $tester->username,
                'email' => $tester->email,
                'password' => $tester_email_exp[0],
                'finished' => $lk->finished
            ];
        }

        $sesis = $msesi->all();

        $this->view('Admin/AdminDashboard', ['tester_data' => $tester_data, 'sesis' => $sesis]);

    }

    public function display_user_list($request){

        $offset = $request[0];
        $amount = $request[1];
        $filter = $request[2];
        $filter_query = '1';

        $user = $this->model('User');

        switch ($filter) {
            case 'row_registered':
                $filter_query = 'registered = 1';
                break;
            case 'row_submitted':
                $filter_query = 'registration_submission = 1 and registered = 0';
                break;
            case 'row_active':
                $filter_query = 'active = 1 and registration_submission = 0';
                break;
            case 'row_pending':
                $filter_query = 'active_request = 1 and active = 0';
                break;
            case 'row_nonactive':
                $filter_query = 'verified = 1 and active_request = 0';
                break;
            case 'row_nonactive':
                $filter_query = 'verified = 1 and active_request = 0';
                break;
            case 'row_unverified':
                $filter_query = 'verified = 0 and expired_at > now()';
                break;
            case 'row_expired':
                $filter_query = 'expired_at <= now() and verified = 0';
                break;
        }

        // $all_users = $user->where('email not like "tester%" and '.$filter_query.' order by username limit '.$offset.','.$amount);
        // $all_users_count = $user->count('email not like "tester%" and '.$filter_query);
        $all_users = $user->where($filter_query.' order by username limit '.$offset.','.$amount);
        $all_users_count = $user->count($filter_query);

        $data = [];

        foreach($all_users as $usr){
            $data_id = $usr->id;
            $data_username = $usr->username != null ? $usr->username : "";
            $data_email = $usr->email != null ? $usr->email : "";
            $data_region = $usr->region_id != null ? 'Region '.$usr->region_id : "";
            $data_rayon = $usr->rayon != null ? $usr->rayon : "";
            $data_sekolah = $usr->sekolah != null ? $usr->sekolah : "";
            
            $data_status = $this->getStatus($usr->active, $usr->verified, $usr->active_request, $usr->expired_at, $usr->registration_submission, $usr->registered);

            $data_created_at = $usr->created_at;
            $data_activated_at = $usr->activated_at != null ? $usr->activated_at : "";
            $data_expired_at = $usr->expired_at;

            $data[] = [
                'id' => $data_id,
                'username' => $data_username,
                'email' => $data_email,
                'region' => $data_region,
                'rayon' => $data_rayon,
                'sekolah' => $data_sekolah,
                'status' => $data_status,
                'created_at' => $data_created_at,
                'activated_at' => $data_activated_at,
                'expired_at' => $data_expired_at
            ];
        }

        $raw_data = [
            'main_data' => $data,
            'data_count' => $all_users_count
        ];

        $json_data = json_encode($raw_data);
        echo $json_data;

    }

    public function display_user_detail($request){

        $user_id = $request[0];
        $data;
        $new_username = "";
        $new_region = "";
        $new_rayon = "";
        $new_sekolah = "";
        $new_activated = "";

        $user = $this->model('User');
        $rayon = $this->model('Rayon');
        // $bio = $this->model('Bio');
        // $region = $this->model('Regional');

        $user_found = $user->find("id = '".$user_id."'");

        $status = $this->getStatus($user_found->active, $user_found->verified, $user_found->active_request, $user_found->expired_at, $user_found->registration_submission, $user_found->registered);
        $new_region = $user_found->region_id == null ? "" : 'Region '.$user_found->region_id;
        $new_rayon = $user_found->rayon == null ? "" : $user_found->rayon;
        $new_username = $user_found->username == null ? "" : $user_found->username;
        $new_sekolah = $user_found->sekolah == null ? "" : $user_found->sekolah;
        $new_activated = $user_found->activated_at == null ? "" : $user_found->activated_at;
        $verification_link = $this->baseUrl."/ceo/registrasi/verifikasi/".$user_found->id."/".$user_found->verification_token;

        $data = [
            'username' => $new_username,
            'email' => $user_found->email,
            'region' => $new_region,
            'rayon' => $new_rayon,
            'sekolah' => $new_sekolah,
            'status' => $status,
            'created' => $user_found->created_at,
            'activated' => $new_activated,
            'expired' => $user_found->expired_at,
            'verification_link' => $verification_link
        ];

        if($status == 'pending' || $status == 'active' || $status == 'submitted' || $status == 'registered'){

            $aktivasi = $this->model('Activation');

            $act = $aktivasi->find("user_id = '$user_found->id'");

            $activation_data = [
                'requested' => $act->created_at,
                'bukti_pembayaran' => $act->bukti_pembayaran
            ];

            /*
            Find the activation row from given id,
            push bukti pembayaran and created at*/
            $data['data_aktivasi'] = $activation_data;

            if($status == 'submitted' || $status == 'registered'){
                
                $peserta = $this->model('Peserta');

                $data['data_peserta'] = [];

                if($peserta->count("user_id = '".$user_id."'") > 0){

                    $psrt = $peserta->where("user_id = '".$user_id."' order by id asc");

                    foreach($psrt as $each_psrt){

                        $peserta_status = $each_psrt->peserta_status == 1 ? 'Ketua' : 'Anggota';

                        $data['data_peserta'][] = [
                            'id' => $each_psrt->id,
                            'user_id' => $each_psrt->user_id,
                            'peserta_status' => $peserta_status,
                            'nama' => $each_psrt->nama,
                            'nomor_telepon' => $each_psrt->nomor_telepon,
                            'lineid' => $each_psrt->lineid,
                            'email' => $each_psrt->email,
                            'kartu_pelajar' => $each_psrt->kartu_pelajar,
                            'foto_pelajar' => $each_psrt->foto_pelajar
                        ];

                    }

                }

            }
        }

        echo json_encode($data);

    }

    public function confirm_user_activation($request){

        if(isset($request->id)){
            // echo 'oke kita konfirm';
            $user_id = $request->id;

            $user = $this->model('User');
            // $lembarkerja = $this->model('LembarKerja');
            
            // var_dump($user_found);
            $user->update([
                'active' => 1
            ], "id = '$user_id'");

            $user->update([
                'activated_at' => date('Y:m:d h:i:s')
            ], "id = '$user_id'");
        }

    }

    public function confirm_user_registration($request){

        if(isset($request->id)){
            
            $user_id = $request->id;

            $user = $this->model('User');
            $lembarkerja = $this->model('LembarKerja');
            $region = $this->model('Region');

            $found_user = $user->find("id = '".$user_id."'");
            $region_id = $found_user->region_id;
            $user_region = $region->find("id = '".$region_id."'");
            $region_code = $user_region->kode;
            $unique_code = strlen($found_user->price) < 6 ? '0'.$found_user->price : $found_user->price; 

            $new_username = $region_code.'17'.$unique_code;
            
            $user->update([
                'registered' => 1
            ], "id = '$user_id'");

            $user->update([
                'registered_at' => date('Y:m:d h:i:s')
            ], "id = '$user_id'");

            $user->update([
                'username' => $new_username
            ], "id = '$user_id'");

            $gen_paket = rand(1,4);
            $lembarkerja->create([
                'user_id' => $user_id,
                'paket_id' => $gen_paket
            ]);
            $lembarkerja->create([
                'user_id' => $user_id,
                'paket_id' => 5
            ]);
        }

    }

    public function reset_user_status($request){

        $user_id = $request->id;
        $reset = $request->reset;

        $user = $this->model('User');
        $activation = $this->model('Activation');
        $peserta = $this->model('Peserta');


        if($reset == 'activation'){

            if($user->count("id = '".$user_id."'") > 0){

                $user->update([
                    'registered' => 0
                ], "id = '".$user_id."'");

                $user->update([
                    'registration_submission' => 0
                ], "id = '".$user_id."'");

                $user->update([
                    'active' => 0
                ], "id = '".$user_id."'");

                $user->update([
                    'active_request' => 0
                ], "id = '".$user_id."'");

                $act = $activation->find("user_id = '".$user_id."'");
                $activation_id = $act->id;
                $bukti_pembayaran = $act->bukti_pembayaran;
                
                if(file_exists($bukti_pembayaran)){
                    
                    unlink($bukti_pembayaran);
                    $activation->delete("id = '".$activation_id."'");
                
                }

            }

        }elseif($reset == 'registration'){

            if($user->count("id = '".$user_id."'") > 0){

                $user->update([
                    'registered' => 0
                ], "id = '".$user_id."'");

                $user->update([
                    'registration_submission' => 0
                ], "id = '".$user_id."'");

                $user->nullify('region_id', "id = '".$user_id."'");

                $user->nullify('rayon', "id = '".$user_id."'");

                $user->nullify('sekolah', "id = '".$user_id."'");

                if($peserta->count("user_id = '".$user_id."'") > 0){
                    
                    $participants = $peserta->where("user_id = '".$user_id."'");

                    foreach($participants as $participant){

                        if(file_exists($participant->kartu_pelajar)){
                    
                            unlink($participant->kartu_pelajar);
                
                        }

                        if(file_exists($participant->foto_pelajar)){
                    
                            unlink($participant->foto_pelajar);
                
                        }

                        $peserta->delete("id = '".$participant->id."'");

                    }

                }
                

            }

        }

    }

    public function delete_user($request){

        $user_id = $request->id;

        $user = $this->model('User');
        $peserta = $this->model('Peserta');
        $activation = $this->model('Activation');
        $lembarkerja = $this->model('LembarKerja');
        $lembarjawaban = $this->model('LembarJawaban');

        if($user->count("id = '".$user_id."'") > 0){

            $found_user = $user->find("id = '".$user_id."'");

            if($peserta->count("user_id = '".$user_id."'")){

                $participants = $peserta->where("user_id = '".$user_id."'");

                foreach($participants as $participant){

                    $kartu_pelajar = $participant->kartu_pelajar;
                    $foto_pelajar = $participant->foto_pelajar;

                    if($found_user->region_id != 7 && $kartu_pelajar != null && $kartu_pelajar != ""){
                        if(file_exists($kartu_pelajar)) unlink($kartu_pelajar);
                    }

                    if($found_user->region_id != 7 && $foto_pelajar != null && $foto_pelajar != ""){
                        if(file_exists($foto_pelajar)) unlink($foto_pelajar);
                    }

                    $peserta->delete("id = '".$participant->id."'");

                }

            }

            $lks = $lembarkerja->where("user_id = '".$user_id."'");
            foreach($lks as $lk){
                if($lembarjawaban->count("lembar_kerja_id = '".$lk->id."'") > 0){
                    $lembarjawaban->delete("lembar_kerja_id = '".$lk->id."'");
                }
            }

            if($lembarkerja->count("user_id = '".$user_id."'") > 0){

                $lembarkerja->delete("user_id = '".$user_id."'");

            }

            if($activation->count("user_id = '".$user_id."'") > 0){

                $found_activation = $activation->find("user_id = '".$user_id."'");

                $bukti_pembayaran = $found_activation->bukti_pembayaran;

                if($found_user->region_id != 7 && $bukti_pembayaran != null && $bukti_pembayaran != ""){
                    if(file_exists($bukti_pembayaran)) unlink($bukti_pembayaran);
                }

                $activation->delete("id = '".$found_activation->id."'");

            }

            $user->delete("id = '".$user_id."'");
            
        }

    }

    public function list_soal($request){

        $data_soal = [];
        $data_view = '';

        $paket_id = $request[0];
        $msoal = $this->model('Soal');
        $mpilihan = $this->model('Pilihan');

        if($msoal->count('paket_id = '.$paket_id) > 0){

            $soals = $msoal->where('paket_id = '.$paket_id.' order by nomor asc');
    
            foreach($soals as $soal){
    
                $soal_id = $soal->id;
                $pilihans = $mpilihan->where('soal_id = '.$soal_id.' order by poin asc');
    
                $data_pilihan = [];
                
                foreach($pilihans as $pilihan){
    
                    $data_pilihan[] = [
                        'id' => $pilihan->id,
                        'soal_id' => $pilihan->soal_id,
                        'poin' => $pilihan->poin,
                        'isi' => $pilihan->isi,
                        'gambar' => $pilihan->gambar
                    ];
                    
                }
    
                $data_soal[] = [
                    'id' => $soal_id,
                    'paket_id' => $paket_id,
                    'nomor' => $soal->nomor,
                    'isi' => $soal->isi,
                    'gambar' => $soal->gambar,
                    'jawaban' => $soal->jawaban,
                    'pilihan' => $data_pilihan
                ];
    
            }

            $data_view = json_encode($data_soal);
        
        }

        echo $data_view;

    }

    public function edit_soal($request){

        $paket_id = $request[0];
        $nomor = $request[1];

        $msoal = $this->model('Soal');
        $mpilihan = $this->model('Pilihan');

        $soal = $msoal->find('paket_id = '.$paket_id.' and nomor = '.$nomor);
        $soal_id = $soal->id;
        $pilihans = $mpilihan->where('soal_id = '.$soal_id.' order by poin asc');

        $data = [
            'soal' => $soal,
            'pilihan' => $pilihans
        ];

        $this->view('Admin/AdminEditSoal', $data);

    }

    public function update_soal($request){

        $images_submitted = [];
        $text_submitted = [];

        $soal_id = $request->soal_id;
        $msoal = $this->model('Soal');
        $mpilihan = $this->model('Pilihan');

        $soal = $msoal->find('id = '.$soal_id);

        // Perbaiki di view, tambahin hidden di setiap input dengan value "type/index". (Contoh: "image/0", "text/1")
        // Di controller dipisah menggunakan explode()
        // Pisahkan image dan text dalam masing2 array_submitted dengan element index dan konten
        // Lanjutkan...

        $arr_request = (array) $request;

        for($i=0; $i<6; $i++){

            if(isset($arr_request['form-'.$i])){

                $hidden_vals = explode('/', $arr_request['form-'.$i]);
    
                switch ($hidden_vals[0]) {
                    case 'image':
                        $images_submitted[] = [
                            'index' => $hidden_vals[1],
                            'file' => $_FILES['image_'.$i]
                        ];
                        break;
                    case 'text':
                        $text_submitted[] = [
                            'index' => $hidden_vals[1],
                            'text' => $arr_request['textarea_'.$i]
                        ];
                        break;
                }

            }

        }

        if(count($images_submitted) > 0){

            foreach($images_submitted as $img){

                if($img['index'] > 0){
                    $pilihan_poin;
                    switch ($img['index']) {
                        case 1:
                            $pilihan_poin = 'a';
                            break;
                        case 2:
                            $pilihan_poin = 'b';
                            break;
                        case 3:
                            $pilihan_poin = 'c';
                            break;
                        case 4:
                            $pilihan_poin = 'd';
                            break;
                        case 5:
                            $pilihan_poin = 'e';
                            break;
                    }
                    $pilihan = $mpilihan->find('soal_id = '.$soal_id.' and poin = "'.$pilihan_poin.'"');
                    $pilihan_id = $pilihan->id;
                    $full_path = 'img/uploaded_files/lembar_kerja/pilihan_ganda/'.$pilihan_id.'.'.pathinfo($img['file']['name'], PATHINFO_EXTENSION);
                    if($this->validate_uploaded_file($img['file'])){
                        if($pilihan->gambar != NULL && $pilihan->gambar != ""){
                            if(file_exists($pilihan->gambar)) unlink($pilihan->gambar);
                        }
                        $this->upload($img['file'], $full_path);
                    }
                    $mpilihan->update([
                        'gambar' => $full_path
                    ], 'id = '.$pilihan_id);
                }else{
                    $full_path = 'img/uploaded_files/lembar_kerja/soal/'.$soal_id.'.'.pathinfo($img['file']['name'], PATHINFO_EXTENSION);
                    if($this->validate_uploaded_file($img['file'])){
                        if($soal->gambar != NULL && $soal->gambar != ""){
                            if(file_exists($soal->gambar)) unlink($soal->gambar);
                        }
                        $this->upload($img['file'], $full_path);
                    }
                    $msoal->update([
                        'gambar' => $full_path
                    ], 'id = '.$soal_id);
                }

            }

        }

        if(count($text_submitted) > 0){

            foreach($text_submitted as $txt){

                if($txt['index'] > 0){

                    // pilihan
                    $pilihan_poin;
                    switch ($txt['index']) {
                        case 1:
                            $pilihan_poin = 'a';
                            break;
                        case 2:
                            $pilihan_poin = 'b';
                            break;
                        case 3:
                            $pilihan_poin = 'c';
                            break;
                        case 4:
                            $pilihan_poin = 'd';
                            break;
                        case 5:
                            $pilihan_poin = 'e';
                            break;
                    }
                    $pilihan = $mpilihan->find('soal_id = '.$soal_id.' and poin = "'.$pilihan_poin.'"');
                    $pilihan_id = $pilihan->id;

                    $mpilihan->update([
                        'isi' => $txt['text']
                    ], 'id = '.$pilihan_id);

                }else{
                    // soal
                    $msoal->update([
                        'isi' => $txt['text']
                    ], 'id = '.$soal_id);
                }

            }

        }

        if(($request->jawaban != $soal->jawaban) || (!isset($request->jawaban)) || ($request->jawaban == "")){
            $new_jawaban = (!isset($request->jawaban) || $request->jawaban == "") ? 'a' : $request->jawaban;
            $msoal->update([
                'jawaban' => $new_jawaban
            ], 'id = '.$soal_id);
        }

        $url_fragment = $soal->paket_id == 5 ? 'tryout' : 'penyisihan';

        header('Location: /admin/ceo/dashboard#type-'.$url_fragment);
        
    }
    
    public function nullify_soal($request){
        
        $type = $request[0];
        $subject_id = $request[1];
        $model;
        $paket_id;
        $nomor;
        
        switch ($type) {
            case 'soal':
            $model = 'Soal';
            break;
            
            case 'pilihan':
            $model = 'Pilihan';
            break;
        }
        
        $msubject = $this->model($model);
        $subject = $msubject->find('id = '.$subject_id);
        
        if($subject->isi != null){
            $msubject->nullify('isi', 'id = '.$subject_id);
        }
        
        if($subject->gambar != null){
            if($subject->gambar != NULL && $subject->gambar != ""){
                if(file_exists($subject->gambar)) unlink($subject->gambar);
            }
            $msubject->nullify('gambar', 'id = '.$subject_id);
        }
        
        switch ($type) {
            case 'soal':
                $paket_id = $subject->paket_id;
                $nomor = $subject->nomor;
                break;
                
            case 'pilihan':
                $msoal = $this->model('Soal');
                $soal = $msoal->find('id = '.$subject->soal_id);
                $paket_id = $soal->paket_id;
                $nomor = $soal->nomor;
                break;
        }

        header('Location: /admin/ceo/soal/edit/'.$paket_id.'/'.$nomor);
        
    }

    public function generate_soal($request){

        $paket_id = $request[0];
        $soal_count = $paket_id == 5 ? 50 : 90;

        $msoal = $this->model('Soal');
        $mpilihan = $this->model('Pilihan');

        if($msoal->count('paket_id = '.$paket_id) > 0){
            header('Location: /admin/ceo/dashboard#soal');
        }else{
            for($i=1; $i<=$soal_count; $i++){
                $msoal->create([
                    'paket_id' => $paket_id,
                    'nomor' => $i,
                    'jawaban' => 'a'
                    ]);

                $soal = $msoal->find('paket_id = '.$paket_id.' and nomor = '.$i);
                $soal_id = $soal->id;

                for($j=0; $j<5; $j++){
                    $pilihan_poin;
                    switch ($j) {
                        case 0:
                            $pilihan_poin = 'a';
                            break;
                        case 1:
                            $pilihan_poin = 'b';
                            break;
                        case 2:
                            $pilihan_poin = 'c';
                            break;
                        case 3:
                            $pilihan_poin = 'd';
                            break;
                        case 4:
                            $pilihan_poin = 'e';
                            break;
                    }

                    $mpilihan->create([
                        'soal_id' => $soal_id,
                        'poin' => $pilihan_poin
                    ]);

                }
            }
                
            header('Location: /admin/ceo/dashboard#soal');
        }

    }

    public function generate_paket_penyisihan(){

        $msoal = $this->model('Soal');
        $mpilihan = $this->model('Pilihan');
        $soal_masters = (array) $msoal->where('paket_id = 1 order by nomor');
        $nomor_count = 90;
        
        $ranges = [
            [
                'start' => 1,
                'end' => 30
            ],
            [
                'start' => 31,
                'end' => 55
            ],
            [
                'start' => 56,
                'end' => 80
            ],
            [
                'start' => 81,
                'end' => 90
            ]
        ];

        // loop 2 hingga 4 karena ada 4 paket penyisihan
        for($i=2; $i<=4; $i++){
        
            if($msoal->count('paket_id = '.$i) <= 0){
            
                $nomor_pool = [];
                
                foreach($ranges as $range){
                    for($j=$range['start']; $j<=$range['end']; $j++){
                        $rand = mt_rand($range['start'], $range['end']);
                        while(in_array($rand, $nomor_pool)){
                            $rand = mt_rand($range['start'], $range['end']);
                        }
                        $nomor_pool[] = $rand;
                    }
                }

                for($j=1; $j<=$nomor_count; $j++){
                    // echo $nomor_pool[$j-1].'<br>';
                    $msoal->create([
                        'paket_id' => $i,
                        'nomor' => $j,
                        'jawaban' => $soal_masters[$nomor_pool[$j-1]-1]->jawaban
                    ]);

                    if($soal_masters[$nomor_pool[$j-1]-1]->isi != null){
                        $msoal->update([
                            'isi' => $soal_masters[$nomor_pool[$j-1]-1]->isi
                        ], 'paket_id = '.$i.' and nomor = '.$j);
                    }

                    if($soal_masters[$nomor_pool[$j-1]-1]->gambar != null){
                        $msoal->update([
                            'gambar' => $soal_masters[$nomor_pool[$j-1]-1]->gambar
                        ], 'paket_id = '.$i.' and nomor = '.$j);
                    }

                    $new_soal = $msoal->find('paket_id = '.$i.' and nomor = '.$j);

                    $pilihan_masters = $mpilihan->where('soal_id = '.$soal_masters[$nomor_pool[$j-1]-1]->id.' order by poin');
                    
                    foreach($pilihan_masters as $pilihan_master){
                        $mpilihan->create([
                            'soal_id' => $new_soal->id,
                            'poin' => $pilihan_master->poin
                        ]);

                        if($pilihan_master->isi != null){
                            $mpilihan->update([
                                'isi' => $pilihan_master->isi
                            ], 'soal_id = '.$new_soal->id.' and poin = \''.$pilihan_master->poin.'\'');
                        }

                        if($pilihan_master->gambar != null){
                            $mpilihan->update([
                                'gambar' => $pilihan_master->gambar
                            ], 'soal_id = '.$new_soal->id.' and poin = \''.$pilihan_master->poin.'\'');
                        }
                    }
                }
                
            }

        }

        header('Location: /admin/ceo/dashboard#settings');

    }

    public function rollback_generate_paket_penyisihan(){
        $msoal = $this->model('Soal');
        $mpilihan = $this->model('Pilihan');
        for($i=2; $i<=4; $i++){
            if($msoal->count('paket_id = '.$i) > 0){
                $soals = $msoal->where('paket_id = '.$i.' order by nomor');
                foreach($soals as $soal){
                    $mpilihan->delete('soal_id = '.$soal->id);
                }
                $msoal->delete('paket_id = '.$i);
            }
        }

        header('Location: /admin/ceo/dashboard#settings');
        
    }

    public function make_tester($request){

        $email = $request->email;
        $muser = $this->model('User');
        $response = 'null';

        if($muser->count('email = "'.$email.'"') == 1){
            $muser->update(['region_id' => 7], 'email = "'.$email.'"');
            $response = 'success';
        }

        echo $response;

    }

    public function add_lk_to(){

        $muser = $this->model('User');
        $mlk = $this->model('LembarKerja');

        $users = $muser->where('registered = 1 and region_id <> 7');

        foreach($users as $user){
            if($mlk->count('user_id = '.$user->id.' and paket_id = 5') == 0){
                $mlk->create([
                    'user_id' => $user->id,
                    'paket_id' => 5
                ]);
            }
        }

        header('Location: /admin/ceo/dashboard#settings');

    }

    public function create_tester($request){

        if(is_numeric($request[0])){

            $muser = $this->model('User');
            $maktivasi = $this->model('Activation');
            $mpeserta = $this->model('Peserta');
            $mlk = $this->model('LembarKerja');
            
            for($i=0; $i<$request[0]; $i++){
        
                $tester_email;
                $latest_tester;
                $tester_count = $muser->count('email like "tester%"');
                
                if($tester_count == 0){
                    $tester_email = 'tester001';
                }else{
                    $latest_tester = $muser->find('email like "tester%" order by email desc limit 1');
                    $email_exp = explode('@', $latest_tester->email);
                    $new_tester_num = (intval(str_replace('tester', '', $email_exp[0])))+1;
                    $zeros = '';
                    if($new_tester_num > 0 && $new_tester_num < 10){
                        $zeros = '00';
                    }elseif($new_tester_num >= 10 && $new_tester_num < 100){
                        $zeros = '0';
                    }
                    $tester_email = 'tester'.$zeros.$new_tester_num;
                }
        
                $email = $tester_email.'@ceo.com';
                $password = password_hash($tester_email, PASSWORD_DEFAULT);
                
                $verification_token = rand(10000000, 99999999).rand(10000000, 99999999);
        
                if($muser->count("email = '$email'") <= 0){
                    $unique_code = $muser->max('unique_code', "verified = 1") + 1;
                    $price = 120000 + $unique_code;
                    $unique_num = strlen($price) < 6 ? '0'.$price : $price;
                    $new_username = '9717'.$unique_num;
        
                    $muser->create([
                        'email' => $email,
                        'password' => $password,
                        'created_at' => date('Y-m-d h:i:s'),
                        'expired_at' => date('Y-m-d h:i:s', time()+(60*60*24*7)),
                        'verification_token' => $verification_token,
                        'verified' => 1,
                        'unique_code' => $unique_code,
                        'price' => $price,
                        'active_request' => 1,
                        'active' => 1,
                        'activated_at' => date('Y:m:d h:i:s'),
                        'region_id' => 7,
                        'rayon' => 'HIMATEKK',
                        'sekolah' => 'UPN "Veteran" Jawa Timur',
                        'registration_submission' => 1,
                        'registered' => 1,
                        'registered_at' => date('Y:m:d h:i:s'),
                        'username' => $new_username
                    ]);
        
                    $user_id = $muser->get_id('email', $email);
        
                    $maktivasi->create([
                        'user_id' => $user_id,
                        'bukti_pembayaran' => 'img/uploaded_files/admin/tester/ceo.jpg'
                    ]);
        
                    $mpeserta->create([
                        'user_id' => $user_id,
                        'peserta_status' => 1,
                        'nama' => 'Panitia CEO',
                        'nomor_telepon' => '081234567890',
                        'lineid' => 'panitiaceo',
                        'email' => $email,
                        'kartu_pelajar' => 'img/uploaded_files/admin/tester/ceo.jpg',
                        'foto_pelajar' => 'img/uploaded_files/admin/tester/ceo.jpg'
                    ]);
        
                    $gen_paket = rand(1,4);
        
                    $mlk->create([
                        'user_id' => $user_id,
                        'paket_id' => $gen_paket
                    ]);
        
                    $mlk->create([
                        'user_id' => $user_id,
                        'paket_id' => 5
                    ]);
                    
                }

            }
            
        }

        header('Location: /admin/ceo/dashboard#settings');
        
    }
    
    public function delete_tester($request){
        
        $obj = (object) ['id' => $request[0]];
        $this->delete_user($obj);

        header('Location: /admin/ceo/dashboard#settings');

    }

    public function update_sesi($request){

        $msesi = $this->model('Sesi');

        $sesi = $msesi->find('id = '.$_GET['sesi']);

        if(isset($_GET['start_time']) && $_GET['start_time'] != '' && $sesi->start_time != $_GET['start_time']){
            $msesi->update([
                'start_time' => $_GET['start_time']
            ], 'id = '.$_GET['sesi']);
        }

        if(isset($_GET['end_time']) && $_GET['end_time'] != '' && $sesi->end_time != $_GET['end_time']){
            $msesi->update([
                'end_time' => $_GET['end_time']
            ], 'id = '.$_GET['sesi']);
        }
        
        header('Location: /admin/ceo/dashboard#settings');

    }

    public function rollback_lembar_kerja($request){
        $tester_id = $request[0];
        $paket_id = $request[1];
        $user_status = $request[2];

        $mlk = $this->model('LembarKerja');
        $mlj = $this->model('LembarJawaban');

        $lk = $mlk->find('user_id = '.$tester_id.' and paket_id = '.$paket_id);

        $mlk->update([
            'finished' => 0
        ], 'user_id = '.$tester_id.' and paket_id = '.$paket_id); // Ini khusus untuk Try Out

        $mlk->nullify('start_time', 'user_id = '.$tester_id.' and paket_id = '.$paket_id);
        $mlk->nullify('end_time', 'user_id = '.$tester_id.' and paket_id = '.$paket_id);

        if($user_status == 'tester'){
            $mlj->delete('lembar_kerja_id = '.$lk->id);
        }

        $hash = $user_status == 'tester' ? 'settings' : 'lembar-jawaban';
        header('Location: /admin/ceo/dashboard#'.$hash);
    }

    public function display_lembar_kerja_list($request){

        $type = $request[0];
        $order = $request[1];
        $order_type = $request[2];
        $type_query = $type == 'tryout' ? '= 5' : '<> 5';
        $order_table = 'u';

        if($order == 'score'){
            $order_table = 'k';
        }

        $muser = $this->model('User');
        // $mlk = $this->model('LembarKerja');

        $userlkjoins = (array) $muser->get_me(
            'select u.id, u.username, u.email, u.region_id, u.rayon, u.sekolah, k.paket_id, k.start_time, k.end_time, k.finished, k.score from user u inner join lembar_kerja k on u.id = k.user_id where u.registered = 1 and u.region_id <> 7 and k.paket_id '.$type_query.' order by '.$order_table.'.'.$order.' '.$order_type
        );

        $userlkdata = [];

        foreach($userlkjoins as $userlkjoin){

            $status = $userlkjoin->finished == 1 ? 'Selesai' : 'Belum Selesai';

            $userlkdata[] = [
                'id' => $userlkjoin->id,
                'username' => $userlkjoin->username,
                'email' => $userlkjoin->email,
                'region' => $userlkjoin->region_id,
                'rayon' => $userlkjoin->rayon,
                'sekolah' => $userlkjoin->sekolah,
                'paket' => $userlkjoin->paket_id,
                'start' => $userlkjoin->start_time != null ? date('d F Y, H:i:s', strtotime($userlkjoin->start_time)) : '-',
                'end' => $userlkjoin->end_time != null ? date('d F Y, H:i:s', strtotime($userlkjoin->end_time)) : '-',
                'status' => $status,
                'score' => $userlkjoin->score
            ];

        }

        // echo '<pre>';
        // var_dump($userlkjoins);
        echo json_encode($userlkdata);

    }

    public function view_lembar_kerja($request){
        $user_id = $request[0];
        $paket_id = $request[1];

        $muser = $this->model('User');
        $mlk = $this->model('LembarKerja');
        $mlj = $this->model('LembarJawaban');

        $lk = $mlk->find('user_id = '.$user_id.' and paket_id = '.$paket_id);

        $main_info = (array) $muser->get_me(
            'select u.username, u.email, u.region_id, u.rayon, u.sekolah, k.paket_id, k.start_time, k.end_time, k.score from user u inner join lembar_kerja k on u.id = k.user_id where k.id = '.$lk->id
        );

        $ljs = (array) $mlj->where('lembar_kerja_id = '.$lk->id.' order by nomor asc');
        $lj_salah = $mlj->count('lembar_kerja_id = '.$lk->id.' and score = -1');
        $lj_benar = $mlj->count('lembar_kerja_id = '.$lk->id.' and score = 4');
        $lj_kosong = $mlj->count('lembar_kerja_id = '.$lk->id.' and score = 0');

        $this->view('Admin/AdminViewLembarKerja', ['main_info' => $main_info[0], 'lembar_jawaban' => $ljs, 'score_count' => [$lj_salah, $lj_benar, $lj_kosong]]);
    }

    //////////////////// TESTING PURPOSE /////////////////////////////////

    public function isi_soal_penyisihan(){
        $msoal = $this->model('Soal');
        $mpilihan = $this->model('Pilihan');

        $soals = $msoal->where('paket_id = 1 order by nomor asc');

        $index = 1;
        foreach($soals as $soal){
            $soal_id = $soal->id;

            $msoal->update([
                'isi' => 'Pilihan '.$index
            ]
            , 'id = '.$soal_id);

            $pilihans = $mpilihan->where('soal_id = '.$soal_id);

            foreach($pilihans as $pilihan){
                $mpilihan->update([
                    'isi' => 'Pilihan '.$index
                ]
                , 'soal_id = '.$soal_id);
            }

            $index++;
        }
    }

    public function bukti_lolos($request){
        
        $user_id = $request[0];

        $this->open_session();

        if(!isset($_SESSION['user']) || $_SESSION['user']['user_id'] != $user_id){
            header('Location: /ceo');
        }
        
        // echo $user_id;
        $muser = $this->model('User');
        $mpeserta = $this->model('Peserta');

        $user = $muser->find('id = '.$user_id);
        $pesertas = (array) $mpeserta->where('user_id = '.$user_id.' order by peserta_status desc');
        $ketua = $mpeserta->find('user_id = '.$user_id.' and peserta_status = 1');

        $bg = 'https://www.chemication.com/img/contents/ceo.jpg';
        // $foto1 = 'https://4.bp.blogspot.com/-f58kcBj1q9Q/Vw8FQhb5FtI/AAAAAAAAAzM/yZGtnwvsBmkJXa7XVYiglw3X5AjKxHmwgCLcB/s1600/1.JPG';
        // $foto1 = 'http://dct.kpu.go.id/images/foto/foto%20lama%20DPD/74.%20SULTRA/28.%20DSC_8003%204x6-10.jpg';
        $picsize = 40;
        $picheight = 60;
        $picmarginleft = 20;
        $picmarginright = 5;
        $bgmarginbottom = 10;
        
        require_once('../app/packages/pdf/alphapdf.php');
        // require_once('../app/packages/pdf/fpdf.php');
        // // $pdf = new FPDF();
        $pdf = new AlphaPDF();
        $pdf->SetTitle('kartu_lolos_penyisihan');
        $pdf->SetMargins(20, 30);
        $pdf->AddPage();
        $pdf->SetAlpha(0.4);
        $pdf->Image($bg, $pdf->GetX(), $pdf->GetX() + $bgmarginbottom);
        $pdf->SetAlpha(1);
        $pdf->SetFont('Times','B',16);
        $pdf->Cell('',7,'KARTU LOLOS PENYISIHAN', '', '1', 'C');
        $pdf->Ln();
        $pdf->SetFont('Times','',12);
        $pdf->MultiCell('', 7, '        Selamat, tim anda berhasil lolos pada tahap penyisihan CEO 2017. Peserta yang lolos tahap ini diharapkan untuk mencetak kartu ini dan membawanya pada saat pelaksanaan olimpiade tahap selanjutnya.', '', 'J');
        $pdf->Ln();
        $pdf->SetFont('Times','B',12);
        $pdf->Cell('',7,'Data Peserta', 'B', '1');
        $pdf->SetFont('Times','',12);
        $pdf->Cell(30,7,'Username');
        $pdf->Cell(30,7,': '.$user->username, '', '1');
        $pdf->Cell(30,7,'Email');
        $pdf->Cell(30,7,': '.$user->email, '', '1');
        $pdf->Cell(30,7,'Sekolah');
        $pdf->Cell(30,7,': '.$user->sekolah, '', '1');
        $pdf->Cell(30,7,'Rayon');
        $pdf->Cell(30,7,': '.$user->rayon, '', '1');
        $pdf->Cell(30,7,'Anggota');
        foreach($pesertas as $peserta){
            if($peserta->peserta_status == 0){
                $pdf->Cell(30,7,'');
            }
            $pdf->Cell(30,7,': '.$peserta->nama, '', '1');
        }
        $pdf->Ln();
        $pdf->SetFont('Times','B',12);
        $pdf->Cell('',7,'Data Anggota', 'B', '1');
        $pdf->Ln();
        $pdf->SetX($pdf->GetX() + $picmarginleft);
        for($i=0; $i<count($pesertas); $i++){
            if($i<count($pesertas) - 1){
                $x = $pdf->GetX();
                $y = $pdf->GetY();
                $pdf->MultiCell($picsize,7, $pesertas[$i]->nama, '', 'C');
                $pdf->SetXY($x+$picsize, $y);
                $pdf->Cell($picmarginright,14,'');
            }else{
                $pdf->MultiCell($picsize,7, $pesertas[$i]->nama, '', 'C');
            }
        }
        // $pdf->Cell($picsize,7,'Taufik Al Hakim', '', '', 'C');
        // $pdf->Cell($picmarginright,7,'');
        $pdf->SetX($pdf->GetX() + $picmarginleft);
        foreach($pesertas as $peserta){
            $pdf->Image(preg_replace("/ /", "%20", 'https://www.chemication.com/'.$peserta->foto_pelajar), $pdf->GetX(), $pdf->GetY(), $picsize);
            $pdf->SetX($pdf->GetX() + $picsize + $picmarginright);
        }
        // $pdf->Image($foto1, $pdf->GetX(), $pdf->GetY(), $picsize);
        // $pdf->SetX($pdf->GetX() + $picsize + $picmarginright);
        // $pdf->Image($foto1, $pdf->GetX(), $pdf->GetY(), $picsize);
        // $pdf->SetX($pdf->GetX() + $picsize + $picmarginright);
        // $pdf->Cell($picsize, $picheight, '', 1);
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->SetFont('Times','',12);
        $pdf->Cell('', '', 'Terima kasih telah berpartisipasi dalam olimpiade ini. Salam Chemication.');
        // $pdf->Image($foto1, $pdf->GetX() + $picsize*2 + $picmarginright, $pdf->GetY(), $picsize);
        $pdf->Output();

    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    // ABANDONED CODE!!! /////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////

    public function display_problem_list(){

        $this->open_session();
        if(!isset($_SESSION['admin_id'])){
            header('Location: /');
        }
        
        $soal = $this->model('Soal');
        // $pilihan = $this->model('Pilihan');

        $all_soal = $soal->all();

        // $data = [];

        // foreach ($all_soal as $s) {
        //     $these_pilihan = (array) $pilihan->where("soal_id = $s->id");

        //     $data[] = [
        //         'soal' => $s,
        //         'pilihan' => $these_pilihan
        //     ];
        // }

        // var_dump($data);
        $this->view('Admin/AdminProblemList', $all_soal);

    }

    public function edit_problem($request){

        // var_dump($request);
        $soal_id = $request[0];

        $soal = $this->model('Soal');
        $pilihan = $this->model('Pilihan');
        $this_soal = $soal->find("id = $soal_id");
        $this_pilihan = $pilihan->where("soal_id = $soal_id");

        // var_dump($this_pilihan);
        $data = [
            'soal' => $this_soal,
            'pilihan' => $this_pilihan
        ];

        $this->view('Admin/AdminProblemEdit', $data);

    }

    public function display_score_list(){

        $this->open_session();

        $laporan = $this->model('Laporan');
        $user = $this->model('User');
        $all_laporan = $laporan->all();

        // var_dump($all_laporan);
        $data = [];
        foreach($all_laporan as $lap){
            $u = $user->find("id = $lap->user_id");
            $username = $u->username;
            $paket = $lap->paket_id;
            $skor = $lap->skor;
            $finish_time = $lap->created_at;

            $data[] = [
                'username' => $username,
                'paket' => $paket,
                'skor' => $skor,
                'finish_time' => $finish_time
            ];
        }

        $this->view('Admin/AdminScoreList', $data);

    }

}