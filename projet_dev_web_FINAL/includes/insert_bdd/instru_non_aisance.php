<?php
    $user_query = $db->prepare("INSERT INTO user(pseudo, nom, prenom, password, email, gender, birth_date, instrument, instru_selected, cours_musique, concert, aisance) VALUES(:pseudo, :nom, :prenom, :password, :email, :gender, :birth_date, :instrument, :instru_selected,:cours_musique, :concert, :aisance)");
    $user_query->execute([

        //info relié à l'utilisateur
        'pseudo' => $pseudo,
        'nom' => $nom,
        'prenom' => $prenom,
        'password' => $hashpass,
        'email' => $email,
        'gender' => $gender,
        'birth_date' => $birth_date,

        //info relié à la musique user
        'instrument' => $choix_jouer_instru,
        'instru_selected' => $selectInstr,
        'cours_musique' => $cours,
        'concert' => $concert,
        'aisance' => $aisance
    ]);
    
?>