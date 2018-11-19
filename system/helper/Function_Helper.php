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

function read_bits($ip, $port, $debut, $nbits)
{
//  require_once dirname(_FILE_) . '\ModbusMaster.php';
  $modbus = new ModbusMaster($ip, "TCP", $port);
  $recData = $modbus->readCoils(1, $debut, $nbits);
  return $recData;
}

function write_bits($ip, $port, $adresse, $value)
{
 // require_once dirname(_FILE).'\ModbusMaster.php';
  $modbus = new ModbusMaster($ip, "TCP",$port);
  $modbus->writeMultipleCoils(0, $adresse, $value);  
}


function read_words($ip, $port, $debut, $nword)
{
 // require_once dirname(_FILE_).'\ModbusMaster.php';
  $modbus = new ModbusMaster($ip, "TCP", $port);
  $recData = $modbus->readMultipleRegisters(1, $debut, $nwords);
  for($i=0; $i<$nwords; $i=$i+2)
  {
    $val16bits[]=$recData[$i]*256+$recData[$i+1];
  }
  return $val16bits;
}


function write_words($ip, $port, $addresse, $value){
  $modbus = new ModbusMaster($ip, "TCP", $port);
  $data = array($value);
  $dataTypes = array("WORD");
  $modbus->writeMultipleRegister(0, $address, $data, $dataTypes);
}
