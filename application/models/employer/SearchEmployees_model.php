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
        $result = array();
        foreach ($where_cond as $likeskills) {
            $this->db->distinct();
            $this->db->select('reg.reg_id, concat(reg.name_first," ",reg.name_last) as name');
            $this->db->from('registration reg');
            $this->db->join('skills sk', 'sk.reg_id = reg.reg_id', 'left');
            $this->db->join('experience ex', 'ex.reg_id = reg.reg_id', 'left');
            $this->db->where('ex.exp_currently_working', 1);
            $value = explode(',', $likeskills['skill_name']);
            $this->db->where_in('sk.skill_name', $value);
            $this->db->group_by("name");
            $this->db->order_by('sk.skill_updated', 'DESC');
            $res_sk = $this->db->get();
            //echo $this->db->last_query();
            foreach ($res_sk->result_array() as $row) {
                if (!in_array($row['name'], $result)) {
                    array_push($result, $row);
                }
            }
        }
        $emps = array();
        if (sizeof($result) > 0) {
            foreach ($result as $emp) {
                array_push($emps, $emp['reg_id']);
            }
        }
        $result = array();
        if (sizeof($emps) > 0) {
            $this->db->distinct();
            $this->db->select('reg.reg_id, concat(reg.name_first," ",reg.name_last) as name, reg.profile_image, ex.exp_job_desc, ex.exp_role');
            $this->db->from('registration reg');
            $this->db->join('skills sk', 'sk.reg_id = reg.reg_id', 'left');
            $this->db->join('experience ex', 'ex.reg_id = reg.reg_id', 'left');
            $this->db->where('ex.exp_currently_working', 1);
            $this->db->where_in('reg.reg_id', $emps);
            $this->db->group_by("name");
            $this->db->order_by('sk.skill_updated', 'DESC');
            $res_empployee_count = $this->db->count_all_results();

            $this->db->distinct();
            $this->db->select('reg.reg_id, concat(reg.name_first," ",reg.name_last) as name, reg.profile_image, ex.exp_job_desc, ex.exp_role');
            $this->db->from('registration reg');
            $this->db->join('skills sk', 'sk.reg_id = reg.reg_id', 'left');
            $this->db->join('experience ex', 'ex.reg_id = reg.reg_id', 'left');
            $this->db->where('ex.exp_currently_working', 1);
            $this->db->where_in('reg.reg_id', $emps);
            $this->db->order_by('sk.skill_updated', 'DESC');
            $this->db->limit($limit, $from_limit);
            $res_empployee = $this->db->get();
            foreach ($res_empployee->result_array() as $row) {
                $row['skills'] = '';

                $row['profile_image'] = ($row['profile_image'] == '' ? 'profile_imgs/profile-default.png' : $row['profile_image']);

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
        if (sizeof($result) > 0) {
            $result_array['status'] = 'OK';
            $result_array['count'] = $res_empployee_count;
            $result_array['data'] = $result;
            return $result_array;
        } else {
            $result_array['status'] = 'BAD';
            return $result_array;
        }
    }

    public function SearchEmployeesAsPerSearch($skills, $position, $experience, $location, $pagenumber, $page_limit)
    {
        $limit = $page_limit;
        $from_limit = 0;
        if ($pagenumber > 0) {
            $from_limit = $limit * ($pagenumber - 1);
        }
        $result = array();
        $this->db->distinct();
        $this->db->select('reg.reg_id, concat(reg.name_first," ",reg.name_last) as name, reg.profile_image, ex.exp_job_desc, ex.exp_role, (SELECT DATEDIFF(CASE WHEN exp_currently_working = 1 THEN MAX(NOW()) ELSE MAX(exp_last_work_date)END, MIN(exp_working_from)) / 365 FROM rb_experience WHERE reg_id = reg.reg_id) AS experience');
        $this->db->from('registration reg');
        $this->db->join('skills sk', 'sk.reg_id = reg.reg_id', 'left');
        $this->db->join('experience ex', 'ex.reg_id = reg.reg_id', 'left');
        //$this->db->where('ex.exp_currently_working', 1);
        if (isset($skills) && $skills != '') {
            $this->db->like('sk.skill_name', $skills);
        }

        if (isset($position) && $position != '') {
            $this->db->like('ex.exp_role', $position);
        }

        if (isset($location) && $location != '') {
            //$this->db->where('ex.exp_location', $location);
        }

        $this->db->group_by("name");
        if (isset($location) && $experience != '') {
            $this->db->having('experience>=', $experience);
            $this->db->having('experience<', $experience + 1);
        }

        $this->db->order_by('sk.skill_updated', 'DESC');
        $res_empployee_count = $this->db->count_all_results();
        //echo $this->db->last_query();

        $this->db->distinct();
        $this->db->select('reg.reg_id, concat(reg.name_first," ",reg.name_last) as name, reg.profile_image, ex.exp_job_desc, ex.exp_role, (SELECT DATEDIFF(CASE WHEN exp_currently_working = 1 THEN MAX(NOW()) ELSE MAX(exp_last_work_date)END, MIN(exp_working_from)) / 365 FROM rb_experience WHERE reg_id = reg.reg_id) AS experience');
        $this->db->from('registration reg');
        $this->db->join('skills sk', 'sk.reg_id = reg.reg_id', 'left');
        $this->db->join('experience ex', 'ex.reg_id = reg.reg_id', 'left');
        //$this->db->where('ex.exp_currently_working', 1);
        if (isset($skills) && $skills != '') {
            $this->db->like('sk.skill_name', $skills);
        }

        if (isset($position) && $position != '') {
            $this->db->like('ex.exp_role', $position);
        }

        if (isset($location) && $location != '') {
            //$this->db->where('ex.exp_location', $location);
        }

        $this->db->group_by("name");
        if (isset($location) && $experience != '') {
            $this->db->having('experience>=', $experience);
            $this->db->having('experience<', $experience + 1);
        }
        $this->db->order_by('sk.skill_updated', 'DESC');
        $this->db->limit($limit, $from_limit);
        $res_empployee = $this->db->get();
        foreach ($res_empployee->result_array() as $row) {
            $row['skills'] = '';

            $row['profile_image'] = ($row['profile_image'] == '' ? 'profile_imgs/profile-default.png' : $row['profile_image']);

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

        if (sizeof($result) > 0) {
            $result_array['status'] = 'OK';
            $result_array['count'] = $res_empployee_count;
            $result_array['data'] = $result;
            return $result_array;
        } else {
            $result_array['status'] = 'BAD';
            return $result_array;
        }
    }
}
