<?php
session_start();
require_once(__DIR__.'/template/login.php');
require_once(__DIR__.'/src/models/Pages.php');
require_once(__DIR__.'/src/controllers/Modfish.php');
require_once(__DIR__.'/src/models/Spots.php');
require_once(__DIR__.'/src/controllers/Addspot.php');
require_once(__DIR__.'/src/models/Users.php');

$page= new Pages;

if(isset($_GET['action'])&& $_GET['action'] !== '') 
{
    if($_GET['action'] === 'addfish'){
        $pageDisplay=$page->addfish();

    }elseif($_GET['action']==='addSpot'){
        $pageDisplay=$page->addSpotPage();

    } elseif($_GET['action']==='contact') {
        $pageDisplay=$page->contactPage();

    } elseif($_GET['action']==='submitAddSpot'){
        $objAddSpot= new Addspot;
        if(!$objAddSpot->addSpot($_POST)){
            echo'la requête a échoué';
            exit;
        }
        header('location: /index.php');

    } elseif($_GET['action']==='submitContact'){
        $user = new Users;
        if($user->sendMailContact($_POST)){
            header('location: index.php');
        } else{
            echo 'erreur dans l\'envoie du message';
        }
        
    } elseif($_GET['action'] === 'modfish'){
        $pageDisplay=$page->modFishPage($_GET['id']);

    }elseif($_GET['action'] === 'modfishSub'){
        $modfish = new Modfish;
        
        if($_FILES['new-image']['name']===""){
            if(!$modfish->sendModWithoutImage($_POST)){
                echo'erreur lors de la modification';
            }
        }else{
            
            if(!$modfish->sendModWithImage($_POST, $_FILES)){
                echo'erreur lors de la modification';
            }
        }
        header('location: /index.php');
        
    } elseif($_GET['action']==='spots')
    {
        $pageDisplay=$page->spotsPage();

    } elseif($_GET['action']==='addSpot')
        {

        } else {
            echo 'page en construction';
        }
    
}elseif(isset($_GET['id'])&& is_numeric($_GET['id'])) 
{
    $pageDisplay=$page->fish();
    
} else {
    
    $pageDisplay=$page->homepage();
}
