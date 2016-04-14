<?php
try{
    $conn = new PDO( 'mysql:host=localhost;dbname=web_3D;charset=utf8' , 'root' , 'root' );
} catch( Exception $e ){
    die( $e->getMessage() );
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View</title>
</head>
<body>
       <td>Pays</td>
       <td>Score</td>
<?php
// liste des users
$sql = "SELECT pseudo, pays, AVG(score) AS lamoy FROM `membre` GROUP BY pays ORDER BY score DESC";
$results = $conn->query( $sql );

while( $row = $results->fetchObject()){
?>
	<tr>
        <td>
            <?=$row->pays?>
        </td>
        <td>
            <?=$row->lamoy?>
        </td>
    </tr>
<?
}
?>
</body>
</html>



