<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Welcome_Controller extends Controller
{
	public function HomeAction() //rendre page d'acceuil
	{
		$data = array(
			'content' => 'Welcome_View'
		);
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

	public function ConditionAction() //rendre page condition des generales
	{
		$data = array(
			'content' => 'Condition_View'
		);
        // Load view
        $this->view->load('Main_View', $data);
         
        // Show view
        $this->view->show();
	}

	public function LegalAction() //rendre page mentions legal
	{
		$data = array(
			'content' => 'Legal_View'
		);
        // Load view
        $this->view->load('Main_View', $data);
         
        // Show view
        $this->view->show();
	}

	
}