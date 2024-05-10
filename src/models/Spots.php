<?php
require_once('model.php');

class Spots 
{
    /**
     *Recupère un tableau avec tous les spots et les coordonnées
     *
     * @return array
     */
    public function getSpots() : array
    {
        $mysqlClient=dbConnect();
        $spotsStatement = $mysqlClient->prepare('SELECT * FROM spots');
        $spotsStatement->execute();
        $spots=$spotsStatement->fetchAll();
        return $spots;
    }

    public function addSpot(array $postData) : bool
    {
        $townName=trim(strip_tags($postData['town-name']));
        $spotName=trim(strip_tags($postData['spot-name']));
        $latitude=trim(strip_tags($postData['latitude']));
        $longitude=trim(strip_tags($postData['longitude']));

        $mysqlClient=dbConnect();
        $insertSpot=$mysqlClient->prepare('INSERT INTO spots(town_name, spot_name, latitude, longitude) VALUES (:town_name, :spot_name, :latitude, :longitude)');
        return $insertSpot->execute([
            'town_name'=>$townName,
            'spot_name'=>$spotName,
            'latitude'=>$latitude,
            'longitude'=>$longitude,
        ]);
    }
}