<?php
require_once(dirname(__DIR__,1).'/models/model.php');
require_once(dirname(__DIR__,1).'/models/Fishs.php');

class Modfish{
    /**
     * récupération des données concernant le poisson à modifier
     *
     * @param integer $id
     * @return array
     */
    public function prepareMod (int $id) : array 
    {
        
        if(
            empty($id) ||
            !is_numeric($id)
        ){
            echo 'je ne trouve pas ce poisson';
            exit;
        }
        $objFish= new Fishs;
        $fish=$objFish->getFish($id);
        return $fish;
    }

    public function sendModWithoutImage(array $postData) : bool
    {
        // vérifiation des données
        if(
            trim(strip_tags($postData['fish-name']))==='' ||
            trim(strip_tags($postData['average-size']))===''||
            trim(strip_tags($postData['about'])==='')
        ){
            echo("tous les champs sont obligatoires");
            exit;

        }
        $sendFish = new Fishs;

        return $sendFish->modFish($postData);
        
    }

    /**
     * modifie les informations sur le poisson concerné et l'image correspondante
     *
     * @param array $postData
     * @param array $files
     * @return boolean
     */
    public function sendModWithImage(array $postData, array $files): bool
    {
        
        // vérifiation des données
        if(
            trim(strip_tags($postData['fish-name']))==='' ||
            trim(strip_tags($postData['average-size']))===''||
            trim(strip_tags($postData['about'])==='')
        ){
            echo("tous les champs sont obligatoires");
            exit;

        }
        
        // gestion de l'image

        $dossier = './images/';
        $fichier = basename($files['new-image']['name']);
        $taille = filesize($files['new-image']['tmp_name']);
        $taille_max=5000000;
        $extensionOk = ['.png', '.gif', '.jpg', '.jpeg', '.webp'];
        $extension = strchr($files['new-image']['name'],'.');

        if(
            !empty($files['new-image']['name'])
        ){
            // vérification de l'extension 
            if(!in_array($extension,$extensionOk)){$erreur= 'les extensions autorisées sont les suivantes : .png .gif ..jpg .jpeg .wbep';}

            //vérification de la taille
            if($taille>$taille_max){$erreur= 'votre fichier est trop volumineux';}

            if(!isset($erreur)){
                // remplacement des caractère avec des accents
                $fichier=strtr($fichier,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                // déplacement du fichier temporaire
                if(move_uploaded_file($files['new-image']['tmp_name'], $dossier.$fichier)){
                    echo 'téléchargement OK';
                }
                else{
                    echo 'Erreur de téléchargement';
                    exit;
                }
            }
        }
        $postData['image'] = $files['new-image']['name'];
        $sendFish = new Fishs;

        return $sendFish->modFish($postData);
    }

}