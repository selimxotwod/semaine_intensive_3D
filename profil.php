<?php
session_start();

$bdd = new PDO("mysql:host=127.0.0.1;dbname=web_3D","root","root");


    if(isset($_GET['id']) AND $_GET['id'] > 0){
        $getid = intval($_GET['id']);
        $requser = $bdd->prepare('SELECT * FROM membre WHERE id=?');
        $requser->execute(array($getid));
        $userinfo = $requser->fetch();
?>

    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="profil.css">
        <title>Profil</title>
    </head>

    <body>
        <?php
if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']){
    ?>
            <div id="nav">
                <a href="index.php?id=
<?= $_SESSION['id']?>">Accueil</a>
                <a href="jeu.html">Jouer</a>
                <a href="deconnexion.php">Se déconnecter</a>
            </div>
            <?php
}
if(isset($erreur)){
    echo '<font color="red">' . $erreur . '</font>';
}
?>


                <h2>Profil de <?php echo $userinfo['pseudo']?></h2>
                <p>Pseudo :
                    <?php echo $userinfo['pseudo']?>
                </p>
                <p>Mail :
                    <?php echo $userinfo['mail']?>
                </p>
                <p>Niveau :
                    <?php include 'afficherniveau.php'?>

                </p>

    </body>

    </html>

    <?php
}
?>