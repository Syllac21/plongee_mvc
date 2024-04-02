<?php
require_once('model.php');

class Fishs 
{
    /**
     * Récupérer la liste des poissons
     *
     * @return array
     */
    public function getFishs() : array
    {
        $mysqlClient=dbConnect();
        $fishsStatement = $mysqlClient->prepare('SELECT * FROM fishs');
        $fishsStatement->execute();
        $fishs=$fishsStatement->fetchAll();

        return $fishs;
    } 
    
    /**
     * Récupérer les éléments relatif au poisson choisi
     *
     * @param integer $id
     * @return array
     */
    public function getFish(int $id) : array
    {
        // requête pour récupérer les données
        $mysqlClient=dbConnect();
        $retrieveFish = $mysqlClient->prepare('SELECT * FROM fishs WHERE id=:id');
        $retrieveFish->execute([
            'id'=>$id,
        ]);
        $detailfish=$retrieveFish->fetchAll(PDO::FETCH_ASSOC);
        if($detailfish===[]){
            $fish='le poisson s\'est décroché';
            exit;
        }
        $fish=[
            'id'=>$detailfish[0]['id'],
            'fish_name'=>$detailfish[0]['fish_name'],
            'average_size'=>$detailfish[0]['average_size'],
            'about'=>$detailfish[0]['about'],
            'image'=>$detailfish[0]['image'],
        ];
        return $fish;
    }

    public function addFish(string $fish_name, string $average_size, $about, $image)
    {
        $mysqlClient=dbConnect();
        $insertFish=$mysqlClient->prepare('INSERT INTO fishs(fish_name, average_size, about, image) VALUES (:fish_name, :average_size, :about, :image)');
        $insertFish->execute([
            'fish_name'=>$fish_name,
            'average_size'=>$average_size,
            'about'=>$about,
            'image'=>$image,
        ]);
    }

}