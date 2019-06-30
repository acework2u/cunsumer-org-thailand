<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Provinces_model extends MY_Model
{

    private $_zone_code;
    private $_provence_code;
    private $_zip_code;


    public function setZoneCode($zone_code)
    {
        $this->_zone_code = $zone_code;
    }

    public function setZipCode($zip_code){
        $this->_zip_code = $zip_code;
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

    public function provinces()
    {
        $this->db->select('provinces.*, zone_code');
        $this->db->join($this->tbl_zone_province_mn,'provinces.`code` = zone_province_mn.provincy_code','left');
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

    public function get_province_code(){
        $this->db->select('provinces.*');
        $this->db->join($this->tbl_districts,'provinces.id = districts.province_id','lef');
        $this->db->join($this->tbl_subdistricts,'subdistricts.district_id = districts.id','left');
        $this->db->where('subdistricts.zip_code',$this->_zip_code);
        $this->db->limit(1);
        $query = $this->db->get($this->tbl_provinces);

        $provice_code = "";

        if($query->num_rows() > 0){
            foreach ($query->result() as $row){
                $provice_code = $row->code;
            }
        }

        return $provice_code;


    }

}// End Of Class
