<?php
defined('BASEPATH') or exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
date_default_timezone_set('Asia/Calcutta');

class FormSubmissions extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //$this->load->model('registration_model');
        $this->load->model('formSubmissions_model');
        $this->load->helper('url');
        $this->load->library('email');
    }

    #region Form submissions of Experience, Education and Fetching Details
    //Form submissions of Experience and Education
    public function Expedu()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            echo json_encode(array('status' => 400, 'message' => 'Bad Request'));
        } else {
            $expedu_form = json_decode(file_get_contents('php://input'), true);
            //print_r($expedu_form); //exit();
            $data = '';
            if (array_key_exists("experience", $expedu_form['expedu'])) {
                if (is_array($expedu_form['expedu']['experience']) && sizeof($expedu_form['expedu']['experience']) > 0) {
                    foreach ($expedu_form['expedu']['experience'] as $expkey => $exp) {
                        $res = array(
                            "reg_id" => $expedu_form['user_id'],
                            "exp_company" => trim($exp['company']) != '' ? trim($exp['company']) : 'Not Entered',
                            "exp_working_from" => trim($exp['startyear']),
                            "exp_last_work_date" => trim($exp['current']) == 1 ? '' : trim($exp['endyear']),
                            "exp_currently_working" => trim($exp['current']) == 1 ? trim($exp['current']) : 2,
                            "exp_role" => trim($exp['role']),
                            "exp_job_desc" => trim($exp['job_desc']),
                        );
                        $data = $this->formSubmissions_model->exp_insert($res);
                    }
                }
            }
            if (array_key_exists("education", $expedu_form['expedu'])) {
                if (is_array($expedu_form['expedu']['education']) && sizeof($expedu_form['expedu']['education']) > 0) {
                    foreach ($expedu_form['expedu']['education'] as $edukey => $edu) {
                        $res = array(
                            "reg_id" => $expedu_form['user_id'],
                            "edu_university_clg_sch" => trim($edu['university']) != '' ? trim($edu['university']) : 'Not Entered',
                            "edu_passoutyear" => trim($edu['passoutyear']),
                            "edu_percentage" => trim($edu['percentage']),
                        );
                        $data = $this->formSubmissions_model->edu_insert($res);
                    }
                }
            }
            if ($data == 'OK') {
                echo json_encode(array('status' => 200, 'message' => 'OK'));
            } else {
                echo json_encode(array('status' => 400, 'message' => 'Bad Request'));
            }
        }
    }

    //Fetching Experience and Education Details
    public function ExpeduData($rb_id = '')
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'GET') {
            echo json_encode(array('status' => 400, 'message' => 'Bad Request'));
        } else {
            $data = $this->formSubmissions_model->expedu_data($rb_id);
            if ($data['status'] == 'OK') {
                echo json_encode(array('status' => 200, 'message' => 'OK', 'info' => $data['data']));
            } else {
                echo json_encode(array('status' => 200, 'message' => 'OK', 'info' => $data['data']));
            }
        }
    }

    #region Skills Form Submissions and Fetching Data
    //Skills Form Submissions
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
                        "skill_rating" => $skills['rating']
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

    //Fetching Skills Details
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
    #endregion
}
