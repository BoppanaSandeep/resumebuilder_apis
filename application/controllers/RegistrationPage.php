<?php
defined('BASEPATH') or exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
date_default_timezone_set('Asia/Calcutta');
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class RegistrationPage extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        require APPPATH . 'third_party/phpmail/vendor/autoload.php'; //Load composer's autoloader
        $this->load->model('registration_model');
        $this->load->helper('url');
        $this->load->library('email');
    }

    public function connection(){
        echo json_encode(array('status' => 200, 'message' => 'OK'));
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
                    "profile_pic" => $data['data'][0]['profile_image'] == '' ? base_url() . "profile_imgs/profile-default.png" : base_url() . $data['data'][0]['profile_image'],
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
                    $res = $this->email($userdata);
                    if ($res['status'] = 'OK') {
                        echo json_encode(array('status' => 200, 'message' => 'OK', 'email' => $input['email']));
                    } else {
                        echo json_encode(array('status' => 200, 'message' => $res['msg']));
                    }
                } else {
                    echo json_encode(array('status' => 200, 'message' => 'Email not exists.'));
                }
            } else {
                echo json_encode(array('status' => 200, 'message' => 'Email not exists.'));
            }
        }
    }

    public function email($userdata) //$userdata

    {
        // $userdata = array( //For testing
        //     "rb_id" => 'rb_id',
        //     "email" => 'boppanasandeep57@gmail.com',
        //     "password" => 'password',
        // );
        $to = $userdata['email'];
        $subject = 'Resume Builder Password Request.';
        $message = "<table><thead><tr><th>Resume Builder Password Request.<br></th></tr></thead><tbody><tr><td>RB ID: " . $userdata['rb_id'] . "</td></tr><tr><td>Email ID: " . $userdata['email'] . "</td></tr><tr><td> Password: <span style='color:green;' >" . $userdata['password'] . "</span></td></tr></tbody></table>";
        $mail = new PHPMailer(true); // Passing `true` enables exceptions
        try {
            //Server settings
            //$mail->SMTPDebug = 2;                                   // Enable verbose debug output
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
            $mail->Host = 'ssl://smtp.gmail.com:465'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'boppanasandeep7@gmail.com'; // SMTP username
            $mail->Password = '9000056250'; // SMTP password
            $mail->Port = 465; // TCP port to connect to
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ),
            );

            //Recipients
            $mail->setFrom($mail->Username, $mail->Username);
            $mail->addAddress($to, $to); // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $message;
            //$mail->AltBody = '<b>This is the body in plain text for non-HTML mail clients</b>';

            if ($mail->send()) {
                $data['status'] = 'OK';
                $data['msg'] = "Mail Sent.";
                return $data;
            } else {
                //echo 'Mailer Error: ' . $mail->ErrorInfo;
                $data['status'] = 'Failed';
                $data['msg'] = "Error in sending mail, Please try again later.";
                return $data;
            }
        } catch (Exception $e) {
            $data['status'] = 'Failed';
            $data['msg'] = "Error in sending mail, Please try again later.";
            //echo 'Mailer Error: ' . $mail->ErrorInfo;
            return $data;
        }
    }

}
