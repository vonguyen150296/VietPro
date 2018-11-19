<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Main_Model
{
	//param connecter
	private $__conn;

	//fonction connecter
	public function connect()
	{
		// s'il ne connecte pas, connecter
		if(!$this->__conn){
			$this->__conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			mysqli_query($this->__conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
			if ($this->__conn->connect_error){
				die('Connection failed');
			}
		}
	}

	//fonction déconnecter
	public function dis_connect()
	{
		//s'il connecte, déconnecter
		if($this->__conn){
			$this->__conn->close();
		}
	}

	//fonction Insérer
	function insert($table, $cols, $val)
	{
		//connecter
		$this->connect();
		 
        $sql = "INSERT INTO ".$table." ".$cols." VALUES ".$val;
        return $this->__conn->query($sql); //effectuer insérer
	}

	//function prendre données avec where
	public function get_where($table, $col, $where) //$col = column
	{
		//conecter
		$this->connect();

		//create query
		$sql = "SELECT ".$col." FROM ".$table." WHERE ".$where;

		$result = $this->__conn->query($sql);
		if ($result->num_rows > 0){
            while($row =  $result->fetch_assoc()){
				$data[]= $row;
			}
        }else{
        	$data = '';
        }
        return $data;
	}

	//function prendre données
	public function get($table, $col){
		//conecter
		$this->connect();

		//create query
		$sql = "SELECT ".$col." FROM ".$table;
		
		$result = $this->__conn->query($sql);

		if ($result->num_rows > 0){
			while($row =  $result->fetch_assoc()){
				$data[]= $row;
			}
        }else{
        	$data = '';
        }
        $this->dis_connect();
        return $data;
	}

	public function delete($table, $where){
		//conecter
		$this->connect();

		$sql = "DELETE FROM ".$table." WHERE ".$where;

		return $this->__conn->query($sql);
	} 

	//function update data
	public function update($table, $col, $where){
		//conecter
		$this->connect();

		//create query
		$sql = "UPDATE ".$table." SET ".$col." WHERE ".$where;

		return $this->__conn->query($sql);
	}

}