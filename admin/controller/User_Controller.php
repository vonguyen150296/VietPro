<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
$email_admin = $_COOKIE['VietPro'];
if($_SESSION[$email_admin] !== 'admin'){
    header('Location: http://localhost/VietPro/admin.php');
}

class User_Controller extends Controller
{
    public function InfoAction()
    {
        $this->model->load('user');// load model user
        $admin = new User_Model();

        $data = array(
            'content' => 'Myinfo_View'
        );
        
        $username = $_COOKIE['VietPro'];
        $data['infos']['admin'] = $admin->my_info($username);
        // Load view
        $this->view->load('Main_View', $data);
         
        // Show view
        $this->view->show();
    }

    public function ListAction() //show list user
    {
        $this->model->load('user');// load model user
        $user = new User_Model();

        $data = array(
            'content' => 'listUser_View'
        );

        $data['infos']['users'] = $user->list();//take list user

        $this->view->load('Main_View', $data);
        $this->view->show();
    }

    public function UpdateAction() // update infos admin or user
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
                redirect('admin.php', 'user', 'info');
            }

        }else{
            echo "<br><br><br><center><h1>La page que vous recherchez est introuvable.</h1></center>";
        }
    }

    public function DeleteAction()  //delete account of user
    {
        if(!empty($_GET['token'])){
            $this->model->load('user');// load model user
            $user = new User_Model();
            if($user->remove($_GET['token'])){
                //load helper
                $this->helper->load('function'); 

                //call redirect
                redirect('admin.php', 'user', 'list');
            }

        }else{
            echo "<br><br><br><center><h1>La page que vous recherchez est introuvable.</h1></center>";
        }
    }
}