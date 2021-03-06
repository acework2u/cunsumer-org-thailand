<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Reports extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->data['title'] = "Organization Report";

        $this->load->view('tpl_report', $this->data);

    }


    public function jsonDonationList()
    {
        if ($this->is_login()) {
            $this->load->model($this->report_model, 'report');

            $startDate = date('Y-m-01 00:00:00');
            $endDate = date('Y-m-t 12:59:59');
            $limit = "";

            if (!is_blank($this->input->get_post('startDate'))) {
                $startDate = date('Y-m-d', strtotime($this->input->get_post('startDate')));
            }
            if (!is_blank($this->input->get_post('endDate'))) {
                $endDate = date('Y-m-d', strtotime($this->input->get_post('endDate')));
            }
            if (!is_blank($this->input->get_post('limit'))) {
                $limit = $this->input->get_post('limit');
            }


            $donationList = array();
            $start_date = array('updated_date >= $startDate');
            $end_date = array('updated_date <= $endDate');

            $this->report->setStartDate($startDate);
            $this->report->setEndDate($endDate);

            if (!is_blank($limit)) {
                $this->report->setLimit($limit);
            }

            if ($this->report->donation()) {
                $donationList = $this->report->donation();
            }

            $reports_info = array();
            if (is_array($donationList)) {

                foreach ($donationList as $row) {
                    $rows = array(
                        'aid' => get_array_value($row, 'aid', ''),
                        'transection_no' => get_array_value($row, 'transection_no', ''),
                        'inv_number' => get_array_value($row, 'inv_number', ''),
                        'amount' => get_array_value($row, 'amount', ''),
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
                        'updated_date' => get_array_value($row, 'updated_date', ''),
                        'invoice_id' => get_array_value($row, 'invoice_id', ''),
                        'email' => get_array_value($row, 'email', ''),
                        'first_name' => get_array_value($row, 'first_name'),
                        'last_name' => get_array_value($row, 'last_name', ''),
                        'status' => get_array_value($row, 'status', ''),
                        'paymentchanel' => get_array_value($row, 'paymentchanel', ''),
                        'campaign_name' => get_array_value($row, 'campaign_name', '')

                    );
                    $reports_info[] = $rows;

                }
            }


            $data = array();
//            $data['donationlist'] = $donationList;
            $data['donationlist'] = $reports_info;
//            $data['donationlist'] = $reports_info;
//            $data['last_query'] = $this->db->last_query();

//            echo json_encode($donationList);
            echo json_encode($data);

        }
    }

    public function donationList()
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

            $this->report->setStartDate($startDate);
            $this->report->setEndDate($endDate);

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
                        'transfer_date' => datetime2display(get_array_value($row, 'transfer_date')),
                        'invoice_no' => get_array_value($row, 'inv_number', ''),
                        'first_name' => get_array_value($row, 'first_name', ''),
                        'amount' => get_array_value($row, 'amount', 0),
                        'bankName' => get_array_value($row, 'bankName', '')

                    );
                    $reports_info[] = $rows;
                    $i++;
                }
            }


            return $reports_info;

        }
    }

    public function organizationList()
    {
        if ($this->is_login()) {

            $startDate = date('Y-m-01 00:00:00');
            $endDate = date('Y-m-t 12:59:59');
            $limit = "";

            if (!is_blank($this->input->get_post('startDate'))) {
                $startDate = date('Y-m-d', strtotime($this->input->get_post('startDate')));
            }
            if (!is_blank($this->input->get_post('endDate'))) {
                $endDate = date('Y-m-d', strtotime($this->input->get_post('endDate')));
            }
            if (!is_blank($this->input->get_post('limit'))) {
                $limit = $this->input->get_post('limit');
            }
            $this->load->model($this->reports_model, 'report');

            $reports_info = array();

            $this->report->setStartDate($startDate);
            $this->report->setEndDate($endDate);
            $this->report->setLimit($limit);

            $orz_info = $this->report->report_orz_list();

            $i = 1;
            foreach ($orz_info as $row) {
                $full_name = $row->contact_name . "" . $row->contact_lastname;
                $orz_address = $row->address . " " . $row->district . " " . $row->amphoe . " " . $row->province . " " . $row->stage_code;
                $reports_info[] = array(
                    'index' => $i,
                    'orz_name' => $row->title,
                    'orz_address' => $orz_address,
                    'orz_register_date' => $row->created_date,
                    'orz_contact' => $full_name,
                    'orz_contact_email' => $row->email,
                    'orz_contact_tel' => $row->contact_tel,
                    'orz_in_province' => $row->province,
                    'orz_in_zone' => $row->zone_title,
                    'orz_volunteer' => $this->report->volunteer_count($row->aid),
                    'orz_status' => $row->orz_status_title,
                    'orz_Updated' => $row->updated_date,

                );
                $i = $i + 1;
            }


            return $reports_info;

        }
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


        if (is_blank($data)) {
            $data = $this->donationList();
        }

//        $data = $this->getfiles();


        if (is_array($data)) {
            $sp->getActiveSheet()->fromArray($data, null, 'A5');
            $last_row = count($data) + 1;
            $last_cal_row = count($data) + 4;
            $last_total = $last_row + 4;

            /***** Style ***/

            $sp->getActiveSheet()->getStyle('A4:F4')->getFont()->setBold(true);
            $sp->getActiveSheet()->getStyle('C1:C2')->getFont()->setBold(true);
            $i = 1;
            foreach (range('A', 'F') as $columnID) {
                $sp->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
                $i++;
            }
            $row_total = 5 + $i;

            $sheet->setCellValue('D' . $last_total, 'รวมทั้งหมด');
            $sheet->setCellValue('E' . $last_total, '=SUM(E5:E' . $last_cal_row . ')');
            $sp->getActiveSheet()->getStyle('D' . $last_total . ':E' . $last_total)->getFont()->setBold(true);
            $sp->getActiveSheet()->getStyle('E5:E' . $last_total)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);


//            $sheet->setCellValue('E23','E'.$last_row);
//            $sheet->setCellValue('E24','E'.$last_total);
//            $sheet->setCellValue('E25','E'.$i);
//            $sheet->setCellValue('E26','E'.$row_total);
//            $sheet->setCellValue('E28','Rows = '.$last_cal_row);


        }


        $writer = new Xlsx($sp);
        $filename = 'donation-report_' . date('Y-m-d');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');


    }

    public function orzExportxls($data = '')
    {


        $report_date = "วันที่ " . date('Y-m-d');

        $sp = new Spreadsheet();
        $sheet = $sp->getActiveSheet();
        /**** Header ***/
        $sheet->setCellValue('C1', 'สภาองค์กรผู้บริโภค');
        $sheet->setCellValue('C2', 'รายงาน สมาชิกสภาองค์กรผู้บริโภคแห่งประเทศไทย');
//        $sheet->setCellValue('A3', $report_date);

        /*** Column ***/
        $sheet->setCellValue('A4', 'ลำดับที่');
        $sheet->setCellValue('B4', 'ชือมูลนิธิหรือองค์กร');
        $sheet->setCellValue('C4', 'ที่อยู่');
        $sheet->setCellValue('D4', 'วันที่ลงทะเบียน');
        $sheet->setCellValue('E4', 'ผู้ติดต่อ');
        $sheet->setCellValue('F4', 'อีเมล');
        $sheet->setCellValue('G4', 'เบอร์โทร');
        $sheet->setCellValue('H4', 'ภายในจังหวัด');
        $sheet->setCellValue('I4', 'ภายในภาค');
        $sheet->setCellValue('J4', 'จำนวนอาสาสมัคร');
        $sheet->setCellValue('K4', 'สถานะการรับรอง');
        $sheet->setCellValue('L4', 'ข้อมูลอัพเดทล่าสุด');
        /**Content */


        if (is_blank($data)) {
            $data = $this->organizationList();
        }

//        $data = $this->getfiles();


        if (is_array($data)) {
            $sp->getActiveSheet()->fromArray($data, null, 'A5');
            $last_row = count($data) + 1;
            $last_cal_row = count($data) + 4;
            $last_total = $last_row + 4;

            /***** Style ***/

            $sp->getActiveSheet()->getStyle('A4:K4')->getFont()->setBold(true);
            $sp->getActiveSheet()->getStyle('C1:C2')->getFont()->setBold(true);
            $i = 1;
            foreach (range('A', 'L') as $columnID) {
                $sp->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
                $i++;
            }
            $row_total = 5 + $i;

//            $sheet->setCellValue('D' . $last_total, 'รวมทั้งหมด');
//            $sheet->setCellValue('E' . $last_total, '=SUM(E5:E' . $last_cal_row . ')');
//            $sp->getActiveSheet()->getStyle('D' . $last_total . ':E' . $last_total)->getFont()->setBold(true);
//            $sp->getActiveSheet()->getStyle('E5:E' . $last_total)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);


//            $sheet->setCellValue('E23','E'.$last_row);
//            $sheet->setCellValue('E24','E'.$last_total);
//            $sheet->setCellValue('E25','E'.$i);
//            $sheet->setCellValue('E26','E'.$row_total);
//            $sheet->setCellValue('E28','Rows = '.$last_cal_row);


        }


        $writer = new Xlsx($sp);
        $filename = 'organization-report_' . date('Y-m-d');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');


    }

    public function approveLogsexportxls($data = '')
    {


        $report_date = "วันที่ " . date('Y-m-d');

        $sp = new Spreadsheet();
        $sheet = $sp->getActiveSheet();
        /**** Header ***/
        $sheet->setCellValue('C1', 'องค์กรผู้บริโภคแห่งประเทศไทย');
        $sheet->setCellValue('C2', 'รายงานบันทึกการอนุมัติ องค์กรเคลือข่าย');
//        $sheet->setCellValue('A3', $report_date);

        /*** Column ***/
        $sheet->setCellValue('A4', 'ลำดับที่');
        $sheet->setCellValue('B4', 'ชื่อมูลนิธิหรือองค์กร');
        $sheet->setCellValue('C4', 'การอนุมัติ');
        $sheet->setCellValue('D4', 'โดย');
        $sheet->setCellValue('E4', 'วันที่อัพเดทล่าสุด');

        /**Content */


        if (is_blank($data)) {
            $data = $this->approved_logs();
        }

//        $data = $this->getfiles();


        if (is_array($data)) {
            $sp->getActiveSheet()->fromArray($data, null, 'A5');
            $last_row = count($data) + 1;
            $last_cal_row = count($data) + 4;
            $last_total = $last_row + 4;

            /***** Style ***/

            $sp->getActiveSheet()->getStyle('A4:E4')->getFont()->setBold(true);
            $sp->getActiveSheet()->getStyle('C1:C2')->getFont()->setBold(true);
            $i = 1;
            foreach (range('A', 'E') as $columnID) {
                $sp->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
                $i++;
            }
            $row_total = 5 + $i;

//            $sheet->setCellValue('D' . $last_total, 'รวมทั้งหมด');
//            $sheet->setCellValue('E' . $last_total, '=SUM(E5:E' . $last_cal_row . ')');
//            $sp->getActiveSheet()->getStyle('D' . $last_total . ':E' . $last_total)->getFont()->setBold(true);
//            $sp->getActiveSheet()->getStyle('E5:E' . $last_total)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

        }


        $writer = new Xlsx($sp);
        $filename = 'orz-approved-logs-report_' . date('Y-m-d');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');


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
                        'orz_title' => $row->title,
                        'orz_action' => $row->action,
                        'full_name' => $row->first_name . " " . $row->last_name,
                        'updated_date' => $row->updated_date
                    );

                    $i++;
                }
            }

            return $logs_info;

        }
    }

    public function genInvoice($donateId = 0, $attFile = false)
    {
        $this->load->model($this->donation_model, 'donation');

        $id = $donateId;
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
            $transferDate = '';

            if (!is_blank($transfer_date)) {
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

            $mpdf->WriteFixedPosHTML($address, 35, 60, 150, 90, 'auto');
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

            if ($attFile) {
                return $mpdf->Output('', 'S');
            } else {
                $mpdf->Output();
                $fileName = $invoice_no . ".pdf";
                $fullfilePath = "downloads/invoice/" . $invoice_no . ".pdf";
                ob_clean();
                $mpdf->Output($fullfilePath, 'F');
            }


        } // end if
    }

    public function updateDonationStatus()
    {
        if ($this->is_login()) {

            $donationId = "";
            $transection_no = "";
            $inv_number = "";
            $amount = "";
            $transfer_datetime = "";
            $donorId = "";
            $bank_name = "";
            $payment_channel = "";
            $payment_status = "";
            $updated_date = date('Y-m-d H:i:s');
            $donor_email = "";

            if (!is_blank($this->input->get_post('aid'))) {
                $donationId = $this->input->get_post('aid');
            }
            if (!is_blank($this->input->get_post('transfer_date'))) {
                $transfer_datetime = $this->input->get_post('transfer_date');
            }
            if (!is_blank($this->input->get_post('doner_aid'))) {
                $donorId = $this->input->get_post('doner_aid');
            }
            if (!is_blank($this->input->get_post('amount'))) {
                $amount = $this->input->get_post('amount');
            }
            if (!is_blank($this->input->get_post('bankName'))) {
                $bank_name = $this->input->get_post('bankName');
            }
            if (!is_blank($this->input->get_post('email'))) {
                $donor_email = $this->input->get_post('email');
            }
            if (!is_blank($this->input->get_post('payment_status'))) {
                $payment_status = trim($this->input->get_post('payment_status'));
            }
            if (!is_blank($this->input->get_post('payment_channel'))) {
                $payment_channel = $this->input->get_post('payment_channel');
            }
            if (!is_blank($this->input->get_post('tranRef'))) {
                $transection_no = trim($this->input->get_post('tranRef'));
            }

            $checkDuplicateInvoice = $this->checkInvoiceDuplicate($donationId);
            $this->load->model($this->donation_model, 'donation');


            if (!is_blank($transfer_datetime)) {
                $date1 = date('mdyHms', strtotime($transfer_datetime));
                $transfer_datetime = $date1;
            }


            $data = array();

            if ($payment_status == "00" || $payment_status == "000") {
                // Payment Success
                if (!$checkDuplicateInvoice) {
                    $this->load->model($this->invoice_model, 'invoice');
                    $invoiceNo = $this->generateInvoice();
                    $invoiceStatus = 1;
                    $remark = "";

                    $this->invoice->setInvoiceNo($invoiceNo);
                    $this->invoice->setDonationId($donationId);
                    $this->invoice->setInvoiceStatus($invoiceStatus);
                    $this->invoice->setRemark($remark);

                    if ($this->invoice->create()) {
                        $invID = $this->invoice->getInvoiceId();
                        $this->donation->setInvoiceId($invID);
                        $this->donation->setInvNumber($invoiceNo);
                        $this->donation->setPaymentStatus($payment_status);
                        $this->donation->setTransferDate($transfer_datetime);
                        $this->donation->setTransRef($transection_no);
                        $this->donation->setBankName($bank_name);
                        $this->donation->setUpdatedDate($updated_date);
                        $this->donation->setNote($remark);
                        $this->donation->setAmount($amount);
                        if ($this->donation->updateDonation($donationId)) {
                            $data['message'] = "Update Success";
                        } else {
                            $data['error'] = true;
                            $data['message'] = "Cloud no update";
                        }

                    }


                } else {
                    // Have Invoice
                    $this->donation->setTransferDate($transfer_datetime);
                    $this->donation->setTransRef($transection_no);
                    $this->donation->setBankName($bank_name);
                    $this->donation->setUpdatedDate($updated_date);
                    $this->donation->setPaymentStatus($payment_status);
                    $this->donation->setAmount($amount);
                    if ($this->donation->updateDonation($donationId)) {


                        $data['message'] = "Update Donation info  Success";
                    } else {
                        $data['error'] = true;
                        $data['message'] = "Cloud no update Duplicate Invoice";
                    }

//                    $data['message'] = "Duplicate Invoice";
                }


            } else {

                $this->donation->setTransferDate($transfer_datetime);
                $this->donation->setTransRef($transection_no);
                $this->donation->setBankName($bank_name);
                $this->donation->setUpdatedDate($updated_date);
                $this->donation->setPaymentStatus($payment_status);
                $this->donation->setAmount($amount);
                if ($this->donation->updateDonation($donationId)) {
                    $data['message'] = "Update Donation info  Success";
                } else {
                    $data['error'] = true;
                    $data['message'] = "Cloud no update Duplicate Invoice";
                }


            }


            echo json_encode($data);


        }// end if login

    }

    public function sendEmailInvoiceToDonor($donationId = "")
    {

        if ($this->is_login()) {

            $data = array();

            if (!is_blank($this->input->get_post('donation_id'))) {
                $donationId = $this->input->get_post('donation_id');
            }
            if (!is_blank($donationId)) {
                /// Send Mail to Donor
                $this->load->model($this->donation_model, 'donation');
                $this->donation->setDonationId($donationId);
                $donateInfo = $this->donation->donationById();

                /// Send Mail to Donor
                $this->load->library('mailer');
                $attFile = true;
//                $pdfFile = $this->generate_invoice($donationId);
                $pdfFile = $this->genInvoice($donationId, $attFile);


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


                if ($result) {

                    $data['message'] = "Send Email Success";
                } else {

                    $data['message'] = "Send Email to Donor Success";
                }


            }

            echo json_encode($data);


        }


    }

    public function donorInfo()
    {
        if ($this->is_login()) {
            $donor_id = "";
            if (!is_blank($this->input->get_post('donor_aid'))) {
                $donor_id = $this->input->get_post('donor_aid');
            }

            $this->load->model($this->donor_model, 'donor');

            $this->donor->setDonorId($donor_id);
            $result = array();

            if ($this->donor->donor_info()) {
                $result = $this->donor->donor_info();
            }


            echo json_encode($result);


        }
    }


    //**** Orz ******/
    public function jsonOrzList()
    {
        $data = array();

        if ($this->is_login()) {


           // $startDate = date('Y-m-01 00:00:00');
           // $endDate = date('Y-m-t 12:59:59');

            $startDate = "";
            $endDate = "";

            $limit = "";

            if (!is_blank($this->input->get_post('startDate'))) {
                $startDate = date('Y-m-d', strtotime($this->input->get_post('startDate')));
            }
            if (!is_blank($this->input->get_post('endDate'))) {
                $endDate = date('Y-m-d', strtotime($this->input->get_post('endDate')));
            }
            if (!is_blank($this->input->get_post('limit'))) {
                $limit = $this->input->get_post('limit');
            }



                // Super Admin
                $this->load->model($this->reports_model, 'report');
                $this->load->model($this->organized_model,'orz');

                $report = array();

                $this->report->setStartDate($startDate);
                $this->report->setEndDate($endDate);
                $this->report->setLimit($limit);

                $orz_info = $this->report->report_orz_list();
//                $orz_info = $this->orz->orz_all();
//                echo $this->db->last_query();

//            var_dump($orz_info);
//                exit(0);

                $i = 1;
                foreach ($orz_info as $row) {
                    $full_name = $row->contact_name . "" . $row->contact_lastname;
                    $report[] = array(
                        'index' => $i,
                        'orz_name' => $row->title,
                        'orz_contact' => $full_name,
                        'orz_register_date' => $row->created_date,
                        'orz_status' => $row->orz_status_title,
                        'approved_by' => $this->report->orz_approve_by_name($row->aid),
                        'approved_date' => $row->updated_date,
                        'orz_in_province_code' => $row->province_code,
                        'orz_in_province' => $row->province,
                        'orz_in_zone' => $row->zone_title,
                        'orz_in_zone_code' => $row->zone_code,
                        'orz_volunteer' => $this->report->volunteer_count($row->aid),
                        'updated_date' => $row->updated_date,
                        'action' => ''
                    );
                    $i = $i + 1;
                }
                $data = array(
                    'status' => true,
                    'data' => $report
                );


//            if (!is_blank(getUserRoleId()) && getUserRoleId() == 1) {
//
//
//            }
//            if (!is_blank(getUserRoleId()) && getUserRoleId() == 2) {
//                // Admin
//
//                echo "Rule = " . getUserRoleId();
//            }
//            if (!is_blank(getUserRoleId()) && getUserRoleId() == 3) {
//
//                echo "Rule = " . getUserRoleId();
//            }
//            if (!is_blank(getUserRoleId()) && getUserRoleId() == 4) {
//
//            }
//            if (!is_blank(getUserRoleId()) && getUserRoleId() == 5) {
//                echo "Rule = " . getUserRoleId();
//            }


            echo json_encode($data);

        }


    }

    public function volunteer()
    {


        $this->data['title'] = "Organization Report";

        $this->load->view('tpl_volunteer', $this->data);


    }

    public function jsonVolunteers()
    {

        $data = array();
        $start_date = "";
        $end_date = "";
        $limit = "";

        if (!is_blank($this->input->get('startDate'))) {
            $start_date = $this->input->get('startDate');
            $start_date = date('Y-m-d', strtotime($start_date));
        }
        if (!is_blank($this->input->get('endDate'))) {
            $end_date = $this->input->get('endDate');
        }
        if (!is_blank($this->input->get_post('limit'))) {
            $limit = $this->input->get_post('limit');
        }


        $this->load->model($this->volunteer_model, 'volunteer');

        if(!is_blank($start_date && $end_date)){
            $this->volunteer->setStartDate($start_date);
            $this->volunteer->setEndDate($end_date);
        }

        $volunteers = $this->volunteer->volunteer_join_orz();


        if (!is_blank($volunteers)) {
                $i = 1;
            if (is_array($volunteers)) {
                foreach ($volunteers as $row) {
                    $full_name = get_array_value($row, 'name', '') . " " . get_array_value($row, 'lastname', '');
                    $rows = array(
                        'index' => $i,
                        'aid'=>get_array_value($row, 'aid'),
                        'name'=>get_array_value($row, 'name', ''),
                        'lastname'=>get_array_value($row, 'lastname', ''),
                        'fullname' => $full_name,
                        'address'=>get_array_value($row,'address',''),
                        'district'=>get_array_value($row,'district',''),
                        'amphoe'=>get_array_value($row,'amphoe',''),
                        'province'=>get_array_value($row,'province',''),
                        'zipcode'=>get_array_value($row,'zipcode',''),
                        'tel' => get_array_value($row, 'tel', ''),
                        'email' => get_array_value($row, 'email', ''),
                        'join_status' => get_array_value($row, 'volunteer_jpoin_status', ''),
                        'status' => get_array_value($row, 'status', ''),
                        'register_datetime' => get_array_value($row, 'created_date', ''),
                        'register_datetime_thai' => DateTimeThai(get_array_value($row, 'created_date', '')),
                        'orz_name' => get_array_value($row, 'orz_name', ''),
                        'join_orz_aid' => get_array_value($row, 'orz_aid', ''),
                        'orz_volunteer_mn_id' => get_array_value($row, 'orz_volunteer_mn_id', ''),
                        'orz_province' => get_array_value($row, 'orz_province', ''),
                        'st_end' => $start_date . " " . $end_date
                    );

                    $data[] = $rows;
                    $i++;
                }


            }


        }


//        var_dump($volunteers);
        echo json_encode($data);

    }
    public function volunteerExportxls()
    {
        $data = array();
        $start_date = "";
        $end_date = "";
        $limit = "";

        if (!is_blank($this->input->get('startDate'))) {
            $start_date = $this->input->get('startDate');
            $start_date = date('Y-m-d', strtotime($start_date));
        }
        if (!is_blank($this->input->get('endDate'))) {
            $end_date = $this->input->get('endDate');
        }
        if (!is_blank($this->input->get_post('limit'))) {
            $limit = $this->input->get_post('limit');
        }


        $this->load->model($this->volunteer_model, 'volunteer');

        if(!is_blank($start_date && $end_date)){
            $this->volunteer->setStartDate($start_date);
            $this->volunteer->setEndDate($end_date);
        }
        $volunteer = array();
        $volunteer = $this->volunteer->volunteer_join_orz();

//        $data = $this->volunteerArray($volunteer);


        if(!is_blank($volunteer)){
            foreach ($volunteer as $row) {
                $full_name = get_array_value($row, 'name', '') . " " . get_array_value($row, 'lastname', '');
                $rows = array(
                    'index' => get_array_value($row, 'aid'),
                    'register_datetime_thai' => DateTimeThai(get_array_value($row, 'created_date', '')),
                    'fullname' => $full_name,
                    'tel' => get_array_value($row, 'tel', ''),
                    'email' => get_array_value($row, 'email', ''),
                    'join_status' => get_array_value($row, 'volunteer_jpoin_status', ''),
                    'orz_name' => get_array_value($row, 'orz_name', ''),
                    'orz_province' => get_array_value($row, 'orz_province', ''),

                );
                $data[] = $rows;
            }
        }


//        $report_date = "วันที่ " . date('Y-m-d');
        $report_date = DateThai($start_date)." ถึง ".DateThai($end_date);

        $sp = new Spreadsheet();
        $sheet = $sp->getActiveSheet();
        /**** Header ***/
        $sheet->setCellValue('C1', 'สภาองค์กรผู้บริโภค');
        $sheet->setCellValue('C2', 'รายงาน สมาชิกอาสาสมัคร');
        $sheet->setCellValue('B3', $report_date);

        /*** Column ***/
        $sheet->setCellValue('A4', 'ลำดับที่');
        $sheet->setCellValue('B4', 'วันที่ลงทะเบียน');
        $sheet->setCellValue('C4', 'ชื่อ-นามสกุล');
        $sheet->setCellValue('D4', 'เบอร์โทร');
        $sheet->setCellValue('E4', 'อีเมล');
        $sheet->setCellValue('F4', 'สถานะการทะเบียน');
        $sheet->setCellValue('G4', 'ชื่อองค์กร');
        $sheet->setCellValue('H4', 'จังหวัด');
        /**Content */


//        if (is_blank($data)) {
//            $data = $this->organizationList();
//        }

//        $data = $this->getfiles();


        if (is_array($data)) {
            $sp->getActiveSheet()->fromArray($data, null, 'A5');
            $last_row = count($data) + 1;
            $last_cal_row = count($data) + 4;
            $last_total = $last_row + 4;

            /***** Style ***/

            $sp->getActiveSheet()->getStyle('A4:H4')->getFont()->setBold(true);
            $sp->getActiveSheet()->getStyle('C1:C2')->getFont()->setBold(true);
            $i = 1;
            foreach (range('A', 'L') as $columnID) {
                $sp->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
                $i++;
            }
            $row_total = 5 + $i;
        }


        $writer = new Xlsx($sp);
        $filename = 'volunteer-organization-report_' . date('Y-m-d');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');


    }

    public function volunteerArray($volunteer){
        $data = array();
        if(!is_blank($volunteer)){
            foreach ($volunteer as $row){
                $rows = array(
                    'index'=>get_array_value($row,'index',''),
                    'register_datetime_thai'=>get_array_value($row,'register_datetime_thai',''),
                    'fullname'=>get_array_value($row,'fullname',''),
                    'tel'=>get_array_value($row,'tel',''),
                    'email'=>get_array_value($row,'email',''),
                    'join_status'=>get_array_value($row,'join_status',''),
                    'orz_name'=>get_array_value($row,'orz_name',''),
                    'orz_province'=>get_array_value($row,'orz_province',''),

                );
                $data[] = $rows;
            }
        }

        return $data;
    }


} // end of class
