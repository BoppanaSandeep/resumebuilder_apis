<?php
date_default_timezone_set('Asia/Calcutta');
class SearchEmployees_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function SearchForEmployeesSkills()
    {
        $this->db->select("skills_req as skill_name");
        $this->db->from("jobposts");
        $this->db->where('post_emp_id', $this->session->userdata('employer_id'));
        $this->db->where('post_status', 1);
        $skills = $this->db->get();

        if (sizeof($skills->result_array()) > 0) {
            $result_array['status'] = 'OK';
            $result_array['data'] = $skills->result_array();
            return $result_array;
        } else {
            $result_array['status'] = 'BAD';
            return $result_array;
        }
    }

    public function SearchEmployees($where_cond, $pagenumber, $page_limit)
    {
        $limit = $page_limit;
        $from_limit = 0;
        if ($pagenumber > 0) {
            $from_limit = $limit * ($pagenumber - 1);
        }
        $count = 0;
        $result = array();
        foreach ($where_cond as $likeskills) {
            $this->db->distinct();
            $this->db->select('reg.reg_id, concat(reg.name_first," ",reg.name_last) as name');
            $this->db->from('registration reg');
            $this->db->join('skills sk', 'sk.reg_id = reg.reg_id', 'left');
            $this->db->join('experience ex', 'ex.reg_id = reg.reg_id', 'left');
            $this->db->where('ex.exp_currently_working', 1);
            $this->db->like('sk.skill_name', $likeskills['skill_name']);
            $this->db->group_by("name");
            $this->db->order_by('sk.skill_updated', 'DESC');
            $res_sk = $this->db->get();
            foreach ($res_sk->result_array() as $row) {
                if (!in_array($row['name'], $result)) {
                    array_push($result, $row);
                }
            }
        }
        $count = sizeof($result);
        $result = array();
        foreach ($where_cond as $likeskills) {
            $this->db->distinct();
            $this->db->select('reg.reg_id, concat(reg.name_first," ",reg.name_last) as name, reg.profile_image, ex.exp_job_desc');
            $this->db->from('registration reg');
            $this->db->join('skills sk', 'sk.reg_id = reg.reg_id', 'left');
            $this->db->join('experience ex', 'ex.reg_id = reg.reg_id', 'left');
            $this->db->where('ex.exp_currently_working', 1);
            $this->db->like('sk.skill_name', $likeskills['skill_name']);
            $this->db->group_by("name");
            $this->db->order_by('sk.skill_updated', 'DESC');
            $this->db->limit($limit, $from_limit);
            $res_empployee = $this->db->get();
            foreach ($res_empployee->result_array() as $row) {
                $row['skills'] = '';
                if (!in_array($row['name'], $result)) {
                    $this->db->select("skill_name");
                    $this->db->from("skills");
                    $this->db->where('reg_id', $row['reg_id']);
                    $this->db->where('skill_status', 1);
                    $this->db->order_by('skill_name', 'ASC');
                    $skills = $this->db->get();
                    foreach ($skills->result_array() as $key => $sk) {
                        $row['skills'] .= ($key == 0 ? '' : ', ') . $sk['skill_name'];
                    }
                    array_push($result, $row);
                }
            }
        }
        if (sizeof($result) > 1) {
            $result_array['status'] = 'OK';
            $result_array['count'] = $count;
            $result_array['data'] = $result;
            return $result_array;
        } else {
            $result_array['status'] = 'BAD';
            return $result_array;
        }
    }
}
