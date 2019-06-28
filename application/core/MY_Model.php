<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{

    public $db2;
    public $tbl_users;
    public $tbl_cus_group;
    public $tbl_donation;
    public $tbl_donation_campaign;
    public $tbl_donor;
    public $tbl_payment_code;
    public $tbl_user_role;
    public $tbl_payment_channel;
    public $tbl_donation_invoice;
    public $tbl_apm_agent_code;

    //*** tcc.indyconsumers.org
    public $tbl_organization;
    public $tbl_orz_group;
    public $tbl_provinces;
    public $tbl_subdistricts;
    public $tbl_districts;
    public $tbl_zone;
    public $tbl_zone_province_mn;
    public $tbl_orz_status;
    public $tbl_orz_in_province;






    public function __construct()
    {
        $this->tbl_users = "users";
        $this->tbl_cus_group = "cus_group";
        $this->tbl_donation = "donation";
        $this->tbl_donation_campaign = "donation_campaign";
        $this->tbl_donor = "donor";
        $this->tbl_user_role = "user_role";
        $this->tbl_payment_code = "payment_code";
        $this->tbl_payment_channel = "payment_channel";
        $this->tbl_donation_invoice = "donation_invoice";
        $this->tbl_apm_agent_code = "apm_agent_code";

        /****** Orz *****/
        $this->tbl_orz_group = "orz_group";
        $this->tbl_organization = "organization";
        $this->tbl_provinces = "provinces";
        $this->tbl_districts = "districts";
        $this->tbl_subdistricts = "subdistricts";
        $this->tbl_orz_status = "orz_status";
        $this->tbl_zone = "zone";
        $this->tbl_zone_province_mn = "zone_province_mn";
        $this->tbl_orz_in_province = "orz_in_province";

    }

    public function lastInvoiceId(){
        $result = "";
        $this->db->select_max('aid');
        $query = $this->db->get($this->tbl_donation_invoice);
        $result  = $query->row_array();

        if(is_array($result)){
            $result = get_array_value($result,'aid');
        }

        return $result;
    }

    public function bank_list(){
        $result = array();
        $query = $this->db->where('status','1')->get($this->tbl_apm_agent_code);
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $result[] = $row;
            }

        }
        return $result;

    }

    public function payment_status(){
        $result = array();
        $query = $this->db->get($this->tbl_payment_code);
        if($query->num_rows() > 0){
            foreach ($query->result_array() as $row){
                $result[] = $row;
            }
        }

        return $result;
    }

    public function check_duplicate_invoice($donation_id=""){

        if(!is_blank($donation_id)){
            $query =  $this->db->where('donation_id',$donation_id)->get($this->tbl_donation_invoice);
             if ($query->num_rows() > 0) {
                 return true;
             }else{
                 return false;
             }

        }else{
            return false;
        }



    }










} //End of Model


?>
