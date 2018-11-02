<?php

class Model_Loader
{
	public function load($model)
    {
        $model = ucfirst($model) . '_Model';
        require_once(PATH_APPLICATION . '/model/' . $model . '.php');
    }
} 

?>