<?php
try{
    $conn = new PDO( 'mysql:host=localhost;dbname=web_3D;charset=utf8' , 'root' , 'root' );
} catch( Exception $e ){
    die( $e->getMessage() );
}
?>
       <td>Joueur</td> 
       <td>Score</td> 
    <?php
// liste des users
$sql = "SELECT id, score, pseudo FROM `membre` ORDER BY score DESC";
$results = $conn->query( $sql );
while( $row = $results->fetchObject()){
    
?>
        <tr>
            <td>
                <?=$row->pseudo?>
            </td>
            <td>
                <?=$row->score?>
            </td>
        </tr>
        <?
}
?>

            </body>

            </html>