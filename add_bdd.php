<?php
session_start();

$bdd = new PDO("mysql:host=127.0.0.1;dbname=web_3D","root","root");

$req = $bdd->prepare('SELECT `id`,`score`,`experience` FROM `membre` WHERE id=?');
$req->execute(array($_SESSION['id']));
$donnees = $req->fetch();

if ($_GET['score']>$donnees['score']) {
	$sql = "UPDATE `membre` SET `score`= :score,`date_score`=CURDATE()  WHERE id = :id";
	$stmt = $bdd->prepare( $sql );
	$stmt->bindValue( ':id' , $_SESSION['id'] );
	$stmt->bindValue( ':score' , $_GET['score'] );
	$stmt->execute();
	$stmt->closeCursor();
}
$newExp = $_GET["experience"];
$sql = "UPDATE `membre` SET `experience` = experience + $newExp  WHERE id = :id";
$stmt = $bdd->prepare( $sql );
$stmt->bindValue( ':id' , $_SESSION['id'] );
$stmt->execute();
header("Location: check_niv.php");
exit;

