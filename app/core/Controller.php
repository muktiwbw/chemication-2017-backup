<?php

class Controller{

    public $baseUrl = 'chemication.dev';

    protected function model($model)
    {
        require_once('../app/models/'.$model.'.php');
        $instance = new $model;
        
        return $instance;
    }

    public function getStatus($active, $verified, $active_request, $expired_at, $registration_submission, $registered){
        $data_status = "";

        if($active == 0 && $active_request == 0 && $expired_at <= date('Y-m-d h:i:s')){
            $data_status = 'expired';
        }elseif($verified == 0 && $expired_at > date('Y-m-d h:i:s')){
            $data_status = 'unverified';
        }elseif($verified == 1 && $active == 0 && $active_request == 0 && $expired_at > date('Y-m-d h:i:s')){
            $data_status = 'nonactive';
        }elseif($active == 0 && $active_request == 1){
            $data_status = 'pending';
        }elseif($active == 1 && $active_request == 1 && $registration_submission == 0 && $registered == 0){
            $data_status = 'active';
        }elseif($active == 1 && $active_request == 1 && $registration_submission == 1 && $registered == 0){
            $data_status = 'submitted';
        }elseif($active == 1 && $active_request == 1 && $registration_submission == 1 && $registered == 1){
            $data_status = 'registered';
        }

        return $data_status;
    }

    protected function send_mail($email, $subject, $body){
        $status = false;
        require_once "../app/packages/email/PHPMailer/PHPMailerAutoload.php";

        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'muktikun@gmail.com';
        $mail->Password = 'slbtgjhugveernyh';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('muktikun@gmail.com', 'Chemication Administrator');
        $mail->addAddress($email);
        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->Body = $body;

        if($mail->send()){
            $status = true;
        }

        return $status;
    }

    protected function view($view, $data = [])
    {
        $this->open_session();
        require_once('../app/views/'.$view.'.php');
    }
    
    protected function open_session(){
        if(session_status() != PHP_SESSION_ACTIVE)
        {
            session_start(); 
        }
    }

    protected function validate_uploaded_file($file){
        return ($file['error'] == 0 && in_array(pathinfo($file['name'], PATHINFO_EXTENSION), ['jpg', 'png', 'jpeg', 'JPEG', 'JPG', 'PNG']) && $file['size'] < 1000000) ? true : false;
    }

    protected function upload($file, $full_path){

        /*
            Parameters:
                - $file: Array input field file
                - $file_path: Desired file path
                - $file_name: Desired file name
        */

        $error_log = [];
        $maxsize = 1000000;
        $allowed_ext = array('jpg', 'png', 'jpeg', 'JPEG', 'JPG', 'PNG');

        $file_ext = pathinfo($file['name'], PATHINFO_EXTENSION);

        /*  VALIDASI
            - validasi error != 0
            - validasi extension (gif, jpg, png, jpeg)
            - validasi ukuran (maks 5 MB)
        */
        if($file['error'] != 0){
            $error_log[] = "Gagal mengupload file";
        }

        if(!in_array($file_ext, $allowed_ext)){
            $error_log[] = "File yang diupload bukan gambar";
        }

        if($file['size'] > $maxsize){
            $error_log[] = "File melebihi batas maksimal";
        }

        if(!$error_log){
            
            $uploaded = move_uploaded_file($file['tmp_name'], $full_path);

        }else{

            foreach ($error_log as $error) {
                echo $error.'<br>';
            }
        }
    }

    protected function check_event($session_id){
        $sesi = $this->model("Sesi");

        $tryout_session = $sesi->find("id = 1");
        $region_session = $sesi->find("id = ".$session_id);
        $testing_session = $sesi->find("id = 4");
        // soalnya ga dicek apa ini tester apa nggak. jadi asal langsung ngecek waktu semua sesi termasuk testing

        $date_now = new DateTime("now");
        $event_occured = null;
        
        $date_tryout_start = new DateTime($tryout_session->start_time);
        $date_tryout_end = new DateTime($tryout_session->end_time);
        $date_region_start = new DateTime($region_session->start_time);
        $date_region_end = new DateTime($region_session->end_time);
        
        if($session_id == 4){
            $date_testing_start = new DateTime($testing_session->start_time);
            $date_testing_end = new DateTime($testing_session->end_time);
            if($date_now >= $date_testing_start && $date_now < $date_testing_end){
                $event_occured = "testing";
            }
        }else{
            if($date_now >= $date_tryout_start && $date_now < $date_tryout_end){
                $event_occured = "tryout";
            }elseif($date_now >= $date_region_start && $date_now < $date_region_end){
                $event_occured = "penyisihan";
            }
        }
        
        return $event_occured;
    }

}