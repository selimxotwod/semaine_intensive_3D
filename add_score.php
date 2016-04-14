<?php
session_start();

$bdd = new PDO("mysql:host=127.0.0.1;dbname=web_3D","root","root");
$sql = "UPDATE `membre` SET `score`= :score,`date_score`=CURDATE()  WHERE id = :id";
$stmt = $bdd->prepare( $sql );
$stmt->bindValue( ':id' , $_SESSION['id'] );
$stmt->bindValue( ':score' , $_GET['score'] );
$stmt->execute();
?>
