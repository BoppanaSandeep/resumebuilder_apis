<?php
date_default_timezone_set('Asia/Calcutta');
class FileUploads_model extends CI_Model
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
}
