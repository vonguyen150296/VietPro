<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Welcome_Controller extends Controller
{
    public function IndexAction($error=null)
    {
        $this->helper->load('function'); 
        if(checkLoogin()){ //move page list publication if you login
            //call redirect
            redirect('admin.php', 'publication', 'list');
        }else{
            $data = array(
                'content' => 'Login_View'
            );
            $data['infos']['error'] = $error;
            // Load view
            $this->view->load('Main_View', $data);
             
            // Show view
            $this->view->show();
        }
        
    }

    public function PostindexAction()
    {
        if(!empty($_POST['email']) AND !empty($_POST['password'])){
            $username = $_POST['email'];
            $password = $_POST['password'];
        }

        $this->model->load('user');// loader model User
        $info = new User_Model();//for take info user
        $info = $info->my_info($username);

        $user = new User_Model();//for check login

       if(isset($username) AND isset($password) AND $user->login($username, $password)){//vérifier le mot de passe et admin
            //create session
            $_SESSION[$username] = 'admin';

            //set cookie
            setcookie('VietPro', $username, 0);
            setcookie('VietPro-Name', $info[0]['name']." ".$info[0]['subname'],0);
            
            //load helper
            $this->helper->load('function'); 

            //call redirect
            redirect('admin.php', 'publication', 'list');
        }else{
            $error = "Ces identifiants ne correspondent pas à nos enregistrements";
            $this->IndexAction($error);
        }
        
    }

    public function LogoutAction(){
        $username = $_COOKIE['VietPro'];

        //delete session
        unset($_SESSION[$username]);

        //delete cookie
        setcookie("VietPro", "", time()-3600);
        setcookie("VietPro-Name", "", time()-3600);

        //redirect page login
        $this->helper->load('function'); 
        redirect('admin.php', 'welcome', 'index');
    }

}