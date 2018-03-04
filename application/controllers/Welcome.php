<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('employer_login');
    }

    public function user()
    {
        $this->load->view('user');
    }

    public function tables()
    {
        $this->load->view('tables');
    }

    public function typo()
    {
        $this->load->view('typography');
    }

    public function icons()
    {
        $this->load->view('icons');
    }

    public function maps()
    {
        $this->load->view('map');
    }

    public function notify()
    {
        $this->load->view('notifications');
    }

    public function upgrade()
    {
        $this->load->view('upgrade');
    }
}
