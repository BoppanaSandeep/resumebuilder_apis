<?php
date_default_timezone_set('Asia/Calcutta');
class FileUploads_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function profileUpload($user_id, $file_name)
    {
        $data = array('profile_image' => $file_name, 'updated_on'=> date('Y-m-d H:i:s'));
        $this->db->where('status', 1);
        $this->db->where('reg_id', $user_id);
        $res = $this->db->update('registration', $data);
        if ($res) {
            return $reg['status'] = 'OK';
        } else {
            return $reg['status'] = 'BAD';
        }
    }
}
