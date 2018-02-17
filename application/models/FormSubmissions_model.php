<?php
class FormSubmissions_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function exp_insert($data)
    {
        $res = $this->db->insert("experience", $data);
        if ($res) {
            return $reg['status'] = 'OK';
        } else {
            return $reg['status'] = 'BAD';
        }
    }

    public function edu_insert($data)
    {
        $res = $this->db->insert("education", $data);
        if ($res) {
            return $reg['status'] = 'OK';
        } else {
            return $reg['status'] = 'BAD';
        }
    }

    public function skills_insert($data)
    {
        $res = $this->db->insert("skills", $data);
        if ($res) {
            return $reg['status'] = 'OK';
        } else {
            return $reg['status'] = 'BAD';
        }
    }

    public function expedu_data($rb_id)
    {
        $this->db->select('rg.rb_id, exp.exp_id, exp.exp_company, exp.exp_working_from, exp.exp_last_work_date, exp.exp_currently_working, exp.exp_role, exp.exp_job_desc');
        $this->db->from('registration rg');
        $this->db->join('experience exp', 'exp.reg_id = rg.reg_id', 'left');
        $this->db->where('rg.rb_id =', $rb_id);
        $this->db->where('rg.status =', 1);
        $this->db->where('exp.exp_status =', 1);
        $this->db->order_by("exp.exp_currently_working", "ASC");
        $expdata = $this->db->get();

        $this->db->select('rg.rb_id, edu.edu_id, edu.edu_university_clg_sch, edu.edu_specialization, edu.edu_passoutyear, edu.edu_percentage');
        $this->db->from('registration rg');
        $this->db->join('education edu', 'edu.reg_id = rg.reg_id', 'left');
        $this->db->where('rg.rb_id =', $rb_id);
        $this->db->where('rg.status =', 1);
        $this->db->where('edu.edu_status =', 1);
        $this->db->order_by("edu.edu_passoutyear", "DESC");
        $edudata = $this->db->get();

        if (sizeof($expdata->result_array()) > 0 || sizeof($edudata->result_array()) > 0) {
            $result_array['status'] = 'OK';
            if (sizeof($expdata->result_array()) > 0) {
                $result_array['data']['experience'] = $expdata->result_array();
            } else {
                $result_array['data']['experience'] = 'Not Updated';
            }

            if (sizeof($edudata->result_array()) > 0) {
                $result_array['data']['education'] = $edudata->result_array();
            } else {
                $result_array['data']['education'] = 'Not Updated';
            }

            return $result_array;
        } else {
            $result_array['status'] = 'BAD';
            $result_array['data']['experience'] = 'Not Updated';
            $result_array['data']['education'] = 'Not Updated';
            return $result_array;
        }
    }

    public function skills_data($rb_id)
    {
        $this->db->select('rg.rb_id, sk.skill_id, sk.skill_name, sk.skill_rating');
        $this->db->from('registration rg');
        $this->db->join('skills sk', 'sk.reg_id = rg.reg_id', 'left');
        $this->db->where('rg.rb_id =', $rb_id);
        $this->db->where('rg.status =', 1);
        $this->db->where('sk.skill_status =', 1);
        $this->db->order_by("sk.skill_rating", "DESC");
        $skillsdata = $this->db->get();
        if (sizeof($skillsdata->result_array()) > 0) {
            $result_array['status'] = 'OK';
            $result_array['data'] = $skillsdata->result_array();
            return $result_array;
        } else {
            $result_array['status'] = 'BAD';
            $result_array['data'] = 'Not Updated';
            return $result_array;
        }
    }
}
