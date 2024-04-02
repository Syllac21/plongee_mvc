<?php

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
}