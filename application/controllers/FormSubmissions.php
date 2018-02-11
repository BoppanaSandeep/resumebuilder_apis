<?php
defined('BASEPATH') or exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

class FormSubmissions extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //require APPPATH . 'third_party/phpmail/vendor/autoload.php'; //Load composer's autoloader
        //$this->load->model('registration_model');
        $this->load->model('formSubmissions_model');
        $this->load->helper('url');
        $this->load->library('email');
    }

    public function Skills()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            echo json_encode(array('status' => 400, 'message' => 'Bad Request'));
        } else {
            $skills_form = json_decode(file_get_contents('php://input'), true);
            $data = '';
            foreach ($skills_form['skills'] as $key => $skills) {
                if (trim($skills['fskills']) != '') {
                    $res = array(
                        "reg_id" => $skills_form['user_id'],
                        "skill_name" => $skills['fskills'],
                    );
                    $data = $this->formSubmissions_model->skills_insert($res);
                }
            }
            if ($data == 'OK') {
                echo json_encode(array('status' => 200, 'message' => 'OK'));
            } else {
                echo json_encode(array('status' => 400, 'message' => 'Bad Request'));
            }
        }
    }

    public function SkillsData($rb_id = '')
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'GET') {
            echo json_encode(array('status' => 400, 'message' => 'Bad Request'));
        } else {
            $data = $this->formSubmissions_model->skills_data($rb_id);
            if ($data['status'] == 'OK') {
                echo json_encode(array('status' => 200, 'message' => 'OK', 'info' => $data['data']));
            } else {
                echo json_encode(array('status' => 200, 'message' => 'OK', 'info' => $data['data']));
            }
        }
    }

}
