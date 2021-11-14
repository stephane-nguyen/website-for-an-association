<?php 
session_cache_limiter('private_no_expire, must-revalidate');
session_start();?>


<!DOCTYPE html>
<html lang="fr" style="height: 100%">

<head>
    <link rel="icon" href="images/icone.ico" />
    <title>L'Art Scène - Instruments</title>
    <meta charset="utf-8">
    <link href="style_page.css" rel="stylesheet" type="text/css" />
</head>

<style>
    fieldset img {
        width: 10vw;
        margin: 1vw;
        transition: box-shadow 0.5s;
    }
    
    fieldset img:hover {
        box-shadow: 0 1vw 1.2vw 0 #00000044;
    }

    #source, #destination {
        height: 12vw;
        width: 85vw;
        border: 1px lightgray solid;
        border-radius: 1.4vw;
    }

    fieldset button {
        cursor: pointer; 
        display: grid; 
        float: left;
        background-color: #26446e;
        border: none;
        padding: 0.5vw 1.5vw;
        margin: 0.4vw 0.2vw;
        opacity: 0.6;
        transition: 0.3s opacity;
        color: lightgray;
	    font-size: 0.9vw;
    }

    button:hover, input:hover {
        opacity: 1;
    }
</style>

<?php
    include 'includes/utilitaires/database.php';
    global $db;
?>

<body onload="init_img(), ajouterOnClick()">
    <div style="min-height:100%; margin: 0 auto -8vw; ">
        <?php include 'includes/header.php';?>


        <?php
            include 'includes/menu_utilisateur_connexion.php';
        ?>

        <div style="padding-top: 5vw;">&ensp;</div>
        
        <br><br>
    
        <fieldset style="border-radius: 1.4vw; padding: 0vw 1.4vw; width: 95%; margin: auto; padding-bottom: 0.7vw">
            <legend><h1><strong>Instrument à disposition</strong></h1></legend>
            <form method="POST">
                <label>Liste des instruments à disposition : (vous ne pouvez qu'en emprunter un seul)</label><br>
                <input id="basse" type="radio" name="instruments" value="basse" required><label for="basse">Basse<br></label>
                <input id="guitare_elec1" type="radio" name="instruments" value="guitare_elec1" required><label for="guitare_elec1">Guitare électrique 1<br></label>
                <input id="guitare_elec2" type="radio" name="instruments" value="guitare_elec2" required><label for="guitare_elec2">Guitare électrique 2<br></label>
                <input id="guitare_acou" type="radio" name="instruments" value="guitare_acou" required><label for="guitare_acou">Guitare acoustique<br></label>
                <input id="clavier1" type="radio" name="instruments" value="clavier1" required><label for="clavier1">Clavier 1<br></label>
                <input id="clavier2" type="radio" name="instruments" value="clavier2" required><label for="clavier2">Clavier 2<br></label>
                <input id="percu" type="radio" name="instruments" value="percu" required><label for="percu">Percussion (à voir avec les membres du bureau)<br><br></label>
                
                <button type="submit" name="valider_emprunt" id="valider_emprunt" value="Valider"> Confirmer l'emprunt </button>
                <br><br><br>


            </form>
            <br>
            <?php

            //init table with only no instruments if table "instru_dispo" is empty
            $q_no_instru = $db->prepare("SELECT * FROM instru_dispo");
            $q_no_instru->execute();
            $result_no_instru = $q_no_instru->rowCount();
            $no = "non";
            if($result_no_instru==0){
                //$update_availability = $db->prepare("UPDATE instru_dispo SET basse = :basse, guitare_electrique1=:guitare_electrique1, guitare_electrique2=:guitare_electrique2, guitare_acoustisque=:guitare_acoustisque, clavier1=:clavier1, clavier2=:clavier2, percussion=:percussion");
                $insert_no = $db->prepare("INSERT INTO instru_dispo(basse,guitare_electrique1, guitare_electrique2, guitare_acoustique, clavier1, clavier2, percussion) VALUES(:basse,:guitare_electrique1, :guitare_electrique2, :guitare_acoustique, :clavier1, :clavier2, :percussion)");
                $init_no=$insert_no->execute([
                    'basse'=> $no,
                    'guitare_electrique1' => $no,
                    'guitare_electrique2' => $no,
                    'guitare_acoustique' => $no,
                    'clavier1' => $no,
                    'clavier2' => $no,
                    'percussion' => $no 
                ]);
            }

    
            //emprunter un instru, donc emprunté = oui 
            if(isset($_POST['valider_emprunt'])){
                $yes = "oui";
                include 'includes/utilitaires/get_role.php';
                if($get_user_role != "admin" && $get_user_role != "membre" && $get_user_role != "membre"){
                    echo '<span style="color:red;font-size: 20px;"> <br><br><br>Seuls les membres, trésoriers et administrateurs peuvent emprunter un instrument</span>';
                }
                else{  
                
                    if($instruments == "basse"){
                        $update_availability = $db->prepare("UPDATE instru_dispo SET basse = :basse");
                        $update_availability->execute(['basse' => $yes]);
            
                    }

                    elseif($instruments == "guitare_elec1"){
                        $update_availability = $db->prepare("UPDATE instru_dispo SET guitare_electrique1 = :guitare_electrique1");
                        $update_availability->execute(['guitare_electrique1' => $yes]);
                        
                    }
                    elseif($instruments == "guitare_elec2"){
                        $update_availability = $db->prepare("UPDATE instru_dispo SET guitare_electrique2 = :guitare_electrique2");
                        $update_availability->execute(['guitare_electrique2' => $yes]);
                    
                    
                    }
                    elseif($instruments == "guitare_acou"){
                        $update_availability = $db->prepare("UPDATE instru_dispo SET guitare_acoustique = :guitare_acoustique");
                        $update_availability->execute(['guitare_acoustique' => $yes]);
                    
                    }
                    elseif($instruments == "clavier1"){
                        $update_availability = $db->prepare("UPDATE instru_dispo SET clavier1 = :clavier1");
                        $update_availability->execute(['clavier1' => $yes]);
                    
                    }
                    elseif($instruments == "clavier2"){
                        $update_availability = $db->prepare("UPDATE instru_dispo SET clavier2 = :clavier2");
                        $update_availability->execute(['clavier2' => $yes]);
                    }
                    elseif($instruments == "percu"){
                        $update_availability = $db->prepare("UPDATE instru_dispo SET percussion = :percussion");
                        $update_availability->execute(['percussion' => $yes]);
                    }
                }
            }
            ?>  



            <!-- instru à rendre -->
            <form method="POST">
            <br><br>
                <label>Liste des instruments à rendre : (vous ne pouvez qu'en emprunter un seul)</label><br>
                <input id="basse_a_rendre" type="radio" name="instruments_a_rendre" value="basse" required><label for="basse_a_rendre">Basse<br></label>
                <input id="guitare_elec1_a_rendre" type="radio" name="instruments_a_rendre" value="guitare_elec1" required><label for="guitare_elec1_a_rendre">Guitare électrique 1<br></label>
                <input id="guitare_elec2_a_rendre" type="radio" name="instruments_a_rendre" value="guitare_elec2" required><label for="guitare_elec2_a_rendre">Guitare électrique 2<br></label>
                <input id="guitare_acou_a_rendre" type="radio" name="instruments_a_rendre" value="guitare_acou" required><label for="guitare_acou_a_rendre">Guitare acoustique<br></label>
                <input id="clavier1_a_rendre" type="radio" name="instruments_a_rendre" value="clavier1" required><label for="clavier1_a_rendre">Clavier 1<br></label>
                <input id="clavier2_a_rendre" type="radio" name="instruments_a_rendre" value="clavier2" required><label for="clavier2_a_rendre">Clavier 2<br></label>
                <input id="percu_a_rendre" type="radio" name="instruments_a_rendre" value="percu" required><label for="percu_a_rendre">Percussion (à voir avec les membres du bureau)<br><br></label>
                <button type="submit" name="valider_rendu" id="valider_rendu" value="Valider"> Rendre l'instrument </button><br><br><br>
            </form>
            

            <?php
                if(isset($_POST['valider_rendu'])){
                    if($get_user_role != "admin"){
                        echo '<span style="color:red;font-size: 20px;"> <br><br><br>Seuls les administrateurs peuvent confirmer le rendu d&#039un instrument</span>';
                    }
                    else{  
                        if($instruments_a_rendre == "basse"){
                            $retour_instru = $db->prepare("UPDATE instru_dispo SET basse = :basse");
                            $retour_instru->execute(['basse' => $no]);
                        }

                        elseif($instruments_a_rendre == "guitare_elec1"){
                            $retour_instru = $db->prepare("UPDATE instru_dispo SET guitare_electrique1 = :guitare_electrique1");
                            $retour_instru->execute(['guitare_electrique1' => $no]);
                        }
                        elseif($instruments_a_rendre == "guitare_elec2"){
                            $retour_instru = $db->prepare("UPDATE instru_dispo SET guitare_electrique2 = :guitare_electrique2");
                            $retour_instru->execute(['guitare_electrique2' => $no]);
                        }
                        elseif($instruments_a_rendre == "guitare_acou"){
                            $retour_instru = $db->prepare("UPDATE instru_dispo SET guitare_acoustique = :guitare_acoustique");
                            $retour_instru->execute(['guitare_acoustique' => $no]);
                        }
                        elseif($instruments_a_rendre == "clavier1"){
                            $retour_instru = $db->prepare("UPDATE instru_dispo SET clavier1 = :clavier1");
                            $retour_instru->execute(['clavier1' => $no]);
                        }
                        elseif($instruments_a_rendre == "clavier2"){
                            $retour_instru = $db->prepare("UPDATE instru_dispo SET clavier2 = :clavier2");
                            $retour_instru->execute(['clavier2' => $no]);
                        }
                        elseif($instruments_a_rendre == "percu"){
                            $retour_instru = $db->prepare("UPDATE instru_dispo SET percussion = :percussion");
                            $retour_instru->execute(['percussion' => $no]);
                        }
                    }
                }
                ?> <br> <br><?php
                //afficher les instruments empruntés
                $retrieve_q = $db->prepare("SELECT * FROM instru_dispo");
                $retrieve_q->execute();
                $retrieve_instru = $retrieve_q->fetch();
                //var_dump($retrieve_instru);
                echo "Basse empruntée : ".$retrieve_instru['basse']."<br>";
                echo "Guitare électrique 1 empruntée : ".$retrieve_instru['guitare_electrique1']."<br>";
                echo "Guitare électrique 2 empruntée : ".$retrieve_instru['guitare_electrique2']."<br>";
                echo "Guitare acoustique empruntée : ".$retrieve_instru['guitare_acoustique']."<br>";
                echo "Clavier 1 emprunté : ".$retrieve_instru['clavier1']."<br>";
                echo "Clavier 2 emprunté : ".$retrieve_instru['clavier2']."<br>";
                echo "Percussion empruntée : ".$retrieve_instru['percussion']."<br>";
            ?>
     

        <br>
        </fieldset>
    </div>

	<script src="instruments.js"></script>
    <div style="padding-top: 7.7vw;">&ensp;</div>

    <?php include 'includes/footer.php';?>
</body>