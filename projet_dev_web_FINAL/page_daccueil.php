<?php 
session_cache_limiter('private_no_expire, must-revalidate');
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="icon" href="images/icone.ico" />
    <title>L'Art Scène - Accueil</title>
    <meta charset="utf-8">
    <link href="style_page.css" rel="stylesheet" type="text/css" />
    <link href="style_accueil.css" rel="stylesheet" type="text/css" />
</head>

<?php
    include 'includes/utilitaires/database.php';
    global $db;
?>

<body>

    <?php include 'includes/header.php';?>

    <?php
        include 'includes/menu_utilisateur_connexion.php';
    ?>
    
    <div class="flip-card" style="position: absolute; left: 3%; top: 12vw;">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <img src="images/karaoke.jpg" alt="Karaoké" style="max-width: 100%;">
            </div>
            <div class="flip-card-back">
                <div class="separation_texte">
                    <p>Ces derniers temps notre évènement karaoké est particulièrement apprécié par les étudiants.</p>
                    <p>Nous rappelons qu'il est ouvert à tous les étudiants, adérants ou non.</p>
                    <p>Pour plus d'information veuillez consulter la page évènement du karaoké.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="flip-card" style="position: absolute; right: 3%; top: 19vw;">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <img src="images/fete.jpg" alt="Fête" style="max-width: 100%;">
            </div>
            <div class="flip-card-back">
                <div class="separation_texte">
                    <p>Venez nombreux aux concerts ouverts à tous.</p>
                    <p>Vous pouvez également vous produir sur scène avec nous!</p>
                    <p>Profitez et passez un bon moment entre amis!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="flip-card" style="position: absolute; left: 3%; top: 29vw;">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <img src="images/instruments.jpg" alt="Instruments" style="max-width: 100%;">
            </div>
            <div class="flip-card-back">
                <div class="separation_texte">
                    <p>Vous pouvez venir nous emprunter nos instruments.</p>
                    <p>Pour plus d'information veuillez consulter la page "Intruments à disposition" afin de voir quels
                        instruments sont disponibles et de les réserver.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="flip-card" style="position: absolute; right: 3%; top: 36vw;">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <img src="images/playlist.jpg" alt="Playlist" style="max-width: 100%;">
            </div>
            <div class="flip-card-back">
                <div class="separation_texte">
                    <p>Nous avons de nombreuses playlist pour toutes les situations.</p>
                    <p>Que ce soit le soir, pour travailler, pour se motiver, pour danser et bien plus encore.</p>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="centre">
        <div id="description">
            <h2>L'Art Scène, c'est quoi ?</h2>
            <p>Contrairement à ce que son nom indique, nous ne nous amusons pas à mettre des micros à côtés des
                enceintes. Du moins, pas volontairement. Nous sommes un association de musique qui regroupe à peu près
                tous les domaines, du piano à la batterie en passant par les basses, la voix et le violon. Notre but ?
                Faire de la musique ensemble !</p>
            <h2>Comment nous trouver ?</h2>
            <p>Notre local se situe en CY111, si vous souhaitez plus d’informations, n’hésitez pas à passer nous voir !
            </p>
            <h2>Pourquoi nous rejoindre ?</h2>
            <p>L’Art scène, au delà des concerts (qui pour l’instant sont fortement compromis) c’est aussi trouver le
                temps de se détendre en écoutant les gens faire de l’impro ou même y participer, des soirées karaokés et
                des nocturnes. Nous proposons également des cours d’initiation d’instruments alors, si vous êtes
                expérimentés ou voulez débuter, n’hésitez pas à nous faire signe !</p>
            <p style="padding: 0vw 1.4vw;">Musicalement vôtre,</p>
            <p style="padding: 0vw 1.4vw;">L’Art Scène</p>
        </div>
    </div>

    <?php include 'includes/footer.php';?>

</body>