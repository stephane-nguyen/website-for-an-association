<?php

    $mail_user = $_POST['lmail'];
    $get_password = $db->prepare("SELECT password FROM user WHERE email = :lmail");
    $get_password->execute(array('lmail'=>$mail_user));
    //convertir résultat en tableau
    $result = $get_password->fetch();
    if($result == true){ //si le compte existe

        $mdp_bdd = $get_password; //on récupère mdp crypté de la bdd
        extract($_POST);

        if($nmdp == $nmdp2){
            if ($mdp_bdd != $nmdp){
                $options = [
                    'cost' => 12,
                ];
        
                //cryptage, hashage de mot de passe à l'aide de BCRYPT
                $hashpass = password_hash($nmdp, PASSWORD_BCRYPT, $options);

                $q1 = $db->prepare("UPDATE user SET password=:password WHERE email=:email");
                $q2 = $q1->execute(array('password' => $hashpass, 'email' =>$mail_user));
            }
    
        }
    
        else{
            echo "Attention votre deux mots de passe entrés ne correspondent pas.";
        }
    }

?>