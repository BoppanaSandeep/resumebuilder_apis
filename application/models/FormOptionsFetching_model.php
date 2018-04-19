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

    public function fetchjobposts($rb_id)
    {
        $this->db->distinct('jb.post_id');
        $this->db->select("jb.*, emp.employer_id, emp.emp_rb_id, emp.emp_company, emp.emp_email, emp.emp_address, emp.emp_picture");
        $this->db->from("jobposts jb");
        $this->db->join("employer_registration emp", "emp.employer_id = jb.post_emp_id", 'left');
        $this->db->join("registration r", "r.rb_id = '" . $rb_id . "'", 'left');
        $this->db->join("skills sk", "sk.reg_id = r.reg_id", 'left');
        $this->db->where("Find_in_set(sk.skill_name, jb.skills_req)");
        $this->db->order_by('jb.job_closing_date', 'ASC');
        $posts = $this->db->get();
        //echo $this->db->last_query();

        if (sizeof($posts->result_array()) > 0) {
            $result = array();
            foreach ($posts->result_array() as $data) {
                $data['emp_picture'] = $data['emp_picture'] == '' ? base_url() . "profile_imgs/profile-default.png" : base_url() . $data['emp_picture'];
                $numofdays1 = date_diff(new DateTime($data['added_date']), new DateTime("now"));
                $numofdays1 = $numofdays1->format('%a');
                $numofdays2 = $data['update_date'] == '0000-00-00 00:00:00' ? 0 : date_diff(new DateTime($data['update_date']), new DateTime("now"));
                if ($numofdays2 !== 0) {
                    $numofdays2 = $numofdays2->format('%a');
                    $data['numofdays'] = (int) $numofdays2;
                } else {
                    $data['numofdays'] = (int) $numofdays1;
                }
                array_push($result, $data);
            }
            $result_array['status'] = 'OK';
            $result_array['data'] = $result;
            return $result_array;
        } else {
            $result_array['status'] = 'BAD';
            $result_array['data'] = '';
            return $result_array;
        }
    }
}
