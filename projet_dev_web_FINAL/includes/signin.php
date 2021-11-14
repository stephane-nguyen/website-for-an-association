<?php

if(isset($_POST['formsignin'])){

    //évite d'écrire tous les $_POST['variable'] 
    extract($_POST);

    //si mdp=confirmer mdp
    if($mdp == $cmdp){
        $options = [
            'cost' => 12,
        ];
        
        //cryptage, hashage de mot de passe à l'aide de BCRYPT
        $hashpass = password_hash($mdp, PASSWORD_BCRYPT, $options);
        
        //on regarde si le pseudo ou l'email n'est pas déjà présent dans la bdd
        $c_email = $db->prepare("SELECT email FROM user WHERE email = :email");
        $c_email ->execute(['email' => $email]);

        $c_pseudo = $db->prepare("SELECT pseudo FROM user WHERE pseudo = :pseudo");
        $c_pseudo ->execute(['pseudo' => $pseudo]);

        $result_email = $c_email->rowCount();
        $result_pseudo = $c_pseudo->rowCount();

        // 0 = email/pseudo n'existe pas dans la BDD
        if($result_pseudo==0){
            if($result_email==0){
                
                //insérer info de la personne dans la database
                
                if ($choix_jouer_instru == "oui"){

                    if($selectInstr == "Autre"){


                        if(!empty($autreInstru)){


                            if ($aisance == "oui"){
                                include 'insert_bdd/autreInstru_tout_oui.php';
                                echo "Votre inscription étant finalisée vous pouvez, si vous le souhaitez, faire un don à notre association afin de nous permettre d'acheter de nos nouveaux instruments.";
                              
                            }
                            else{
                                include 'insert_bdd/autreInstru_non_aisance.php';
                                echo "Votre inscription étant finalisée vous pouvez, si vous le souhaitez, faire un don à notre association afin de nous permettre d'acheter de nos nouveaux instruments.";
                              
                            }


                        }
                        else{
                            echo "Veuillez entrez votre autre instrument dans la zone de saisie affichée";
                            
                            exit();
                        }


                    }

                    else{
                        if ($aisance == "oui"){
                            include 'insert_bdd/instru_aisance.php';
                            echo "Votre inscription étant finalisée vous pouvez, si vous le souhaitez, faire un don à notre association afin de nous permettre d'acheter de nos nouveaux instruments.";
                          
                        }
                        else{
                            include 'insert_bdd/instru_non_aisance.php';
                            echo "Votre inscription étant finalisée vous pouvez, si vous le souhaitez, faire un don à notre association afin de nous permettre d'acheter de nos nouveaux instruments.";
                          
                        }
                    }
                }


                else{
                    include 'insert_bdd/pasInstru.php';
                    echo "Votre inscription étant finalisée vous pouvez, si vous le souhaitez, faire un don à notre association afin de nous permettre d'acheter de nos nouveaux instruments.";
                  
                }
            }
            else{
                echo "Cet email existe déjà";
            }

          
        }
        
        else{
            echo "Ce pseudo existe déjà";
        }
    }
    else{
        echo "Les mdp sont différents. Veuillez réessayer";
    }
}
?>

