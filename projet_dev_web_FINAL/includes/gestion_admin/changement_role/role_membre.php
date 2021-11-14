<?php 
session_cache_limiter('private_no_expire, must-revalidate');
session_start();


include '../../utilitaires/database.php';
global $db;
include '../../utilitaires/get_role.php';

if($get_user_role == "admin"){
    $role = "membre";


    $del_q = $db->prepare("UPDATE user SET role = :role WHERE pseudo = :pseudo");
    $del_q->execute([
        'role' => $role,
        'pseudo' => $_GET['pseudo']
    ]);

    echo "le role a été modifié";
    //redirection vers page d'accueil au bout de 2s
    header( "refresh:2;url=../../../page_daccueil.php" );
}
else{
    header('Location: ../../../page_daccueil.php');
}

?>