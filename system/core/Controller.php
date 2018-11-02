<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
/**/

class Controller
{
	//Objet View
	protected $view = NULL;

	//Objet model
	protected $model = NULL;

	//Objet library
	protected $library = NULL;

	//Objet helper
	protected $helper = NULL;

	//Objet config
	protected $config = NULL;

	/**
	 * *fonction construct
	 * * charger les bibliothèques nécessaire
	 */
	public function __construct()
	{
		// Charger config
	    require_once PATH_SYSTEM . '/core/loader/Config_Loader.php';
	    $this->config   = new Config_Loader();
	    $this->config->load('config');

	    // Charger View
		require_once PATH_SYSTEM . '/core/loader/View_Loader.php';
		$this->view = new View_Loader();

		// Load Helper
	    require_once PATH_SYSTEM . '/core/loader/Helper_Loader.php';
	    $this->helper = new Helper_Loader();

	    // Load Model
	    require_once PATH_SYSTEM . '/core/loader/Model_Loader.php';
	    $this->model = new Model_Loader();

	}

}

?>