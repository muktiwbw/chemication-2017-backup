<?php

class ErrorController extends Controller{

    public function show_404(){

        $this->view('Errors/404');

    }

}