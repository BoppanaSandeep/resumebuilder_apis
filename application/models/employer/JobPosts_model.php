<?php
date_default_timezone_set('Asia/Calcutta');
class JobPosts_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function SaveJobPosts($jobposts_data)
    {
        $reg = array(
            "status" => array(),
        );
        $res = $this->db->insert("jobposts", $jobposts_data);
        if ($res) {
            return $reg['status'] = 'OK';
        } else {
            return $reg['status'] = 'BAD';
        }
    }

    public function EmpUpdateData($emp_data)
    {
        $reg = array(
            "status" => array(),
        );
        $this->db->where('emp_rb_id', $this->session->userdata('emp_rb_id'));
        $res = $this->db->update("employer_registration", $emp_data);
        if ($res) {
            return $reg['status'] = 'OK';
        } else {
            return $reg['status'] = 'BAD';
        }
    }

    public function ProfileDetails($emp_rbid)
    {
        $where_email = array(
            "emp_rb_id" => $emp_rbid,
            "emp_status" => 1,
        );
        $this->db->select("*");
        $this->db->from("employer_registration");
        $this->db->where($where_email);
        $emprbid = $this->db->get();
        if (sizeof($emprbid->result_array()) > 0) {
            $result_array['status'] = 'OK';
            $result_array['data'] = $emprbid->result_array();
            return $result_array;
        } else {
            $result_array['status'] = 'BAD';
            return $result_array;
        }
    }
}
