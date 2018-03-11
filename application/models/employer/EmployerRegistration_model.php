<?php
date_default_timezone_set('Asia/Calcutta');
class EmployerRegistration_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function generte_emprbid()
    {
        $this->db->select("emp_rb_id");
        $this->db->order_by('emp_rb_id', "desc");
        $this->db->limit(1);
        $rbempid = $this->db->get("employer_registration");
        if (sizeof($rbempid->result_array()) > 0) {
            foreach ($rbempid->result_array() as $rbempid) {
                $id = $rbempid['emp_rb_id'];
            }
            $rbempid = explode('RBFIREMP00000', $id);
            $rbempid = 'RBFIREMP00000' . ($rbempid[1] + 1);
            return $rbempid;
        } else {
            $rbempid = 'RBFIREMP000001';
            return $rbempid;
        }
    }

    public function EmpRegisterData($reg_data)
    {
        $reg = array(
            "status" => array(),
        );
        $res = $this->db->insert("employer_registration", $reg_data);
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

    public function EmpLogin($LoginData)
    {
        $result_array = array(
            "status" => array(),
            "data" => array(),
        );
        $this->db->select("*");
        $this->db->from("employer_registration");
        $this->db->where($LoginData);
        $emprbid = $this->db->get();
        if (sizeof($emprbid->result_array()) > 0) {
            $result_array['status'] = 'OK';
            $result_array['data'] = $emprbid->result_array();
            return $result_array;
        } else {
            $result_array['status'] = 'BAD';
            $result_array['data'] = '';
            return $result_array;
        }
    }

    public function verify_email($email)
    {
        $where_email = array(
            "emp_email" => $email,
        );
        $this->db->select("emp_email");
        $this->db->from("employer_registration");
        $this->db->where($where_email);
        $emprbid = $this->db->get();
        if (sizeof($emprbid->result_array()) > 0) {
            $user = $emprbid->result_array();
            if ($user[0]['emp_email'] == $this->session->userdata('emp_email')) {
                $result_array['status'] = 'not_exist';
                return $result_array;
            } else {
                $result_array['status'] = 'exist';
                return $result_array;
            }
        } else {
            $result_array['status'] = 'not_exist';
            return $result_array;
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
