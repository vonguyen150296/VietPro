<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');


// redirect page
function redirect($app, $c, $a){ // $app = name application (site.php or admin.php), $c = controller, $a = action
	header('Location: http://localhost/VietPro/'.$app.'?c='.$c.'&a='.$a);
}

function checkLoogin()
{
	if( isset($_COOKIE['VietPro']) ){
       	$username = $_COOKIE['VietPro'];
        //verify session
        if($_SESSION[$username] == 'admin'){
           	return true;
        }else{
           return false;
    	}
    }else{
    	return false;
    }

}

//the function for modbus
//function read a bit

function readRegist($ip, $port, $nregist, $adr){
  try{
    $modbus = new ModbusMaster($ip, "TCP", $port);
    $recdata = $modbus->readMultipleRegisters(1,$adr, $nregist);
    $val16bits = $recdata[0]*256 + $recdata[1];
    return $val16bits;
  }
  catch(Exception $e)
  {
    if($nregist == 61){
      return 2;
    }
    if($nregist == 59){
      return 2;
    }
    else
    {
      echo "Aucun de sonde de température n'est détectée"."<br>";
    }
  }
}

function writeRegist($ip, $port, $adr, $value){
    $modbus = new ModbusMaster($ip, "TCP", $port);
    $data = array($value);
    $dataTypes = array('WORD');
    $modbus->writeMultipleRegister(0, $adr, $data, $dataTypes);
}
