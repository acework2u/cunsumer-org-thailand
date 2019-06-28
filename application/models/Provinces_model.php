<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Provinces_model extends MY_Model
{

    private $_zone_code;
    private $_provence_code;


    public function setZoneCode($zone_code)
    {
        $this->_zone_code = $zone_code;
    }


    public function __construct()
    {
        parent::__construct();
    }

    public function getAddressProvence()
    {

    }

    public function provinces_list()
    {

        $query = $this->db->order_by('code', 'asc')->get($this->tbl_provinces);
        $result = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $result[] = $row;
            }
        }

        return $result;


    }


    public function province_zone()
    {
        $this->db->select('provinces.*, zone_code');
        $this->db->join($this->tbl_zone_province_mn,'provinces.`code` = zone_province_mn.provincy_code','left');
        $this->db->where('zone_code',$this->_zone_code);
        $query = $this->db->get($this->tbl_provinces);

        $result = array();
        if($query->num_rows() > 0){
            foreach ($query->result_array() as $row){
                $result[] = $row;
            }
        }
        return $result;
    }

    public function zone_list()
    {
        $query = $this->db->get($this->tbl_zone);
        $result = array();
        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $result[] = $row;
            }
        }

        return $result;
    }

}// End Of Class
