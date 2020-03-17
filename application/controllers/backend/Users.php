<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'user');
        $this->load->model('Mail', 'mail');
    }

    public function index(){

        if ($this->is_login()) {
            $this->dashboard();
        } else {
            redirect('signin');
        }

    }
    public function dashboard(){
        $this->data['title'] = "Thailand Consumer Council";
        $this->load->view('tpl_users',$this->data);
    }


    public function jsonUserList(){
        $userList = array();
        if($this->is_login() && getUserRoleId()==1){
            $userList = $this->user->user_list();
        }
        echo json_encode($userList);


    }

} // End of Class
