<?php 
session_cache_limiter('private_no_expire, must-revalidate');
session_start();?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="icon" href="images/icone.ico" />
    <title>L'Art Scène - Boutique</title>
    <meta charset="utf-8">
    <link href="style_page.css" rel="stylesheet" type="text/css" />
</head>

<style>
    input[type=submit] {
        cursor: pointer; 
        display: grid; 
        float: left;
        background-color: #26446e;
        border: none;
        padding: 0.5vw 1vw;
        margin: 0.4vw 0.2vw;
        opacity: 0.6;
        transition: 0.3s opacity;
        color: lightgray;
	    font-size: 0.9vw;
    }
    input[type=submit]:hover {
        opacity: 1;
    }
</style>

<?php
    include 'includes/utilitaires/database.php';
    global $db;
?>
        
<body>

    
    <?php include 'includes/header.php';?>

    <?php
        extract($_POST);
        include 'includes/menu_utilisateur_connexion.php';
    ?>

    <div style="padding-top: 7vw;">&ensp;</div>

    <fieldset style="border-radius: 1.4vw; padding: 0vw 1.4vw; width: 95%; margin: auto;">
		<legend><h1><strong>Boutique</strong></h1></legend>
		<div id="gpart" style="display: inline-block;">

            <p>Achetez notre pull aux couleurs de l'Art en Scène afin de soutenir notre association.</p>
            <p>Prix : Variant de 35€ et 50€ selon la matière et le fournisseur donc les prix suivants sont des approximations.</p><br>
            <form method="POST">

                <label for="sweater_material">Matière du pull : </label><br>

                <input id="coton" type="radio" name="sweater_material" value="coton" required="">
                <label for="coton">Coton: 50€<br></label>
                
                <input id="coton_polyester" type="radio" name="sweater_material" value="coton_polyester" required="">
                <label for="coton_polyester">Coton polyester: 35€ <br></label> 

                <br>

                <label for="city">Ville de résidence : </label><br>
                <input type="text" name="city" id="city" placeholder="Ville de résidence" required/><br><br>
                <label for="Adresse">Adresse : </label><br>
                <textarea name="address" id="address" required=""></textarea><br><br>
            

                <label for="delivery">Type de livraison : </label><br>

                <input id="standard" type="radio" name="delivery" value="standard" required="">
                <label for="standard">Livraison standard*<br></label>

                <input id="prioritaire"type="radio" name="delivery" value="prioritaire" required="">
                <label for="prioritaire">Livraison prioritaire (+3€)**<br></label>

                <p>Taille: </p>
                <select name="size" style="width: 150px;" required="">
                    <option>XS</option>
                    <option>S</option>	
                    <option>M</option>
                    <option>L</option>	
                    <option>XL</option>	
                    <option>XXL</option>
                </select><br><br><br>
                
                <input type="submit" name="formdelivery" value="Valider la commande">
            </form>

        <?php include 'includes/boutique_inscription.php';?>

        </div>

        <div id="margin" style="margin: 1.4vw 0vw; display: inline-block; float: right;">
            <img src="images/pull.png" style="margin: auto; height: 30vw; width : 37.5vw; border-radius: 0.7vw;">
        </div>

    </fieldset>

    <i style="padding-left: 1.4vw;">*Livré dans les 2 à 3 semaines après achat</i><br>
    <i style="padding-left: 1.4vw;">**Livré dans la semaine après achat</i>
    
    <div style="padding-top: 0.7vw;">&ensp;</div>

    
    <?php include 'includes/footer.php';?>

</body>