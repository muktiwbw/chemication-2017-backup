<?php

class RegistrationController extends Controller{

    public function display_form(){

        $this->view('Auth/RegistrationPage');
        
    }

    public function handle_registration($request){

        /*=========================================
        ||   Cache semua request yang masuk
        ||=========================================
        */
        $email = $request->email;
        $password = password_hash($request->password, PASSWORD_DEFAULT);

        // $school = $request->school;
        // $region = $request->region;

        // $name[0] = $request->name1;
        // $pob[0] = $request->place1;
        // $dob[0] = $request->year1."-".$request->month1."-".$request->date1;
        // $address[0] = $request->address1;
        // $gender[0] = $request->gender1;
        // $phone[0] = $request->phone1;
        // $photo[0] = $_FILES['file1'];

        // $name[1] = $request->name2;
        // $pob[1] = $request->place2;
        // $dob[1] = $request->year2."-".$request->month2."-".$request->date2;
        // $address[1] = $request->address2;
        // $gender[1] = $request->gender2;
        // $phone[1] = $request->phone2;
        // $photo[1] = $_FILES['file2'];

        // $name[2] = $request->name3;
        // $pob[2] = $request->place3;
        // $dob[2] = $request->year3."-".$request->month3."-".$request->date3;
        // $address[2] = $request->address3;
        // $gender[2] = $request->gender3;
        // $phone[2] = $request->phone3;
        // $photo[2] = $_FILES['file3'];

        /*=========================================
        ||   - Ambil data REGIONAL dari database
        ||   - Generate username
        ||=========================================
        */
        // $reg = $this->model('Regional');
        // $r = $reg->find("id = $region");
        // $region_code = $r->kode;
        // $username = $this->generate_username($region_code);

        /*=========================================
        ||    - Buat instance model USER
        ||    - Insert data USER ke database
        ||=========================================
        */
        $user = $this->model('User');

        $verification_token = rand(10000000, 99999999).rand(10000000, 99999999);

        if($user->count("email = '$email'") <= 0){
            $user->create([
                'email' => $email,
                'password' => $password,
                'created_at' => date('Y-m-d h:i:s'),
                'expired_at' => date('Y-m-d h:i:s', time()+(60*60*24*7)),
                'verification_token' => $verification_token
            ]);

            $user_id = $user->get_id('email', $email);

            $email_sent = $this->send_mail($email, 'Verifikasi Email CEO 2017', '
            <html>
                <head></head>
                <body style="font-family: sans-serif; font-size: 14px; color: #333;">
                    <div id="email-heading" style="max-width: 400px; padding: 15px; background: #337ab7; color: #fff; font-size: 22px; text-align: center;">
                        <span>Verifikasi Email</span>
                    </div>
                    <div id="email-container" style="max-width: 400px; padding: 15px; background: #fff;">
                        <div id="email-content">
                            <div style="text-align: center;margin-bottom: 20px;">
                                <img style="max-width: 35%; border-radius: 100%; display: inline-block;" src="'.$this->baseUrl.'/img/contents/ceo.jpg" alt="ceo-logo">
                            </div>
                            <p style="margin: 0; line-height: 1.5;">Halo,<br>Selamat bergabung di CEO.<br>Kami hanya perlu mengecek email yang anda gunakan.<br>Silahkan login ke website <a href="'.$this->baseUrl.'/ceo/">CEO</a> untuk melakukan aktivasi akun. Akun akan dihapus jika tidak melakuan aktivasi dalam 7 hari.</p>
                            <div style="text-align: center;margin: 40px 0;">
                                <a style="display: inline-block; text-decoration: none; color: #fff; padding: 15px; background: #337ab7; border-radius: 4px; font-size: 18px; box-shadow: 1px 1px 1px 1px #333;" href="'.$this->baseUrl.'/ceo/registrasi/verifikasi/'.$user_id.'/'.$verification_token.'">Verifikasi Email</a>
                            </div>
                            <p style="margin: 0; line-height: 1.5;">Terima kasih,<br><b>Salam Chemication</b></p>
                        </div>
                    </div>
                </body>
            </html>
            ');
            
            echo 'success';
        }else echo 'failed';

    }

    public function email_verification($request){

        $user_id = $request[0];
        $token = $request[1];
        $verified = false;
        
        $user = $this->model('User');
        if($user->count("id = '$user_id' and verified = '0' and verification_token = '$token'") > 0){

            $user->update([
                'verified' => 1
            ], "id = '$user_id'");

            $date_now = date('Y-m-d h:i:s');
            $price_base = 120000;
            $unique_code = $user->max('unique_code', "verified = 1 and price like '120%'") + 1;

            $price = $price_base + $unique_code;

            $user->update([
                'unique_code' => $unique_code
            ], "id = '$user_id'");

            $user->update([
                'price' => $price
            ], "id = '$user_id'");

            $verified = true;
        }
        
        if($verified){
            $this->view('Auth/EmailVerificationPage');
        }else{
            header('location: /ceo');
        }

    }

    public function display_activation_form(){

        $this->open_session();

        if((!isset($_SESSION['user'])) || ($_SESSION['user']['status'] != 'nonactive' && $_SESSION['user']['status'] != 'pending')){
            header('location: /ceo');
        }

        // update user status on every page load
        $user = $this->model('User');
        $found_user = $user->find("id = '".$_SESSION['user']['user_id']."'");
        $user_status = $this->getStatus($found_user->active, $found_user->verified, $found_user->active_request, $found_user->expired_at, $found_user->registration_submission, $found_user->registered);

        if($_SESSION['user']['status'] != $user_status){
            $_SESSION['user']['status'] = $user_status;
        }

        $this->view('Auth/ActivationPage');      

    }

    public function handle_activation($request){

        $success = false;

        $this->open_session();

        $activation = $this->model('Activation');

        // var_dump($_FILES);
        if($this->validate_uploaded_file($_FILES['reg_picture']) && $activation->count("user_id = '".$_SESSION['user']['user_id']."'") <= 0){
            
            $activation = $this->model('Activation');
            $activation->create([
                'user_id' => $_SESSION['user']['user_id']
            ]);

            $act_req = $activation->find("user_id = '".$_SESSION['user']['user_id']."'");
            if($act_req->bukti_pembayaran != null && $act_req->bukti_pembayaran != ""){
                if(file_exists($act_req->bukti_pembayaran)) unlink($act_req->bukti_pembayaran);
            }

            $user = $this->model('User');
            $found_user = $user->find("id = '".$_SESSION['user']['user_id']."'");

            $full_path = 'img/uploaded_files/bukti_pembayaran/'.$found_user->id.'_'.$found_user->email.'_'.date('Y-m-d_h:i:s').'.'.pathinfo($_FILES['reg_picture']['name'], PATHINFO_EXTENSION);
            $this->upload($_FILES['reg_picture'], $full_path);

            $activation->update([
                'bukti_pembayaran' => $full_path
            ], 'id = '.$act_req->id);

            $user->update([
                'active_request' => 1
            ], 'id = '.$found_user->id);

            $_SESSION['user']['status'] = 'pending';

            $success = true;
        }

        if($success){
            header('Location: /ceo/aktivasi');
        }else{
            $_SESSION['errors']['file_upload'] = 'Gagal melakukan upload. Coba untuk mengecek kembali persyaratan upload file yang tertulis.';
            header('Location: /ceo/aktivasi');
        }
    }
}
