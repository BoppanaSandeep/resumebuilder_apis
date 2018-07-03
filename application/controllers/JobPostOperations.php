<?php
defined('BASEPATH') or exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

class JobPostOperations extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //$this->load->model('registration_model');
        //$this->load->model('formSubmissions_model');
        //$this->load->model('deleteOperations_model');
        $this->load->model('JobPostsOperations_model');
        $this->load->helper('url');
    }

    public function applingForJobPost($postId = '', $rb_id = '')
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'GET') {
            echo json_encode(array('status' => 400, 'message' => 'Bad Request'));
        } else {
            if ($postId > 0 && $rb_id != '') {
				$data = $this->JobPostsOperations_model->applyForJob($postId, $rb_id);
               	if ($data == 'OK') {
                    echo json_encode(array('status' => 200, 'message' => 'OK'));
                } else {
                    echo json_encode(array('status' => 200, 'message' => 'Bad'));
                }
            } else {
                echo json_encode(array('status' => 200, 'message' => 'Bad'));
            }
        }
    }
}
