<?php 
session_cache_limiter('private_no_expire, must-revalidate');
session_start();?>

<!DOCTYPE html>
<html lang="fr" style="height: 100%;">

<head>
    <link rel="icon" href="images/icone.ico" />
    <title>L'Art Scène - Passation</title>
    <meta charset="utf-8">
    <link href="style_page.css" rel="stylesheet" type="text/css" />
</head>

<?php
    include 'includes/utilitaires/database.php';
    global $db;
    error_reporting(0);
?>

<body style="height: 100%; overflow: hidden;">
    <div style="min-height:100%; margin: 0 auto -8vw; ">
        <?php include 'includes/header.php';?>




    <?php
        include 'includes/menu_utilisateur_connexion.php';
        global $get_user_role;
        include 'includes/utilitaires/get_role.php';
    ?>

    <div style="padding-top: 7vw;">&ensp;</div>

    <fieldset style="border-radius: 1.4vw; padding: 0vw 1.4vw; width: 95%; margin: auto;">
        <legend><h1><strong>Vote pour la passation</strong></h1>
        </legend>
        <form method="POST" style="padding-bottom: 0.7vw;"><!--Si vous pouvez faire en sorte que la page ne soit accessible qu'en Mars Avril-->

        <?php if($get_user_role=="admin"){?>
            <label> Entrez 2 nouveaux candidats si vous le voulez</label><br><br>
            <label for="candidat1">Candidat 1 : </label><br>
            <input type="text" name="candidat1" placeholder="Candidat 1"><br><br>
    
            <label for="candidat2">Candidat 2 : </label><br>
            <input type="text" name="candidat2" placeholder="Candidat 2"><br><br>

            <button type="submit" name="enregistrer" id="enregistrer" value="Enregistrer"> Enregistrer </button><br>
        <?php
            }

            else{
                // obtention identité candidat1
                $get_c1 = $db->prepare("SELECT candidat1 FROM stock_candidat");
                $get_c1->execute();
                $c1=$get_c1->fetch();
                // obtention identité candidat2
                $get_c2 = $db->prepare("SELECT candidat2 FROM stock_candidat");
                $get_c2->execute();
                $c2=$get_c2->fetch();

            ?>
                <label>Vote pour la passation : </label><br><br>

                <input type="radio" id="vote1" name="vote" value="vote1" required><label for="vote1"> <?php echo $c1["candidat1"]; ?></label>
                <input type="radio" id="vote2" name="vote" value="vote2" required><label for="vote2"> <?php echo $c2["candidat2"]; ?></label><br><br>
                <button type="submit" name="valider_vote" id="valider_vote" value="Valider"> Valider votre choix </button>
            <?php
            }
            include 'includes/admin_passation.php';
            include 'includes/vote.php';
        ?>
          
          
        </form>
        
    
    </fieldset>
    
    </div>

    <?php include 'includes/footer.php';?>







</body>