<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SearchEmployees extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('employer/SearchEmployees_model');
        if (!$this->session->userdata('emp_rb_id')) {
            $this->load->view('employer_login');
        }
    }

    public function FetchEmployees()
    {
        if ($this->session->userdata('emp_rb_id')) {
            $req_skills = $this->SearchEmployees_model->SearchForEmployeesSkills();
            if (isset($req_skills['status']) == 'OK') {
                $res_searemp = $this->SearchEmployees_model->SearchEmployees($req_skills['data'], $this->input->get('page_number', true), $this->input->get('page_limit', true));
                echo json_encode(array('status' => 200, 'message' => 'OK', 'count' => $res_searemp['count'], 'info' => $res_searemp['data']));
            } else {
                echo json_encode(array('status' => 200, 'message' => 'BAD', 'info' => ''));
            }
        } else {
            echo json_encode(array('status' => 200, 'message' => 'BAD'));
        }
    }
}
