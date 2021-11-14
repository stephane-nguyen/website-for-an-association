<div id="menu_connexion">
        <?php
            if(empty($_SESSION['pseudo'])){ 
        ?>
                <div id="connexion">
                    <ul>
                        <li>
                            <a id="btnPopupConnexion" onclick="document.getElementById('overlay').style.display='block'; document.getElementById('mdp_oublie').style.display='none';" style="cursor: pointer;">
                            <img src="images/connexion.png" alt="Connexion" style="max-width: 1vw;">
                            Connexion
                            </a>
                        </li>

                        <a></a>
                        <li>
                            <a href="inscription.php">
                            <img src="images/inscription.png" alt="Inscription" style="max-width: 1vw;">
                                Inscription
                            </a>
                        </li>
                        <a></a>
                    </ul>
                </div>

        <?php
            }
            else{ ?>
            <br>
                <div id="deconnexion" style="margin-top: -0.7vw">
                    <ul>
                        <a><?php echo $_SESSION['pseudo']; ?></a>
                        
                        <li>
                            <a onclick="document.getElementById('bouton_deconnexion').click()" target="_blank" style="cursor: pointer;">
                            <img src="images/connexion.png" alt="Deconnexion" style="max-width: 1vw;">
                            Déconnexion
                            </a>
                        </li>
                        <a></a>
                    </ul>
                </div>
                <!-- <form action="includes/deconnexion.php" method="POST"> -->
                <form method="POST">
                    <input type="submit" name="bouton_deconnexion" id="bouton_deconnexion" style="display: none;">
                    <!-- <input type="button" name="bouton_deconnexion" id="bouton_deconnexion" style="display: none;"> -->
                </form>
            <?php
                include 'includes/deconnexion.php';
            }
            ?>



        <div id="overlay" style="display: none;">
            <div id="popup" class="popup" style="margin-left: 0.7vw; margin-top: 0.7vw;">
                <div style="cursor: pointer;" onclick="document.getElementById('overlay').style.display='none';">&times;</div>

                <div class="popup-corps" id="popup-corps">


                    <form method="POST">
                        <label for="lpseudo">Nom d'utilisateur : </label><br>
                        <input type="text" id="lpseudo" name="lpseudo" placeholder="Nom d'utilisateur" required><br><br>
                        <label for="lmdp">Mot de passe :</label><br>
                        <input type="password" id="lmdp" name="lmdp" placeholder="Mot de passe" required><br><br>
                        <button type="submit" value="Valider" name="formlogin" id="formlogin" style="cursor: pointer;"> Connexion </button>
                        <a id="oubli_mdp" onclick="document.getElementById('mdp_oublie').style.display='block'; document.getElementById('overlay').style.display='none';" style="cursor: pointer; font-size: 0.7vw; margin-left: 0.7vw;">
                        Mot de passe oublié ?</a>
                        <br><br>
                    </form>

                    <?php 
                        include 'includes/login.php'; 
                    ?>


                </div>
            </div>
        </div>

        <div id="mdp_oublie" style="display: none;">
            <div id="popup" class="popup" style="margin-left: 0.7vw; margin-top: 0.7vw;">
                <div style="cursor: pointer;" onclick="document.getElementById('mdp_oublie').style.display='none';">&times;</div>

                <div class="popup-corps" id="popup-corps">


                    <form method="POST">
                        <label for="lmail">Adresse e-mail : </label><br>
                        <input type="text" id="lmail" name="lmail" placeholder="Adresse e-mail" required><br><br>
                        
                        <label for="nmdp">Nouveau mot de passe : </label><br>
                        <input id="nmdp" name="nmdp" type="password" pattern="^\S{4,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Le mot de passe doit contenir au moins 4 caractères' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" placeholder="Nouveau mot de passe" required>
                        <br><br>
                        <input id="nmdp2" name="nmdp2" type="password" pattern="^\S{4,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Les deux mots de passe doivent être identiques' : '');" placeholder="Nouveau mot de passe" required>
                        <br><br>
                        <button type="submit" value="Valider" name="validmdp" id="validmp" style="cursor: pointer;"> Valider</button>
                        <a id="reconnexion" onclick="document.getElementById('mdp_oublie').style.display='none'; document.getElementById('overlay').style.display='block';"
                        style="cursor: pointer; font-size: 0.7vw; margin-left: 0.7vw;">
                        Connexion</a>
                        <br><br>
                    </form>

                    <?php 
                        include 'includes/login.php';
                        /* Système d'envoi de mail (impossible car le serveur est en local)
                        if(isset($_POST['lmail'])){
                            // Le message
                            $message = "Lien vers page où changer son mot de passe";

                            // Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
                            $message = wordwrap($message, 70, "\r\n");
                            
                            $headers =  'MIME-Version: 1.0' . "\r\n"; 
                            $headers .= "From: L'Art Scène <lartscene.officiel@gmail.com>" . "\r\n";
                            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
                            // Envoi du mail
                            ini_set("SMTP", "smtp.gmail.com");
                            ini_set('smtp_port',587);
                            ini_set("sendmail_from","<lartscene.officiel@gmail.com>@gmail.com>");

                            mail($_POST['lmail'], 'Nouveau Mot de Passe', $message, $headers);
                        }
                        */
                        if(isset($_POST['validmdp'])){
                            include 'includes/changer_mdp.php';
                        }

                    ?>


                </div>
            </div>
        </div>
    </div>

    <i class="ligne_haut"></i>