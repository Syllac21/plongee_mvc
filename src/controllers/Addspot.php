<?php
require_once(dirname(__DIR__,1).'/models/model.php');
require_once(dirname(__DIR__,1).'/models/Spots.php');

class Addspot{
    /**
     * Ajoute un nouveau spot dans la table spots
     *
     * @param array $postData
     * @return boolean
     */
    public function addSpot(array $postData) : bool
    {
        $addSpot = new Spots;

        // validation des données

        if(
            trim(strip_tags($postData['town-name'])) === '' ||
            trim(strip_tags($postData['spot-name'])) === '' ||
            trim(strip_tags($postData['latitude'])) === '' ||
            trim(strip_tags($postData['longitude'])) === '' ||
            !is_numeric(trim(strip_tags($postData['latitude']))) ||
            !is_numeric(trim(strip_tags($postData['longitude'])))
        ){
            echo 'les valeurs saisies ne correspondent pas';
            exit;
                       
        }
        return $addSpot->addSpot($postData);

    }
}



