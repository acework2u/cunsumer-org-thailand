<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth_model extends MY_Model
{
    // Declaration of a variables
    private $_userID;
    private $_userName;
    private $_firstName;
    private $_lastName;
    private $_email;
    private $_password;
    private $_contactNo;
    private $_companyName;
    private $_address;
    private $_systemID;
    private $_dob;
    private $_verificationCode;
    private $_timeStamp;
    private $_status;
    private $_token;
    private $_user_role_id;
    private $_cus_group_id;
    private $_create_date;
    private $_update_date;


    public function __construct()
    {
        parent::__construct();
//        $this->db = $this->load->database('auth_db', TRUE);
    }


    //Declaration of a methods
    public function setUserID($userID)
    {
        $this->_userID = $userID;
    }

    public function getUserId()
    {
        return $this->_userID;
    }

    public function setUserName($userName)
    {
        $this->_userName = $userName;
    }

    public function setFirstname($firstName)
    {
        $this->_firstName = $firstName;
    }

    public function setLastName($lastName)
    {
        $this->_lastName = $lastName;
    }

    public function setEmail($email)
    {
        $this->_email = $email;
    }

    public function setContactNo($contactNo)
    {
        $this->_contactNo = $contactNo;
    }

    public function setPassword($password)
    {
        $this->_password = $password;
    }

    public function setAddress($address)
    {
        $this->_address = $address;
    }

    public function setDOB($dob)
    {
        $this->_dob = $dob;
    }

    public function setSystemId($system_id)
    {
        $this->_systemID = $system_id;
    }

    public function setVerificationCode($verificationCode)
    {
        $this->_verificationCode = $verificationCode;
    }

    public function setTimeStamp($timeStamp)
    {
        $this->_timeStamp = $timeStamp;
    }

    public function setStatus($status)
    {
        $this->_status = $status;
    }

    public function setToken($token)
    {
        $this->_token = $token;
    }

    public function setRole($roleId)
    {
        $this->_user_role_id = $roleId;
    }

    public function setGroup($groupId)
    {
        $this->_cus_group_id = $groupId;
    }

    public function setCompanyName($companyName)
    {
        $this->_companyName = $companyName;
    }

    public function setCreateDate($date){
        $this->_create_date = $date;
    }
    public function setUpdateDate($date){
        $this->_update_date = $date;
    }

    //create new user
    public function create()
{
    $hash = $this->hash($this->_password);

    $data = array();

    if (!is_blank($this->_firstName)) {
        $data['first_name'] = $this->_firstName;
    }
    if (!is_blank($this->_lastName)) {
        $data['last_name'] = $this->_lastName;
    }
    if (!is_blank($this->_email)) {
        $data['email'] = $this->_email;
    }
    if (!is_blank($this->_companyName)) {
        $data['company_name'] = $this->_companyName;
    }
    if (!is_blank($hash)) {
        $data['password'] = $hash;
    }
    if (!is_blank($this->_user_role_id)) {
        $data['user_role_id'] = $this->_user_role_id;
    }
    if (!is_blank($this->_cus_group_id)) {
        $data['cus_group_id'] = $this->_cus_group_id;
    }
    if (!is_blank($this->_verificationCode)) {
        $data['verification_code'] = $this->_verificationCode;
    }
    if (!is_blank($this->_status)) {
        $data['status'] = $this->_status;
    }
    if (!is_blank($this->_timeStamp)) {
        $data['created_date'] = $this->_timeStamp;
        $data['modified_date'] = $this->_timeStamp;
    }

    $this->db->insert($this->tbl_users, $data);
    if (!is_blank($this->db->insert_id()) && $this->db->insert_id() > 0) {

        $this->setUserID($this->db->insert_id());

        return TRUE;
    } else {
        return FALSE;
    }
}
    //update user
    public function update()
    {
        $data = array();
        if (!is_blank($this->_password)) {
            $hash = $this->hash($this->_password);
            $data['password'] = $hash;
        }
        if(!is_blank($this->_firstName)){
            $data['first_name'] = $this->_firstName;
        }
        if(!is_blank($this->_lastName)){
            $data['last_name'] = $this->_lastName;
        }
        if(!is_blank($this->_userName)){
            $data['user_name'] = $this->_userName;
        }
        if(!is_blank($this->_email)){
            $data['email'] = $this->_email;
        }
        if(!is_blank($this->_contactNo)){
            $data['contact_no'] = $this->_contactNo;
        }
        if(!is_blank($this->_user_role_id)){
            $data['user_role_id'] = $this->_user_role_id;
        }
        if(!is_blank($this->_cus_group_id)){
            $data['cus_group_id'] = $this->_cus_group_id;
        }
        if(!is_blank($this->_status)){
            $data['status'] = $this->_status;
        }
        if(!is_blank($this->_update_date)){
            $data['modified_date'] = $this->_update_date;
        }

        $msg = 0;
        if(!is_blank($this->_userID)){
            $this->db->where('id', $this->_userID);
            $msg = $this->db->update($this->tbl_users, $data);
        }

        if ($msg == 1) {
            return TRUE;
        } else {
            return FALSE;
        }

    }
    //Delete user
    public function delete(){

        if(!is_blank($this->_userID)){
            $this->db->delete($this->tbl_users,array('id'=>$this->_userID));
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        }

        return false;

    }

    public function user_count()
    {
        return $this->db->count_all($this->tbl_users);
    }

    public function delete_user($data = '')
    {
        if (is_array($data)) {
            $user_id = get_array_value($data, 'id', '');
            $this->db->delete($this->tbl_cus_mstr, array('id' => $user_id));
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        }
        return false;
    }

    function group_list()
    {
        $db_where = array('status' => 1);

        if (getUserRoleId() > 1) {
            $this->db->where($db_where);
        }
        $query = $this->db->get($this->tbl_cus_group);
        $result = array();
        $rows = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $rows = array(
                    'id' => get_array_value($row, 'id', ''),
                    'name' => get_array_value($row, 'name', ''),
                    'status' => get_array_value($row, 'status', '')
                );

                $result[] = $rows;
            }
            return $result;
        }

        return false;

    }


    function user_rule()
    {
        $query = $this->db->where('status', 1)->get($this->tbl_user_role);
        $result = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $result[] = array(
                    'id' => $row->id,
                    'name' => $row->name
                );
            }
        }

        return $result;
    }


    public function user_group(){
        $result = array();
        $query = $this->db->where('status',1)->get($this->tbl_user_group);
        if($query->num_rows() > 0 ){
            foreach ($query->result_array() as $row){
                $result[] = $row;
            }
        }
        return $result;

    }

    public function user_status(){
        $query = $this->db->get($this->tbl_users_status);
        $result = array();
        if($query->num_rows() > 0 ){
            foreach ($query->result_array() as $row){
                $result[] = $row;
            }
        }

        return $result;

    }

    function user_list($limit = 20, $start = 0)
    {
        $result = array();
        $rows = array();
        $this->db->reset_query();
        /*
        $this->db->select('*');
        $this->db->join($this->tbl_cus_group, 'cus_mstr.cus_group_id = cus_group.id', 'left');
        $this->db->join($this->tbl_user_role, 'cus_mstr.user_role_id = user_role.id ', 'left');


        switch (getUserRoleId()) {
            case 5:
                $group_id = getUserGroupId();
                $db_where = array('cus_mstr.cus_group_id' => $group_id, 'cus_mstr.status' => '1');
                $this->db->where($db_where);
                break;
            case 4:
                $group_id = getUserGroupId();
                $db_where = array('cus_mstr.cus_group_id' => $group_id);
                $this->db->where($db_where);
                break;
            case 3:
                $group_id = getUserGroupId();
                $db_where = array('cus_mstr.cus_group_id' => $group_id);
                $this->db->where($db_where);
                break;
            case 2:
                $group_id = getUserGroupId();
                $db_where = array('cus_mstr.cus_group_id' => $group_id);
                $this->db->where($db_where);

                break;
            case 1:
                $group_id = getUserGroupId();
                $db_where = array('cus_mstr.status' => '1'); //'cus_mstr.status'=>'1'
                $this->db->where($db_where);
                break;
        }
        */


        $this->db->select('users.*,user_role.`name` AS role_name,users_status.status_title AS status_title');
        $this->db->join($this->tbl_user_role, 'users.user_role_id = user_role.id', 'left');
        $this->db->join($this->tbl_users_status, 'users.`status` = users_status.aid', 'left');
        $this->db->order_by('users.id','desc');
        $query = $this->db->get($this->tbl_users);

        if ($query->num_rows() > 0) {
            $i = 1;
            foreach ($query->result_array() as $row) {

                $c_Date = get_array_value($row, 'created_date', '');
                $u_Date = get_array_value($row, 'modified_date', '');

                $rows = array(
                    'index' => $i,
                    'id' => get_array_value($row, 'id', ''),
                    'email' => get_array_value($row, 'email', ''),
                    'name' => get_array_value($row, 'first_name', ''),
                    'last_name' => get_array_value($row, 'last_name', ''),
                    'user_role_id' => get_array_value($row, 'user_role_id', ''),
                    'role_name' => get_array_value($row, 'role_name', ''),
                    'customer_group_id' => get_array_value($row, 'cus_group_id'),
                    'group_name' => get_array_value($row, 'group_name', ''),
                    'status_id' => get_array_value($row, 'status', ''),
                    'status_title' => get_array_value($row, 'status_title', ''),
                    'created_date' => date('m/d/Y H:i:s', (int)$c_Date),
                    'updated_date' => date('m/d/Y H:i:s', (int)$u_Date),

                );
                $i++;

                $result[] = $rows;

            }
        }

        return $result;

    }

    // login method and password verify
    function login()
    {
        $this->db->select('*,id as user_id');
        $this->db->from($this->tbl_users);
        $this->db->where('email', $this->_userName);
        $this->db->where('status', 1);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $result = $query->result();
            foreach ($result as $row) {
                if ($this->verifyHash($this->_password, $row->password) == TRUE) {
                    return $result;
                } elseif ($this->verifyHash256($this->_password, $row->password) == TRUE) {
                    return $result;
                } else {
                    return FALSE;
                }
            }
        } else {
            return FALSE;
        }


    } //end of function login
    //change password
    public function changePassword()
    {
        $hash = $this->hash($this->_password);
        $data = array(
            'password' => $hash,
        );
        $this->db->where('id', $this->_userID);
        $msg = $this->db->update('users', $data);
        if ($msg == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // get User Detail
    public function getUserDetails()
    {
        $this->db->select(array('m.id as user_id', 'CONCAT(m.name, " ", m.lastname) as full_name', 'm.name', 'm.lastname', 'm.email', 'm.token'));
        $this->db->from('cus_mstr as m');
        $this->db->where('m.id', $this->_userID);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return FALSE;
        }
    }

    // update Forgot Password
    public function updateForgotPassword()
    {
        $hash = $this->hash($this->_password);
        $data = array(
            'password' => $hash,
        );
        $this->db->where('email', $this->_email);
        $msg = $this->db->update('users', $data);
        if ($msg > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // get Email Address
    public function activate()
    {
        $data = array(
            'status' => 1,
            'verification_code' => 1,
        );
        $this->db->where('verification_code', $this->_verificationCode);
        $msg = $this->db->update('users', $data);
        if ($msg == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // password hash
    public function hash($password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        return $hash;
    }

    // password verify
    public function verifyHash($password, $vpassword)
    {
        if (password_verify($password, $vpassword)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function hash256($password)
    {
        $hash = hash("sha256", $password);
        return $hash;
    }

    public function verifyHash256($password, $vpassword)
    {
        $ch_pass = $this->hash256($password);
        if ($ch_pass == $vpassword) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function check_user($email = "")
    {
        if (!is_blank($email)) {
            $query = $this->db->where('email', $email)->get($this->tbl_users);
            if ($query->num_rows() > 0) {

                return true;
            }
        }
        return false;
    }




}

?>
