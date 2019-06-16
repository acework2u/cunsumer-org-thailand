<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organized extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data = array();
        $this->_myLang =$this->session->userdata('site_lang');
    }


    public function index(){

        $this->load->view('organized/organization', $this->data);

    }

    public function organized_register(){


    }

    public function getOrzGroupList(){


        $this->load->model($this->_orz_group_model,'orzg');


        $rs = array();
        $rs = $this->orzg->orz_group_list();

        $rows = array();
        if(!is_blank($rs)){
            foreach ($rs as $row){
                $data = array(
                    'aid'=>$row->aid,
                    'title_th'=>$row->title_th,
                    'title_eng'=>$row->title_th
                    );
                $rows[] = $data;
            }
        }
        echo json_encode($rows);

    }

    public function organization_register(){

        $data = $this->security->xss_clean($_POST);
        $this->form_validation->set_rules('cus_email', 'Email', 'trim|required|min_length[5]|max_length[80]', array('required' => 'You must provide a %s.', 'is_unique' => 'This %s already exists.'));
        $this->form_validation->set_rules('cus_password', 'Password', 'trim|required|min_length[5]|max_length[12]');

        /*** Orz Information ****/
        $orz_email = $this->input->post('cus_email');
        $orz_password = $this->input->post('cus_password');
        $orz_group = $this->input->post('group');
        $orz_categories = $this->input->post('categories');
        $orz_title = $this->input->post('title');
        $orz_address = $this->input->post('address');
        $orz_district = $this->input->post('district');
        $orz_province = $this->input->post('province');
        $orz_zipcode = $this->input->post('zipcode');
        $orz_contact_name = $this->input->post('contact_name');
        $orz_contact_lastname = $this->input->post('contact_lastname');
        $orz_tel = $this->input->post('tel');
        $orz_mobile_no = $this->input->post('mobile_no');

        $message = array();
        if ($this->form_validation->run() == TRUE) {

            $this->load->model('Auth_model', 'user');

            $cus_email = $this->input->get_post('cus_email');
            $cus_password = $this->input->get_post('cus_password');

            $this->user->setEmail($cus_email);
            $this->user->setPassword($cus_password);

            $chk = $this->user->check_user($cus_email);
            if($chk){
                $message = array(
                    'stats' => true,
                    'error' => "",
                    'message' =>"Email $cus_email มีในระบบแล้ว"
                );
            }else{

            }

            /***** Register Orz ***/
            $this->load->model($this->organized_model,'orz');

            $this->orz->setTitle($orz_title);
            $this->orz->setOrzGroupId($orz_group);
            $this->orz->setOrzType($orz_categories);
            $this->orz->setAddress($orz_address);
            $this->orz->setContactName($orz_contact_name);
            $this->orz->setContactName($orz_contact_name);
            $orz_new = $this->orz->create();
            if($orz_new){
                $message = array(
                    'stats' => true,
                    'error' => false,
                    'message' => "Register Success"
                );
            }else{
                $message = array(
                    'stats' => false,
                    'error' => true,
                    'message' => "could not register"
                );

            }



        }else{
            $message = array(
                'stats' => false,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );
        }


        echo json_encode($message);




    }



}
