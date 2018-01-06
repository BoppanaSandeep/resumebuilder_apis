<?php
class Registration_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }
	
	public function generte_rbid(){
		$this->db->select("rb_id");
		$this->db->order_by('rb_id',"desc");
		$this->db->limit(1);
		$rbid=$this->db->get("registration");
		if(sizeof($rbid->result_array())>0){
			foreach($rbid->result_array() as $rbid){
				 $id=$rbid['rb_id'];
			}
			$rb_id=explode('RBFIR00000',$id);
			$rb_id='RBFIR00000'.($rb_id[1]+1);
			return $rb_id;
		}else{
			$rb_id='RBFIR000001';
			return $rb_id;
		}	
	}
	
    public function InsertRegisterData($registerdata){

        $reg=array(
            "status"=>array()
        );
        $res=$this->db->insert("registration",$registerdata);
        if($res){
            return $reg['status']='OK';
        }else{
            return $reg['status']='BAD';
        }
	}
	
	public function LoginRbModal($LoginData){
		$result_array=array(
			"status"=>array(),
			"data"=>array()
		);
		$this->db->select("*");
		$this->db->from("registration");
		$this->db->where($LoginData);
		$rbid=$this->db->get();
		if(sizeof($rbid->result_array())>0){
			$result_array['status'] = 'OK';
			$result_array['data'] = $rbid->result_array();
			return $result_array;
		}else{
			$result_array['status'] = 'BAD';
			$result_array['data'] = '';
			return $result_array;
		}
	}
}