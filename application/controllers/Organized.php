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


        $message = array();
        if ($this->form_validation->run() == TRUE) {

            $this->load->model('Auth_model', 'user');

            $cus_email = $this->get_post('cus_email');
            $cus_password = $this->post('cus_password');

            $this->user->setEmail($cus_email);
            $this->user->setPassword($cus_password);

            $chk = $this->user->create();
            /***** Register Orz ***/
            if($chk){

            }


            //** Load Model **/
            $this->load->model($this->organized_model,'orz');


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
