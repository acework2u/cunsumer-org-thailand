<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Organized_model extends MY_Model
{

    private $_title;
    private $_address;
    private $_contact_name;
    private $_contact_lastname;
    private $_contact_mobile;
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
    private $_orz_logo;
    private $_orz_objective;
    private $_orz_board_of_directore;
    private $_orz_portfolio;
    private $_orz_district;
    private $_orz_province;
    private $_orz_amphoe;
    private $_orz_zipcode;
    private $_orz_province_code;
    private $_created_date;
    private $_updated_date;

    public function __construct()
    {
        parent::__construct();
    }

    public function setCreatedDate($date){
        $this->_created_date = $date;
    }
    public function setUpdatedDate($date){
        $this->_updated_date = $date;
    }

    public function setTitle($title)
    {
        $this->_title = $title;
    }

    public function setAddress($address)
    {
        $this->_address = $address;
    }

    public function setContactName($contact_name)
    {
        $this->_contact_name = $contact_name;
    }

    public function setContactLastName($contact_lastname)
    {
        $this->_contact_lastname = $contact_lastname;
    }

    public function setContactTel($mobile_numer)
    {
        $this->_contact_mobile = $mobile_numer;

    }

    public function setEmail($email)
    {
        $this->_email = $email;
    }

    public function setWebsite($website){
        $this->_website = $website;
    }

    public function setLatitude($latitude)
    {
        $this->_latitude = $latitude;
    }

    public function setLongitude($longitude)
    {
        $this->_longitude = $longitude;
    }

    public function setStatus($status)
    {
        $this->_status = $status;
    }

    public function setOrzGroupId($group_id)
    {
        $this->_orz_group_id = $group_id;
    }

    public function setStageCode($stage_code)
    {
        $this->_stage_code = $stage_code;
    }

    public function setUserId($user_id)
    {
        $this->_user_id = $user_id;
    }

    public function setOrzId($orz_id)
    {
        $this->_orz_id = $orz_id;
    }

    public function getOrzId()
    {
        return $this->_orz_id;
    }

    public function setOrzType($orz_type_id)
    {
        $this->_orz_type = $orz_type_id;
    }

    public function setTel($tel)
    {
        $this->_tel = $tel;
    }

    public function setLogo($img_logo)
    {
        $this->_orz_logo = $img_logo;
    }

    public function setBoardOfDirectors($board_directors)
    {
        $this->_orz_board_of_directore = $board_directors;
    }

    public function setPortfolio($portfolio)
    {
        $this->_orz_portfolio = $portfolio;
    }

    public function setObjecttive($objective)
    {
        $this->_orz_objective = $objective;
    }

    public function setZipCode($zipcode)
    {
        $this->_orz_zipcode = $zipcode;
    }

    public function setDistrict($district)
    {
        $this->_orz_district = $district;
    }

    public function setAmphoe($amphoe)
    {
        $this->_orz_amphoe = $amphoe;
    }

    public function setProvince($province)
    {
        $this->_orz_province = $province;
    }

    public function setProvinceCode($province_code)
    {
        $this->_orz_province_code = $province_code;
    }


    public function create()
    {

        $data = array();
        if (!is_blank($this->_title)) {
            $data['title'] = $this->_title;
        }
        if (!is_blank($this->_address)) {
            $data['address'] = $this->_address;
        }
        if (!is_blank($this->_contact_name)) {
            $data['contact_name'] = $this->_contact_name;
        }
        if (!is_blank($this->_contact_lastname)) {
            $data['contact_lastname'] = $this->_contact_lastname;
        }
        if (!is_blank($this->_contact_mobile)) {
            $data['contact_tel'] = $this->_contact_mobile;
        }
        if (!is_blank($this->_email)) {
            $data['email'] = $this->_email;
        }
        if (!is_blank($this->_website)) {
            $data['website'] = $this->_website;
        }
        if (!is_blank($this->_longitude)) {
            $data['longitude'] = $this->_longitude;
        }
        if (!is_blank($this->_latitude)) {
            $data['latitude'] = $this->_latitude;
        }
        if (!is_blank($this->_status)) {
            $data['status'] = $this->_status;
        }
        if (!is_blank($this->_orz_group_id)) {
            $data['orz_group_id'] = $this->_orz_group_id;
        }
        if (!is_blank($this->_stage_code)) {
            $data['stage_code'] = $this->_stage_code;
        }
        if (!is_blank($this->_user_id)) {
            $data['user_id'] = $this->_user_id;
        }
        if (!is_blank($this->_orz_type)) {
            $data['orz_type_id'] = $this->_orz_type;
        }
        if (!is_blank($this->_tel)) {
            $data['orz_tel'] = $this->_tel;
        }
        if (!is_blank($this->_orz_logo)) {
            $data['logo'] = $this->_orz_logo;
        }
        if (!is_blank($this->_orz_portfolio)) {
            $data['portfolio'] = $this->_orz_portfolio;
        }
        if (!is_blank($this->_orz_board_of_directore)) {
            $data['board_of_directors'] = $this->_orz_board_of_directore;
        }
        if (!is_blank($this->_orz_objective)) {
            $data['objective'] = $this->_orz_objective;
        }

        if (!is_blank($this->_orz_district)) {
            $data['district'] = $this->_orz_district;
        }
        if (!is_blank($this->_orz_amphoe)) {
            $data['amphoe'] = $this->_orz_amphoe;
        }
        if (!is_blank($this->_orz_province)) {
            $data['province'] = $this->_orz_province;
        }

        $this->db->insert($this->tbl_organization, $data);
        if (!is_blank($this->db->insert_id()) && $this->db->insert_id() > 0) {
            $this->setOrzId($this->db->insert_id());
            return true;
        } else {
            return false;
        }


    }

    public function update()
    {
        $data = array();
        if (!is_blank($this->_title)) {
            $data['title'] = $this->_title;
        }
        if (!is_blank($this->_address)) {
            $data['address'] = $this->_address;
        }
        if (!is_blank($this->_contact_name)) {
            $data['contact_name'] = $this->_contact_name;
        }
        if (!is_blank($this->_contact_lastname)) {
            $data['contact_lastname'] = $this->_contact_lastname;
        }
        if (!is_blank($this->_contact_mobile)) {
            $data['contact_tel'] = $this->_contact_mobile;
        }
        if (!is_blank($this->_email)) {
            $data['email'] = $this->_email;
        }
        if (!is_blank($this->_website)) {
            $data['website'] = $this->_website;
        }
        if (!is_blank($this->_longitude)) {
            $data['longitude'] = $this->_longitude;
        }
        if (!is_blank($this->_latitude)) {
            $data['latitude'] = $this->_latitude;
        }
        if (!is_blank($this->_status)) {
            $data['status'] = $this->_status;
        }
        if (!is_blank($this->_orz_group_id)) {
            $data['orz_group_id'] = $this->_orz_group_id;
        }
        if (!is_blank($this->_stage_code)) {
            $data['stage_code'] = $this->_stage_code;
        }
        if (!is_blank($this->_user_id)) {
            $data['user_id'] = $this->_user_id;
        }
        if (!is_blank($this->_orz_type)) {
            $data['orz_type_id'] = $this->_orz_type;
        }
        if (!is_blank($this->_tel)) {
            $data['orz_tel'] = $this->_tel;
        }
        if (!is_blank($this->_orz_logo)) {
            $data['logo'] = $this->_orz_logo;
        }
        if (!is_blank($this->_orz_portfolio)) {
            $data['portfolio'] = $this->_orz_portfolio;
        }
        if (!is_blank($this->_orz_board_of_directore)) {
            $data['board_of_directors'] = $this->_orz_board_of_directore;
        }
        if (!is_blank($this->_orz_objective)) {
            $data['objective'] = $this->_orz_objective;
        }

        if (!is_blank($this->_orz_district)) {
            $data['district'] = $this->_orz_district;
        }
        if (!is_blank($this->_orz_amphoe)) {
            $data['amphoe'] = $this->_orz_amphoe;
        }
        if (!is_blank($this->_orz_province)) {
            $data['province'] = $this->_orz_province;
        }
        if(!is_blank($this->_updated_date)){
            $data['updated_date'] = $this->_updated_date;
        }
        if(getUserRoleId()==1){

        }else{
            $this->db->where('user_id', getUserAid());
        }

        $this->db->where('aid', $this->_orz_id);
        $this->db->update($this->tbl_organization, $data);

        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }


    }

    public function orz_logo()
    {
        $data = array();

        if (!is_blank($this->_orz_logo)) {
            $data['logo'] = $this->_orz_logo;

            if (!is_blank($this->_orz_id)) {
                $this->db->where('aid', $this->_orz_id);
                $this->db->update($this->tbl_organization, $data);

                if ($this->db->affected_rows()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }


        } else {
            return false;
        }

    }

    public function orz_all(){
        $query = $this->db->order_by('aid','desc')->get($this->tbl_organization);
        $result=array();
        if($query->num_rows() > 0){
                foreach ($query->result_array() as $row){
                    $result[] = $row;
                }

        }
        return $result;

    }

    public function orz_information()
    {

        $this->db->select('organization.*,orz_status.`status` AS status_title,orz_status.aid AS aid_status');
        $this->db->join($this->tbl_orz_status, 'organization.`status` = orz_status.aid', 'left');
        $this->db->where('user_id', getUserAid());
        $query = $this->db->get($this->tbl_organization);

//        $query = $this->db->where('user_id',getUserAid())->get($this->tbl_organization);

        $result = array();
        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $result[] = $row;
            }


        }


        return $result;
    }

    public function organization_last()
    {
        $last = $this->db->where('status', 4)->order_by('aid', "desc")->limit(1)->get($this->tbl_organization)->row();

        return $last;
    }

    public function orz_in_province()
    {

        if (!is_blank($this->_orz_id)) {

            $data = array();

            $this->db->where('orz_aid', $this->_orz_id);
            $q = $this->db->get($this->tbl_orz_in_province);
            $this->db->reset_query();

            if ($q->num_rows() > 0) {
                #Update
                $data['province_code'] = $this->_orz_province_code;

                $this->db->where('orz_aid', $this->_orz_id);
                $this->db->update($this->tbl_orz_in_province, $data);
                $aff_num = $this->db->affected_rows();
                if ($aff_num > 0) {
                    return true;
                }
            } else {
                #New
                $data['orz_aid'] = $this->_orz_id;
                $data['province_code'] = $this->_orz_province_code;

                $this->db->insert($this->tbl_orz_in_province, $data);
                $aff_num = $this->db->affected_rows();
                if ($aff_num > 0) {
                    return $this->db->insert_id();
                }

            }


        }


    }

    public function orz_for_search()
    {
        $result = array();

            $this->db->select('*');
            $this->db->join($this->tbl_orz_in_province, 'organization.aid = orz_in_province.orz_aid', 'left');
            if(!is_blank($this->_orz_province_code) && $this->_orz_province_code != 0){
                $this->db->where('orz_in_province.province_code', $this->_orz_province_code);
            }
            $this->db->where('organization.status','4');
            $query = $this->db->get($this->tbl_organization);

            if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $row) {
                    $result[] = $row;
                }
            }


        return $result;
    }


} // end of class
