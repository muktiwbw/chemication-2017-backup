<?php

class HomeController extends Controller{

    public function display_home_ceo(){

        $this->open_session();

        // update user status on every page load
        if(isset($_SESSION['user'])){

            $user = $this->model('User');
            $found_user = $user->find("id = '".$_SESSION['user']['user_id']."'");
            $user_status = $this->getStatus($found_user->active, $found_user->verified, $found_user->active_request, $found_user->expired_at, $found_user->registration_submission, $found_user->registered);

            if($_SESSION['user']['status'] != $user_status){
                $_SESSION['user']['status'] = $user_status;
            }

        }

        $this->view('Main/CEOPage');

    }

    public function display_development_portal(){

        $this->open_session();

        if(isset($_SESSION['developer'])){
            header('location: /ceo');
        }

        $this->view('Main/DevelopmentPortalPage');

    }

    public function display_jadwal_pelaksanaan(){

        $this->open_session();

        $this->view('Main/CEOJadwalPelaksanaan');

    }

    public function display_mekanisme_pendaftaran(){

        $this->open_session();

        $this->view('Main/CEOMekanismePendaftaran');

    }

    public function display_faq(){

        $this->open_session();

        $this->view('Main/CEOFAQ');

    }

    public function handle_development_login($request){
        
        $this->open_session();

        if(isset($request->passcode)){

            if($request->passcode == "jojojojo"){

                $_SESSION['developer'] = [
                    'session' => date('Y-m-d h:i:s')
                ];

                header('location: /ceo');

            }

        }

        header('location: /ceo/development/portal');

    }

    public function handle_development_logout(){

        $this->open_session();

        unset($_SESSION['developer']);
        session_destroy();
        header('location: /ceo/development/portal');

    }

    public function display_root_page(){
        $this->view('Main/RootPage');
    }

    public function display_home_ec(){

        $this->view('Main/ECPage');

    }

    public function display_ec_lolos_abstrak(){
        
        $this->view('Main/ECLolosAbstrak');

    }

    public function display_ec_finalis(){
        
        $this->view('Main/ECFinalis');

    }

    public function display_home_hsfc(){

        $this->view('Main/HSFCPage');

    }

}