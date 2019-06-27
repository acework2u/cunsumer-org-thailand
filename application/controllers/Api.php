<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }



    public function jsonBankList(){
        $rs = array();
        $rs = $this->getBanklist();

        echo json_encode($rs);

    }
    public function jsonPaymentStatusCode(){
        $pc = array();
        $pc = $this->getPaymentStatus();
        echo json_encode($pc);
    }


    public function provinceList(){
        $this->load->model($this->province_model,'province');
        $result = array();

        if($this->province->provinces_list()){
            $result = $this->province->provinces_list();
        }


        echo json_encode($result);




    }

} // End of Class
