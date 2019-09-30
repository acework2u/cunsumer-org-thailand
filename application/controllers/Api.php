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

    public function provinces()
    {
        $this->load->model($this->province_model, 'province');
        $result = array();
        $result = $this->province->provinces();

        echo json_encode($result);

    }

    public function admin_orz_all()
    {
        $this->load->model($this->organized_model, 'orz');
        $orz_info = array();
        if ($this->is_login() && getUserRoleId() == 1) {
            $orz_info = $this->orz->orz_all();
        }
        echo json_encode($orz_info);

    }

    public function admin_update_orz()
    {

        if ($this->is_login() && getUserRoleId() == 1) {
            $this->load->model($this->organized_model, 'orz');
            $this->load->model($this->logs_model, 'logs');


            $status = "";
            $orz_id = "";
            $data = array();

            $status = $this->input->get_post('status');
            $orz_id = $this->input->get_post('id');

            $txt_log_action = "";
            if ($status == 4) {
                $txt_log_action = "อนุมัติ";
            }
            if ($status == 3) {
                $txt_log_action = "ไม่อนุมัติ";
            }


            if (!is_blank($status) && !is_blank($orz_id)) {
                $update_date = date('Y-m-d H:i:s');
                $this->orz->setUpdatedDate($update_date);
                $this->orz->setOrzId($orz_id);
                $this->orz->setStatus($status);
                $rs = $this->orz->update();

                if ($rs) {
                    $data = array(
                        'error' => false,
                        'message' => "update Success",
                    );

                    $this->logs->approved_logs($orz_id, $txt_log_action);


                } else {
                    $data = array(
                        'error' => true,
                        'message' => "Could no update",
                    );
                }

            } else {
                $data = array(
                    'error' => true,
                    'message' => "permission",
                );
            }


//            echo $this->db->last_query();

            echo json_encode($data);


        }

    }

    public function volunteer_register()
    {
//    $data = $this->security->xss_clean($_POST);

//    $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[cus_mstr.email]|min_length[5]|max_length[80]', array('required' => 'You must provide a %s.', 'is_unique' => 'This %s already exists.'));


        $name = $this->input->post('name');
        $lastname = $this->input->post('lastname');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $district = $this->input->post('district2');
        $amphoe = $this->input->post('amphoe2');
        $province = $this->input->post('province2');
        $province_code = $this->input->post('province');
        $zipcode = $this->input->post('zipcode2');
        $tel_number = $this->input->post('tel');
        $organization_id = $this->input->post('organization');

        $status = 1;
        $create_date = date("Y-m-d H:i:s");


        $message = array();
//    if ($this->form_validation->run() == TRUE) {
        $this->load->model($this->volunteer_model, 'volun');

        $this->volun->setName($name);
        $this->volun->setLastName($lastname);
        $this->volun->setemail($email);
        $this->volun->setAddress($address);
        $this->volun->setTel($tel_number);
        $this->volun->setStatus($status);
        $this->volun->setDistrict($district);
        $this->volun->setAmphoe($amphoe);
        $this->volun->setProvince($province);
        $this->volun->setZipcode($zipcode);
        $this->volun->setCreateDate($create_date);
        $this->volun->setUpdateDate($create_date);

        if ($this->volun->check_volunteer()) {
            $this->volun->update();

        } else {
            if ($this->volun->create()) {
                $this->volun->setOrzId($organization_id);
                $this->volun->orz_volunteer_create($organization_id);

                $message = array(
                    'stats' => true,
                    'error' => false,
                    'message' => "You are Register Success"
                );
            }
        }


//    }else{
//        $message = array(
//            'stats' => false,
//            'error' => $this->form_validation->error_array(),
//            'message' => validation_errors()
//        );
//    }

        echo json_encode($message);


    }

    public function getGeoloaction()
    {

        $this->load->model($this->province_model, 'province');
        $province_code = "";
        $message = array();
        $geo_info = array();
        if (!is_blank($this->input->get_post('province_code'))) {
            $province_code = $this->input->get_post('province_code');

            $this->province->setProvinceCode($province_code);
            $rs = $this->province->provinces_by_code();


            if (is_array($rs)) {
                foreach ($rs as $row) {
                    $geo_info = array(
                        'lat' => $row['lat'],
                        'lng' => $row['lng'],
                        'zoom' => 11
                    );
                }
            }


            $message = array(
                'error' => false,
                'message' => $geo_info,

            );


        } else {
            $message = array(
                'error' => true,
                'message' => "no data"
            );
        }


        echo json_encode($message);


    }


    public function approved_logs()
    {
        if ($this->is_login() && getUserRoleId() == 1) {

            $this->load->model($this->logs_model, 'logs');


            $start_date = "";
            $end_date = "";

            $res_type = 'arrays';

            if (!is_blank($this->input->get_post('type'))) {
                $res_type = $this->input->get_post('type');
            }


            if (!is_blank($this->input->get_post('startDate'))) {
                $start_date = $this->input->get_post('startDate');
            }
            if (!is_blank($this->input->get_post('endDate'))) {
                $end_date = $this->input->get_post('endDate');
            }

            $this->logs->setCreatedDate($start_date);
            $this->logs->setUpdatedDate($end_date);
            $logs = $this->logs->get_approved_logs();

            $logs_info = array();
            if (!is_blank($logs)) {
                $i = 1;
                foreach ($logs as $row) {
                    $logs_info[] = array(
                        'index' => $i,
                        'created_date' => $row->created_date,
                        'orz_title' => $row->title,
                        'full_name' => $row->first_name . " " . $row->last_name,
                        'orz_action' => $row->action,
                        'updated_date' => $row->updated_date
                    );

                    $i++;
                }
            }

            if ($res_type == "json") {
                echo json_encode($logs_info);
            } else {
                return $logs_info;
            }

        }
    }

    public function user_access()
    {
        $user_group_id = 3;
        if (!is_blank($this->input->get_post('group_id'))) {
            $user_group_id = $this->input->get_post('group_id');
        }
        $data_info = array();
        $this->load->model($this->province_model, 'province');
        switch ($user_group_id) {
            case 3:
                $result = $this->province->zone_list();

                foreach ($result as $row) {
                    $data_info[] = array(
                        'code' => get_array_value($row, 'code', ''),
                        'title' => get_array_value($row, 'title_th')
                    );
                }
                break;
            case 4:
                $result = $this->province->provinces_list();
                foreach ($result as $row) {
                    $data_info[] = array(
                        'code' => get_array_value($row, 'code', ''),
                        'title' => get_array_value($row, 'name_in_thai')
                    );
                }

                break;
        }
        echo json_encode($data_info);


    }

    public function admin_user_status()
    {
        $this->load->model($this->auth_model, 'user');
        $user_status = array();
        if ($this->user->user_status()) {
            $user_status = $this->user->user_status();
        }
        echo json_encode($user_status);

    }

    public function organization_count_all()
    {
        $this->load->model($this->organized_model, 'orz');

        $total = $this->orz->orz_count_all();
        $N = 1;
        $W = 1;
        $S = 1;
        $E = 1;
        $M = 1;
        $EN = 1;
        $BKK = 1;

        $orz_in_zone = $this->orz->orz_count_zone();

       if(!is_blank($orz_in_zone)){
           foreach ($orz_in_zone as $row){
               $zone = $row['zone_code'];

               switch ($zone){

               }


           }

       }


        $orz_info = array();
        $orz_info = array(
            'orz_total' => number_format($total, 0, '', ','),
            'orz_n' => number_format($N, 0, '', ','),
            'orz_s' => number_format($S, 0, '', ','),
            'orz_e' => number_format($E, 0, '', ','),
            'orz_w' => number_format($W, 0, '', ','),
            'orz_m' => number_format($M, 0, '', ','),
            'orz_en' => number_format($EN, 0, '', ','),
            'orz_bkk' => number_format($BKK, 0, '', ','),

        );

        $orz_info['orz_in_zone'] = $orz_in_zone;

        echo json_encode($orz_info);


    }




} // End of Class
