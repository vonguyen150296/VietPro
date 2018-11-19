<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
require(PATH_APPLICATION . '/model/Main_Model.php');

class User_Model extends Main_Model 
{
	public function login($username, $password) //check login
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

	public function list() //show list user
	{
		$data = $this->get_where('users', '*',"admin = 0");
		return $data;
	}

	public function my_info($username){ //show info admin
		$data = $this->get_where('users','*', "email = '".$username."'");
		return $data;
	}

	public function remove($token){ //delete account of user
		return $this->delete('users', "token = '".$token."'");
	}

	public function update_user($cols, $token){ //update info admin
		return $this->update('users',$cols, $token);
	}
}