<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
require(PATH_APPLICATION . '/model/Main_Model.php');

class Temperature_Model extends Main_Model
{
	public function list($id){
		$data = $this->get_where('temperature', '*', "id_user = '".$id."'");
		return $data;
	}

	public function get_tem($id){
		$data = $this->get_where('temperature', '*', "id = '".$id."'");
		return $data;
	}

	public function get_id($username){
		return $this->get_where('users', 'id', "email='".$username."'");
	}

	public function create_new_temp($data){
		return $this->insert('temperature', $data);
	}

	public function get_new_temp($id){
		return $this->get_where('temperature', '*', "id = (SELECT MAX(id) FROM temperature WHERE id_user = '".$id."')");
	}

	public function get_5_last_temp($id){
		$data = $this->get_where('temperature', 'kitchen, bedroom1, bedroom2, livingroom, date', "id_user = '".$id."'ORDER BY date DESC LIMIT 5");
		return $data;
	}
}