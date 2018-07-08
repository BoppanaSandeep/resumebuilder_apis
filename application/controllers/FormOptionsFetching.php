<?php
defined('BASEPATH') or exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

class FormOptionsFetching extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //$this->load->model('registration_model');
        //$this->load->model('formSubmissions_model');
        //$this->load->model('deleteOperations_model');
        $this->load->model('formOptionsFetching_model');
        $this->load->helper('url');
        $this->load->library('email');
    }

    public function ItSkillOptions($reg_id = '')
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'GET') {
            echo json_encode(array('status' => 400, 'message' => 'Bad Request'));
        } else {
            if ($reg_id > 0) {
                $data = $this->formOptionsFetching_model->skill_options($reg_id);
                if ($data['status'] == 'OK') {
                    echo json_encode(array('status' => 200, 'message' => 'OK', 'skilloptions' => $data['data']));
                } else {
                    echo json_encode(array('status' => 200, 'message' => 'Bad'));
                }
            } else {
                echo json_encode(array('status' => 200, 'message' => 'Bad'));
            }
        }
    }

    public function FetchingJobPosts($rb_id = '')
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'GET') {
            echo json_encode(array('status' => 400, 'message' => 'Bad Request'));
        } else {
            if ($rb_id != '') {
                $data = $this->formOptionsFetching_model->fetchjobposts($rb_id);
                if ($data['status'] == 'OK') {
                    echo json_encode(array('status' => 200, 'message' => 'OK', 'posts' => $data['data']));
                } else {
                    echo json_encode(array('status' => 200, 'message' => 'Bad'));
                }
            } else {
                echo json_encode(array('status' => 200, 'message' => 'Bad'));
            }
        }
    }

    public function FetchingSearchJobPosts($search_value = '', $rb_id = '')
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'GET') {
            echo json_encode(array('status' => 400, 'message' => 'Bad Request'));
        } else {
            if ($search_value != '') {
                $data = $this->formOptionsFetching_model->fetchsearchjobposts($search_value, $rb_id);
                if ($data['status'] == 'OK') {
                    echo json_encode(array('status' => 200, 'message' => 'OK', 'posts' => $data['data']));
                } else {
                    echo json_encode(array('status' => 200, 'message' => 'Bad'));
                }
            } else {
                echo json_encode(array('status' => 200, 'message' => 'Bad'));
            }
        }
    }
}
