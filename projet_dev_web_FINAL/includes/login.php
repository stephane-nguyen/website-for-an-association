<?php
    
    //éviter warning
    //error_reporting(0);

    if (isset($_POST['formlogin'])){
        extract($_POST);

        $get_login_pseudo = $db->prepare("SELECT * FROM user WHERE pseudo = :pseudo");
        $get_login_pseudo->execute(['pseudo' => $lpseudo]);

        //convertir résultat en tableau
        $result = $get_login_pseudo->fetch();
        // var_dump($result);

        if($result == true){ //si le compte existe
            $mdp_bdd = $result['password']; //on récupère mdp crypté de la bdd
            //echo $mdp_bdd;
        
            if (!(password_verify($lmdp, $mdp_bdd))){
                echo "Le mot de passe est incorrect";
            }
            else{
                //on associe la session avec l'utilisateur connecté via le pseudo
                $_SESSION['id'] = $result['id'];
                //echo $_SESSION['id'];
                $_SESSION['pseudo'] = $result["pseudo"];
                //echo gettype($_SESSION['pseudo']);
                //echo "Bienvenue ". $_SESSION['pseudo'];
                header('Location: '.$_SERVER['PHP_SELF']);
            }

        }
        else{
            echo "Le nom d'utilisateur n'existe pas";
        }   
    }


?>