<?php
defined('BASEPATH') or exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

class DeleteOperations extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //$this->load->model('registration_model');
        //$this->load->model('formSubmissions_model');
        $this->load->model('deleteOperations_model');
        $this->load->helper('url');
        $this->load->library('email');
    }

    public function DeleteSkills()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            echo json_encode(array('status' => 400, 'message' => 'Bad Request'));
        } else {
            $skills_delete = json_decode(file_get_contents('php://input'), true);
            //print_r($skills_delete['user_id']);exit();
            $data = '';
            if (trim($skills_delete['rb_id']) != '' && trim($skills_delete['user_id']) != '' && trim($skills_delete['skill_id']) != '') {
                $res = array(
                    "reg_id" => $skills_delete['user_id'],
                    "skill_id" => $skills_delete['skill_id'],
                );
                $data = $this->deleteOperations_model->delete_skill($res);
            }
            if ($data == 'OK') {
                echo json_encode(array('status' => 200, 'message' => 'OK'));
            } else {
                echo json_encode(array('status' => 400, 'message' => 'Bad Request'));
            }
        }
    }
}
