<?php
    
    if(isset($_POST['formkaraoke'])){
        if(! isset($_SESSION['pseudo'])){
            echo '<span style="color:red;font-size: 20px;"> "Vous ne pouvez pas vous inscrire sans vous être connecté."</span>';
        }
        else{
            $pseudo_user = $_SESSION['pseudo'];
            //vérifier si déjà inscrit à l'évènement
            $event_pseudo_query = $db->prepare("SELECT personne_inscrite FROM karaoke_liste_personne WHERE personne_inscrite = :personne_inscrite");
            $event_pseudo_query ->execute(['personne_inscrite' => $pseudo_user]);
            $check_event_pseudo = $event_pseudo_query->rowCount();
            
            if($check_event_pseudo==0){
                $inscription_karaoke = $db->prepare("INSERT INTO karaoke_liste_personne(personne_inscrite) VALUES(:personne_inscrite)");
                $inscription_karaoke->execute(array('personne_inscrite'=> $pseudo_user));
            }
            else{
                echo "Vous êtes déjà inscrit au karaoke !";?> <br><br>
            <?php
            }

        }
        
    }
            
    if(isset($_POST['formblind_test'])){
        if(! isset($_SESSION['pseudo'])){
            echo '<span style="color:red;font-size: 20px;"> "Vous ne pouvez pas vous inscrire sans vous être connecté."</span>';
        }
        else{
            $pseudo_user = $_SESSION['pseudo'];
            //vérifier si déjà inscrit 
            $event_pseudo_query = $db->prepare("SELECT personne_inscrite FROM blindtest_liste_personne WHERE personne_inscrite = :personne_inscrite");
            $event_pseudo_query ->execute(['personne_inscrite' => $pseudo_user]);
            $check_event_pseudo = $event_pseudo_query->rowCount();
            
            //si pas inscrit
            if($check_event_pseudo==0){
                $inscription_blind_test = $db->prepare("INSERT INTO blindtest_liste_personne(personne_inscrite) VALUES(:personne_inscrite)");
                $inscription_blind_test->execute(array('personne_inscrite'=> $pseudo_user));
            }
            else{
                echo "Vous êtes déjà inscrit au blind test !";?> <br><br>
            <?php
            }
        }
    }

    if(isset($_POST['formconcert'])){
        if(! isset($_SESSION['pseudo'])){
            echo '<span style="color:red;font-size: 20px;"> "Vous ne pouvez pas vous inscrire sans vous être connecté."</span>';
        }
        else{
            $pseudo_user = $_SESSION['pseudo'];
            //vérifier si déjà inscrit
            $event_pseudo_query = $db->prepare("SELECT personne_inscrite FROM concert_liste_personne WHERE personne_inscrite = :personne_inscrite");
            $event_pseudo_query ->execute(['personne_inscrite' => $pseudo_user]);
            $check_event_pseudo = $event_pseudo_query->rowCount();
    
    
            if($check_event_pseudo==0){
                $inscription_concert = $db->prepare("INSERT INTO concert_liste_personne(personne_inscrite) VALUES(:personne_inscrite)");
                $inscription_concert->execute(array('personne_inscrite'=> $pseudo_user));
            }
            else{
                echo "Vous êtes déjà inscrit au concert !";?> <br><br>
            <?php
            }
        }
    }

    if(isset($_POST['formnocturne'])){
        if(! isset($_SESSION['pseudo'])){
            echo '<span style="color:red;font-size: 20px;"> "Vous ne pouvez pas vous inscrire sans vous être connecté."</span>';
        }
        else{
            $pseudo_user = $_SESSION['pseudo'];
            //vérifier si déjà inscrit
            $event_pseudo_query = $db->prepare("SELECT personne_inscrite FROM nocturne_liste_personne WHERE personne_inscrite = :personne_inscrite");
            $event_pseudo_query ->execute(['personne_inscrite' => $pseudo_user]);
            $check_event_pseudo = $event_pseudo_query->rowCount();
    
            if($check_event_pseudo==0){
                $inscription_nocturne = $db->prepare("INSERT INTO nocturne_liste_personne(personne_inscrite) VALUES(:personne_inscrite)");
                $inscription_nocturne->execute(array('personne_inscrite'=> $pseudo_user));
            }
            else{
                echo "Vous êtes déjà inscrit à la nocturne !";?> <br><br>
            <?php
            }
        }
    }
    ?>
    

    <!-- compte des participants  -->
    <h3> Nombre de participants : </h3>
    <?php
    $karaoke_count = "SELECT COUNT(*) FROM karaoke_liste_personne";
    $karaoke_participants = $db->query($karaoke_count)->fetchColumn(); 
    echo 'Karaoké: '.$karaoke_participants;  ?>
    <br>

    <?php
    $blindtest_count = "SELECT COUNT(*) FROM blindtest_liste_personne";
    $blind_test_participants = $db->query($blindtest_count)->fetchColumn(); 
    echo 'Blind Test: '.$blind_test_participants;?>
    <br>

    <?php
    $concert_count = "SELECT COUNT(*) FROM concert_liste_personne";
    $concert_participants = $db->query($concert_count)->fetchColumn(); 
    echo 'Concert: '.$concert_participants;?>
    <br>

    <?php
    $nocturne_count = "SELECT COUNT(*) FROM nocturne_liste_personne";
    $nocturne_participants = $db->query($nocturne_count)->fetchColumn(); 
    echo 'Nocturne: '.$nocturne_participants; ?> <br> <?php


    if(isset($_POST['valid_admin'])){
        extract($_POST);
         //vérifier si déjà date à l'évènement
        $q_date = $db->prepare("SELECT nocturne_date FROM event_date");
        $q_date ->execute(['nocturne_date' => $nocturne_date]);
        $check_date = $q_date->rowCount();
        
        if($check_date!=0){
            echo "Il y a déjà une date pour l'évènement !";?> <br><br><?php
        }
    }

?>

