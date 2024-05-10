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
        
          
    }

    // voir pour retourner un booléen en fonction de la réussite de la requête peut-être
        /**
         * Envoie de mail de contact
         *
         * @param [type] $postData
         * @return boolean
         */
    public function sendMailContact($postData) : bool
    {
        // on vérifie les données 
        if(
            $postData['name'] === '' ||
            $postData['firstName'] === '' ||
            $postData['email'] === '' ||
            $postData['message'] === '' ||
            !filter_var($postData['email'], FILTER_VALIDATE_EMAIL)
        ){
            echo 'tous les champs ne sont pas remplis correctement';
            return false;
        }

        $nom = $postData['name']." ".$postData['firstName'];
        $email = $postData['email'];
        $message = $postData['message'];

        // Destinataire de l'e-mail (votre adresse e-mail)
        $destinataire = "syllac.online@gmail.com";
    
        // Sujet de l'e-mail
        $sujet = "Nouveau message de contact depuis le site de plongée";
    
        // Corps de l'e-mail
        $corpsMessage = "Nom: $nom\n";
        $corpsMessage .= "E-mail: $email\n\n";
        $corpsMessage .= "Message:\n$message";
    
        // Entêtes de l'e-mail
        $entetes = "From: $nom <$email>\r\n";
        $entetes .= "Reply-To: $email\r\n";
        $entetes .= "MIME-Version: 1.0\r\n";
        $entetes .= "Content-type: text/plain; charset=utf-8\r\n";
    
        // Envoi de l'e-mail
        return mail($destinataire, $sujet, $corpsMessage);
    } 
}