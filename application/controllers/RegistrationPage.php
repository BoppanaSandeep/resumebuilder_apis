<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-type");
class RegistrationPage extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('registration_model');
			$this->load->helper('url_helper');
	}

	public function postRegister()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			echo json_encode(array('status' => 400,'message' => 'Bad Request'));
		}else {
			$rb_id=$this->registration_model->generte_rbid();
			$input = json_decode(file_get_contents('php://input'),true);
			$res = array(
				"rb_id" => $rb_id,
				"name_first"=> $input['name_first'],
				"name_last"=> $input['name_last'],
				"email"=> $input['email'],
				"password"=> $input['password'],
				"phonenumber"=> $input['phonenumber'],
				"dob"=> $input['dob'],
				"gender"=> $input['gender'],
				"joined_on"=> date('Y-m-d H:i:s'),
				"status"=>1
			);
			$data=$this->registration_model->InsertRegisterData($res);
			if($data == 'OK'){
				echo json_encode(array('status' => 200,'message' => 'OK'));
			}else{
				echo json_encode(array('status' => 400,'message' => 'Bad Request'));
			}
		}
	}

	public function LoginRb()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			echo json_encode(array('status' => 400,'message' => 'Bad Request'));
		}else {
			$input = json_decode(file_get_contents('php://input'),true);
			$rblogin = array(
				"email" => $input['username'],
				"password"=> $input['password'],
				"status"=>1
			);
			$data=$this->registration_model->LoginRbModal($rblogin);
			if($data['status'] == 'OK'){
				echo json_encode(array('status' => 200,'message' => 'OK', 'info' => $data['data']));
			}else{
				echo json_encode(array('status' => 400,'message' => 'Bad Request'));
			}
		}
	}
}
