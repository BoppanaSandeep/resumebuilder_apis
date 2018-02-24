<?php
defined('BASEPATH') or exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
date_default_timezone_set('Asia/Calcutta');

class FileUploads extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //$this->load->model('registration_model');
        //$this->load->model('formSubmissions_model');
        $this->load->model('fileUploads_model');
        $this->load->helper('url');
    }

    public function profileImageUpload()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            echo json_encode(array('status' => 400, 'message' => $method));
        } else {
            $fileUpload = json_decode(file_get_contents('php://input'), true);
            //print_r($skills_delete['user_id']);exit();
            $data = '';
            $succ = '';
            $target_dir = "profile_imgs/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if (isset($_FILES["file"]["tmp_name"])) {
                $check = getimagesize($_FILES["file"]["tmp_name"]);
                if ($check !== false) {
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                        $data = $this->fileUploads_model->profileUpload($_POST['reg_id'], $target_file);
                        if ($data == 'OK') {
                            $succ = "The file has been uploaded.";
                            echo json_encode(array('status' => 200, 'message' => $succ));
                        } else {
                            $succ = "Sorry, there was an error uploading your file.";
                            echo json_encode(array('status' => 400, 'message' => $succ));
                        }
                    } else {
                        $succ = "Sorry, there was an error uploading your file.";
                        echo json_encode(array('status' => 400, 'message' => $succ));
                    }
                } else {
                    $succ = "File is not an image.";
                    echo json_encode(array('status' => 400, 'message' => $succ));
                }
            }
        }
    }
}
