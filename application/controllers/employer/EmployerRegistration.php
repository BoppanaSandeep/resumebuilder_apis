<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmployerRegistration extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
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
            "emp_joined_date" => date('Y-m-d H:i:s'),
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
        if ($this->input->get('email', true)) {
            $email = $this->EmployerRegistration_model->verify_email($this->input->get('email', true));
            //print_r($email);
            if ($email['status'] == 'exist') {
                echo $email['status'];
            } else {
                echo $email['status'];
            }
        }
    }

    public function getProfileDetails()
    {
        if ($this->input->get('emp_rb_id', true)) {
            $details = $this->EmployerRegistration_model->ProfileDetails($this->input->get('emp_rb_id', true));
            //print_r($email);
            if ($details['status'] == 'OK') {
                echo json_encode(array('status' => 200, 'message' => 'OK', 'info' => $details['data']));
            } else {
                echo json_encode(array('status' => 200, 'message' => 'BAD'));
            }
        }
    }

    public function updateEmpProfile()
    {
        //print_r($this->input->post());
        $resgister_data = array(
            "emp_company" => $this->input->post('company', true),
            "emp_email" => $this->input->post('email', true),
            "emp_name" => $this->input->post('emp_name', true),
            "emp_first_name" => $this->input->post('first_name', true),
            "emp_last_name" => $this->input->post('last_name', true),
            "emp_contact_num" => $this->input->post('contact_number', true),
            "emp_address" => $this->input->post('address', true),
            "emp_city" => $this->input->post('city', true),
            "emp_country" => $this->input->post('country', true),
            "emp_postal" => $this->input->post('postal', true),
            "emp_about" => $this->input->post('about', true),
            "emp_updated_date" => date('Y-m-d H:i:s'),
        );
        $res = $this->EmployerRegistration_model->EmpUpdateData($resgister_data);
        if ($res == 'OK') {
            echo json_encode(array('status' => 200, 'message' => 'OK'));
        } else {
            echo json_encode(array('status' => 200, 'message' => 'BAD'));
        }
    }

    public function uploadCompanyImg()
    {
        $data = '';
        $succ = '';
        $target_dir = "company_logos/";
        $target_file = $target_dir . date('YmdHis') . "_" . $_FILES["image"]["name"];
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_FILES["image"]["tmp_name"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $remove_image = $this->EmployerRegistration_model->ProfileDetails($this->session->userdata('emp_rb_id'));
                    $data = $this->EmployerRegistration_model->companyLogoUpload($target_file);
                    if ($data == 'OK') {
                        $remove_image['data'][0]['emp_picture'] == '' ?: unlink($remove_image['data'][0]['emp_picture']);
                        $succ = "Your Image has been uploaded.";
                        echo json_encode(array('status' => 200, 'message' => $succ));
                    } else {
                        $succ = "Sorry, there was an error uploading your Image.";
                        echo json_encode(array('status' => 400, 'message' => $succ));
                    }
                } else {
                    $succ = "Sorry, there was an error uploading your Image.";
                    echo json_encode(array('status' => 400, 'message' => $succ));
                }
            } else {
                $succ = "File is not an image.";
                echo json_encode(array('status' => 400, 'message' => $succ));
            }
        }
    }
}
