<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{


    public $view_page;
    public $language;
    public $report_model;
    public $reports_model;
    public $donation_model;
    public $mail_model;
    public $donor_model;
    public $invoice_model;
    public $bank_model;
    public $payment_model;
    public $province_model;
    public $volunteer_model;
    /*** 2c2p *****/
    public $_merchant_id;
    public $_secret_key;
    public $_payment_description;
    public $_order_id;
    public $_currency;
    public $_amount;
    public $_version;
    public $_payment_url;
    public $_result_url;
    public $_params;
    public $_has_value;

    /**** Swft MAil ***/
    public $_emailUser;
    public $_emailPassword;

    /***  Orz Thailand **/
    public $organized_model;
    public $_orz_group_model;
    public $auth_model;
    public $logs_model;

    /**** Menu **/
    public $_my_rule;


    function __construct()
    {
        parent::__construct();

        $this->language = "thai";

        if (!$this->session->userdata('site_lang')) {
            $this->session->set_userdata('site_lang', $this->language);
        }

        $this->view_page = "";

        $this->report_model = "report_model";
        $this->reports_model = "reports_model";
        $this->donation_model = "donation_model";
        $this->donor_model = "donor_model";
        $this->invoice_model = "invoice_model";
        $this->bank_model = "bank_model";
        $this->payment_model = "payment_model";
        $this->province_model = "provinces_model";


        /**** 2C2P ***/
        $this->_merchant_id = C2P_MERCHANT_ID;
        $this->_secret_key = C2P_SECRET_KEY;
        $this->_currency = C2P_CURRENCY;
        $this->_order_id = "";
        $this->_version = C2P_VERSION;
        $this->_payment_url = C2P_PAYMENT_URL;
        $this->_result_url = C2P_RESULT_URL;
        $this->_payment_description = "Donate Consumer thai.org";
        $this->_params = "";
        $this->_amount = '000000000000';


        /** Orz***/
        $this->organized_model = "organized_model";
        $this->_orz_group_model = "orz_group_model";
        $this->auth_model = "auth_model";
        $this->volunteer_model = "volunteer_model";
        $this->logs_model = "logs_model";

        /**** My Permission ***/
        $this->_my_rule = getUserRoleId();


    }


    public function sendParams()
    {

        $this->_params = $this->_version . $this->_merchant_id . $this->_payment_description . $this->_order_id . $this->_currency . $this->_amount . $this->_result_url;

        return $this->_params;
    }

    public function setAmount($amount)
    {
        $this->_amount = $amount;
    }

    public function setPaymentDescription($description)
    {
        $this->_payment_description = $description;
    }

    public function setOrderId($orderId)
    {
        $this->_order_id = $orderId;
    }

    public function hashValue()
    {
        $hash_value = "";
//        $hash_val = hash_hmac('sha1',$this->sendParams(),$this->_secret_key,false);


//        $params = $version.$merchant_id.$payment_description.$order_id.$currency.$amount.$result_url_1;
        $params2 = $this->_version . $this->_merchant_id . $this->_payment_description . $this->_order_id . $this->_currency . $this->_amount . $this->_result_url;
        $hash_value = hash_hmac('sha1', $params2, $this->_secret_key, false);


        return $hash_value;
    }


    //create custom Controller
    function page_construct($page, $meta = array(), $data = array())
    {
        $meta['message'] = isset($data['message']) ? $data['message'] : $this->session->flashdata('message');
        $meta['error'] = isset($data['error']) ? $data['error'] : $this->session->flashdata('error');
        $meta['warning'] = isset($data['warning']) ? $data['warning'] : $this->session->flashdata('warning');
        $meta['info'] = $this->site->getNotifications();
        $this->load->view('include_header', $meta);
        $this->load->view($page, $data);
        $this->load->view('include_footer', $data);
    }

    public function getUserSession()
    {
        $userSession = $this->session->userdata('userSession');
        return $userSession;
    }

    public function getSessionUserAid()
    {
        $obj = $this->getUserSession();
        return get_array_value($obj, "user_id", "");
    }

    function getSessionUserRoleAid()
    {
        $obj = $this->getUserSession();
        return get_array_value($obj, "user_role_id", "");
    }

    public function is_login()
    {
        $user_aid = $this->getSessionUserAid();
        if ($user_aid != "") {
            return true;
        } else {
            return false;
        }

    }


    public function resizeImage($filename)
    {
        $source_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/'.getUserAid()."/" . $filename;
        $target_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/'.getUserAid().'/thumbnail/';
        $config_manip = array(
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'create_thumb' => TRUE,
            'thumb_marker' => '',
            'width' => 60,
            'height' => 60
        );


        $this->load->library('image_lib', $config_manip);
        if (!$this->image_lib->resize()) {
            return $this->image_lib->display_errors();
        } else {

        }

        $this->image_lib->clear();
    }
    public function resizeLogoImage($filename,$orz_id)
    {
        $source_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/'.$orz_id."/" . $filename;
//        $target_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/'.$orz_id."/thumbnail/";
        $target_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/'.$orz_id."/";

//        if (!is_dir($target_path)) {
//            $dir_upload = mkdir($target_path, 0777, TRUE);
//
//        }

        $config_manip = array(
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'create_thumb' => TRUE,
            'thumb_marker' => '',
            'width' => 250,
            'height' => 110
        );


        $this->load->library('image_lib', $config_manip);
        if (!$this->image_lib->resize()) {
            return $this->image_lib->display_errors();
        } else {

        }

        $this->image_lib->clear();
    }

    public function resize_image($image_data){
        $this->load->library('image_lib');
        $w = $image_data['image_width']; // original image's width
        $h = $image_data['image_height']; // original images's height
        $filename = $image_data['file_name'];

        $n_w = MAX_WIDTH; // destination image's width
        $n_h = MAX_HEIGHT; // destination image's height

        $source_ratio = $w / $h;
        $new_ratio = $n_w / $n_h;

        $source_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/'.getUserAid() . $filename;
        $target_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/'.getUserAid().'/thumbnail/';

        if($source_ratio != $new_ratio){

            $config['image_library'] = 'gd2';
            $config['source_image'] = $source_path;
            $config['maintain_ratio'] = FALSE;
            if($new_ratio > $source_ratio || (($new_ratio == 1) && ($source_ratio < 1))){
                $config['width'] = $w;
                $config['height'] = round($w/$new_ratio);
                $config['y_axis'] = round(($h - $config['height'])/2);
                $config['x_axis'] = 0;

            } else {

                $config['width'] = round($h * $new_ratio);
                $config['height'] = $h;
                $size_config['x_axis'] = round(($w - $config['width'])/2);
                $size_config['y_axis'] = 0;

            }

            $this->image_lib->initialize($config);
            // $this->image_lib->crop();
            $this->image_lib->clear();
        }
        $config['image_library'] = 'gd2';
        $config['source_image'] = $source_path;
        $config['new_image'] = $target_path;
        $config['maintain_ratio'] = TRUE;
        //$config['width'] = $n_w;
        //$config['height'] = $n_h;
        $config['width'] = $w;
        $config['height'] = $h;
        $this->image_lib->initialize($config);

        if (!$this->image_lib->resize()){

            echo $this->image_lib->display_errors();

        } else {

//            echo $w+' '_$h;

        }
    }

    public function do_upload_file()
    {

        if (!is_dir('uploads/'.getUserAid())) {
            $dir_upload =  mkdir('./uploads/' . getUserAid(), 0777, TRUE);

        }

        $config['upload_path'] = 'uploads/'.getUserAid();
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1024';
        $config['overwrite'] = TRUE;
//        $config['max_width'] = '1024';
//        $config['max_height'] = '574';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $data = array();

        if (!$this->upload->do_upload('userfile')) {

            $data = array('upload_data' => $this->upload->data(), 'error' => $this->upload->display_errors());
//            $this->load->view('test', $data);

            return $data;

        } else {

            $uploadedImage = $this->upload->data();
            $this->resizeImage($uploadedImage['file_name']);

            $data = array('upload_data' => $this->upload->data(), 'error' => $this->upload->display_errors());
            return $data;
        }


    }


    public function generateInvoice()
    {
//        $this->load->model($this->donation_model, 'donation');
//        $numId = 0;
//        $numId = $this->donation->lastDonationId();
//        $numId += 1;
//        $inv = str_pad($numId, 6, "0", STR_PAD_LEFT);
//        $inv = "FFC" . date("y") . $inv;
//
//        return $inv;

        $this->load->model($this->donation_model, 'donation');
        $numId = 0;
        $numId = $this->donation->lastInvoiceId();
        if (is_blank($numId)) {
            $numId = 0;
        }
        $numId += 1;
        $inv = str_pad($numId, 6, "0", STR_PAD_LEFT);
        $inv = "FFC" . date("y") . $inv;

        return $inv;
    }

    public function getBanklist()
    {
        $this->load->model($this->bank_model, 'bank');
        $rs = array();
        $rs = $this->bank->bank_list();

        return $rs;

    }

    public function getPaymentStatus()
    {
        $this->load->model($this->payment_model, 'payment');
        $rs = array();
        $rs = $this->payment->payment_status();
        return $rs;
    }

    public function checkInvoiceDuplicate($donoation_id="")
    {
        if(!is_blank($donoation_id)){
            $this->load->model($this->invoice_model, 'invoice');
           $invoce =  $this->invoice->check_duplicate_invoice($donoation_id);

            if($invoce){
                return true;
            }else{
                return false;
            }

        }




    }
    public function generate_invoice($donateId = 0)
    {
        $this->load->model($this->donation_model, 'donation');

        $id = $donateId;
        $this->donation->setDonationId($id);
        $result = array();
        $result = $this->donation->donationById();
        $title_name="";
        $first_name="";
        $last_name="";

        if (is_array($result)) {
            foreach ($result as $row) {
                $invoice_no = get_array_value($row, 'inv_number', '');
                $amount = get_array_value($row, 'amount', 0);
                $payment_channel = get_array_value($row, 'payment_channel', '');
                $payment_status = get_array_value($row, 'payment_status', '');
                $bank_name = get_array_value($row, 'bankName', '');
                $panCard = get_array_value($row, 'pan', '');
                $tranRef = get_array_value($row, 'tranRef', '');
                $transfer_date = get_array_value($row, 'transfer_date', '');
                $title_name = get_array_value($row, 'title_name', '');
                $first_name = get_array_value($row, 'first_name', '');
                $last_name = get_array_value($row, 'last_name', '');
                $tax = get_array_value($row, 'tax_code', '');
                $address = get_array_value($row, 'address', '');
                $campaign_name = get_array_value($row, 'campaign_name', '');


            }
            $full_name = $title_name . " " . $first_name . " " . $last_name;
            $transferDate = '';

            if(!is_blank($transfer_date)){
                $transferDateTime = datetime2display($transfer_date);
                $transferDate = DateThai($transferDateTime);
            }



            // Create Pdf
            $options = array(
                'default_font' => 'thsarabunnew',
                'default_font_size' => 15,
                'debug' => true
            );

            $mpdf = new \Mpdf\Mpdf($options);


            $mpdf->SetImportUse();
            $pagecount = $mpdf->SetSourceFile('uploads/invoicetemplate.pdf');
// Import the last page of the source PDF file
            $tplId = $mpdf->ImportPage($pagecount);
            $mpdf->UseTemplate($tplId);
            //Invoice No
            $mpdf->WriteFixedPosHTML($invoice_no, 162, 37, 50, 90, 'auto');

            $mpdf->WriteFixedPosHTML($transferDate, 162, 46, 50, 90, 'auto');
            //$Full Name Donor

            $mpdf->WriteFixedPosHTML($full_name, 40, 54, 150, 90, 'auto');
//        Address

            $mpdf->WriteFixedPosHTML($address, 35, 60, 100, 90, 'auto');
            // Campaign

            $mpdf->WriteFixedPosHTML($campaign_name, 40, 66, 100, 90, 'auto');
            // Amount Donation

            $amount1 = number_format($amount, 2, '.', ',');
            $textAmount = Convert($amount);
            $mpdf->WriteFixedPosHTML($amount1, 40, 73, 50, 90, 'auto');
            $mpdf->WriteFixedPosHTML($textAmount, 120, 73, 100, 90, 'auto');
            //Check mark


            switch ($payment_channel) {
                case "001":
                    // Credit
                    $mpdf->Image('uploads/icons8-checkmark-26.png', 35, 86, 6, 6, 'png', '', true, false);
                    // Card Number
                    $cardId = $panCard;
                    $mpdf->WriteFixedPosHTML($cardId, 105, 86, 50, 90, 'auto');
                    /*** Bank Name  */
                    $bankName = $bank_name;
                    $mpdf->WriteFixedPosHTML($bankName, 160, 86, 50, 90, 'auto');
                    break;
                case "006":
                    // Bank Transfer
                    //Bank Transfer
                    $mpdf->Image('uploads/icons8-checkmark-26.png', 35, 99, 6, 6, 'png', '', true, false);
                    /*** Bank Name  */
                    $bankName = $bank_name;
                    $mpdf->WriteFixedPosHTML($bankName, 70, 99, 50, 90, 'auto');
                    $bankBranch = "งามวงศ์วาน";
                    $mpdf->WriteFixedPosHTML($bankBranch, 125, 99, 50, 90, 'auto');
                    $mpdf->WriteFixedPosHTML($transferDate, 170, 99, 50, 90, 'auto');

                    break;
                case "003":
                    //Debit
                    $mpdf->Image('uploads/icons8-checkmark-26.png', 65, 86, 6, 6, 'png', '', true, false);
                    // Card Number
                    $cardId = $panCard;
                    $mpdf->WriteFixedPosHTML($cardId, 110, 86, 50, 90, 'auto');
                    break;
                case "007":
                    //QR COde
                    $mpdf->Image('uploads/icons8-checkmark-26.png', 35, 92, 6, 6, 'png', '', true, false);
                    break;


            }

//            $mpdf->Output();
//            $fileName = $invoice_no . ".pdf";
//            $fullfilePath = "downloads/invoice/" . $invoice_no . ".pdf";
//            ob_clean();
//            $mpdf->Output($fullfilePath, 'F');

            return $mpdf->Output('', 'S');

        } // end if
    }


}
