<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Welcome_Controller extends Controller
{
	public function HomeAction($error = null) //rendre page d'acceuil
	{
        $data = array(
            'content' => 'Welcome_View'
        );

        //get the publication
        $this->model->load('publication');
        $pub = new Publication_Model();
        $data['infos']['pub'] = $pub->list();

        //get important publication
        $important = new Publication_Model();
        $data['infos']['important'] = $important->important_pub();
		
		$data['infos']['error'] = $error;

        // Load view
        $this->view->load('Main_View', $data);
         
        // Show view
        $this->view->show();
	}

	public function ContactAction() //rendre page contacter
	{
		$data = array(
			'content' => 'Contact_View'
		);
        // Load view
        $this->view->load('Main_View', $data);
         
        // Show view
        $this->view->show();
	}

	public function IntroAction() //rendre page ibtroduction
	{
		$data = array(
			'content' => 'Intro_View'
		);
        // Load view
        $this->view->load('Main_View', $data);
         
        // Show view
        $this->view->show();
	}

	public function HistoryAction() //rendre page histoire de l'entreprise
	{
		$data = array(
			'content' => 'History_View'
		);
        // Load view
        $this->view->load('Main_View', $data);
         
        // Show view
        $this->view->show();
	}


	public function LoginAction() //login
    {
        if(!empty($_POST['email']) AND !empty($_POST['password'])){
            $username = $_POST['email'];
            $password = $_POST['password'];
        }

        $this->model->load('user');// loader model User
        $info = new User_Model();//for take info user
        $info = $info->my_info($username);

        $user = new User_Model();

       if(isset($username) AND isset($password) AND $user->login($username, $password)){//vérifier le mot de passe et admin
            //create session
            $_SESSION[$username] = 'site';

            //set cookie
            setcookie('VietPro', $username, 0);
            setcookie('VietPro-Name', $info[0]['name']." ".$info[0]['subname'],0);
            
            //load helper
            $this->helper->load('function'); 

            //call redirect
            redirect('site.php', 'myaccount', 'list');
        }else{
            //load helper
            $this->helper->load('function'); 

            //call redirect
            redirect('site.php', 'welcome', 'home');
        }
    }

    public function LogoutAction(){ //logout
        $username = $_COOKIE['VietPro'];

        //delete session
        unset($_SESSION[$username]);

        //delete cookie
        setcookie("VietPro", "", time()-3600);

        //redirect page home
        $this->helper->load('function'); 
        redirect('site.php','welcome','home');
    }

	public function RegisterAction(){ //create a user
        if(isset($_POST['create'])){
            $data['name'] = $_POST['name'];
            $data['subname'] = $_POST['subname'];
            $data['email'] = $_POST['email'];
            $data['password'] = $_POST['password'];
            $data['admin'] = 0;
            $data['token'] = mt_rand(100000000,999999999);
            $this->model->load('user');// loader model User
            $user = new User_Model();

            if($user->register($data)){
                //create session
                $_SESSION[$data['email']] = 'site';

                //set cookie
                setcookie('VietPro', $data['email'], 0);
                setcookie('VietPro-Name', $data['name']." ".$data['subname'],0);
                //load helper
                $this->helper->load('function'); 

                //call redirect
                redirect('site.php', 'myaccount', 'list');
                }else{
                    //redirect page home
                $this->helper->load('function'); 
                redirect('site.php','welcome','home');
            }
        }else{
            echo "<br><br><br><center><h1>La page que vous recherchez est introuvable.</h1></center>";
        }
    }

    public function ListemailAction(){ //check email existe ou pas
        $email = $_GET['email'];
        $this->model->load('user');// loader model User
        $user = new User_Model();
        return $user->check_email($email);
    }

    public function PublicationAction(){
        if(!empty($_GET['id'])){
             $id = $_GET['id'];
            $this->model->load('publication');
            $pub = new Publication_Model();

            $data = array(
                'content' => 'Publication_View'
            );

            $data['infos']['pub'] = $pub->get_a_pub($id);
            // Load view
            $this->view->load('Main_View', $data);
             
            // Show view
            $this->view->show();
        }else{
            echo "<br><br><br><center><h1>La page que vous recherchez est introuvable.</h1></center>";
        }
       
    }
}