<?php session_start();?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="icon" href="images/icone.ico" />
    <title>L'Art Scène - Playlist</title>
    <meta charset="utf-8">
    <link href="style_page.css" rel="stylesheet" type="text/css" />
</head>


<style>
        iframe {
            z-index: 9;
        }
</style>

<?php
    include 'includes/utilitaires/database.php';
    global $db;
?>

<body>

    <?php include 'includes/header.php';?>




    <?php
        include 'includes/menu_utilisateur_connexion.php';
    ?>

    <div style="padding-top: 7vw;">&ensp;</div>

    <fieldset style="border-radius: 1.4vw; padding: 0vw 1.4vw; width: 95%; margin: auto;">
        <legend><h1>Playlist</h1></legend>
        <label>Ici vous avez accès à nos superbes playlists en tout genres. Il y en a pour tous les goûts c'est pour ça qu'on vous les a classées par thèmes.</label><br>
        <div class="playlist" style="position: absolute; left: 3%; top: 17vw;">
            <h2>Hard Rock-Metal :</h2>
            <div style="width: 100%; height: 21vw; position: relative;">
                <iframe src="https://open.spotify.com/embed/playlist/1Fygi72ZPfc4cjiB46RsuN" style="top: 0; left: 0; width: 300px; height: 100%; position: relative; border: 0;" allowfullscreen allow="encrypted-media"></iframe>
            </div>
        </div>
        
        <div class="playlist" style="position: absolute; right: 3%; top: 31vw;">
            <h2>Listen To Your Heart :</h2>
            <div style="width: 100%; height: 21vw; position: relative;">
                <iframe src="https://open.spotify.com/embed/playlist/7skMMlutpAhem7V7DAdcEU" style="top: 0; left: 0; width: 300px; height: 100%; position: relative; border: 0;" allowfullscreen allow="encrypted-media"></iframe>
            </div>
        </div>
        
        <div class="playlist" style="position: absolute; left: 3%; top: 45vw;">
            <h2>Comédies Musicales française :</h2>
            <div style="width: 100%; height: 21vw; position: relative;">
                <iframe src="https://open.spotify.com/embed/playlist/2osLeIsDzMoGB7wulKDoW1" style="top: 0; left: 0; width: 300px; height: 100%; position: relative; border: 0;" allowfullscreen allow="encrypted-media"></iframe>
            </div>
        </div>
        
        <div class="playlist" style="position: absolute; right: 3%; top: 59vw;">
            <h2>Rap US #1 :</h2>
            <div style="width: 100%; height: 21vw; position: relative; float: left;">
                <iframe src="https://open.spotify.com/embed/playlist/0sOftBvNvGRR9wZoGcrRZR" style="top: 0; left: 0; width: 300px; height: 100%; position: relative; border: 0;" allowfullscreen allow="encrypted-media"></iframe>
            </div>
        </div>

        <div class="playlist" style="position: absolute; left: 3%; top: 73vw;">
            <h2>Catchy Song #1 :</h2>
            <div style="width: 100%; height: 21vw; position: relative;">
                <iframe src="https://open.spotify.com/embed/playlist/0jSuCAZ0ACy6ZQIASf4xjd" style="top: 0; left: 0; width: 300px; height: 100%; position: relative; border: 0;" allowfullscreen allow="encrypted-media"></iframe>
            </div>
        </div>
        
        <div class="playlist" style="position: absolute; right: 3%; top: 87vw;">
            <h2>Gaming :</h2>
            <div style="width: 100%; height: 21vw; position: relative;">
                <iframe src="https://open.spotify.com/embed/playlist/6JB8G1vJcVztCyatyhomzs" style="top: 0; left: 0; width: 300px; height: 100%; position: relative; border: 0;" allowfullscreen allow="encrypted-media"></iframe>
            </div>
        </div>
        
        <div class="playlist" style="position: absolute; left: 3%; top: 101vw;">
            <h2>Bonne Humeur (Novembre 2020) :</h2>
            <div style="width: 100%; height: 21vw; position: relative;">
                <iframe src="https://open.spotify.com/embed/playlist/7Jei9hUeXtfNtiyqtJmIst" style="top: 0; left: 0; width: 300px; height: 100%; position: relative; border: 0;" allowfullscreen allow="encrypted-media"></iframe>
            </div>
        </div>
        
        <div class="playlist" style="position: absolute; right: 3%; top: 115vw;">
            <h2>Musique Française :</h2>
            <div style="width: 100%; height: 21vw; position: relative;">
                <iframe src="https://open.spotify.com/embed/playlist/7pR16T7oCIBX5h6Ukllran" style="top: 0; left: 0; width: 300px; height: 100%; position: relative; border: 0;" allowfullscreen allow="encrypted-media"></iframe>
            </div>
        </div>
        
        <div class="playlist" style="position: absolute; left: 3%; top: 129vw;">
            <h2>Motivation Novembre(2020) :</h2>
            <div style="width: 100%; height: 21vw; position: relative;">
                <iframe src="https://open.spotify.com/embed/playlist/3Wow0IWUvQQaampEpSzyeo" style="top: 0; left: 0; width: 300px; height: 100%; position: relative; border: 0;" allowfullscreen allow="encrypted-media"></iframe>
            </div>
        </div>
        
        <div class="playlist" style="position: absolute; right: 3%; top: 143vw;">
            <h2>Révision (chill) :</h2>
            <div style="width: 100%; height: 21vw; position: relative;">
                <iframe src="https://open.spotify.com/embed/playlist/4mgp7lscDpiXySdPIPUGzp" style="top: 0; left: 0; width: 300px; height: 100%; position: relative; border: 0;" allowfullscreen allow="encrypted-media"></iframe>
            </div>
        </div>
        <div style="padding-top: 154vw;">&ensp;</div>

        <div id="centre" style="width: 100%; position: absolute; top: 70vw; opacity: 0.9;">
            <img style="transform: rotate(90deg); width: 92%; margin: auto;" src="images/middlewave.png">
        </div>
    </fieldset>

    
    <div style="padding-top: 0.7vw;">&ensp;</div>

    <?php include 'includes/footer.php';?>

</body>