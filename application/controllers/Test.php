<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Test extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo "Joe";
    }


    public function testpdf()
    {


        $mpdf = new \Mpdf\Mpdf(['default_font' => 'thsarabunnew', 'default_font_size' => 15]);

        $mpdf->SetImportUse();
        $pagecount = $mpdf->SetSourceFile('uploads/invoicetemplate.pdf');
// Import the last page of the source PDF file
        $tplId = $mpdf->ImportPage($pagecount);
        $mpdf->UseTemplate($tplId);
        //Invoice No
        $mpdf->WriteFixedPosHTML('FFC19000001', 162, 37, 50, 90, 'auto');
        $date = date('d-m-Y');
        $mpdf->WriteFixedPosHTML(DateThai($date), 162, 46, 50, 90, 'auto');
        //$Full Name Donor
        $fullName = "นาย อานนท์ เดชพละ";
        $mpdf->WriteFixedPosHTML($fullName, 40, 54, 100, 90, 'auto');
//        Address
        $address = "4/488 อาคาร p2 ต.บ้านใหม่ อ.บากเกร็ด จ.นนทบุรี 11120";
        $mpdf->WriteFixedPosHTML($address, 35, 60, 100, 90, 'auto');
        // Campaign
        $Campaign = "มูลนิธิเพื่อผู้บริโภค";
        $mpdf->WriteFixedPosHTML($Campaign, 40, 66, 100, 90, 'auto');
        // Amount Donation
        $amount = '10000';
        $amount1 = number_format($amount, 2, '.', ',');
        $textAmount = Convert($amount);
        $mpdf->WriteFixedPosHTML($amount1, 40, 73, 50, 90, 'auto');
        $mpdf->WriteFixedPosHTML($textAmount, 120, 73, 100, 90, 'auto');
        //Check mark

        //Credit
        $mpdf->Image('uploads/icons8-checkmark-26.png', 35, 86, 6, 6, 'png', '', true, false);
        //Debit
        $mpdf->Image('uploads/icons8-checkmark-26.png', 65, 86, 6, 6, 'png', '', true, false);
        // Card Number
        $cardId = "345xxxxxxx230";
        $mpdf->WriteFixedPosHTML($cardId, 110, 86, 50, 90, 'auto');
        /*** Bank Name  */
        $bankName = "UOB Bank";
        $mpdf->WriteFixedPosHTML($bankName, 160, 86, 50, 90, 'auto');


        //QR Code
        $mpdf->Image('uploads/icons8-checkmark-26.png', 35, 92, 6, 6, 'png', '', true, false);
        //Bank Transfer
        $mpdf->Image('uploads/icons8-checkmark-26.png', 35, 99, 6, 6, 'png', '', true, false);
        /*** Bank Name  */
        $bankName = "กสิกรไทย";
        $mpdf->WriteFixedPosHTML($bankName, 70, 99, 50, 90, 'auto');
        $bankBranch = "งามวงศ์วาน";
        $mpdf->WriteFixedPosHTML($bankBranch, 125, 99, 50, 90, 'auto');
        $trnsferDate = date('Y-m-d H:i:s');
        $mpdf->WriteFixedPosHTML(DateTimeThai($trnsferDate), 170, 99, 50, 90, 'auto');
        $mpdf->Output();


    }


    public function donationById()
    {
        $this->load->model($this->donation_model, 'donation');

        $id = 6;
        $this->donation->setDonationId($id);
        $result = array();
        $result = $this->donation->donationById();

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
            $transferDateTime = datetime2display($transfer_date);
            $transferDate = DateThai($transferDateTime);


            // Create Pdf
            $mpdf = new \Mpdf\Mpdf(['default_font' => 'thsarabunnew', 'default_font_size' => 15]);

            $mpdf->SetImportUse();
            $pagecount = $mpdf->SetSourceFile('uploads/invoicetemplate.pdf');
// Import the last page of the source PDF file
            $tplId = $mpdf->ImportPage($pagecount);
            $mpdf->UseTemplate($tplId);
            //Invoice No
            $mpdf->WriteFixedPosHTML($invoice_no, 162, 37, 50, 90, 'auto');

            $mpdf->WriteFixedPosHTML($transferDate, 162, 46, 50, 90, 'auto');
            //$Full Name Donor

            $mpdf->WriteFixedPosHTML($full_name, 40, 54, 100, 90, 'auto');
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
                case "002":
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
                case "004":
                    //QR COde
                    $mpdf->Image('uploads/icons8-checkmark-26.png', 35, 92, 6, 6, 'png', '', true, false);
                    break;


            }
            $fileName = $invoice_no . ".pdf";
            $fullfilePath = "downloads/invoice/" . $invoice_no . ".pdf";

            $mpdf->Output($fileName, 'D');
            ob_clean();
            $mpdf->Output($fullfilePath, 'F');

        } // end if

    }


    public function checkDonor()
    {
        $this->load->model($this->donor_model, 'donor');

        $email = "kasinee.nut@gmail.com";

        $result = array();
        $this->donor->setEmail($email);

        $result = $this->donor->checkDonor();
        $donorID = $this->donor->getDonorId();

//        print_r($result);

        echo "Donor ID = $result" . $donorID;
//        echo $this->db->last_query();

    }


    public function getInvoiceNo()
    {

        echo $this->generateInvoice();

    }


    public function amount()
    {
        $amount = '000000010054';

        echo floatval($amount) / 100;
        echo "<br>";
        echo amountToDb($amount);

    }


    public function thankyou()
    {


        $this->load->library('SocialMedia');

        $socmed = new SocialMedia();
        $social_media_name = $socmed->GetSocialMediaSites_WithShareLinks_OrderedByPopularity();
        $myScial = array('url' => 'https://donate.consumerthai.org/', 'title' => 'Consumer Thailand');
        $social_media_urls = $socmed->GetSocialMediaSiteLinks_WithShareLinks($myScial);

        $this->data['media_name'] = $social_media_name;
        $this->data['media_urls'] = $social_media_urls;

//        $socmed = new SocialMedia();
//        $social_media_names = $socmed->GetSocialMediaSites_WithShareLinks_OrderedByPopularity();
//        $mySocial = array('url' => 'http://www.earthfluent.com/', 'title' => 'EarthFluent','image'=>"");
//        $social_media_urls = $socmed->GetSocialMediaSiteLinks_WithShareLinks($mySocial);


        $this->load->view('frontend/thankyou', $this->data);
    }


    public function testdate()
    {
        echo date('m-01-Y 00:00:00', strtotime('this month')) . '<br/>';
        echo date('m-t-Y 12:59:59', strtotime('this month')) . '<br/>';

        echo date('Y-m-01 00:00:00', strtotime('this month')) . '<br/>';
        echo date('Y-m-t 12:59:59', strtotime('this month')) . '<br/>';


//        $timeStamp = "060119164635";
////        $timeStamp = str_split($timeStamp,2);
//////        $timeStamp = date( "y-m-d H:m:s", strtotime($timeStamp));
////
////        $d=mktime($timeStamp[3],$timeStamp[4],$timeStamp[5],$timeStamp[1],$timeStamp[0],$timeStamp[2]);
//
//        print_r($timeStamp);
//        echo "Created date is " . datetime2db($timeStamp);
//
//        echo datetime2display($timeStamp);

        $this->load->model($this->report_model, 'report');

        $startDate = date('Y-m-01 00:00:00');
        $endDate = date('Y-m-t 12:59:59');
//        $startDate =  mdate('%Y-%m-%d %H:%i:%s', now());


        $jvDate = "2018-12-31T17:00:00.000Z";

//
//        echo $jvDate = date('Y-m-d', strtotime($jvDate));
//        exit();


//        $data_where['updated_date'] = "2017-01-01 00:00:00";

        $start_date = array('updated_date >= $startDate');
        $end_date = array('updated_date <= $endDate');


        $donationList = array();

        $this->report->setStartDate($start_date);
        $this->report->setEndDate($end_date);
        if ($this->report->donation()) {
            $donationList = $this->report->donation();
        }

        echo json_encode($donationList);


    }


    public function exportxls($data = '')
    {


        $report_date = "วันที่ " . date('Y-m-d');

        $sp = new Spreadsheet();
        $sheet = $sp->getActiveSheet();
        /**** Header ***/
        $sheet->setCellValue('C1', 'มูลนิธิเพื่อผู้บริโภค');
        $sheet->setCellValue('C2', 'รายงานรับเงินบริจาค');
//        $sheet->setCellValue('A3', $report_date);

        /*** Column ***/
        $sheet->setCellValue('A4', 'ลำดับที่');
        $sheet->setCellValue('B4', 'วันที่');
        $sheet->setCellValue('C4', 'ใบเสร็จรับเงิน');
        $sheet->setCellValue('D4', 'ชื่อ-นามสกุล');
        $sheet->setCellValue('E4', 'จำนวนเงินที่ได้รับ(บาท)');
        $sheet->setCellValue('F4', 'ชำระเงิน ธนาคาร');
        /**Content */

        $data = $this->getfiles();
        if (is_array($data)) {
            $sp->getActiveSheet()->fromArray($data, null, 'A5');
            $last_row = count($data) + 1;

            /***** Style ***/
            $sp->getActiveSheet()->getStyle('E5:E' . $last_row)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
            $sp->getActiveSheet()->getStyle('A4:F4')->getFont()->setBold(true);
            $sp->getActiveSheet()->getStyle('C1:C2')->getFont()->setBold(true);

            foreach (range('A', 'F') as $columnID) {
                $sp->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
            }

        }


        $writer = new Xlsx($sp);
        $filename = 'donation-report_' . date('Y-m-d');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');


    }


    public function getfiles()
    {
        if ($this->is_login()) {
            $this->load->model($this->report_model, 'report');

            $startDate = date('Y-m-01 00:00:00');
            $endDate = date('Y-m-t 12:59:59');

            if (!is_blank($this->input->get_post('startDate'))) {
                $startDate = date('Y-m-d', strtotime($this->input->get_post('startDate')));
            }
            if (!is_blank($this->input->get_post('endDate'))) {
                $endDate = date('Y-m-d', strtotime($this->input->get_post('endDate')));
            }


            $donationList = array();
            $start_date = array('updated_date >= $startDate');
            $end_date = array('updated_date <= $endDate');

            $this->report->setStartDate($start_date);
            $this->report->setEndDate($end_date);

            if ($this->report->donation()) {
                $donationList = $this->report->donation();
            }

//            echo json_encode($donationList);
            $reports_info = array();
            if (is_array($donationList)) {
                $i = 1;
                foreach ($donationList as $row) {
                    $rows = array(
                        'indexd' => $i,
                        'aid' => get_array_value($row, 'aid', ''),
                        'transection_no' => get_array_value($row, 'transection_no', ''),
                        'mount' => get_array_value($row, 'mount', ''),
                        'doner_aid' => get_array_value($row, 'doner_aid', ''),
                        'donation_campaign_aid' => get_array_value($row, 'donation_campaign_aid', ''),
                        'payment_channel' => get_array_value($row, 'payment_channel', ''),
                        'payment_status' => get_array_value($row, 'payment_status', ''),
                        'bankName' => get_array_value($row, 'bankName', ''),
                        'pan' => get_array_value($row, 'pan', ''),
                        'note' => get_array_value($row, 'note', ''),
                        'tranRef' => get_array_value($row, 'tranRef', ''),
                        'processBy' => get_array_value($row, 'processBy', ''),
                        'issuerCountry' => get_array_value($row, 'issuerCountry', ''),
                        'transfer_date' => datetime2display(get_array_value($row, 'transfer_date')),
                        'created_date' => get_array_value($row, 'created_date', ''),
                        'first_name' => get_array_value($row, 'first_name', ''),
                        'updated_date' => get_array_value($row, 'updated_date', 0),
                        'invoice_id' => get_array_value($row, 'invoice_id', '')

                    );
                    $reports_info[] = $rows;
                    $i++;
                }
            }


            echo "<pre>";
            print_r($reports_info);
            echo "</pre>";

//            return $reports_info;

        }
    }


    public function testGenInvoice()
    {
        $this->load->model($this->donation_model, 'donation');

        $Id = $this->donation->lastInvoiceId();

        echo $this->genInvoiceNo();
    }

    public function genInvoiceNo()
    {
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

    public function bankList()
    {
        $rs = $this->getBanklist();
        $pc = $this->getPaymentStatus();
        echo "<pre>";
        print_r($rs);
        print_r($pc);
        echo "</pre>";
    }

    public function testformatdatetime()
    {

        $dateTime = "2019-10-01 18:01:03";
        $date1 = date('mdyHms', strtotime($dateTime));

        $mydateDb = datetime2db($date1);

        echo "DateTime =" . $dateTime . " strTotime" . strtotime($dateTime) . " newFormat=" . date('mdyHms', strtotime($dateTime));


    }


    public function testSendMail()
    {
        $this->load->library('mailer');
        $viewsMail = VIEWPATH;
//        echo $viewsMail;

        $email = 'consumerthailand.official@gmail.com';

//        $pdfFile = chunk_split(base64_encode(file_get_contents("downloads/invoice/FFC19000001.pdf")));
//        $pdfFile = file_get_contents("downloads/invoice/FFC19000001.pdf");
        $doantionId = 15;
        $pdfFile = $this->generate_invoice($doantionId);

        $fileName = "FFC19000001.pdf";
//        $pdfFile = $strContent1 = chunk_split(base64_encode(file_get_contents("downloads/invoice/FFC19000001.pdf")));

//        echo $pdfFile;
//        exit();
// Use user or any information to load in email template

        $templateData = array(
            'name' => 'Anon Dechpala'
        );


        $result = $this->mailer->to($email)->subject("Thank you for Donate")->setAttachFile($pdfFile, $fileName)->send("thank_you.php", compact('templateData'));


        if ($result) {
            echo "Email sent successfully $result";
        } else {
            echo "Email failed to send $result";

        }
    }


    public function testInvoice()
    {
        $Invoice = $this->generate_invoice(6);

    }


    public function testSocial()
    {
        $this->load->library('SocialMedia');
        $socmed = new SocialMedia();
        $social_media_name = $socmed->GetSocialMediaSites_WithShareLinks_OrderedByPopularity();
        $myScial = array('url' => 'https://donate.consumerthai.org/', 'title' => 'Consumer Thailand');
        $social_media_urls = $socmed->GetSocialMediaSiteLinks_WithShareLinks($myScial);

        $this->data['media_name'] = $social_media_name;
        $this->data['media_urls'] = $social_media_urls;

        echo "<pre>";
        print_r($social_media_name);
        echo "</pre>";


        echo "<pre>";
        print_r($social_media_urls);
        echo "</pre>";


    }


    public function donorname()
    {
        $this->load->model($this->donor_model, 'donor');
        $this->donor->setDonorId(1);
        $fullName = $this->donor->getDonorFirstName();

        if (is_array($fullName)) {
            print_r($fullName);
        } else {
            echo "Name =" . $fullName;
            echo "</br>";
//            echo $this->db->last_query();
        }

        $number = "000001010025";


        echo amountToDb($number);
        echo "</br>";
        echo number_format(amountToDb($number), 2);

//        print_r($fullName) ;

    }

    public function testDonationById()
    {


        $this->load->model($this->donation_model, 'donation');
        $donationId = 16;
        $this->donation->setDonationId($donationId);
        $donateInfo = $this->donation->donationById();

        /// Send Mail to Donor
        $this->load->library('mailer');
        $pdfFile = $this->generate_invoice($donationId);


        $fullName = "";
        $amountDonate = "";
        $email = "";
        $invoiceNo = "";
        if (is_array($donateInfo)) {
            foreach ($donateInfo as $row) {
                $fullName = get_array_value($row, 'first_name', '');
                $amountDonate = get_array_value($row, 'amount', '');
                $email = get_array_value($row, 'email', '');
                $invoiceNo = get_array_value($row, 'inv_number', 'Invoice');
            }
        }

        if (!is_blank($amountDonate)) {
            $donateAmount = number_format($amountDonate, 2);
        }

        $templateData = array(
            'name' => $fullName,
            'amount' => $amountDonate
        );

        $fileName = "$invoiceNo.pdf";
        if (!is_blank($email)) {
            $result = $this->mailer->to($email)->subject("Thank you for Donate")->setAttachFile($pdfFile, $fileName)->send("thank_you.php", compact('templateData'));
        }

        $data = array();
        if ($result) {

            $data['message'] = "Send Email Success";
        } else {

            $data['message'] = "Send Email to Donor Success";
        }

        echo json_encode($data);


    }


    public function userInfo()
    {
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";


//        print_r($this->session->userdata('userSession'));

        $userSession = getUsersSession();
        print_r($userSession);

        echo getUserFirstName();
        echo getUserLastName();
    }


    public function toptendonor()
    {

        $this->load->model($this->donation_model, 'donation');
        $result = array();
        $result = $this->donation->topDonor();

        $rows = array();
        if (is_array($result) && !is_blank($result)) {
            foreach ($result as $row) {
//               $rows[] = array(
//                   'aid'=>get_array_value($row,'aid',''),
//                   'full_name'=>get_array_value($row,'first_name',''),
//                   'email'=>get_array_value($row,'email',''),
//                   'total_amount'=>get_array_value($row,'TotalAmount','0')
//               );

                $rows[] = $row;
            }
        }

        echo json_encode($rows);


    }


    public function testTime()
    {
        $time = "010219175015";


        $newTime = datetime2display($time);

        echo "Time = " . $time . " New Time=" . $newTime;


    }

    public function multilang()
    {

        $this->data = array();

        $this->load->view('frontend/test_view', $this->data);
    }


    public function orzgroup()
    {


        $this->load->model($this->_orz_group_model, 'orzg');


        $rs = array();
        $rs = $this->orzg->orz_group_list();


        print_r($rs);


    }


    public function test_user()
    {


        $email = "anon_de@saijo-denki.co.th";
        $this->load->model($this->auth_model, 'auth');


        echo getUserAid();
        var_dump(getUsersSession());

        $this->load->model($this->organized_model, 'orz');

        $roz = $this->orz->orz_information();


        echo $this->db->last_query();

        var_dump($roz);


    }

    public function test_directory()
    {
//        $date = str_replace( ':', '', $date);


        if (!is_dir('uploads/' . getUserAid())) {
            $dir_upload = mkdir('./uploads/' . getUserAid(), 0777, TRUE);

        }


        echo $dir_upload;
    }


    public function test_update_orz()
    {


        $orz_district = "คลองข่อย";
        $orz_amphoe = "ปากเกร็ด";
        $orz_province = "ปากเกร็ด";
        $orz_id = 1;

        /***** Register Orz ***/
        $this->load->model($this->organized_model, 'orz');

        $this->orz->setOrzId($orz_id);
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
        } else {
            $message = array(
                'stats' => false,
                'error' => true,
                'message' => "could not Update"
            );

        }

        echo json_encode($message);

    }


    public function last_orz()
    {
        $this->load->model($this->organized_model, 'orz');

        $resual = $this->orz->organization_last();

        if (is_array($resual)) {
            echo "array";
        }

//        echo json_encode($resual);


    }

    public function test_provinces()
    {
        $this->load->model($this->province_model, 'province');

        $result = $this->province->provinces_list();

        echo "<pre>";
        print_r($result);
        echo "</pre>";

    }

    public function zone_list()
    {
        $this->load->model($this->province_model, 'province');

        $result = $this->province->zone_list();

        echo "<pre>";
        print_r($result);
        echo "</pre>";

    }

    public function provice_code()
    {
        $this->load->model($this->province_model, 'province');
        $zip_code = 45160;
        $province = 12;
//            $this->province->setZipCode($zip_code);
//            $result = $this->province->get_province_code();
        $this->province->setProvinceCode($province);
        $result = $this->province->provinces_by_code();

        echo json_encode($result);


//        print_r() ;
    }


    public function orz_in_province()
    {
        $this->load->model($this->organized_model, 'orz');
        $orz_stage_code = 11120;
        $orz_id = 1;
        $province_code = "";
        $this->load->model($this->province_model, 'province');
        $this->province->setZipCode($orz_stage_code);


        $province_code = $this->province->get_province_code();

        $this->db->reset_query();
        $this->orz->setOrzId($orz_id);
        $chk = $this->orz->setProvinceCode($province_code);
        $this->orz->orz_in_province();


        echo $this->db->last_query();

    }


    public function volunteer_join_orz()
    {
        $this->load->model($this->volunteer_model, 'volunteer');
        $orz_id = 1;
        $this->volunteer->setOrzId($orz_id);
        $result = $this->volunteer->volunteer_join_orz();

        print_r($result);

    }

    public function total_volunteer()
    {
        $this->load->model($this->reports_model, 'report');

        $report = array();
        $orz_info = $this->report->report_orz_list();


        echo "<pre>";
        print_r($orz_info);
        echo "<pre>";
    }

    public function user_group()
    {
        $this->load->model($this->auth_model, 'user');

        $user_group = $this->user->user_group();

        echo json_encode($user_group);
        echo $this->db->last_query();

    }

    public function user_rule()
    {
        $this->load->model($this->auth_model, 'user');
        $user_rule = $this->user->user_rule();


        echo json_encode($user_rule);


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


    public function thailand()
    {
        $this->load->view('thailand');
    }


    public function user_grant()
    {
        echo getUserRoleId();
    }


    public function test_orz_list()
    {
        $this->load->model($this->organized_model, 'orz');
        $orz_info = $this->orz->orz_all();

        echo $this->db->last_query();


        var_dump($orz_info);


        var_dump(getUsersSession());


    }


    public function orz_search()
    {
        $this->load->model($this->organized_model, 'orz');


        $province_code = 15;
        $this->orz->setProvinceCode($province_code);
        $orz_info = $this->orz->orz_for_search();

        $this->load->model($this->province_model, 'province');
        $this->province->setProvinceCode($province_code);
        $province_info = $this->province->provinces_by_code();


        $orz_in_place = array();
        if(!is_blank($orz_info)){
            foreach ($orz_info as $row){
                $rows = array(
                    'full_name'=>get_array_value($row,'title'),
                    'lat'=>get_array_value($row,'latitude','0.00'),
                    'lng'=>get_array_value($row,'longitude','0.00'),
                    'full_desc'=>$row  ,
                );

                $orz_in_place[] = $rows;
            }
        }




        $data = array(
            'province_info'=>$province_info,
            'orz_info'=>$orz_info,
            'coordinates'=>$orz_in_place
        );





        echo json_encode($data);


        #echo $this->db->last_query();


    }


    public function volantter_orzlist(){
        $this->load->model($this->volunteer_model,'volunteer');
        $orz = 335;
        $this->volunteer->setOrzId($orz);
        $result = array();
        $result = $this->volunteer->volunteer_join_orz();


        print_r($result);


    }


} //end of Class
