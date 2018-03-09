<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmployerRegistration extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('employer/EmployerRegistration_model');
    }

    public function EmployerRegister()
    {
        //print_r($this->input->post());
        $rb_id = $this->EmployerRegistration_model->generte_emprbid();
        $resgister_data = array(
            "emp_rb_id" => $rb_id,
            "emp_company" => $this->input->post('company_name', true),
            "emp_email" => $this->input->post('company_email', true),
            "emp_name" => $this->input->post('employer_name', true),
            "emp_contact_num" => $this->input->post('contact_number', true),
            "emp_address" => $this->input->post('contact_address', true),
            "emp_pwd" => $this->input->post('password', true),
        );

        $res = $this->EmployerRegistration_model->EmpRegisterData($resgister_data);
        if ($res == 'OK') {
            redirect(base_url());
        }
    }
}
