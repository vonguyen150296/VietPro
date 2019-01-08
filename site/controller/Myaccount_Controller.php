<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
require(PATH_APPLICATION . '/Phpmodbus/ModbusMaster.php');//include file modbus
$email_admin = $_COOKIE['VietPro'];
if($_SESSION[$email_admin] !== 'site') die ('Bad requested!');

class Myaccount_Controller extends Controller
{
	public function ListAction()
	{
		
        $this->model->load('temperature');// loader model publication
        
		$data = array(
			'content' => 'Listtemperature_View'
		);
        $new = new Temperature_Model();
        $id = $new->get_id($_COOKIE['VietPro']);
        $tem = new Temperature_Model();
		$data['infos']['tem'] = $tem->list($id[0]['id']);

        // Load view
        $this->view->load('Myaccount_View', $data);
         
        // Show view
        $this->view->show();
	}

	public function MyinfoAction()
	{
		$this->model->load('user');
		$user = new User_Model();

		$data = array(
			'content' => 'Myinfo_View'
		);

		$username = $_COOKIE['VietPro'];
		$data['infos']['user'] = $user->my_info($username);
        // Load view
        $this->view->load('Myaccount_View', $data);
         
        // Show view
        $this->view->show();
	}

	public function NewAction()
	{
        $this->model->load('temperature');
        $new_temp = new Temperature_Model();

		$data = array(
			'content' => 'Newtemperature_View'
		);
        $data['infos']['temp'] = $new_temp->get_new_temp();
        // Load view
        $this->view->load('Myaccount_View', $data);
         
        // Show view
        $this->view->show();
	}

	public function UpdateAction()
	{
		if(!empty($_GET['token'])){
            $cols = '';
            if(!empty($_POST['name'])){
                $cols = $cols.", name = '".$_POST['name']."'";
            }
            if(!empty($_POST['subname'])){
                $cols = $cols.", subname = '".$_POST['subname']."'";
            }
            if(!empty($_POST['address'])){
                $cols = $cols.", address = '".$_POST['address']."'";
            }
            if(!empty($_POST['phone'])){
                $cols = $cols.", phone = '".$_POST['phone']."'";
            }
            if(!empty($_POST['password'])){
                $cols = $cols.", password = '".$_POST['password']."'";
            }

            $cols = trim($cols,",");

            $token = "token = '".$_GET['token']."'";

            $this->model->load('user');// load model user
            $user = new User_Model();
            
            if($user->update_user($cols, $token))
            {
                //load helper
                $this->helper->load('function'); 

                //call redirect
                redirect('site.php', 'myaccount', 'myinfo');
            }

        }else{
            echo "<br><br><br><center><h1>La page que vous recherchez est introuvable.</h1></center>";
        }
	}

    public function ModbusAction(){
        
         //load helper
        $this->helper->load('function');
        
        //store new temperature in the database
        $data['id_user'] = $_GET['id_user'];
        $data['kitchen'] = readRegist("192.168.1.99",502,1,16)/10;
        $data['bedroom1'] = readRegist("192.168.1.99",502,1,17)/10;
        $data['bedroom2'] = readRegist("192.168.1.99",502,1,18)/10;
        $data['livingroom'] = readRegist("192.168.1.99",502,1,19)/10;
        date_default_timezone_set("Europe/Paris");
        $data['date'] =  date("Y-m-d");
        $this->model->load('temperature');
        $new_temp = new Temperature_Model();
        $new_temp->create_new_temp($data);
    }

    function AllumerAction(){
        $this->helper->load('function');
        writeRegist("192.168.1.100",502,66,0);//ok
        echo "ok";
    }

    function EteindreAction(){
        $this->helper->load('function');
        writeRegist("192.168.1.100",502,66,1);//ok
        echo "ok";
    }

    function RaAction(){ //open resistance
        $this->helper->load('function');
        writeRegist("192.168.1.100",502,69,1);//ok
    }

    function ReAction(){  //fermer resistance
        $this->helper->load('function');
        writeRegist("192.168.1.100",502,70,1);//ok
    }
}