<?php 

                 
if(isset($_POST['enregistrer'])){
    extract($_POST);
    
    $q = $db->prepare("SELECT candidat1, candidat2 FROM stock_candidat");
    $q ->execute();
    $check_candidat = $q->rowCount();

    if($check_candidat==0){
        $candidat_q = $db->prepare("INSERT INTO stock_candidat(candidat1, candidat2) VALUES(:candidat1, :candidat2)");
        $candidat_q ->execute(['candidat1'=>$candidat1, 'candidat2'=>$candidat2]);
        echo "premiers candidats enregistrés <br>";
      
    }
    else{
        $q_update = "UPDATE stock_candidat SET candidat1=:candidat1, candidat2=:candidat2";
        $update_bdd = $db->prepare($q_update);
        $update_bdd->execute(['candidat1'=>$candidat1, 'candidat2'=>$candidat2]);
        echo "nouveaux candidats enregistrés <br>";

        //delete data from vote1_user and vote2_user to reset the score 
        $q_del = "DELETE FROM vote1_user";
        $q_del_bdd= $db->prepare($q_del)->execute();
        $q_del2 = "DELETE FROM vote2_user";
        $q_del2_bdd= $db->prepare($q_del2)->execute();
    }
}
?>