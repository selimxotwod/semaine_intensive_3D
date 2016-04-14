<?php if(isset($_POST["formconnect"])){
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




    <!DOCTYPE html>

    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="reset.css">
        <link rel="stylesheet" href="style.css">
        <title>Pipeser</title>
    </head>

    <body>



        <!--BLOC 1-->
        <div id="bloc-1">
            <div class="boutons">
                <a href="inscription.php">
                    <button id="inscription">S'inscrire</button>
                </a>
                <button id="connect">
                    <div id="coco">Se connecter</div>
                    <div class="menu">
                        <form method="post" action="">

                            <label for="pseudoconnect">Pseudo</label>
                            <input type="text" name="pseudoconnect" placeholder="Pseudo" id="pseudoconnect" />

                            <label for="passwordconnect">Mot de passe</label>
                            <input type="password" name="passwordconnect" placeholder="Password" id="passwordconnect">

                            <input type="submit" name="formconnect" value="Connexion" class="btn">

                        </form>

                        <?php
if(isset($erreur)){
    echo '<font color="white" size="2">' . $erreur . '</font>';
}
?>
                    </div>

                </button>

            </div>



            <img src="img/voitureGif.gif" alt="" id="voiture">

            </object>

            <h1>Pipeser</h1>
            <p>« Fast and Furious ce sont des p'tits joueurs askip »</p>

            <a>
                <button id="play">Jouer</button>
            </a>
            <p id="pourjouer">Veuillez vous connecter pour jouer</p>


            <a class="scrollTo" href="#ancre-1"><img src="img/white_arrow.png" alt="" id="arrow"></a>
        </div>
        <!--FIN BLOC 1-->


        <!--BLOC 2-->
        <div id="ancre-1"></div>
        <div id="bloc-2">
            <div id="story">
                <h2>L'histoire</h2>
                <p id="texte">Il était une fois, dans une galaxie fort fort lointaine, une petite voiture jaune nommée Unity. Égarée loin de sa petite planète, elle cherche à la rejoindre. Mais bloquée dans un tunnel spatio-temporel, son seul moyen d'y retourner est de récupérer un maximum de pièces...</p>
            </div>
            <img src="img/back_car.png" alt="" id="back-car">
            <div id="competition">
                <h2>Prochain tournoi</h2>
                <div id="test">
                    <?php include 'horloge.php'?>
                </div>
            </div>
        </div>
        <!--FIN BLOC 2-->

        <!--BLOC 3-->
        <div id="bloc-3">
            <h2>Meilleurs scores</h2>
            <ul>
                <li>
                    <button class="classement">JOUR</button>
                </li>
                <li>
                    <button class="classement">NATIONAL</button>
                </li>
                <li>
                    <button class="classement">MONDIAL</button>
                </li>
            </ul>
            <table class="ranking">
                <?php
        include 'ranking.php';
        ?>


            </table>
            <table class="ranking_jour">
                <?php
        include 'ranking_jour.php';
        ?>


            </table>
            <table class="score">


            </table>

            <button>En voir plus</button>

            <img src="img/front_car.png" alt="" id="front_car">




        </div>
        <!--Fin BLOC 3-->

        <!--FOOTER-->
        <footer>
            <p>©Pipeser 2016</p>
            <p>Jeu : Laurie, Laura, Maïlys.</p>
            <p>Site web : Julien, Selim, Alexia, Marylou.</p>


        </footer>

        <!--FIN FOOTER-->




        <script src="jquery.js"></script>
        <script src="js/scrollto.js"></script>


        <!--SCROLL TO-->
        <script type="text/javascript">
            $(document).scroll(function () {
                $("#texte").fadeIn(2500);
            });
        </script>
        <!--FIN SCROLL TO-->

        <!--MENU-->
        <script>
            $("#coco").click(function () {
                $(".menu").slideToggle("slow");
                $("#pseudoconnect").css("background-color", "#c89123", "!important");
                $("#passwordconnect").css("background-color", "#c89123", "!important");
            });
        </script>
        <!--FIN MENU-->

        <!--JOUER DECONNEXION-->
        <script>
            $("#play").click(function () {
                $("#pourjouer").fadeIn();
                setTimeout(function () {
                    $("#pourjouer").fadeOut();
                }, 1000);
            });
        </script>
        <!--FIN JOUER DECONNEXION-->


    </body>

    </html>