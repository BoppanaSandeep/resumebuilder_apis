<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-type");
class RegistrationPage extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('registration_model');
			$this->load->helper('url');
			$this->load->library('session');
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
			
			$sessiondata=array(
				"reg_id"=>$data['data'][0]['reg_id'],
				"rb_id"=>$data['data'][0]['rb_id'],
				"name"=>$data['data'][0]['name_first'].' '.$data['data'][0]['name_last'],
				"email"=>$data['data'][0]['email'],
				"phonenumber"=>$data['data'][0]['phonenumber'],
				"joined_on"=>$data['data'][0]['joined_on'],
				"logged_in"=>"true"
			);
			if($data['status'] == 'OK'){
				echo json_encode(array('status' => 200,'message' => 'OK', 'info' => $sessiondata));
			}else{
				echo json_encode(array('status' => 400,'message' => 'Bad Request'));
			}
		}
	}

	public function Reload($rb_id=''){
		$method= $_SERVER['REQUEST_METHOD'];
		if($method !='GET'){
			echo json_encode(array('status' => 400,'message' => 'Bad Request'));
		}else{
			$data = $this->registration_model->loginStatus($rb_id);
			if($data['status']=='OK'){
				$sessiondata=array(
					"reg_id"=>$data['data'][0]['reg_id'],
					"rb_id"=>$data['data'][0]['rb_id'],
					"name"=>$data['data'][0]['name_first'].' '.$data['data'][0]['name_last'],
					"email"=>$data['data'][0]['email'],
					"phonenumber"=>$data['data'][0]['phonenumber'],
					"joined_on"=>$data['data'][0]['joined_on'],
					"logged_in"=>"true"
				);
				if($data['data'][0]['rb_id'] == $rb_id){
					echo json_encode(array('status' => 200, 'message' => 'OK', 'info' => $sessiondata ));
				}else{
					echo json_encode(array('status' => 200,'message' => 'Logged Out', 'login_status' => 'false'));
				}
			}else{
				echo json_encode(array('status' => 200,'message' => 'Logged Out', 'login_status' => 'false'));
			}
		}
	}
}
