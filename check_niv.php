<?php
session_start();

$bdd = new PDO("mysql:host=127.0.0.1;dbname=web_3D","root","root");

$req = $bdd->prepare('SELECT `id`,`score`,`experience`, `niveau` FROM `membre` WHERE id=?');
$req->execute(array($_SESSION['id']));
$donnees = $req->fetch();
if ($donnees['experience']>50 && $donnees['experience']<170 ) {
	$sql = "UPDATE `membre` SET niveau = 2 WHERE id = :id";
	$stmt = $bdd->prepare( $sql );
	$stmt->bindValue( ':id' , $_SESSION['id'] );
	$stmt->execute();
}
if($donnees['experience']>=170 && $donnees['experience']<350 ){
	$sql = "UPDATE `membre` SET niveau = 3 WHERE id = :id";
	$stmt = $bdd->prepare( $sql );
	$stmt->bindValue( ':id' , $_SESSION['id'] );
	$stmt->execute();
}
if($donnees['experience']>=350){
	$sql = "UPDATE `membre` SET niveau = 4 WHERE id = :id";
	$stmt = $bdd->prepare( $sql );
	$stmt->bindValue( ':id' , $_SESSION['id'] );
	$stmt->execute();
}

header("Location: final2.html");