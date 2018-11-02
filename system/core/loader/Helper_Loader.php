<?php

class Helper_Loader
{
    /**
     * Load helper
     * 
     * @param   Example
     * @desc    function load helper, param is a name of helper
     */
    public function load($helper)
    {
        $helper = ucfirst($helper) . '_Helper';
        require_once(PATH_SYSTEM . '/helper/' . $helper . '.php');
    }
}