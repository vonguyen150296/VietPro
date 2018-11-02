<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Myaccount_Controller extends Controller
{
	public function ListAction()
	{
		$data = array(
			'content' => 'Listtemperature_View'
		);
        // Load view
        $this->view->load('Myaccount_View', $data);
         
        // Show view
        $this->view->show();
	}

	public function MyinfoAction()
	{
		$data = array(
			'content' => 'Myinfo_View'
		);
        // Load view
        $this->view->load('Myaccount_View', $data);
         
        // Show view
        $this->view->show();
	}

	public function NewAction()
	{
		$data = array(
			'content' => 'Newtemperature_View'
		);
        // Load view
        $this->view->load('Myaccount_View', $data);
         
        // Show view
        $this->view->show();
	}
}