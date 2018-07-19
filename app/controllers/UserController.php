<?php

class UserController extends Controller{

    public function display_user_profile(){

        $this->open_session();

        if(!isset($_SESSION['user'])){
            header('Location: /ceo');
        }elseif($_SESSION['user']['status'] != 'active' && $_SESSION['user']['status'] != 'submitted' && $_SESSION['user']['status'] != 'registered'){
            header('Location: /ceo/aktivasi');
        }

        $user = $this->model('User');
        $peserta= $this->model('Peserta');
        $region = $this->model('Region');
        $rayon = $this->model('Rayon');
        
        $found_user = $user->find("id = '".$_SESSION['user']['user_id']."'");
        $user_status = $this->getStatus($found_user->active, $found_user->verified, $found_user->active_request, $found_user->expired_at, $found_user->registration_submission, $found_user->registered);

        // update user status on every page load
        if(isset($_SESSION['user']['status']) && $_SESSION['user']['status'] != $user_status){
            $_SESSION['user']['status'] = $user_status;
        }

        $dom_data = [];

        $reregister_data = [];
        $region_data = [];

        
        if($user_status == 'active'){
            $all_region = $region->all();

            foreach($all_region as $reg){

                if($reg->id != 7){
                    $region_area = (array) $rayon->where("region_id = '".$reg->id."'");
                    
                    $area_string = "";
    
                    for($i=0; $i<count($region_area); $i++){
                        if($i <= 0){
                            $area_string .= "(";
                        }
                        $area_string .= $region_area[$i]->nama;
                        $area_string .= ($i<count($region_area)-1) ? ", " : ")";
                    }
    
                    $region_data[] = [
                        'id' => $reg->id,
                        'nama' => $reg->nama." ".$area_string
                    ];
                }

            }
            
            $reregister_data['region_data'] = $region_data;
            
            $dom_data['reregister_data'] = $reregister_data;

        }elseif($user_status == 'registered'){

            $user_data = [];
            $participant_data = [];
            $tryout_data = [];
            $penyisihan_data = [];

            if($user->count("id = '".$_SESSION['user']['user_id']."'") == 1){

                $rayon = $this->model('Rayon');

                $user_region = $region->find("id = ".$found_user->region_id);

                $event_occured = $this->check_event($user_region->sesi_id);

                $user_data = [
                    'id' => $found_user->id,
                    'username' => $found_user->username,
                    'email' => $found_user->email,
                    'region' => 'Region '.$found_user->region_id,
                    'rayon' => $found_user->rayon,
                    'sekolah' => $found_user->sekolah,
                    'created_at' => date('D, d M Y', strtotime($found_user->created_at)),
                    'activated_at' => date('D, d M Y', strtotime($found_user->activated_at))
                ];

                $participants = $peserta->where("user_id = '".$_SESSION['user']['user_id']."' order by id asc");
                
                foreach($participants as $participant){

                    $participant_status = $participant->peserta_status == 1 ? 'Ketua' : 'Anggota';

                    $participant_data[] = [
                        'nama' => $participant->nama,
                        'peserta_status' => $participant_status,
                        'nomor_telepon' => $participant->nomor_telepon,
                        'lineid' => $participant->lineid,
                        'email' => $participant->email,
                        'foto_pelajar' => $participant->foto_pelajar
                    ];

                }

                $mlk = $this->model('LembarKerja');
                $mlj = $this->model('LembarJawaban');
                $lk_to = $mlk->find('user_id = '.$found_user->id.' and paket_id = 5');
                $lk_penyisihan = $mlk->find('user_id = '.$found_user->id.' and paket_id <> 5');
                
                $enable_start_button = FALSE;
                if($event_occured == 'tryout' && $lk_to->finished == 0){
                    $enable_start_button = TRUE;
                }elseif($event_occured == 'penyisihan' && $lk_penyisihan->finished == 0){
                    $enable_start_button = TRUE;
                }

                if($lk_to->finished == 1){

                    $start_time = explode(' ', $lk_to->start_time);
                    $end_time = explode(' ', $lk_to->end_time);
                    $lj_tryouts = $mlj->where('lembar_kerja_id = '.$lk_to->id.' order by nomor asc');
                    $jumlah_soal = $mlj->count('lembar_kerja_id = '.$lk_to->id);

                    $lj_tryout_data = [];
                    foreach($lj_tryouts as $lj_tryout){
                        $lj_tryout_data[] = [
                            'id' => $lj_tryout->id,
                            'nomor' => $lj_tryout->nomor,
                            'jawaban' => $lj_tryout->jawaban,
                            'score' => $lj_tryout->score
                        ];
                    }

                    $tryout_data = [
                        'start_time' => $start_time[1],
                        'end_time' => $end_time[1],
                        'score' => $lk_to->score,
                        'lj' => $lj_tryout_data,
                        'jumlah_soal' => $jumlah_soal
                    ];

                }

                if($lk_penyisihan->finished == 1){

                    $start_time = explode(' ', $lk_penyisihan->start_time);
                    $end_time = explode(' ', $lk_penyisihan->end_time);
                    $lj_penyisihans = $mlj->where('lembar_kerja_id = '.$lk_penyisihan->id.' order by nomor asc');
                    $jumlah_soal = $mlj->count('lembar_kerja_id = '.$lk_penyisihan->id);

                    $lj_penyisihan_data = [];
                    foreach($lj_penyisihans as $lj_penyisihan){
                        $lj_penyisihan_data[] = [
                            'id' => $lj_penyisihan->id,
                            'nomor' => $lj_penyisihan->nomor,
                            'jawaban' => $lj_penyisihan->jawaban,
                            'score' => $lj_penyisihan->score
                        ];
                    }

                    $penyisihan_data = [
                        'start_time' => $start_time[1],
                        'end_time' => $end_time[1],
                        'score' => $lk_penyisihan->score,
                        'lj' => $lj_penyisihan_data,
                        'jumlah_soal' => $jumlah_soal,
                        'status' => $lk_penyisihan->score >= 61 ? 'Lolos' : 'Tidak Lolos',
                        'reward' => $this->get_juara($found_user->username)
                    ];

                }

                $dom_data = [
                    'user_data' => $user_data,
                    'participant_data' => $participant_data,
                    'tryout_data' => $tryout_data,
                    'penyisihan_data' => $penyisihan_data,
                    'event_occured' => $event_occured,
                    'enable_start_button' => $enable_start_button
                ];

            }

        }

        $this->view('User/UserProfilePage', $dom_data);
    }

    public function get_juara($username){

        $reward = [];

        // Ini harus ditaruh database nanti
        $reward_pool = [
            [
                'username' => 9217090042,
                'peringkat' => 1,
                'reward' => 'Region 2 (Bali, NTT, NTB, Papua, Maluku, dan Sulawesi)'
            ],
            [
                'username' => 9217090046,
                'peringkat' => 2,
                'reward' => 'Region 2 (Bali, NTT, NTB, Papua, Maluku, dan Sulawesi)'
            ],
            [
                'username' => 9217090029,
                'peringkat' => 3,
                'reward' => 'Region 2 (Bali, NTT, NTB, Papua, Maluku, dan Sulawesi)'  
            ],
            [
                'username' => 9517120034,
                'peringkat' => 1,
                'reward' => 'Region 5 (Jawa Timur kecuali Surabaya)'
            ],
            [
                'username' => 9517120004,
                'peringkat' => 2,
                'reward' => 'Region 5 (Jawa Timur kecuali Surabaya)'       
            ],
            [
                'username' => 9517120035,  
                'peringkat' => 3,
                'reward' => 'Region 5 (Jawa Timur kecuali Surabaya)'     
            ],
            [
                'username' => 9517120981,
                'peringkat' => 1,
                'reward' => 'Rayon Gresik'           
            ],
            [
                'username' => 9517120067,
                'peringkat' => 2,
                'reward' => 'Rayon Gresik'                  
            ],
            [
                'username' => 9517120065,
                'peringkat' => 1,
                'reward' => 'Rayon Kediri'           
            ],
            [
                'username' => 9517090034,
                'peringkat' => 1,
                'reward' => 'Rayon Mojokerto'
            ],
            [
                'username' => 9517090043,
                'peringkat' => 2,
                'reward' => 'Rayon Gresik'
            ],
            [
                'username' => 9517090051,
                'peringkat' => 3,
                'reward' => 'Rayon Gresik'
            ],
            [
                'username' => 9517090022,
                'peringkat' => 1,
                'reward' => 'Rayon Nganjuk'                          
            ],
            [
                'username' => 9517090008,
                'peringkat' => 1,
                'reward' => 'Rayon Pasuruan'          
            ],
            [
                'username' => 9517120027,
                'peringkat' => 1,
                'reward' => 'Rayon Sidoarjo'          
            ],
            [
                'username' => 9517120017,
                'peringkat' => 2,
                'reward' => 'Rayon Sidoarjo'
            ],
            [
                'username' => 9517090018,
                'peringkat' => 3,
                'reward' => 'Rayon Sidoarjo'
            ],
            [
                'username' => 9617090033,
                'peringkat' => 1,
                'reward' => 'Region Surabaya'                       
            ],
            [
                'username' => 9617090030,
                'peringkat' => 2,
                'reward' => 'Region Surabaya'                          
            ],
            [
                'username' => 9617120014,
                'peringkat' => 3,
                'reward' => 'Region Surabaya'                
            ],
        ];

        foreach($reward_pool as $rp){
            if($username == $rp['username']){
                $reward = $rp;
                break;
            }
        }

        return $reward;

    }

    public function store_user_profile($request){

        $this->open_session();

        $user_id = $_SESSION['user']['user_id'];

        $peserta = $this->model('Peserta');
        $user = $this->model('User');
        $found_user = $user->find("id = '$user_id'");

        if($found_user->registration_submission <= 0 && $found_user->registered <= 0){

            $request = (array) $request;

            $mistakes = [];
            $mistake_count = 0;
            $participant_count = $request['participant_count'];

            if($request['sekolah'] == ""){
                $mistakes[] = "Field Sekolah tidak boleh kosong.";
                $mistake_count++;
            }
            if($request['region'] == "" || $request['region'] < 1){
                $mistakes[] = "Field Region tidak boleh kosong.";
                $mistake_count++;
            }
            if($request['rayon'] == ""){
                $mistakes[] = "Field Rayon tidak boleh kosong.";
                $mistake_count++;
            }
            for($i=1; $i<=$participant_count; $i++){

                if($request['nama'.$i] == ""){
                    $mistakes[] = "Field Nama Peserta $i tidak boleh kosong.";
                    $mistake_count++;
                }
                if($request['telp'.$i] == "" || !is_numeric($request['telp'.$i])){
                    $mistakes[] = "Field Nomor Telepon Peserta $i tidak boleh kosong dan harus berupa nomor.";
                    $mistake_count++;
                }
                if($request['lineid'.$i] == ""){
                    $mistakes[] = "Field Line ID Peserta $i tidak boleh kosong.";
                    $mistake_count++;
                }
                if($request['email'.$i] == ""){
                    $mistakes[] = "Field Email Peserta $i tidak boleh kosong.";
                    $mistake_count++;
                }
                if(!$this->validate_uploaded_file($_FILES['kartu_pelajar'.$i])){
                    $mistakes[] = "Terjadi kesalahan pada Kartu Pelajar Peserta $i.";
                    $mistake_count++;
                }
                if(!$this->validate_uploaded_file($_FILES['foto'.$i])){
                    $mistakes[] = "Terjadi kesalahan pada Foto Peserta $i.";
                    $mistake_count++;
                }

            }

            if($mistake_count <= 0){

                $rayon = $this->model('Rayon');

                $found_rayon = $rayon->find("id = '".$request['rayon']."'");
                // $new_username = $found_rayon->kode.'170'.$found_rayon->region_id.$found_user->price;

                $user->update([
                    'region_id' => $request['region']
                ], "id = '$user_id'");

                $user->update([
                    'rayon' => $request['rayon']
                ], "id = '$user_id'");

                $user->update([
                    'sekolah' => $request['sekolah']
                ], "id = '$user_id'");

                $user->update([
                    'registration_submission' => '1'
                ], "id = '$user_id'");

                for($i=1; $i<=$participant_count; $i++){

                    $peserta_status = $i == 1 ? '1' : '0';

                    $full_path_kartu_pelajar = 'img/uploaded_files/user/kartu_pelajar/'.'kp_'.$new_username.'_'.$request['nama'.$i].'_'.date('Y-m-d_h:i:s').'.'.pathinfo($_FILES['kartu_pelajar'.$i]['name'], PATHINFO_EXTENSION);
                    $full_path_foto_peserta = 'img/uploaded_files/user/foto_user/'.'fp_'.$new_username.'_'.$request['nama'.$i].'_'.date('Y-m-d_h:i:s').'.'.pathinfo($_FILES['foto'.$i]['name'], PATHINFO_EXTENSION);
                    
                    $this->upload($_FILES['kartu_pelajar'.$i], $full_path_kartu_pelajar);
                    $this->upload($_FILES['foto'.$i], $full_path_foto_peserta);

                    $peserta->create([
                        'user_id' => $user_id,
                        'peserta_status' => $peserta_status,
                        'nama' => $request['nama'.$i],
                        'nomor_telepon' => $request['telp'.$i],
                        'lineid' => $request['lineid'.$i],
                        'email' => $request['email'.$i],
                        'kartu_pelajar' => $full_path_kartu_pelajar,
                        'foto_pelajar' => $full_path_foto_peserta
                    ]);

                }

                $_SESSION['user']['status'] = 'submitted';

                $email_sent = $this->send_mail($found_user->email, 'Pendaftaran Anggota CEO', '
                <html>
                    <head></head>
                    <body style="font-family: sans-serif; font-size: 14px; color: #333;">
                        <div id="email-heading" style="max-width: 400px; padding: 15px; background: #337ab7; color: #fff; font-size: 22px; text-align: center;">
                            <span>Konfirmasi Pendaftaran</span>
                        </div>
                        <div id="email-container" style="max-width: 400px; padding: 15px; background: #fff;">
                            <div id="email-content">
                                <div style="text-align: center;margin-bottom: 20px;">
                                    <img style="max-width: 35%; border-radius: 100%; display: inline-block;" src="'.$this->baseUrl.'/img/contents/ceo.jpg" alt="ceo-logo">
                                </div>
                                <p style="margin: 0; line-height: 1.5;">Halo,<br>Tim anda telah berhasil terdaftar untuk mengikuti CEO 2017. Silahkan untuk melihat jadwal olimpiade pada <a href="'.$this->baseUrl.'/ceo">Website CEO 2017<a>.<br><br>Terima kasih,<br><b>Salam Chemication</p>
                            </div>
                        </div>
                    </body>
                </html>
                ');

            }else{

                $_SESSION['flashed_data']['team'] = [
                    'participant_count' => $participant_count,
                    'sekolah' => $request['sekolah'],
                    'region' => $request['region'],
                    'rayon' => $request['rayon'],
                ];

                for($i=1; $i<=$participant_count; $i++){
                    $_SESSION['flashed_data']['participant'][$i]['nama'] = $request['nama'.$i];
                    $_SESSION['flashed_data']['participant'][$i]['telp'] = $request['telp'.$i];
                    $_SESSION['flashed_data']['participant'][$i]['lineid'] = $request['lineid'.$i];
                    $_SESSION['flashed_data']['participant'][$i]['email'] = $request['email'.$i];
                }

                foreach($mistakes as $mistake){
                    $_SESSION['flashed_data']['errors'][] = $mistake;
                }


            }

            header('location: /ceo/profile');
        }

    }

    // public function display_user_edit_page(){

    //     $this->open_session();
    //     if(!isset($_SESSION['user_id'])){
    //         header('Location: /login');
    //     }

    //     if($_SESSION['active'] == '1'){
    //         header('Location: /profile');
    //     }

    //     $user = $this->model('User');
    //     $bio = $this->model('Bio');
    //     $region = $this->model('Regional');

    //     $this_user = $user->find("id = '".$_SESSION['user_id']."'");
    //     $these_bios = $bio->where("user_id = '".$_SESSION['user_id']."'");
    //     $regions = $region->all();

    //     $data = [
    //         'user' => $this_user,
    //         'bio' => (array) $these_bios,
    //         'region' => $regions
    //     ];

        // $this->view('User/UserProfilePage'/*, $data*/);

    // }

    public function handle_user_edit($request){

        // var_dump($request);

        $school = $request->school;
        $region = $request->region;

        $nama[0] = $request->nama0;
        $place[0] = $request->place0;
        $date[0] = implode('-', [$request->year0, $request->month0, $request->date0]);
        $address[0] = $request->address0;
        $phone[0] = $request->phone0;
        $gender[0] = $request->gender0;

        $nama[1] = $request->nama1;
        $place[1] = $request->place1;
        $date[1] = implode('-', [$request->year1, $request->month1, $request->date1]);
        $address[1] = $request->address1;
        $phone[1] = $request->phone1;
        $gender[1] = $request->gender1;

        $nama[2] = $request->nama2;
        $place[2] = $request->place2;
        $date[2] = implode('-', [$request->year2, $request->month2, $request->date2]);
        $address[2] = $request->address2;
        $phone[2] = $request->phone2;
        $gender[2] = $request->gender2;

        // echo $date0.', '.$date1.', '.$date2;

        $this->open_session();

        $user = $this->model('User');
        $bio = $this->model('Bio');
        $this_user = $user->find("id = '".$_SESSION['user_id']."'");
        $these_bios = (array) $bio->where("user_id = '".$_SESSION['user_id']."'");
        // var_dump($this_user, $these_bios);

        // echo $nama[0].' == '.$these_bios[0]->nama;

        if($school != $this_user->sekolah){
            $user->update([
                'sekolah' => $school
            ], "id = '$this_user->id'");
        }

        if($region != $this_user->regional_id){
            $user->update([
                'regional_id' => $region
            ], "id = '$this_user->id'");
        }

        for ($i=0; $i <= 2; $i++) { 
            
            if($nama[$i] != $these_bios[$i]->nama){
                // echo "nama harus diupdate";
                $bio->update([
                    'nama' => $nama[$i]
                ], "id = '".$these_bios[$i]->id."'");
            }

            if($place[$i] != $these_bios[$i]->kota_lahir){
                $bio->update([
                    'kota_lahir' => $place[$i]
                ], "id = '".$these_bios[$i]->id."'");
            }

            if($date[$i] != $these_bios[$i]->tanggal_lahir){
                $bio->update([
                    'tanggal_lahir' => $date[$i]
                ], "id = '".$these_bios[$i]->id."'");
            }

            if($date[$i] != $these_bios[$i]->tanggal_lahir){
                $bio->update([
                    'tanggal_lahir' => $date[$i]
                ], "id = '".$these_bios[$i]->id."'");
            }

            if($address[$i] != $these_bios[$i]->alamat){
                $bio->update([
                    'alamat' => $address[$i]
                ], "id = '".$these_bios[$i]->id."'");
            }

            if($phone[$i] != $these_bios[$i]->no_telepon){
                $bio->update([
                    'no_telepon' => $phone[$i]
                ], "id = '".$these_bios[$i]->id."'");
            }

            if($gender[$i] != $these_bios[$i]->jenis_kelamin){
                $bio->update([
                    'jenis_kelamin' => $gender[$i]
                ], "id = '".$these_bios[$i]->id."'");
            }

        }

        // var_dump($_FILES);
        foreach ($_FILES as $index => $file) {
            if($file['error'] != 4){
                
                if($these_bios[str_replace('file', '', $index)]->foto_peserta != null){
                    // echo $these_bios[str_replace('file', '', $index)]->foto_peserta.'<br>';
                    if(file_exists($these_bios[str_replace('file', '', $index)]->foto_peserta)) unlink($these_bios[str_replace('file', '', $index)]->foto_peserta);
                    
                    $full_path = 'img/uploaded_files/foto_user/'.$_SESSION['username'].'_'.$these_bios[str_replace('file', '', $index)]->nama.'_'.date('Y-m-d_h:i:s').'.'.pathinfo($_FILES[$index]['name'], PATHINFO_EXTENSION);
                    // echo $full_path;
                    $this->upload($file, $full_path);

                    $bio->update([
                        'foto_peserta' => $full_path
                    ], 'id = '.$these_bios[str_replace('file', '', $index)]->id);
                }

            }
        }

        header('Location: /profile');
    }   

}