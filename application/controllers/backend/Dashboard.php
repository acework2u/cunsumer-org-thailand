<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        if ($this->is_login()) {
            $this->dashboard();
        } else {
            redirect('signin');
        }

    }


    public function volunteerInOrz()
    {
        if ($this->is_login()) {
            $this->volunteerDashboard();
        } else {
            redirect('signin');
        }
    }

    public function dashboard()
    {
        $this->data['title'] = "Thailand Consumer Concil";
        $this->load->view('tpl_dashboard', $this->data);
    }

    public function volunteerDashboard()
    {
        $this->data['title'] = "Volunteer";

        $this->load->view('tpl_volunteer_dashboard', $this->data);

    }

    public function volunteer_update()
    {
        if ($this->is_login()) {
            $aid = "";
            if(!is_blank($this->input->get_post('aid'))){
                $aid = $this->input->get_post('aid');
            }
            $name = "";
            if(!is_blank($this->input->get_post('name'))){
                $name = $this->input->get_post('name');
            }
            $lastName = "";
            if(!is_blank($this->input->get_post('lastname'))){
                $lastName = $this->input->get_post('lastname');
            }
            $address = "";
            if(!is_blank($this->input->get_post('address'))){
                $address = $this->input->get_post('address');
            }
            $district = "";
            if(!is_blank($this->input->get_post('district'))){
                $district = $this->input->get_post('district');
            }
            $amphoe = "";
            if(!is_blank($this->input->get_post('amphoe'))){
                $amphoe = $this->input->get_post('amphoe');
            }
            $province = "";
            if(!is_blank($this->input->get_post('province'))){
                $province = $this->input->get_post('province');
            }
            $zipcode = "";
            if(!is_blank($this->input->get_post('zipcode'))){
                $zipcode = $this->input->get_post('zipcode');
            }
            $tel = "";
            if(!is_blank($this->input->get_post('tel'))){
                $tel = $this->input->get_post('tel');
            }
            $email = "";
            if(!is_blank($this->input->get_post('email'))){
                $email = $this->input->get_post('email');
            }
            $status = "";
            if(!is_blank($this->input->get_post('status'))){
                $status = $this->input->get_post('status');
            }
            $update = date("Y-m-d H:i:s");
            $orz_volunteer_mn_id = "";
            if(!is_blank($this->input->get_post('orz_volunteer_mn_id'))){
                $orz_volunteer_mn_id = $this->input->get_post('orz_volunteer_mn_id');
            }

            $this->load->model($this->volunteer_model,'volunt');
            $this->volunt->setId($aid);
            $this->volunt->setUpdateDate($update);
            $this->volunt->setName($name);
            $this->volunt->setLastName($lastName);
            $this->volunt->setTel($tel);
            $this->volunt->setEmail($email);
            $this->volunt->setStatus($status);
            $this->volunt->setAddress($address);
            $this->volunt->setDistrict($district);
            $this->volunt->setAmphoe($amphoe);
            $this->volunt->setProvince($province);
            $this->volunt->setZipcode($zipcode);
            $this->volunt->setvolunteerMnId($orz_volunteer_mn_id);

            $result = $this->volunt->update();
            $this->volunt->volunteerOrzUpdateStatus();

            $data  = array(
                'message'=>"",
                'status'=>""

            );

            if($result){
                //Update Success
                $data  = array(
                    'message'=>"บันทึกข้อมูลสำเร็จ",
                    'status'=>true

                );
            }else{
                //Update Fail
                $data  = array(
                    'message'=>"บันทึกข้อมูลไม่สำเร็จ",
                    'error'=>true

                );
            }

            echo json_encode($data);

        }// end if login
    }

    public function volunteer_delete()
    {
        if ($this->is_login()) {
            $volunteeer_id = "";
            $orz_id = "";
            if(!is_blank($this->input->get_post('aid'))){
                $volunteeer_id = $this->input->get_post('aid');
            }

            if(!is_blank($this->input->get_post('orz_aid'))){
                $orz_id = $this->input->get_post('orz_aid');
            }


//            echo $orz_id." vol_id".$volunteeer_id;
//
//            exit(0);


            // Load Model
            $this->load->model($this->volunteer_model,'volunt');
            $this->volunt->setId($volunteeer_id);
            $actionDel = $this->volunt->delete();


            $data  = array(
                'message'=>"",
                'status'=>""

            );

            if($actionDel){
                $this->volunt->orz_volunteer_mn_delete($orz_id,$volunteeer_id);

                $data  = array(
                    'message'=>"ลบข้อมูลสำเร็จ",
                    'status'=>true

                );


//                return true;
            }else{
               $data  = array(
                    'message'=>"ลบข้อมูลสำเร็จ",
                    'error'=>true

                );
            }


            echo json_encode($data);





        }//end if login
    }

    public function orz_delete(){
        if($this->is_login()){
            $orz_id = "";
            if(!is_blank($this->input->get_post('orz_id'))){
                $orz_id = $this->input->get_post('orz_id');
            }
            $this->load->model($this->organized_model, 'orz');
            $this->orz->setOrzId($orz_id);


            if($this->orz->delete()){
               $data = array(
                 'status'=>true,
                 'statusCode'=>200,
                 'message'=>"Delete Success"
               );
            }else{
                $data = array(
                    'error'=>true,
                    'statusCode'=>400,
                    'message'=>"ไม่สามารถทำการลบข้อมูลได้"
                );
            }
            echo json_encode($data);

        }
    }
    public function topdaonate()
    {
        if ($this->is_login()) {
            $this->load->model($this->donation_model, 'donation');
            $result = array();
            $result = $this->donation->topDonor();
            $rows = array();
            if (is_array($result) && !is_blank($result)) {
                foreach ($result as $row) {
                    $rows[] = array(
                        'aid' => get_array_value($row, 'aid', ''),
                        'full_name' => get_array_value($row, 'first_name', ''),
                        'email' => get_array_value($row, 'email', ''),
                        'total_amount' => get_array_value($row, 'TotalAmount', '0'),
                        'donor_id' => get_array_value($row, 'donor_id', '')
                    );
                }
            }
            echo json_encode($rows);


        }
    }

    public function orzInformationByUser()
    {
        if ($this->is_login()) {
            $this->load->model($this->organized_model, 'orz');
            $result = array();
            $orz_info = $this->orz->orz_information();
            if (is_array($orz_info)) {
                foreach ($orz_info as $row) {

                    $result = $row;

                }
            }
            echo json_encode($result);
        }
    }

    public function volunteer_in_join_list()
    {
        $volunteer_list = array();
        $orz_id = "";


        if ($this->is_login()) {

            if (!is_blank($this->input->get_post('orz_id'))) {
                $orz_id = $this->input->get_post('orz_id');
            }

            $this->load->model($this->volunteer_model, 'volunteer');
            $this->volunteer->setOrzId($orz_id);
            $volunteer_list = $this->volunteer->volunteer_join_orz();

        }
//        echo $this->db->last_query();
        echo json_encode($volunteer_list);
    }

    public function upload_file()
    {

        if (!is_dir('uploads/' . getUserAid())) {
            $dir_upload = mkdir('./uploads/' . getUserAid(), 0777, TRUE);

        }


        $orz_id = "";
        $orz_id = $this->input->post('aid');

        $img_dir = 'uploads/' . getUserAid();
        $config['upload_path'] = 'uploads/' . getUserAid();

//        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1024';
        $config['overwrite'] = TRUE;
//        $config['max_width'] = '1024';
//        $config['max_height'] = '574';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {

//            $data = array('upload_data' => $this->upload->data(), 'error' => $this->upload->display_errors());
//            $this->load->view('test', $data);

            $error = array('error' => $this->upload->display_errors());

            $res['error'] = true;
            $res['message'] = "Upload fail";

            echo json_encode($error);


        } else {

            $uploadedImage = $this->upload->data();
//            $this->resizeImage($uploadedImage['file_name']);
//            $this->resize_image($uploadedImage);
            $this->resizeImage($uploadedImage);


            $res['message'] = "Upload Success";
            $res['upload_data'] = $this->upload->data();
            $res['file_name'] = $this->upload->data('file_name');


            $this->load->model($this->organized_model, 'orz');

            $img_full = $img_dir . "/" . $this->upload->data('file_name');


            $this->orz->setLogo($img_full);
            $this->orz->setOrzId($orz_id);

            $this->orz->orz_logo();

            $res['full_img'] = $img_full;


        }
        echo json_encode($res);


    }

    public function upload_img_logo_file()
    {

        $orz_id = "";
        $orz_id = $this->input->post('aid');


        if (!is_blank($orz_id)) {
            if (!is_dir('uploads/' . $orz_id)) {
                $dir_upload = mkdir('./uploads/' . $orz_id, 0777, TRUE);

            }

        }

        $img_dir = 'uploads/' . $orz_id;
        $config['upload_path'] = 'uploads/' . $orz_id;

//        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10024';
        $config['overwrite'] = TRUE;
//        $config['max_width'] = '1024';
//        $config['max_height'] = '574';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {

//            $data = array('upload_data' => $this->upload->data(), 'error' => $this->upload->display_errors());
//            $this->load->view('test', $data);

            $error = array('error' => $this->upload->display_errors());

            $res['error'] = true;
            $res['message'] = "Upload fail";

            echo json_encode($error);


        } else {

            $uploadedImage = $this->upload->data();
//            $this->resizeImage($uploadedImage['file_name']);
//            $this->resize_image($uploadedImage);
            $this->resizeLogoImage($this->upload->data('file_name'), $orz_id);


            $res['message'] = "Upload Success";
            $res['upload_data'] = $this->upload->data();
            $res['file_name'] = $this->upload->data('file_name');


            $this->load->model($this->organized_model, 'orz');

            $img_full = $img_dir . "/" . $this->upload->data('file_name');


        }


        $this->orz->setLogo($img_full);

        $this->orz->setOrzId($orz_id);

        $this->orz->orz_logo();

        $res['full_img'] = $img_full;


        echo json_encode($res);


//        exit(0);


    }


} // end of class
