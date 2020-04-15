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

    public function dashboard()
    {
        $this->data['title'] = "Thailand Consumer Concil";
        $this->load->view('tpl_dashboard', $this->data);
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


} // end of class
