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

    public function JobPosts($where_cond, $search_conditions, $pagenumber, $page_limit)
    {
        $limit = $page_limit;
        $from_limit = 0;
        if ($pagenumber > 0) {
            $from_limit = $limit * ($pagenumber - 1);
        }

        $this->db->where($where_cond);
        if ($search_conditions['job_title'] != '') {
            $this->db->like('job_title', $search_conditions['job_title']);
        }
        if ($search_conditions['job_position'] != '') {
            $this->db->like('job_position', $search_conditions['job_position']);
        }
        if ($search_conditions['fromdate'] != '' && $search_conditions['todate'] != '') {
            $this->db->where('added_date >=', $search_conditions['fromdate']);
            $this->db->where('added_date <=', $search_conditions['todate']);
        } else if ($search_conditions['fromdate'] != '' || $search_conditions['todate'] != '') {
            $this->db->where('added_date', !empty($search_conditions['fromdate']) ? $search_conditions['fromdate'] : $search_conditions['todate']);
        } else {

        }
        if ($search_conditions['location'] != '') {
            $this->db->like('address', $search_conditions['location']);
        }
        $this->db->from('jobposts');
        $count = $this->db->count_all_results();

        $this->db->select("*");
        $this->db->from("jobposts");
        $this->db->where($where_cond);
        if ($search_conditions['job_title'] != '') {
            $this->db->like('job_title', $search_conditions['job_title']);
        }
        if ($search_conditions['job_position'] != '') {
            $this->db->like('job_position', $search_conditions['job_position']);
        }
        if ($search_conditions['fromdate'] != '' && $search_conditions['todate'] != '') {
            $this->db->where('added_date >=', $search_conditions['fromdate']);
            $this->db->where('added_date <=', $search_conditions['todate']);
        } else if ($search_conditions['fromdate'] != '' || $search_conditions['todate'] != '') {
            $this->db->where('added_date', !empty($search_conditions['fromdate']) ? $search_conditions['fromdate'] : $search_conditions['todate']);
        } else {

        }
        if ($search_conditions['location'] != '') {
            $this->db->like('address', $search_conditions['location']);
        }
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

    public function appliedJobsOfEmployerPosts($where_cond, $search_conditions, $pagenumber, $page_limit)
    {
        $limit = $page_limit;
        $from_limit = 0;
        if ($pagenumber > 0) {
            $from_limit = $limit * ($pagenumber - 1);
		}
		
		$this->db->select("aj.*, jp.job_title,jp.job_position, jp.job_description, jp.skills_req, employee.reg_id, employee.name_first, employee.name_last");
        $this->db->from("appliedjobs aj");
        $this->db->join("jobposts jp", "jp.post_id = aj.appliedJobPostId", "left");
		$this->db->join("registration employee", "employee.rb_id = aj.appliedBy", "left");
		$this->db->where($where_cond);
		$count = $this->db->count_all_results();

        $this->db->select("aj.*, jp.job_title,jp.job_position, jp.job_description, jp.skills_req, employee.reg_id, employee.name_first, employee.name_last");
        $this->db->from("appliedjobs aj");
        $this->db->join("jobposts jp", "jp.post_id = aj.appliedJobPostId", "left");
		$this->db->join("registration employee", "employee.rb_id = aj.appliedBy", "left");
		$this->db->where($where_cond);
		$this->db->order_by('addedDate', 'ASC');
        $this->db->limit($limit, $from_limit);
		$appliedJobs = $this->db->get();
		
		// echo $this->db->last_query();

		if (sizeof($appliedJobs->result_array()) > 0) {
            $result_array['status'] = 'OK';
            $result_array['count'] = $count;
            $result_array['data'] = $appliedJobs->result_array();
            return $result_array;
        } else {
            $result_array['status'] = 'BAD';
            return $result_array;
        }
    }

}
