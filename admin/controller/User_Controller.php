<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
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

    public function ListAction()
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

    public function UpdateAction($id)
    {

    }
}