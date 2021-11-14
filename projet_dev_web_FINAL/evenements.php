<?php 
session_cache_limiter('private_no_expire, must-revalidate');
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="icon" href="images/icone.ico" />
    <title>L'Art Scène - Évènements</title>
    <meta charset="utf-8">
    <link href="style_page.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php
        include 'includes/utilitaires/database.php';
        global $db;    
        global $get_user_role;
        include 'includes/utilitaires/get_role.php';
        extract($_POST);
    ?>

    <?php include 'includes/header.php';?>
    
    <?php include 'includes/menu_utilisateur_connexion.php';?>
  
    <div style="padding-top: 7vw;">&ensp;</div>

    <fieldset style="border-radius: 1.4vw; padding: 0vw 1.4vw; width: 95%; margin: auto;">
        <legend><h1>Evénements</h1></legend>
        <form method="POST">


            <label>Voici tous nos événements disponibles actuellement.</label>
            
            <h2>Karaoké</h2>
            <label for="karaoke_description">On vous propose une soirée karaoké en début de soirée de 18h à 20h <br>
            Lieu: CY211 aka "le frigo"<br></label><br>

            <?php 
            if($get_user_role == "admin"){?>
                <input type="date" name="karaoke_date" id="karaoke_date"><br><br><?php
            } 

            //afficher la date par écrit pour les non admin
            else{
                //vérifier s'il y a une date à l'event
                $q_karaoke = $db->prepare("SELECT karaoke_date FROM event_date");
                $q_karaoke ->execute();
                $check_karaoke = $q_karaoke->rowCount();

                if($check_karaoke==0){
                    echo "il n'y a pas encore de date pour le karaoke";
                }
                else{
                    $get_date_karaoke=$q_karaoke->fetch();
                    echo "Date pour le karaoke:";?>
                    <input type="date" value="<?php echo $get_date_karaoke["karaoke_date"]; ?>" disabled>
        
                    <?php
                }
            }
            ?>
            <br>
            <input type="submit" value="S'inscrire" name="formkaraoke"><br><br>
            
            
            <h2>Blind-Test</h2>
            <label>Je pense que vous connaissez tous le principe du Blind test, On vous propose une soirée Blind Test de 18h à 20h sur discord étant donné le contexte pandémique actuel.<br>
            Lieu: Amphi Turing<br></label><br>

            <?php 
            if($get_user_role == "admin"){?>
            <input type="date" name="blind_test_date" id="blind_test_date"><br><br>
            <?php } 
            else{
                $q_blindtest = $db->prepare("SELECT blindtest_date FROM event_date");
                $q_blindtest->execute();
                $check_blindtest = $q_blindtest->rowCount();
                
                if($check_blindtest==0){
                    echo "il n'y a pas encore de date pour le blindtest";
                }
                else{
                    $get_date_blindtest=$q_blindtest->fetch();
                    echo "Date pour le blind-test:";?>
                    <input type="date" value="<?php echo $get_date_blindtest["blindtest_date"]; ?>" disabled>
        
                    <?php
                }
            } 

            ?><br>
            <input type="submit" value="S'inscrire" name="formblind_test"><br><br>


            <h2>Concert</h2>
            <label>Nous organisons aussi des concerts où l'on poura s'éclater en écoutant nos musiciens mais aussi où vous pourrez nous montrer vos grands talents puisque tout le monde pourra passer sur scène.<br>
            Lieu: Amphi Condorcet<br></label><br>
            
            <?php 
            if($get_user_role == "admin"){?>
                <input type="date" name="concert_date" id="concert_date"><br><br>

            <?php }
            else{
                $q_concert = $db->prepare("SELECT concert_date FROM event_date");
                $q_concert->execute();
                $check_concert = $q_concert->rowCount();
                
                if($check_concert==0){
                    echo "il n'y a pas encore de date pour le concert";
                }
                else{
                    $get_date_concert=$q_concert->fetch();
                    echo "Date pour le concert:";?>
                    <input type="date" value="<?php echo $get_date_concert["concert_date"]; ?>" disabled>
        
                    <?php
                }
            } ?><br>
                <input type="submit" value="S'inscrire" name="formconcert"><br><br>
  
            <h2>Nocturnes</h2>
            <label>Je pense que vous connaisez le concept des nocturnes. Celles-ci auront n'auront pas d'horaires fixes, elles seront dévoilés dès que les préparatifs seront terminés.<br>
            Lieu: CY211 aka "le frigo" <br></label><br>
            
            <?php 
            if($get_user_role == "admin"){?>

                <input type="date" name="nocturne_date" id="nocturne_date"><br><br>

            <?php } 
             else{
                $q_nocturne = $db->prepare("SELECT nocturne_date FROM event_date");
                $q_nocturne->execute();
                $check_nocturne = $q_nocturne->rowCount();
                
                if($check_nocturne==0){
                    echo "il n'y a pas encore de date pour le nocturne";
                }
                else{
                    $get_date_nocturne=$q_nocturne->fetch();
                    echo "Date pour le nocturne:";?>
                    <input type="date" value="<?php echo $get_date_nocturne["nocturne_date"]; ?>" disabled>
        
                    <?php
                }
            }
            ?><br>
                <input type="submit" value="S'inscrire" name="formnocturne"><br><br>

            <?php include "includes/autorisation_event.php";
            
            if($get_user_role == "admin"){?><br>
                <input type="submit" value="Valider les changements" name="valid_admin"><br> 
                <?php include 'includes/gestion_admin/gestion_event/modif_event.php';
            }?>
 
        </form>
    </fieldset>





    <div style="padding-top: 0.7vw;">&ensp;</div>

    <?php include 'includes/footer.php';?>

</body>