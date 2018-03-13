<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        if (!$this->session->userdata('emp_rb_id')) {
            $this->load->view('employer_login');
        }
    }

    public function index()
    {
        //print_r($this->session->userdata());
        if ($this->session->userdata('emp_rb_id')) {
            $act['active'] = 'dashboard';
            $this->load->view('dashboard', $act);
        }
    }

    public function user()
    {
        if ($this->session->userdata('emp_rb_id')) {
            $act['active'] = 'user';
            $this->load->view('user', $act);
        } else {
            redirect(base_url());
        }
    }
    public function job_posts()
    {
        if ($this->session->userdata('emp_rb_id')) {
            $act['active'] = 'job_posts';
            $this->load->view('job_posts.php', $act);
        } else {
            redirect(base_url());
        }
    }

    public function tables()
    {
        if ($this->session->userdata('emp_rb_id')) {
            $act['active'] = 'tables';
            $this->load->view('tables', $act);
        } else {
            redirect(base_url());
        }
    }

    public function maps()
    {
        if ($this->session->userdata('emp_rb_id')) {
            $act['active'] = 'map';
            $this->load->view('map', $act);
        } else {
            redirect(base_url());
        }
    }

    public function notify()
    {
        if ($this->session->userdata('emp_rb_id')) {
            $act['active'] = 'notify';
            $this->load->view('notifications', $act);
        } else {
            redirect(base_url());
        }
    }

    public function upgrade()
    {
        if ($this->session->userdata('emp_rb_id')) {
            $act['active'] = 'upgrade';
            $this->load->view('upgrade', $act);
        } else {
            redirect(base_url());
        }
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
