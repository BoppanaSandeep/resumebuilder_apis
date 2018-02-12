<?php
class FormSubmissions_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function exp_insert($data){
        $res = $this->db->insert("experience", $data);
        if ($res) {
            return $reg['status'] = 'OK';
        } else {
            return $reg['status'] = 'BAD';
        }
    }

    public function edu_insert($data){
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

    public function skills_data($rb_id)
    {
        $this->db->select('rg.rb_id, sk.skill_id, sk.skill_name, sk.skill_rating');
        $this->db->from('registration rg');
        $this->db->join('skills sk', 'sk.reg_id = rg.reg_id', 'left');
        $this->db->where('rg.rb_id =', $rb_id);
        $this->db->where('rg.status =', 1);
        $this->db->where('sk.skill_status =', 1);
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
