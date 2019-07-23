<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Logs_model extends MY_Model
{


    public function __construct()
    {
        parent::__construct();
    }


    public function approved_logs($orz_id = "", $action = "")
    {

        $created_date = date('Y-m-d H:i:s');
        $updated_date = date('Y-m-d H:i:s');


        if (!is_blank($orz_id)) {
            $check = $this->db->where('orz_aid', $orz_id)->limit(1)->get($this->tbl_approved_logs);
            $check_is_recode = false;
            if ($check->num_rows() > 0) {
                $check_is_recode = true;
            } else {
                $check_is_recode = false;
            }
            $this->db->reset_query();

            if ($check_is_recode) {
                $data_where = array();
                $data_where['user_aid'] = getUserAid();
                $data_where['action'] = $action;
                $data_where['updated_date'] = $updated_date;
                $this->db->where('orz_aid', $orz_id);
                $this->db->update($this->tbl_approved_logs, $data_where);

                if ($this->db->affected_rows()) {
                    return true;
                } else {
                    return false;
                }

            } else {
                $data = array();
                $data['orz_aid'] = $orz_id;
                $data['user_aid'] = getUserAid();
                $data['action'] = $action;
                $data['created_date'] = $created_date;
                $data['updated_date'] = $updated_date;
                $this->db->insert($this->tbl_approved_logs, $data);
                if (!is_blank($this->db->insert_id()) && $this->db->insert_id() > 0) {
                    return true;
                } else {
                    return false;
                }
            }


        }


    }


    public function get_approved_logs(){

        $this->db->select('approved_logs.*,
	title,
	users.first_name,
	users.last_name');
        $this->db->join($this->tbl_organization,'approved_logs.orz_aid = organization.aid','left');
        $this->db->join($this->tbl_users,'approved_logs.user_aid = users.id','left');
        $query = $this->db->get($this->tbl_approved_logs);

        $result = array();
        if($query->num_rows() >0){
            foreach ($query->result() as $row){
                $result[] = $row;
            }
        }
        return $result;
    }


} // End of Class
