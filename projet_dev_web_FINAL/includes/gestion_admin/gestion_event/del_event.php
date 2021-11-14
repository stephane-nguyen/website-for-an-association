<?php 
session_cache_limiter('private_no_expire, must-revalidate');
session_start();


include '../../utilitaires/database.php';
global $db;
include '../../utilitaires/get_role.php';

if($get_user_role == "admin"){
    $del_event_q = $db->prepare("DELETE FROM event_date");
    $del_event_q->execute();
    echo "toutes les dates ont été supprimées de la base de donnée";
    //redirection vers page d'accueil au bout de 2s
    header("refresh:2;url=../../../page_daccueil.php");
}
else{
    header('Location: ../../../page_daccueil.php');
}

?>