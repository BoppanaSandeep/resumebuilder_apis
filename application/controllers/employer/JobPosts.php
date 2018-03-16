<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JobPosts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('employer/JobPosts_model');
        $this->load->library('session');
        if (!$this->session->userdata('emp_rb_id')) {
            $this->load->view('employer_login');
        }
    }

    public function SaveJobPosts()
    {
        //echo '<pre>';
        $res = '';
        if (trim($this->input->post('job_title', true)[0]) != '') {
            for ($i = 0; $i < sizeof($this->input->post('job_title')); $i++) {
                $jobposts_data = array(
                    "post_emp_id" => $this->session->userdata('employer_id'),
                    "job_title" => $this->input->post('job_title', true)[$i],
                    "job_position" => $this->input->post('job_position', true)[$i],
                    "job_description" => $this->input->post('job_description', true)[$i],
                    "skills_req" => $this->input->post('skills_req', true)[$i],
                    "job_opening_date" => date('Y-m-d', strtotime($this->input->post('job_opening_date', true)[$i])),
                    "job_closing_date" => date('Y-m-d', strtotime($this->input->post('job_closing_date', true)[$i])),
                    "contact_email" => $this->input->post('contact_email', true)[$i],
                    "contact_number" => $this->input->post('contact_number', true)[$i],
                    "address" => $this->input->post('address', true)[$i],
                    "city" => $this->input->post('city', true)[$i],
                    "state" => $this->input->post('state', true)[$i],
                    "country" => $this->input->post('country', true)[$i],
                    "added_date" => date('Y-m-d H:i:s'),
                    "update_date" => date('Y-m-d H:i:s'),
                    "post_status" => 1,
                );
                //print_r($jobposts_data);
                $res = $this->JobPosts_model->SaveJobPosts($jobposts_data);
            }
            if ($res == 'OK') {
                $this->session->set_flashdata("msg", "Job Posts Saved.");
                $this->session->set_flashdata("color", "info");
                redirect('dashboard/job_posts');
            }
        } else {
            $this->session->set_flashdata("msg", "Something went wrong.");
            $this->session->set_flashdata("color", "danger");
            redirect('dashboard/job_posts');
        }
    }

    public function FetchJobPosts()
    {
        if ($this->session->userdata('emp_rb_id')) {
            $res_jobPosts = $this->JobPosts_model->JobPosts($this->session->userdata('employer_id'));
            //print_r($email);
            if ($res_jobPosts['status'] == 'OK') {
                echo json_encode(array('status' => 200, 'message' => 'OK', 'total_count' => $res_jobPosts['count'], 'info' => $res_jobPosts['data']));
            } else {
                echo json_encode(array('status' => 200, 'message' => 'BAD'));
            }
        } else {
            echo json_encode(array('status' => 200, 'message' => 'BAD'));
        }
    }

}
