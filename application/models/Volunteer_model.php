<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Volunteer_model extends MY_Model
{
    private $_volunteerId;
    private $_name;
    private $_lastname;
    private $_tel;
    private $_email;
    private $_address;
    private $_district;
    private $_amphoe;
    private $_province;
    private $_zipcode;
    private $_status;
    private $_create_date;
    private $_update_date;
    private $_startDate;
    private $_endDate;


    #Orz Volunteer
    private $_orz_aid;
    private $_orz_volun_aid;

    public function __construct()
    {
        parent::__construct();
    }


    public function setId($volunteer_id)
    {
        $this->_volunteerId = $volunteer_id;
    }

    public function setCreateDate($date)
    {
        $this->_create_date = $date;
    }

    public function setUpdateDate($date)
    {
        $this->_update_date = $date;
    }

    public function setStartDate($startDate)
    {
        $this->_startDate = $startDate;
    }

    public function setEndDate($endDate)
    {
        $this->_endDate = $endDate;
    }

    public function getId()
    {
        return $this->_volunteerId;
    }

    public function setName($name)
    {
        $this->_name = $name;
    }

    public function setLastName($last_name)
    {
        $this->_lastname = $last_name;
    }

    public function setTel($tel)
    {
        $this->_tel = $tel;
    }

    public function setEmail($email)
    {
        $this->_email = $email;
    }

    public function setStatus($status)
    {
        $this->_status = $status;
    }

    public function setAddress($address)
    {
        $this->_address = $address;
    }

    public function setDistrict($district)
    {
        $this->_district = $district;
    }

    public function setAmphoe($amphoe)
    {
        $this->_amphoe = $amphoe;
    }

    public function setProvince($province)
    {
        $this->_province = $province;
    }

    public function setZipcode($zipcode)
    {
        $this->_zipcode = $zipcode;
    }

    public function create()
    {
        $data = array();
        if (!is_blank($this->_name)) {
            $data['name'] = $this->_name;
        }
        if (!is_blank($this->_lastname)) {
            $data['lastname'] = $this->_lastname;
        }
        if (!is_blank($this->_tel)) {
            $data['tel'] = $this->_tel;
        }
        if (!is_blank($this->_email)) {
            $data['email'] = $this->_email;
        }
        if (!is_blank($this->_status)) {
            $data['status'] = $this->_status;
        }
        if (!is_blank($this->_address)) {
            $data['address'] = $this->_address;
        }
        if (!is_blank($this->_amphoe)) {
            $data['amphoe'] = $this->_amphoe;
        }
        if (!is_blank($this->_district)) {
            $data['district'] = $this->_district;
        }
        if (!is_blank($this->_province)) {
            $data['province'] = $this->_province;
        }
        if (!is_blank($this->_zipcode)) {
            $data['zipcode'] = $this->_zipcode;
        }
        if (!is_blank($this->_create_date)) {
            $data['created_date'] = $this->_create_date;
        }
        if (!is_blank($this->_update_date)) {
            $data['updated_date'] = $this->_update_date;
        }


        $this->db->insert($this->tbl_volunteer, $data);
        if (!is_blank($this->db->insert_id()) && $this->db->insert_id() > 0) {
            $this->setId($this->db->insert_id());
            return true;

        } else {
            return false;
        }


    }

    public function update()
    {

        if (!is_blank($this->_volunteerId)) {
            $data = array();
            if (!is_blank($this->_name)) {
                $data['name'] = $this->_name;
            }
            if (!is_blank($this->_lastname)) {
                $data['lastname'] = $this->_lastname;
            }
            if (!is_blank($this->_tel)) {
                $data['tel'] = $this->_tel;
            }
            if (!is_blank($this->_email)) {
                $data['email'] = $this->_email;
            }
            if (!is_blank($this->_status)) {
                $data['status'] = $this->_status;
            }
            if (!is_blank($this->_address)) {
                $data['address'] = $this->_address;
            }
            if (!is_blank($this->_amphoe)) {
                $data['amphoe'] = $this->_amphoe;
            }
            if (!is_blank($this->_district)) {
                $data['district'] = $this->_district;
            }
            if (!is_blank($this->_province)) {
                $data['province'] = $this->_province;
            }
            if (!is_blank($this->_zipcode)) {
                $data['zipcode'] = $this->_zipcode;
            }
            $this->db->where('aid', $this->_volunteerId);
            $this->db->update($this->tbl_volunteer, $data);

            if ($this->db->affected_rows()) {
                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }

    }

    public function delete()
    {
        if (!is_blank($this->_volunteerId)) {
            $this->db->delete($this->tbl_volunteer, array('aid' => $this->_volunteerId));
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

        return false;

    }

    public function check_volunteer()
    {
        $query = $this->db->where('email', $this->_email)->limit(1)->get($this->tbl_volunteer);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $this->setId($row->aid);
            }
            return true;
        } else {
            return false;
        }

    }

    #orz Volunteer
    public function setOrzId($orz_volun_id)
    {
        $this->_orz_aid = $orz_volun_id;
    }

    public function setOrzvolunId($orz_volun_id)
    {
        $this->_orz_volun_aid = $orz_volun_id;
    }

    public function getOrzvolunId()
    {
        return $this->_orz_volun_aid;
    }

    public function check_orz_volunteer_mn()
    {
        $this->db->where('orz_aid', $this->_orz_aid);
        $this->db->where('volunteer_aid', $this->_volunteerId);
        $this->db->limit(1);
        $query = $this->db->get($this->tbl_orz_volunteer_mn);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $this->setOrzvolunId($row->aid);
            }

            return true;

        } else {
            return false;
        }
    }

    public function orz_volunteer_create()
    {
        $data = array();
        if (!is_blank($this->_orz_aid)) {
            $data['orz_aid'] = $this->_orz_aid;
        }
        if (!is_blank($this->_volunteerId)) {
            $data['volunteer_aid'] = $this->_volunteerId;
        }

        if (!is_blank($data)) {
            $data['status'] = 1;
            $data['created_date'] = date("Y-m-d H:i:s");
            $data['updated_date'] = date("Y-m-d H:i:s");
            $this->db->insert($this->tbl_orz_volunteer_mn, $data);
            if (!is_blank($this->db->insert_id() && $this->db->insert_id() > 0)) {
                $this->setOrzvolunId($this->db->insert_id());
                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }

    }

    public function volunteer_join_orz()
    {
        $result = array();
//        if(!is_blank($this->_orz_aid)){
        $this->db->select('volunteer.*,
	orz_status.`status` AS volunteer_jpoin_status,
	orz_volunteer_mn.`status` AS orz_join_status_id,organization.title as orz_name,organization.province as orz_province');
        $this->db->join($this->tbl_orz_volunteer_mn, 'orz_volunteer_mn.volunteer_aid = volunteer.aid', 'left');
        $this->db->join($this->tbl_orz_status, 'orz_volunteer_mn.`status` = orz_status.aid', 'left');
        $this->db->join($this->tbl_organization, 'orz_volunteer_mn.orz_aid = organization.aid', 'left');
        if (getUserRoleId() != 1) {
//                $this->db->where('organization.user_id',getUserAid());
        }


        $user_access = getUserRoleId();
        // $user_access = 5;
        switch ($user_access) {
            case 1:
                break;
            case 2:
                break;
            case 3:
                $this->db->join($this->tbl_orz_in_province,'organization.aid = orz_in_province.orz_aid','left');
                $this->db->join($this->tbl_zone_province_mn,'zone_province_mn.provincy_code = orz_in_province.province_code','left');
                $this->db->where('zone_province_mn.zone_code',getUserGroupId());
                break;
            case 4:
                $this->db->join($this->tbl_orz_in_province,'organization.aid = orz_in_province.orz_aid','left');
                $this->db->where('orz_in_province.province_code',getUserGroupId());
                break;
            default:
//                $this->db->where('orz_volunteer_mn.orz_aid', $this->_orz_aid);
                $this->db->or_where('orz_volunteer_mn.orz_aid',getUserGroupId());
                break;
        }

        if (!is_blank($this->_startDate)) {

                $this->db->where("volunteer.created_date >=",$this->_startDate);
                $this->db->where("volunteer.created_date <=",$this->_endDate);
//                $this->db->where("DATE(volunteer.created_date) between $this->_startDate AND $this->_endDate");
        }



        $this->db->order_by('aid', "desc");
        $query = $this->db->get($this->tbl_volunteer);

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $result[] = $row;
            }
        }
//        }
        return $result;
    }


} // end of class
