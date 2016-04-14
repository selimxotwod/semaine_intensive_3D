<?php

$bdd = new PDO("mysql:host=127.0.0.1;dbname=web_3D","root","root");
if(isset($_POST["forminscription"]))
{

    if(!empty($_POST["pseudo"]) AND !empty($_POST["mdp"]) AND !empty($_POST["mail"]) AND !empty($_POST["mdp2"]) AND !empty($_POST["pays"])){
        $pseudo = htmlspecialchars($_POST["pseudo"]);
        $mail = htmlspecialchars($_POST["mail"]);
        $motdepasse = sha1($_POST["mdp"]);
        $motdepasse2 = sha1($_POST['mdp2']);
        $pays = htmlspecialchars($_POST["pays"]);
        $pseudolength = strlen($pseudo);
        if($pseudolength<255){
            if($motdepasse == $motdepasse2){
                if(filter_var($mail,FILTER_VALIDATE_EMAIL)){
                    $reqmail = $bdd ->prepare("SELECT * FROM membre WHERE mail = ?");
                    $reqmail->execute(array($mail));
                    $mailexist = $reqmail->rowCount();
                    if($mailexist == 0){
                        $reqpseudo = $bdd ->prepare("SELECT * FROM membre WHERE pseudo = ?");
                        $reqpseudo->execute(array($pseudo));
                        $pseudoexist = $reqpseudo->rowCount();
                        if($mailpseudo == 0) {
                            $insertmembre = $bdd->prepare("INSERT INTO membre(pseudo,password, pays, mail) VALUES (?,?,?,?)");
                            $insertmembre->execute(array($pseudo, $motdepasse, $pays, $mail));
                            $message = "Votre compte a bien été créer <a href=\"connexion.php\">Me connecter</a>";
                            header('location:index.php');
                        }
                    }
                    else{
                        $erreur = "Adresse mail déjà utilisée";
                    }

                }
                else{
                    $erreur = "Votre adresse Email n'est pas valide";
                }
            }
            else{
                $erreur = "Vos mots de passe ne correspondent pas";
            }
        }
        else{
            $erreur = "Votre pseudo ne doit pas dépasser 255 caractères";
        }

    }
    else{
        $erreur = "Veuillez remplir tous les champs";
    }
}

?>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="reset.css">
        <link rel="stylesheet" href="inscription.css">
        <title>Document</title>
    </head>

    <body>
        <div id="content">

            <a href="index.php"><img src="img/home.png" alt="" id="home"></a>
            <h2>Inscription</h2>




            <form method="post" action="">

                <table>
                    <tr>
                        <td>
                            <label for="pseudo">Pseudo</label>
                        </td>
                        <td>
                            <input type="text" placeholder="ex: toto" name="pseudo" id="pseudo">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mail">Mail</label>
                        </td>
                        <td>
                            <input type="email" placeholder="ex: toto@gmail.com" name="mail" id="mail">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mdp">Mot de passe</label>
                        </td>
                        <td>
                            <input type="text" placeholder="ex: motdepasse1" name="mdp" id="mdp">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mdp2">Confirmez votre mot de passe</label>
                        </td>
                        <td>
                            <input type="text" placeholder="ex: motdepasse2" name="mdp2" id="mdp2">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pays">Pays</label>
                        </td>
                        <td>
                            <input type="text" placeholder="ex: France" name="pays" id="pays">
                        </td>
                    </tr>

                </table>
                <input type="submit" value="Je m'inscris" name="forminscription" id="bouton">
            </form>



            <div id="error">
                <?php
if(isset($erreur)){
    echo '<font color="white">' . $erreur . '</font>';
}
if(isset($message)){
    echo '<font color="green">' . $message . '</font>';
}
?>
            </div>


        </div>
    </body>

    </html>