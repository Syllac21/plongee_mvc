<?php
require_once(dirname(__DIR__,2).'/src/controllers/Modfish.php');

class Pages{
    public function homepage()
    {
        require_once(dirname(__DIR__,2).'/template/homepage.php');
    }

    public function fish()
    {
        require_once(dirname(__DIR__,2).'/template/fish.php');
    }

    public function addfish()
    {
        require_once(dirname(__DIR__,2).'/template/addfish.php'); 
    }

    public function modFishPage(int $id)
    {
        $objModFish =  new Modfish;
        $modFish = $objModFish->prepareMod($id); 
        require_once(dirname(__DIR__,2).'/template/modfish.php');
    }

    public function spotsPage()
    {
        require_once(dirname(__DIR__,2).'/template/spot.php');
    }

    public function addSpotPage()
    {
        require_once(dirname(__DIR__,2).'/template/addspot.php');
    }
    
    public function contactPage()
    {
        require_once(dirname(__DIR__,2).'/template/contact.php');
    }
}