<?php
session_start();

$bdd = new PDO("mysql:host=127.0.0.1;dbname=web_3D","root","root");
if(isset($_SESSION["id"])){
    include 'silEstConnecte.php';
}


else{
    include 'silPasConnecte.php';
            } ?>