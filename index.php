<?php
session_start();
require_once(__DIR__.'/template/login.php');
require_once(__DIR__.'/src/models/Pages.php');

$page= new Pages;

if(isset($_GET['action'])&& $_GET['action'] !== '') 
{
    if($_GET['action'] === 'addfish'){
        $pageDisplay=$page->addfish();
    }
    echo 'page en construction';
}elseif(isset($_GET['id'])&& is_numeric($_GET['id'])) 
{
    $pageDisplay=$page->fish();
} else {
    
    $pageDisplay=$page->homepage();
}
