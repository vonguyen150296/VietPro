<?php

class View_Loader
{
    /**
     * @desc param stocker view qui est déjà chargé.
     */
    private $__content = array();
     
    /**
     * charger view
     * 
     * @param   string
     * @param   array
     * @desc    fonction charger view, param est le nom de view et la donnée transmis view 
     */
    public function load($view, $data = array()) 
    {
        // Convertir le tableau en une variable
        extract($data);
         
        //Convertissez le contenu de view en une variable au lieu de l’imprimer en utilisant ob_start ()
        ob_start();
        require_once PATH_APPLICATION . '/view/' . $view . '.php';
        $content = ob_get_contents();
        ob_end_clean();
         
        // Attribuer le contenu à la liste des vues chargées
        $this->__content[] = $content;
    }
     
    /**
     * afficher view
     * 
     * @desc    La fonction affiche la vue entière chargée, utilisée par le contrôleur
     */
    public function show()
    {
        foreach ($this->__content as $html){
            echo $html;
        }
    }
}

?>

