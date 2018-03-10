<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmployerRegistration extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('employer/EmployerRegistration_model');
        $this->load->library('session');
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

    public function LoginEmp()
    {
        $login_data = array(
            "emp_email" => $this->input->post('email', true),
            "emp_pwd" => $this->input->post('pwd', true),
            "emp_status" => 1,
        );
        $res = $this->EmployerRegistration_model->EmpLogin($login_data);
        if ($res['status'] == 'OK') {
            $sessiondata = array(
                "employer_id" => $res['data'][0]['employer_id'],
                "emp_rb_id" => $res['data'][0]['emp_rb_id'],
                "emp_company" => $res['data'][0]['emp_company'],
                "emp_email" => $res['data'][0]['emp_email'],
                "emp_name" => $res['data'][0]['emp_name'],
                "emp_contact_num" => $res['data'][0]['emp_contact_num'],
            );
            $this->session->set_userdata($sessiondata);
            redirect(base_url());
        } else {
            $this->session->set_flashdata("error", "Please enter valid email and password.");
            redirect(base_url());
        }
    }

    public function VerifyEmail()
    {
        //echo $this->input->get('email');
        if ($this->input->get('email')) {
            $email = $this->EmployerRegistration_model->verify_email($this->input->get('email'));
            //print_r($email);
            if ($email['status'] == 'exist') {
                echo $email['status'];
            }else{
                echo $email['status'];
            }
        }
    }
}
