<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
require(PATH_APPLICATION . '/model/Main_Model.php');

class Publication_Model extends Main_Model
{
	public function list(){
		$data = $this->get('publication', '*');
		return $data;
	}

	public function get_pub($id){
		$data = $this->get_where('publication', '*', "id = '".$id."'");
		return $data;
	}

	public function important_pub(){
		$data = $this->get_where('publication', '*', "important = '1'");
		return $data;
	}

	public function get_a_pub($id)
	{
		$data = $this->get_where('publication', '*', "id = '".$id."'");
		return $data;
	}
}