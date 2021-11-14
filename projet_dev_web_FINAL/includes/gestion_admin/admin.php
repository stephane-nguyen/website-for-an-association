<?php 
session_cache_limiter('private_no_expire, must-revalidate');
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="icon" href="../../images/icone.ico" />
    <title>L'Art Scène - Évènements</title>
    <meta charset="utf-8">
</head>

<style>
    table
    {
        border-collapse: collapse; /* Les bordures du tableau seront collées (plus joli) */
    }
    td
    {
        border: 1px black solid;
    }
    tr {
        border: 5px gray solid;
    }
</style>
<body>
    <table>
    <?php
    include '../utilitaires/database.php';
    global $db;
    include '../utilitaires/get_role.php';

    if($get_user_role == "admin"){
        $qq = $db->query("SELECT * FROM user");
        while($retrieve_user = $qq->fetch()) {
            echo "<tr>";
            echo "<td>Pseudo: ".$retrieve_user['pseudo']."</td>";
            echo "<td>Prénom: ".$retrieve_user['prenom']."</td>";
            echo "<td>Nom: ".$retrieve_user['nom']."</td>";
            echo "<td>Rôle: ".$retrieve_user['role']."</td>";
            echo "<td>"
            ?>
            <!-- mettre pseudo dans url et rediriger vers page  -->
            <td><a href="del_user.php?pseudo=<?php echo $retrieve_user['pseudo']?>" >Supprimer l'utilisateur</a></td>
            <td><a href="changement_role/role_admin.php?pseudo=<?php echo $retrieve_user['pseudo']?>" >Changer rôle: admin</a></td>
            <td><a href="changement_role/role_ancien_membre.php?pseudo=<?php echo $retrieve_user['pseudo']?>" >Changer rôle: ancien membre</a></td>
            <td><a href="changement_role/role_membre.php?pseudo=<?php echo $retrieve_user['pseudo']?>" >Changer rôle: membre</a></td>
            <td><a href="changement_role/role_tresorier.php?pseudo=<?php echo $retrieve_user['pseudo']?>" >Changer rôle: trésorier</a></td>
            <tr>
            <?php
        }
    }
    else{
        header('Location: ../../page_daccueil.php');
    }

    ?>
    </table>
</body>