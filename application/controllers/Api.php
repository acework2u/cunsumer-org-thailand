<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function jsonBankList()
    {
        $rs = array();
        $rs = $this->getBanklist();

        echo json_encode($rs);

    }

    public function jsonPaymentStatusCode()
    {
        $pc = array();
        $pc = $this->getPaymentStatus();
        echo json_encode($pc);
    }


    public function provinceList()
    {
        $this->load->model($this->province_model, 'province');
        $result = array();

        if ($this->province->provinces_list()) {
            $result = $this->province->provinces_list();
        }
        echo json_encode($result);

    }

    public function zone_list()
    {

        $this->load->model($this->province_model, 'province');
        $result = array();

        if ($this->province->zone_list()) {
            $result = $this->province->zone_list();
        }
        echo json_encode($result);

    }

    public function province_in_zone()
    {
        $this->load->model($this->province_model, 'province');
        $result = array();
        $zone_code = "";
        if (!is_blank($this->input->get_post('zone_code'))) {
            $zone_code = trim($this->input->get_post('zone_code'));

            $this->province->setZoneCode($zone_code);
            $result = $this->province->province_zone();

        }

        echo json_encode($result);
    }

    public function provinces(){
        $this->load->model($this->province_model, 'province');
        $result = array();
        $result = $this->province->provinces();

        echo json_encode($result);

    }

    public function admin_orz_all(){
        $this->load->model($this->organized_model,'orz');
        $orz_info = array();
        if($this->is_login() && getUserRoleId()==1){
            $orz_info = $this->orz->orz_all();
        }

        echo json_encode($orz_info);

    }



} // End of Class
