<?php

class AuthController extends Controller{

    public function display_login_form(){
        
        $this->view('Auth/LoginPage');

    }

    public function handle_login($request){

        $email = $request->email;
        $password = $request->password;

        // Code for testing purpose!
        // $tester_emails = [
        //     'muktiw7@gmail.com', 
        //     'tester001@ceo.com', 
        //     'imanuellacm@gmail.com', 
        //     'akuakunomi@gmail.com', 
        //     'salsabilfalakhul71@gmail.com', 
        //     'aisaissy@gmail.com'
        // ];
        
        // if(!in_array($email, $tester_emails)){
        //     header('Location: /ceo');
        // }

        $user = $this->model('User');

        if($user->count("email = '$email'") > 0) {
            
            $found_user = $user->find("email = '$email'");
            if(password_verify($password, $found_user->password)){

                $user_session = 0;

                if($found_user->region_id != NULL){
                    $region = $this->model("Region");
                    $user_region = $region->find("id = ".$found_user->region_id);
                    $user_session = $user_region->sesi_id;
                }

                $tagname = '';

                $status = $this->getStatus($found_user->active, $found_user->verified, $found_user->active_request, $found_user->expired_at, $found_user->registration_submission, $found_user->registered);

                if($status == 'nonactive' || $status == 'pending' || $status == 'active' || 'submitted'){
                    $tagname = $found_user->email;
                }elseif($status == 'registered'){
                    $tagname = $found_user->username;
                }

                $this->open_session();
                
                if(isset($_SESSION['user'])){
                    unset($_SESSION['user']);
                }

                $_SESSION['user'] = [
                    'user_id' => $found_user->id,
                    'tagname' => $tagname,
                    'status' => $status,
                    'user_session' => $user_session,
                    'login_attempt' => date('Y-m-d h:i:s')
                    ];

                if($status == 'nonactive'){
                    $attach_point = strlen($found_user->price) - 3;
                    $broken_characters = str_split($found_user->price);
                    array_splice($broken_characters, $attach_point, 0, '.');
                    $currency_price = implode('', $broken_characters);

                    $_SESSION['user']['currency_price'] = $currency_price;
                    $_SESSION['user']['unique_code'] = $found_user->price;
                }

                echo 'success';

            }else echo 'failed';

        }else echo 'failed';

        // if($field != ""){
        //     $found_user = $user->find("$field = '$identity'");
        //     // var_dump($found_user);
        //     if(password_verify($password, $found_user->password)){
        //         // echo "Password cocko";
        //         $this->open_session();
        //         session_destroy();
        //         $this->open_session();
        //         $_SESSION['user_id'] = $found_user->id;
        //         $_SESSION['username'] = $found_user->username;
        //         $_SESSION['active'] = $found_user->active;
        //         $_SESSION['requested'] = $found_user->active_request;
        //         $_SESSION['region'] = $found_user->regional_id;
        //         if($_SESSION['active'] == 1){
        //             $lembarkerja = $this->model('LembarKerja');
        //             $lk = $lembarkerja->find("user_id = '".$_SESSION['user_id']."'");
        //             $_SESSION['lembar_kerja_id'] = $lk->id;
        //             $_SESSION['paket_id'] = $lk->paket_id;

        //             $laporan = $this->model('Laporan');
        //             if($laporan->count("user_id = ".$_SESSION['user_id']." and paket_id = ".$_SESSION['paket_id']) > 0){
        //                 $_SESSION['has_finished'] = 1;
        //             }
        //         }
        //         $_SESSION['login_attempt'] = date('Y-m-d h:i:s');

        //         header('Location: /');
        //     }else{
        //         echo "password salah";
        //     }
        // }else{
        //     echo "username atau email tidak ditemukan";
        // }

    }

    public function handle_logout(){
        $this->open_session();

        unset($_SESSION['user']);
        unset($_SESSION['errors']);
        session_destroy();
        header('Location: /ceo');
    }

}