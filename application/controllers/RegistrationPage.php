<?php
defined('BASEPATH') or exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-type, Accept-Encoding");

class RegistrationPage extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('registration_model');
        $this->load->helper('url');
        $this->load->library('email');
    }

    public function postRegister()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            echo json_encode(array('status' => 400, 'message' => 'Bad Request'));
        } else {
            $rb_id = $this->registration_model->generte_rbid();
            $input = json_decode(file_get_contents('php://input'), true);
            $res = array(
                "rb_id" => $rb_id,
                "name_first" => $input['name_first'],
                "name_last" => $input['name_last'],
                "email" => $input['email'],
                "password" => $input['password'],
                "phonenumber" => $input['phonenumber'],
                "dob" => $input['dob'],
                "gender" => $input['gender'],
                "joined_on" => date('Y-m-d H:i:s'),
                "status" => 1,
            );
            $data = $this->registration_model->InsertRegisterData($res);
            if ($data == 'OK') {
                echo json_encode(array('status' => 200, 'message' => 'OK'));
            } else {
                echo json_encode(array('status' => 400, 'message' => 'Bad Request'));
            }
        }
    }

    public function LoginRb()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            echo json_encode(array('status' => 400, 'message' => 'Bad Request'));
        } else {
            $input = json_decode(file_get_contents('php://input'), true);
            $rblogin = array(
                "email" => $input['username'],
                "password" => $input['password'],
                "status" => 1,
            );
            $data = $this->registration_model->LoginRbModal($rblogin);
            if ($data['status'] == 'OK') {
                $sessiondata = array(
                    "reg_id" => $data['data'][0]['reg_id'],
                    "rb_id" => $data['data'][0]['rb_id'],
                    "name" => $data['data'][0]['name_first'] . ' ' . $data['data'][0]['name_last'],
                    "email" => $data['data'][0]['email'],
                    "phonenumber" => $data['data'][0]['phonenumber'],
                    "joined_on" => $data['data'][0]['joined_on'],
                    "logged_in" => "true",
                );
                echo json_encode(array('status' => 200, 'message' => 'OK', 'info' => $sessiondata));
            } else {
                echo json_encode(array('status' => 200, 'message' => 'Bad Request'));
            }
        }
    }

    public function Reload($rb_id = '')
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'GET') {
            echo json_encode(array('status' => 400, 'message' => 'Bad Request'));
        } else {
            $data = $this->registration_model->loginStatus($rb_id);
            if ($data['status'] == 'OK') {
                $sessiondata = array(
                    "reg_id" => $data['data'][0]['reg_id'],
                    "rb_id" => $data['data'][0]['rb_id'],
                    "name" => $data['data'][0]['name_first'] . ' ' . $data['data'][0]['name_last'],
                    "email" => $data['data'][0]['email'],
                    "phonenumber" => $data['data'][0]['phonenumber'],
                    "joined_on" => $data['data'][0]['joined_on'],
                    "logged_in" => "true",
                );
                if ($data['data'][0]['rb_id'] == $rb_id) {
                    echo json_encode(array('status' => 200, 'message' => 'OK', 'info' => $sessiondata));
                } else {
                    echo json_encode(array('status' => 200, 'message' => 'Logged Out', 'login_status' => 'false'));
                }
            } else {
                echo json_encode(array('status' => 200, 'message' => 'Logged Out', 'login_status' => 'false'));
            }
        }
    }

    public function forgotPwd($email = '')
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            echo json_encode(array('status' => 400, 'message' => 'Bad Request'));
        } else {
            $input = json_decode(file_get_contents('php://input'), true);
            $email = array(
                "email" => base64_decode($input['email']),
                "status" => 1,
            );
            $data = $this->registration_model->emailStatus($email);
            if ($data['status'] == 'OK') {
                $userdata = array(
                    "rb_id" => $data['data'][0]['rb_id'],
                    "email" => $data['data'][0]['email'],
                    "password" => $data['data'][0]['password'],
                );
                if ($data['data'][0]['email'] == base64_decode($input['email'])) {
                    //$res = $this->email($userdata);
                   // if ($res['status'] = 'OK') {
                        echo json_encode(array('status' => 200, 'message' => 'OK', 'email' => $input['email']));
                   // } else {
                     //   echo json_encode(array('status' => 200, 'message' => $res['msg']));
                   // }
                } else {
                    echo json_encode(array('status' => 200, 'message' => 'Email not exists.'));
                }
            } else {
                echo json_encode(array('status' => 200, 'message' => 'Email not exists.'));
            }
        }
    }

    public function email($userdata) 

    {	
		// $userdata = array(
        //     "rb_id" => 'rb_id',
        //     "email" => 'email',
        //     "password" => 'password',
        // );
        $to = $userdata['email'];
        $subject = 'Resume Builder Password Request.';
        $message = "<table><thead><tr><th>Resume Builder Password Request.</th></tr></thead><tbody><tr><td>RB ID: " . $userdata['rb_id'] . "</td></tr><tr><td>Email ID: " . $userdata['email'] . "</td></tr><tr><td>Your Password: <span style='color:green;' >" . $userdata['password'] . "</span></td></tr></tbody></table>";
        $headers = 'From: Resume Builder <info@rb.com>' . "\r\n";

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'xxxxx@gmail.com', // change it to yours
            'smtp_pass' => 'xxxxx', // change it to yours
            'mailtype' => 'html',
            'charset' => 'utf-8',
			'wordwrap' => true,
        );
		
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from($headers);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            $data['status'] = 'OK';
            echo $data['msg'] = "Mail Sent.";
            return $data;
        } else {
            //show_error($this->email->print_debugger());
            $data['status'] = 'Failed';
            echo $data['msg'] = "Error in sending mail, Please try again later.";
            return $data;
        }
    }

}
