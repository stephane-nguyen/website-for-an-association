<?php 
session_cache_limiter('private_no_expire, must-revalidate');
session_start();


include '../utilitaires/database.php';
global $db;
include '../utilitaires/get_role.php';

if($get_user_role == "admin"){
    $del_q = $db->prepare("DELETE FROM user WHERE pseudo = :pseudo");
    $del_q->execute(['pseudo'=> $_GET['pseudo']]);
    echo $_GET['pseudo']." a été supprimé de la base de donnée";
    //redirection vers page d'accueil au bout de 2s
    header( "refresh:2;url=../../page_daccueil.php" );
}
else{
    header('Location: ../../page_daccueil.php');
}

?>