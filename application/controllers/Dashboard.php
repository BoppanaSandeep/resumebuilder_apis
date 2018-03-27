<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('encryption');
        $this->load->model('employer/JobPosts_model');
        if (!$this->session->userdata('emp_rb_id')) {
            $this->load->view('employer_login');
        }
    }

    public function index()
    {
        //print_r($this->session->userdata());
        if ($this->session->userdata('emp_rb_id')) {
            $act['active'] = 'dashboard';
            $act['active_sub'] = '';
            $this->load->view('dashboard', $act);
        }
    }

    public function user()
    {
        if ($this->session->userdata('emp_rb_id')) {
            $act['active'] = 'user';
            $act['active_sub'] = '';
            $this->load->view('user', $act);
        } else {
            redirect(base_url());
        }
    }

    public function job_posts()
    {
        if ($this->session->userdata('emp_rb_id')) {
            $act['active'] = 'job_posts';
            $act['active_sub'] = 'add';
            $this->load->view('job_posts.php', $act);
        } else {
            redirect(base_url());
        }
    }

    public function job_posts_view()
    {
        if ($this->session->userdata('emp_rb_id')) {
            $act['active'] = 'job_posts';
            $act['active_sub'] = 'view';
            $this->load->view('job_posts_view.php', $act);
        } else {
            redirect(base_url());
        }
    }

    public function tables()
    {
        if ($this->session->userdata('emp_rb_id')) {
            $act['active'] = 'tables';
            $act['active_sub'] = '';
            $this->load->view('tables', $act);
        } else {
            redirect(base_url());
        }
    }

    public function maps()
    {
        if ($this->session->userdata('emp_rb_id')) {
            $act['active'] = 'map';
            $act['active_sub'] = '';
            $this->load->view('map', $act);
        } else {
            redirect(base_url());
        }
    }

    public function notify()
    {
        if ($this->session->userdata('emp_rb_id')) {
            $act['active'] = 'notify';
            $act['active_sub'] = '';
            $this->load->view('notifications', $act);
        } else {
            redirect(base_url());
        }
    }

    public function upgrade()
    {
        if ($this->session->userdata('emp_rb_id')) {
            $act['active'] = 'upgrade';
            $act['active_sub'] = '';
            $this->load->view('upgrade', $act);
        } else {
            redirect(base_url());
        }
    }

    public function EditJobPost()
    {
        if ($this->session->userdata('emp_rb_id')) {
            $act['active'] = '';
            $act['active_sub'] = '';
            $act['post_data'] = $this->JobPosts_model->FetchPostData(base64_decode($this->input->get('postid')));
            if ($act['post_data']['status'] == 'OK') {
                $this->load->view('job_posts_edit', $act);
            } else {
                $act['active'] = 'job_posts';
                $act['active_sub'] = 'view';
                $this->session->set_flashdata("msg", "Something went wrong.");
                $this->session->set_flashdata("color", "danger");
                //$this->load->view('job_posts_view', $act);
            }
        } else {
            redirect(base_url());
        }
    }

    public function exampleEncrpt()
    {
        $plain_text = 'This is a plain-text message!';
        $ciphertext = $this->encryption->encrypt($plain_text);

        // Outputs: This is a plain-text message!
        echo $this->encryption->decrypt($ciphertext);
    }

    public function logout()
    {
        $sessiondata = $this->session->userdata();
        //print_r($sessiondata);
        $sessiondata = array(
            "employer_id",
            "emp_rb_id",
            "emp_company",
            "emp_email",
            "emp_name",
            "emp_contact_num",
        );
        $this->session->unset_userdata($sessiondata);
        redirect(base_url());
    }
}
