<?php
session_start();

$bdd = new PDO("mysql:host=127.0.0.1;dbname=web_3D","root","root");

$req = $bdd->prepare('SELECT `id`,`pseudo`,`score`,`experience`, `niveau` FROM `membre` WHERE id=?');
$req->execute(array($_SESSION['id']));
$donnees = $req->fetch();
echo $donnees['pseudo'];