<?php
require_once(dirname(__DIR__,1).'/models/model.php');
require_once(dirname(__DIR__,1).'/models/Fishs.php');

$postData=$_POST;

// validation des données saisies



if(
    trim(strip_tags($postData['fish-name']))==='' ||
    trim(strip_tags($postData['average-size']))===''||
    trim(strip_tags($postData['about'])==='')
){
    echo("tous les champs sont obligatoires");
    exit;
}

// validation du fichier image

$dossier ='../../images/';
$fichier = basename($_FILES['image']['name']);
$taille_max=5000000;
$taille=filesize($_FILES['image']['tmp_name']);
$extension_ok=['.png','.gif','.jpg','.jpeg','.webp'];
$extension=strrchr($_FILES['image']['name'],'.');

if(!empty($_FILES['image']['name'])){
    // vérification de l'extension
    if(!in_array($extension,$extension_ok)){$erreur= 'les extensions autorisées sont les suivantes : .png .gif ..jpg .jpeg .wbep';}

    // vérification de la taille
    if($taille>$taille_max){$erreur= 'votre fichier est trop volumineux';}

    if(!isset($erreur)){
        // remplacement des caractère avec des accents
        $fichier=strtr($fichier,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        // déplacement du fichier temporaire
        if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier.$fichier)){
            echo 'téléchargement OK';
        }
        else{
            echo 'Erreur de téléchargement';
            exit;
        } 
        
        }
        else{
            echo($erreur);
            exit;
    }
}
else{$image='pas-images.webp';}

$fishName=trim(strip_tags($postData['fish-name']));
$averageSize=trim(strip_tags($postData['average-size']));
$about=trim(strip_tags($postData['about']));
$image=$fichier;

$fish= new Fishs;
$addfish= $fish->addFish($fishName, $averageSize, $about, $image);

header('location: /index.php');
exit;