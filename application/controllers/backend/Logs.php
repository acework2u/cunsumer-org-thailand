<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Logs extends  MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {

        $this->data['title'] = "Approved Logs";

        $this->load->view('tpl_logs', $this->data);

    }


} // End of Class
