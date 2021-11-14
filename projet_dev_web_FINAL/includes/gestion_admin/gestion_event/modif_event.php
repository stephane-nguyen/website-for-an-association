<?php
    if(isset($_POST['valid_admin'])){
        extract($_POST);

        $event_data = [
            'karaoke_date'=> $karaoke_date,
            'blindtest_date'=> $blind_test_date,
            'concert_date'=> $concert_date,
            'nocturne_date'=> $nocturne_date
        ];

        //verification si pas donnée pour insert into
        $date_check = $db->prepare("SELECT karaoke_date FROM event_date");
        $date_check ->execute();
        $check_date = $date_check->rowCount();
    
        //mise à jour des dates
        if($check_date!=0){
            $sql = "UPDATE event_date SET karaoke_date=:karaoke_date, blindtest_date=:blindtest_date, concert_date=:concert_date, nocturne_date=:nocturne_date";
            $date_query = $db->prepare($sql)->execute($event_data);
            echo "Les dates ont été mises à jour !";
        }
        //insertion des dates
        else if($check_date==0){
            $date_bdd_query = "INSERT INTO event_date(karaoke_date, blindtest_date, concert_date, nocturne_date) VALUES(:karaoke_date, :blindtest_date, :concert_date, :nocturne_date)";
            $date_query = $db->prepare($date_bdd_query)->execute($event_data);
            echo "Les dates ont été correctement insérées";
        }
        else {
            echo 'Veuillez bien organiser toutes les dates'  ?>  <br>
            <a style="text-decoration: underline; "href="includes/gestion_admin/gestion_event/del_event.php">Supprimer toutes les dates</a><br>
            <div style="display:none;"> <?php $e->getMessage(); ?></div><br> 
           <?php
        }
    }
?>