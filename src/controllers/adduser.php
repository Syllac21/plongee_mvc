<?php
session_start();
require_once(dirname(__DIR__,1).'/models/model.php');
require_once(dirname(__DIR__,1).'/models/Users.php');

$postData=$_POST;

// validation des données

if(
    empty(trim($postData['firstname'])) ||
    empty(trim($postData['lastname'])) ||
    empty(trim($postData['email'])) ||
    empty(trim($postData['password'])) ||
    !filter_var($postData['email'], FILTER_VALIDATE_EMAIL)
){
    echo 'tous les champs ne sont pas remplis correctement';
    return;
}

// récupération des données

$firstname=trim(strip_tags($postData['firstname']));
$lastname=trim(strip_tags($postData['lastname']));
$email=trim(strip_tags($postData['email']));

// hachage du mot de passe

$password=password_hash(trim(strip_tags($postData['password'])), PASSWORD_DEFAULT);

$objUser= new Users;
$addUser=$objUser->addUser($firstname, $lastname, $email, $password);

header('location: /index.php');
exit;