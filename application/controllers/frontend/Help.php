<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data = array();
        $this->_myLang = $this->session->userdata('site_lang');
    }


    public function index()
    {

        $this->load->view('organized/help', $this->data);

    }
    public function help(){
        echo "Help";
    }






}
