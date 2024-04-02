<?php
session_start();

require_once(dirname(__DIR__,2).'/src/models/model.php');
require_once(dirname(__DIR__,2).'/src/models/users.php');

// récupération de la table utilisateurs

$obj_users= new Users;
$users=$obj_users->getUsers();

// valider les données saisies
$postData=$_POST;

if(
    !empty($postData['email']) &&
    !empty($postData['password'])
){
    
    if(!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)){
        $_SESSION['LOGIN_ERROR_MESSAGE'] = 'veuillez saisir un email valide';
    } else {
        foreach($users as $user){
            if(
                $user['email'] === $postData['email'] &&
                password_verify($postData['password'],$user['password'])
                
            ){
                $_SESSION['LOGGED_USER'] = [
                    'email' => $user['email'],
                    'id_user' => $user['id_user'],
                ];
            }
        }
        if(!isset($_SESSION['LOGGED_USER'])) {
            $_SESSION['LOGIN_ERROR_MESSAGE'] = sprintf(
                'les identifiants suivants ne correspondent à aucun compte :', $postData['email'], strip_tags($postData['password'])
            );
        }
    }
    
    header("location: /index.php");
    exit;
    
} 


?>