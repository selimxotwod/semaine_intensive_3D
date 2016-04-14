<?php
try{
    $conn = new PDO( 'mysql:host=localhost;dbname=web_3D;charset=utf8' , 'root' , 'root' );
} catch( Exception $e ){
    die( $e->getMessage() );
}
?>
<?php
// liste des users
$sql = "SELECT id, score, pseudo FROM `membre` WHERE date_score = CURDATE() ORDER BY score DESC LIMIT 1";
$results = $conn->query( $sql );
$row = $results->fetchObject()
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View</title>
</head>
<body>
    <p>Le plus gros score du jour est <?=$row->score?> par <?=$row->pseudo?></p>
</body>
</html>