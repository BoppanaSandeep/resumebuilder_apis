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
        $res = $this->db->insert("employer_registration", $reg_data);
        if ($res) {
            return $reg['status'] = 'OK';
        } else {
            return $reg['status'] = 'BAD';
        }
    }

}
