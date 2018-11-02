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
        if($_SESSION[$username]){
           	return true;
        }else{
           return false;
    	}
    }else{
    	return false;
    }

}