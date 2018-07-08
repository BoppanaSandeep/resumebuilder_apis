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
            $where_cond = array(
                "post_emp_id" => (int) $this->session->userdata('employer_id'),
            );
            $search_conditions = array(
                "job_title" => !empty($this->input->get('job_title', true)) ? $this->input->get('job_title', true) : '',
                "job_position" => !empty($this->input->get('job_position', true)) ? $this->input->get('job_position', true) : '',
                "location" => !empty($this->input->get('location', true)) ? $this->input->get('location', true) : '',
                "fromdate" => !empty($this->input->get('fromdate', true)) ? date('Y-m-d H:i:s', strtotime($this->input->get('fromdate', true))) : '',
                "todate" => !empty($this->input->get('todate', true)) ? date('Y-m-d H:i:s', strtotime($this->input->get('todate', true))) : '',
            );
            $res_jobPosts = $this->JobPosts_model->JobPosts($where_cond, $search_conditions, $this->input->get('page_number', true), $this->input->get('page_limit', true));
            //print_r($email);
            if ($res_jobPosts['status'] == 'OK') {
                echo json_encode(array('status' => 200, 'message' => 'OK', 'total_count' => $res_jobPosts['count'], 'info' => $res_jobPosts['data']));
            } else {
                echo json_encode(array('status' => 200, 'message' => 'BAD', 'info' => ''));
            }
        } else {
            echo json_encode(array('status' => 200, 'message' => 'BAD'));
        }
    }

    public function UpdatingPostStatus()
    {
        if ($this->session->userdata('emp_rb_id')) {
            $where_cond = array(
                "post_id" => (int) $this->input->post('postid', true),
                "post_emp_id" => (int) $this->session->userdata('employer_id'),
            );
            $status = 1;
            if ($this->input->post('type', true) == 'del') {
                $status = 0;
            } else {
                $status = $this->input->post('post_status', true) == 1 ? 2 : 1;
            }

            $update_status = array(
                "post_status" => $status,
                "update_date" => date('Y-m-d H:i:s'),
            );
            $res_jobPosts = $this->JobPosts_model->UpdatePostData($where_cond, $update_status);
            if ($res_jobPosts == 'OK') {
                echo json_encode(array('status' => 200, 'message' => 'OK'));
            } else {
                echo json_encode(array('status' => 200, 'message' => 'BAD'));
            }
        } else {
            echo json_encode(array('status' => 200, 'message' => 'BAD'));
        }
    }

    public function SaveEditJobPosts()
    {
        if (trim($this->input->post('post_id', true)) != '' && trim($this->input->post('post_id', true)) != 0) {
            $where_cond = array(
                "post_id" => (int) $this->input->post('post_id', true),
                "post_emp_id" => (int) $this->session->userdata('employer_id'),
            );
            $jobposts_data = array(
                "job_title" => $this->input->post('job_title', true),
                "job_position" => $this->input->post('job_position', true),
                "job_description" => $this->input->post('job_description', true),
                "skills_req" => $this->input->post('skills_req', true),
                "job_opening_date" => date('Y-m-d', strtotime($this->input->post('job_opening_date', true))),
                "job_closing_date" => date('Y-m-d', strtotime($this->input->post('job_closing_date', true))),
                "contact_email" => $this->input->post('contact_email', true),
                "contact_number" => $this->input->post('contact_number', true),
                "address" => $this->input->post('address', true),
                "city" => $this->input->post('city', true),
                "state" => $this->input->post('state', true),
                "country" => $this->input->post('country', true),
                "update_date" => date('Y-m-d H:i:s'),
            );
            $res_jobPosts = $this->JobPosts_model->UpdatePostData($where_cond, $jobposts_data);
            if ($res_jobPosts == 'OK') {
                $this->session->set_flashdata("msg", "Updated Successfully");
                $this->session->set_flashdata("color", "success");
                redirect('dashboard/job_posts_view');
            } else {
                $this->session->set_flashdata("msg", "Something went wrong, try again.");
                $this->session->set_flashdata("color", "danger");
                redirect('dashboard/EditJobPost?postid=' . $this->input->post('post_id', true));
            }
        } else {
            $this->session->set_flashdata("msg", "Something went wrong, try again.");
            $this->session->set_flashdata("color", "danger");
            redirect('dashboard/job_posts_view');
        }
    }

    public function FetchAppliedJobsOfEmployerPosts()
    {
        if ($this->session->userdata('emp_rb_id')) {
            $where_cond = array(
                "jp.post_emp_id" => (int) $this->session->userdata('employer_id'),
            );
            // $search_conditions = array(
            //     "job_title" => !empty($this->input->get('job_title', true)) ? $this->input->get('job_title', true) : '',
            //     "job_position" => !empty($this->input->get('job_position', true)) ? $this->input->get('job_position', true) : '',
            //     "location" => !empty($this->input->get('location', true)) ? $this->input->get('location', true) : '',
            //     "fromdate" => !empty($this->input->get('fromdate', true)) ? date('Y-m-d H:i:s', strtotime($this->input->get('fromdate', true))) : '',
            //     "todate" => !empty($this->input->get('todate', true)) ? date('Y-m-d H:i:s', strtotime($this->input->get('todate', true))) : '',
            // );
            $resAppliedJobPosts = $this->JobPosts_model->appliedJobsOfEmployerPosts($where_cond, /* $search_conditions */"", $this->input->get('page_number', true), $this->input->get('page_limit', true));
            if ($resAppliedJobPosts['status'] == 'OK') {
                echo json_encode(array('status' => 200, 'message' => 'OK', 'total_count' => $resAppliedJobPosts['count'], 'info' => $resAppliedJobPosts['data']));
            } else {
                echo json_encode(array('status' => 200, 'message' => 'BAD', 'info' => ''));
            }
        } else {
            echo json_encode(array('status' => 200, 'message' => 'BAD'));
        }
    }

}
