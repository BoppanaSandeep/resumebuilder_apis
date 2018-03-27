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

    public function UpdatePostData($where_cond, $post_data)
    {
        $reg = array(
            "status" => array(),
        );
        $this->db->where($where_cond);
        $res = $this->db->update("jobposts", $post_data);
        if ($res) {
            return $reg['status'] = 'OK';
        } else {
            return $reg['status'] = 'BAD';
        }
    }

    public function JobPosts($where_cond, $pagenumber, $page_limit)
    {
        $limit = $page_limit;
        $from_limit = 0;
        if ($pagenumber > 0) {
            $from_limit = $limit * ($pagenumber - 1);
        }

        $this->db->where($where_cond);
        $this->db->from('jobposts');
        $count = $this->db->count_all_results();

        $this->db->select("*");
        $this->db->from("jobposts");
        $this->db->where($where_cond);
        $this->db->where_in('post_status', array(1, 2));
        $this->db->order_by('added_date', 'DESC');
        $this->db->limit($limit, $from_limit);
        $jobposts = $this->db->get();

        if (sizeof($jobposts->result_array()) > 0) {
            $result_array['status'] = 'OK';
            $result_array['count'] = $count;
            $result_array['data'] = $jobposts->result_array();
            return $result_array;
        } else {
            $result_array['status'] = 'BAD';
            return $result_array;
        }
    }

    public function FetchPostData($post_id)
    {
        $this->db->select("*");
        $this->db->from("jobposts");
        $this->db->where('post_id', $post_id);
        $this->db->where_in('post_status', array(1, 2));
        $jobpost = $this->db->get();

        if (sizeof($jobpost->result_array()) > 0) {
            $result_array['status'] = 'OK';
            $result_array['data'] = $jobpost->result_array();
            return $result_array;
        } else {
            $result_array['status'] = 'BAD';
            return $result_array;
        }
    }

}
