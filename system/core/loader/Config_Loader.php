<?php

class Config_Loader
{
    // Liste config
    protected $config = array();
     
    /**
     * charger helper
     * 
     * @param   string
     * @desc   fonction charger helper, param est le nom de helper
     */
    public function load($config)
    {
        if (file_exists(PATH_APPLICATION . '/config/' . $config . '.php')){
            $config = include_once PATH_APPLICATION . '/config/' . $config . '.php';
            if ( !empty($config) ){
                foreach ($config as $key => $item){
                    $this->config[$key] = $item;
                }
            }
            return true;
        }
        return FALSE;
    }
     
    /**
     * prendre item config
     * 
     * @param   string
     * @param   string
     * @desc    fonction prendre config item, param est le nom d'item et param par défaut
     */
    public function item($key, $defailt_val = '')
    {
        return isset($this->config[$key]) ? $this->config[$key] : $defailt_val;
    }
     
    /**
     * installer item config
     * 
     * @param   string
     * @param   string
     * @desc    fonction installer config item, param est le nom d'item et son value
     */
    public function set_item($key, $val){
        $this->config[$key] = $val;
    }
}