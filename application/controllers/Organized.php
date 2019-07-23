<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organized extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data = array();
        $this->_myLang = $this->session->userdata('site_lang');
    }


    public function index()
    {

        $this->load->view('organized/organization', $this->data);

    }

    public function organized_register()
    {


    }

    public function getOrzGroupList()
    {


        $this->load->model($this->_orz_group_model, 'orzg');


        $rs = array();
        $rs = $this->orzg->orz_group_list();

        $rows = array();
        if (!is_blank($rs)) {
            foreach ($rs as $row) {
                $data = array(
                    'aid' => $row->aid,
                    'title_th' => $row->title_th,
                    'title_eng' => $row->title_th
                );
                $rows[] = $data;
            }
        }
        echo json_encode($rows);

    }

    public function organization_register()
    {

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
        $orz_amphoe = $this->input->post('amphoe');
        $orz_province = $this->input->post('province');
        $orz_zipcode = $this->input->post('stage_code');
        $orz_contact_name = $this->input->post('contact_name');
        $orz_contact_lastname = $this->input->post('contact_lastname');
        $orz_tel = $this->input->post('tel');
        $orz_contact_tel = $this->input->post('mobile_no');
        $orz_latitude = $this->input->post('latitude');
        $orz_longitude = $this->input->post('longitude');
        $orz_status = 1;

        $message = array();
        if ($this->form_validation->run() == TRUE) {

            $this->load->model('Auth_model', 'user');

            $cus_email = $this->input->get_post('cus_email');
            $cus_password = $this->input->get_post('cus_password');

            $this->user->setEmail($cus_email);
            $this->user->setPassword($cus_password);

            $chk = $this->user->check_user($cus_email);
            if ($chk) {
                $message = array(
                    'stats' => true,
                    'error' => "",
                    'message' => "Email $cus_email มีในระบบแล้ว"
                );
            } else {

                $cus_rule = 5;
                $cus_status = 1;
                $this->user->setEmail($cus_email);
                $this->user->setPassword($cus_password);
                $this->user->setFirstName(trim($orz_contact_name));
                $this->user->setLastName(trim($orz_contact_lastname));
                $this->user->setRole(trim($cus_rule));
                $this->user->setStatus($cus_status);

                $new_memer = $this->user->create();

                if ($new_memer) {
                    $userId = $this->user->getUserId();
                    /***** Register Orz ***/
                    $this->load->model($this->organized_model, 'orz');

                    $this->orz->setTitle($orz_title);
                    $this->orz->setOrzGroupId($orz_group);
                    $this->orz->setOrzType($orz_categories);
                    $this->orz->setAddress($orz_address);
                    $this->orz->setContactName($orz_contact_name);
                    $this->orz->setContactLastName($orz_contact_lastname);
                    $this->orz->setUserId($userId);
                    $this->orz->setStatus($orz_status);
                    $this->orz->setEmail($orz_email);
                    $this->orz->setLatitude($orz_latitude);
                    $this->orz->setLongitude($orz_longitude);

                    $this->orz->setStageCode($orz_zipcode);


                    $this->orz->setTel($orz_tel);
                    $this->orz->setContactTel($orz_contact_tel);
                    $this->orz->setDistrict($orz_district);
                    $this->orz->setAmphoe($orz_amphoe);
                    $this->orz->setProvince($orz_province);

                    $orz_new = $this->orz->create();
                    if ($orz_new) {
                        $message = array(
                            'stats' => true,
                            'error' => false,
                            'message' => "Register Success"
                        );

                        /*** Update Orz in Province **/
                        $province_code ="";
                        $this->load->model($this->province_model, 'province');
                        $this->province->setZipCode($orz_zipcode);
                        $province_code = $this->province->get_province_code();
                        $this->orz->setProvinceCode($province_code);
                        $this->orz->orz_in_province();


                    } else {
                        $message = array(
                            'stats' => false,
                            'error' => true,
                            'message' => "could not register"
                        );

                    }


                }else{
                    $message = array(
                        'stats' => false,
                        'error' => true,
                        'message' => "could not register"
                    );

                }

            }

        } else {
            $message = array(
                'stats' => false,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );
        }


        echo json_encode($message);


    }

    public function organization_update()
    {

        $data = $this->security->xss_clean($_POST);
        /*
        $this->form_validation->set_rules('cus_email', 'Email', 'trim|required|min_length[5]|max_length[80]', array('required' => 'You must provide a %s.', 'is_unique' => 'This %s already exists.'));
        $this->form_validation->set_rules('cus_password', 'Password', 'trim|required|min_length[5]|max_length[12]');
        */
        /*** Orz Information ****/

        $orz_id = $this->input->post('aid');
        $orz_board_of_directore = $this->input->post('board_of_directors');
        $orz_orz_group_id = $this->input->post('orz_group_id');
        $orz_orz_type_id = $this->input->post('orz_type_id');
        $orz_title = $this->input->post('title');
        $orz_objective = $this->input->post('objective');
        $orz_portfolio = $this->input->post('portfolio');
        $orz_address = $this->input->post('address');

        $orz_district = $this->input->post('district');
        $orz_amphoe = $this->input->post('amphoe');
        $orz_province = $this->input->post('province');

        /*
        $orz_district = "คลองข่อย";
        $orz_amphoe = "ปากเกร็ด";
        $orz_province = "ปากเกร็ด";
        */

        $orz_zipcode = $this->input->post('zipcode');
        $orz_latitude = $this->input->post('latitude');
        $orz_longitude = $this->input->post('longitude');
        $orz_contact_name = $this->input->post('contact_name');
        $orz_contact_lastname = $this->input->post('contact_lastname');
        $orz_contact_email = $this->input->post('email');
        $orz_tel = $this->input->post('orz_tel');
        $orz_mobile_no = $this->input->post('mobile_no');
        $orz_website = $this->input->post('website');
        $orz_logo = $this->input->post('logo');
        $orz_status = $this->input->post('aid_status');
        $orz_stage_code = $this->input->post('zipcode');
        $orz_user_id = $this->input->post('user_id');

        $message = array();
        if ($this->is_login()) {

            $this->load->model('Auth_model', 'user');
            /***** Register Orz ***/
            $this->load->model($this->organized_model, 'orz');

            $this->orz->setOrzId($orz_id);
            $this->orz->setTitle($orz_title);
            $this->orz->setOrzGroupId($orz_orz_group_id);
            $this->orz->setOrzType($orz_orz_type_id);
            $this->orz->setAddress($orz_address);
            $this->orz->setBoardOfDirectors($orz_board_of_directore);
            $this->orz->setWebsite($orz_website);
            $this->orz->setPortfolio($orz_portfolio);
            $this->orz->setObjecttive($orz_objective);
            $this->orz->setContactName($orz_contact_name);
            $this->orz->setContactLastName($orz_contact_lastname);
            $this->orz->setEmail($orz_contact_email);
            $this->orz->setLatitude($orz_latitude);
            $this->orz->setLongitude($orz_longitude);
            $this->orz->setStatus($orz_status);
            $this->orz->setStageCode($orz_stage_code);
            $this->orz->setUserId($orz_user_id);

            $this->orz->setTel($orz_tel);

            $this->orz->setDistrict($orz_district);
            $this->orz->setAmphoe($orz_amphoe);
            $this->orz->setProvince($orz_province);

            $orz_new = $this->orz->update();
            if ($orz_new) {
                $message = array(
                    'stats' => true,
                    'error' => false,
                    'message' => "Update Success"
                );

                /*** Update Orz in Province **/
                $province_code ="";
                $this->load->model($this->province_model, 'province');
                $this->province->setZipCode($orz_stage_code);
                $province_code = $this->province->get_province_code();
                $this->orz->setOrzId($orz_id);
                $this->orz->setProvinceCode($province_code);
                $this->orz->orz_in_province();

            } else {
                $message = array(
                    'stats' => false,
                    'error' => true,
                    'message' => "Could not update"
                );

            }


        } else {
            $message = array(
                'stats' => false,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );
        }


        echo json_encode($message);


    }

    public function getOrganizationLast(){

        $this->load->model($this->organized_model,'orz');
        $result = "";
        $orz_last = $this->orz->organization_last();
        if(!is_blank($orz_last)){
            $result = $orz_last;
        }
        echo json_encode($result);
    }

    public function searchOrganization(){
        $province_code = "";
        $province_code = $this->input->get_post('province_code');

        $this->load->model($this->organized_model,'orz');

        $orz_info = array();
        if(!is_blank($province_code)){
            $this->orz->setProvinceCode($province_code);
        }
        $orz_info = $this->orz->orz_for_search();

         $this->load->model($this->province_model, 'province');
        $this->province->setProvinceCode($province_code);
        $province_info = $this->province->provinces_by_code();

        $data = array(
            'province_info'=>$province_info,
            'orz_info'=>$orz_info
        );



        echo json_encode($data);
//        echo json_encode($orz_info);

    }


}
