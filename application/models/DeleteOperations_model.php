<?php
date_default_timezone_set('Asia/Calcutta');
class DeleteOperations_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function delete_skill($data)
    {
        $values = array(
            'skill_status' => 0,
            'skill_updated' => date('Y-m-d H:i:s'),
        );
        $res=$this->db->update('skills', $values, $data);
        if ($res) {
            return $reg['status'] = 'OK';
        } else {
            return $reg['status'] = 'BAD';
        }
    }

    public function delete_exp($data)
    {
        $values = array(
            'exp_status' => 0,
            'exp_updated' => date('Y-m-d H:i:s'),
        );
        $res=$this->db->update('experience', $values, $data);
        if ($res) {
            return $reg['status'] = 'OK';
        } else {
            return $reg['status'] = 'BAD';
        }
    }

    public function delete_edu($data)
    {
        $values = array(
            'edu_status' => 0,
            'edu_updated' => date('Y-m-d H:i:s'),
        );
        $res=$this->db->update('education', $values, $data);
        if ($res) {
            return $reg['status'] = 'OK';
        } else {
            return $reg['status'] = 'BAD';
        }
    }
}
