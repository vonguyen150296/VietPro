<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
require(PATH_APPLICATION . '/model/Main_Model.php');

class User_Model extends Main_Model 
{
	public function login($username, $password)
	{

		//verify password and username
		$where = "email = '".$username."'";
		$data = $this->get_where('users', '*', $where);
		if(!empty($data) AND $data[0]['password'] == $password AND $data[0]['admin'] == 1){
			return true;
		}else{
			return false;
		}

	}

	public function list() //take list user
	{
		$data = $this->get_where('users', '*',"admin = 0");
		return $data;
	}

	public function my_info($username){
		$data = $this->get_where('users','*', "email = '".$username."'");
		return $data;
	}

	public function update($col, $id){
		$data = $this->update('users',$cols, $email);
		return $data;
	}
}