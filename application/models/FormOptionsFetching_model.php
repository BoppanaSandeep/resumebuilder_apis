<?php
date_default_timezone_set('Asia/Calcutta');
class FormOptionsFetching_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function skill_options($reg_id)
    {
        $where = array('reg_id' => $reg_id, 'skill_status' => 1);
        $this->db->select("skill_name");
        $this->db->from("skills");
        $this->db->where($where);
        $tech_names = $this->db->get();
        $tech_names = array_map('current', $tech_names->result_array());

        $this->db->select("tech_id, tech_name");
        $this->db->from("technologies");
        if (sizeof($tech_names) > 0) {
            $this->db->where_not_in('tech_name', $tech_names);
        }
        $this->db->order_by('tech_name', 'ASC');
        $tech_names = $this->db->get();

        if (sizeof($tech_names->result_array()) > 0) {
            $result_array['status'] = 'OK';
            $result_array['data'] = $tech_names->result_array();
            return $result_array;
        } else {
            $result_array['status'] = 'BAD';
            $result_array['data'] = '';
            return $result_array;
        }
    }
}
