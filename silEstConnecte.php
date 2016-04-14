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

        <ul>
            <li>Bienvenue
                <?php include 'affichernom.php' ?> !</li>
            <li>Niveau :
                <?php include 'afficherniveau.php' ?>
            </li>
        </ul>



        <div class="boutons">
            <a href="profil.php?id=<?= $_SESSION['id']?>">
                <button id="inscription">Profil</button>
            </a>
            <a href="deconnexion.php">
                <button id="deconnexion">se déconnecter</button>
            </a>


        </div>



        <img src="img/voitureGif.gif" alt="" id="voiture">
        <h1>Pipeser</h1>
        <p>« Fast and Furious ce sont des p'tits joueurs askip »</p>

        <a href="score.html">
            <button id="play">Jouer</button>
        </a>


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
                <?php include 'horloge.php' ?>
            </div>
        </div>
    </div>
    <!--FIN BLOC 2-->

    <!--BLOC 3-->
    <div id="bloc-3">
        <h2>Meilleurs scores</h2>

        <ul>
            <li>
                <a href="#here" onclick="getActive(0)"><button class="classement">GENERAL</button></a>
            </li>
            <li>
                <a href="#here" onclick="getActive(1)"><button class="classement">JOUR</button></a>
            </li>
            <li>
                <a href="#here" onclick="getActive(2)"><button class="classement">PAR PAYS</button></a>
            </li>
        </ul>
        <table class="ranking active">
            <?php include 'ranking.php'; ?>
        </table>

        <table class="ranking">
            <?php include 'ranking_jour.php'; ?>
        </table>

        <table class="ranking">
            <?php include 'moy_pays.php'; ?>
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

        var ranking = document.querySelectorAll(".ranking");
        


            function getActive(a){  
                var active = document.querySelector(".active");
                active.classList.remove("active")
                ranking[a].classList.add("active")
            }
    
    </script>
    <!--FIN SCROLL TO-->


</body>

</html>