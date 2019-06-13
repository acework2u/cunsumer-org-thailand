<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Orz_group extends MY_Model{



    public function __construct()
    {
        parent::__construct();
    }


    public function orz_group_list(){

        $result = array();

        $query = $this->db->where('status',1)->get($this->tbl_orz_group);
        if ($query->num_rows() == 1) {
            $result = $query->result();

        }



    }

} // end of class
