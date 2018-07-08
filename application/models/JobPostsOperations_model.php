<?php
date_default_timezone_set('Asia/Calcutta');
class JobPostsOperations_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function applyForJob($postId, $reg_id)
    {
        $data = array(
            "appliedJobPostId" => $postId,
            "appliedBy" => $reg_id,
            "appliedStatus" => 1, // Applied
            "addedDate" => date('Y-m-d H:i:s'),
        );
        $res = $this->db->insert("appliedjobs", $data);
        if ($res) {
            return $reg['status'] = 'OK';
        } else {
            return $reg['status'] = 'BAD';
        }
    }
}
