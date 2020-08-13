<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reports_model extends MY_Model
{


    private $_start_date;
    private $_end_date;
    private $_group_code;
    private $_province_code;
    private $_limit;

    public function __construct()
    {
        parent::__construct();
    }


    public function setStartDate($start_date)
    {
        $this->_start_date = $start_date;
    }

    public function setEndDate($end_date)
    {
        $this->_end_date = $end_date;
    }
    public function setLimit($limit){
        $this->_limit = $limit;
    }

    public function report_orz_list()
    {

        $this->db->select('organization.*,
	orz_status.`status` AS orz_status_title,	
	orz_in_province.province_code,
	zone_code,zone.title_th AS zone_title');
        $this->db->join($this->tbl_orz_status, 'organization.`status` = orz_status.aid', 'left');
        $this->db->join($this->tbl_orz_in_province, 'organization.aid = orz_in_province.orz_aid', 'left');
        $this->db->join($this->tbl_zone_province_mn, 'orz_in_province.province_code = zone_province_mn.provincy_code', 'left');
        $this->db->join($this->tbl_zone, 'zone_province_mn.zone_code = zone.`code` ', 'left');

        if (getUserRoleId() == 3) {
            $this->db->where('zone_code', getUserGroupId());
        } elseif (getUserRoleId() == 4) {
            $this->db->where('province_code', getUserGroupId());
        }


        if (!is_blank($this->_start_date)) {
            $this->db->where('organization.created_date >=', $this->_start_date);
        }
        if (!is_blank($this->_end_date)) {
            $this->db->where('organization.created_date <=', $this->_end_date);
        }

        if(!is_blank($this->_limit)){
            $this->db->limit($this->_limit);
        }

        $this->db->order_by('organization.aid','desc');
        $query = $this->db->get($this->tbl_organization);



        $result = array();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
        }

        return $result;


    }


} // end of class
