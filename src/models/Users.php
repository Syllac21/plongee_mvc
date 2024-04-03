<?php

require_once('model.php');

/**
 * récupération de la table users
 * return array
 */
class Users
{
    /**
     *Récupère la tables users
     *
     * @return array
     */
    public function getUsers() : array
    {
        $mysqlClient=dbConnect();
        $usersStatement = $mysqlClient->prepare('SELECT * FROM users');
        $usersStatement->execute();
        $users=$usersStatement->fetchAll();
        return $users;
    }

    /**
     * ajoute un utilisateur à la table users
     *
     * @param string $firstname
     * @param string $lastname
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function addUser(string $firstname, string $lastname, string $email, string $password) : bool {
        $mysqlClient=dbConnect();
        $addUser = $mysqlClient->prepare('INSERT INTO users(firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)');
        return $addUser->execute([
            'firstname'=>$firstname,
            'lastname'=>$lastname,
            'email'=>$email,
            'password'=>$password,
        ]);
        
        // voir pour retourner un booléen en fonction de la réussite de la requête peut-être
        
    }
}