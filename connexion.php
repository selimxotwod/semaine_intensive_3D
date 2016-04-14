<?php
session_start();

$bdd = new PDO("mysql:host=127.0.0.1;dbname=web_3D","root","root");

if(isset($_SESSION["id"])){

    header('location:profil.php?id='.$_SESSION["id"]);

}


if(isset($_POST["formconnect"])){
    $pseudoconnect = htmlspecialchars($_POST["pseudoconnect"]);
    $mdpconnect = sha1($_POST["passwordconnect"]);

    if(!empty($pseudoconnect) AND !empty($mdpconnect)){

        $requser = $bdd->prepare("SELECT * FROM membre WHERE pseudo = ? AND password=?");
        $requser->execute(array($pseudoconnect,$mdpconnect));
        $userexist = $requser->rowCount();
        if($userexist==1){
            $userinfo = $requser ->fetch();
            $_SESSION["id"] = $userinfo["id"];
            $_SESSION["pseudo"] = $userinfo['pseudo'];
            header("Location: profil.php?id=".$_SESSION['id']);
        }
        else{
            $erreur = "Pseudo ou mot de passe érroné ";
        }
    }
    else{
        $erreur = "Tous les champs doivent être complétés";
    }
}
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form method="post" action="">
    <label for="pseudoconnect">Pseudo</label>
    <input type="text" name="pseudoconnect" placeholder="Pseudo" id="pseudoconnect"/>
    <label for="passwordconnect">Mot de passe</label>
    <input type="password" name="passwordconnect" placeholder="password" id="passwordconnect">
    <input type="submit" name="formconnect" value="connexion">

</form>
<?php
if(isset($erreur)){
    echo '<font color="red">' . $erreur . '</font>';
}
?>
</body>
</html>