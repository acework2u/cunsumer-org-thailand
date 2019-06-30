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

    public function __construct()
    {
        parent::__construct();
    }

    public function setId($volunteer_id)
    {
        $this->_volunteerId = $volunteer_id;
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
            }else{
                return false;
            }
        }

        return false;

    }


} // end of class
