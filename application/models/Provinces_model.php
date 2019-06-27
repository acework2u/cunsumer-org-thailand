<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Provinces_model extends MY_Model
{


    public function __construct()
    {
        parent::__construct();
    }

    public function getAddressProvence(){

    }

    public function provinces_list(){

        $query = $this->db->order_by('code','asc')->get($this->tbl_provinces);
        $result = array();
        if($query->num_rows() >0 ){
            foreach ($query->result_array() as $row){
                $result[] = $row;
            }
        }

        return $result;


    }

}// End Of Class
