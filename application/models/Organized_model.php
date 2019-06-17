<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Organized_model extends MY_Model{

    private $_title;
    private $_address;
    private $_contact_name;
    private $_contact_lastname;
    private $_email;
    private $_tel;
    private $_user_id;
    private $_website;
    private $_latitude;
    private $_longitude;
    private $_status;
    private $_orz_group_id;
    private $_stage_code;
    private $_orz_id;
    private $_orz_type;

    public function __construct()
    {
        parent::__construct();
    }

    public function setTitle($title){
        $this->_title = $title;
    }
    public function setAddress($address){
        $this->_address = $address;
    }
    public function setContactName($contact_name){
        $this->_contact_name = $contact_name;
    }
    public function setContactLastName($contact_lastname){
        $this->_contact_lastname = $contact_lastname;
    }
    public function setEmail($email){
        $this->_email = $email;
    }
    public function setLatitude($latitude){
        $this->_latitude = $latitude;
    }
    public function setLongitude($longitude){
        $this->_longitude = $longitude;
    }
    public function setStatus($status){
        $this->_status = $status;
    }
    public function setOrzGroupId($group_id){
        $this->_orz_group_id = $group_id;
    }
    public function setStageCode($stage_code){
        $this->_stage_code = $stage_code;
    }
    public function setUserId($user_id){
        $this->_user_id = $user_id;
    }
    public function setOrzId($orz_id){
        $this->_orz_id = $orz_id;
    }
    public function getOrzId(){
        return $this->_orz_id;
    }
    public function setOrzType($orz_type_id){
        $this->_orz_type = $orz_type_id;
    }
    public function setTel($tel){
        $this->_tel = $tel;
    }



    public function create(){
        $data = array();
        if(!is_blank($this->_title)){
            $data['title'] = $this->_title;
        }
        if(!is_blank($this->_address)){
            $data['address'] = $this->_address;
        }
        if(!is_blank($this->_contact_name)){
            $data['contact_name'] = $this->_contact_name;
        }
        if(!is_blank($this->_contact_lastname)){
            $data['contact_lastname'] = $this->_contact_lastname;
        }
        if(!is_blank($this->_email)){
            $data['email'] = $this->_email;
        }
        if(!is_blank($this->_website)){
            $data['website'] = $this->_website;
        }
        if(!is_blank($this->_longitude)){
            $data['longitude'] = $this->_longitude;
        }
        if(!is_blank($this->_latitude)){
            $data['latitude'] = $this->_latitude;
        }
        if(!is_blank($this->_status)){
            $data['status'] = $this->_status;
        }
        if(!is_blank($this->_orz_group_id)){
            $data['orz_group_id'] = $this->_orz_group_id;
        }
        if(!is_blank($this->_stage_code)){
            $data['stage_code'] = $this->_stage_code;
        }
        if(!is_blank($this->_user_id)){
            $data['user_id'] = $this->_user_id;
        }
        if(!is_blank($this->_orz_type)){
            $data['orz_type_id'] = $this->_orz_type;
        }
        if(!is_blank($this->_tel)){
            $data['orz_tel'] = $this->_tel;
        }

        $this->db->insert($this->tbl_organization,$data);
        if(!is_blank($this->db->insert_id()) && $this->db->insert_id() > 0){
            $this->setOrzId($this->db->insert_id());
            return true;
        }else{
            return false;
        }



    }
    public function orz_information(){

        $this->db->select('organization.*,orz_status.`status` AS status_title,orz_status.aid AS aid_status');
        $this->db->join($this->tbl_orz_status,'organization.`status` = orz_status.aid','left');
        $this->db->where('user_id',getUserAid());
        $query = $this->db->get($this->tbl_organization);

//        $query = $this->db->where('user_id',getUserAid())->get($this->tbl_organization);

        $result = array();
        if($query->num_rows() > 0){

            foreach ($query->result_array() as $row){
                $result[] = $row;
            }


        }


        return $result;
    }


} // end of class
