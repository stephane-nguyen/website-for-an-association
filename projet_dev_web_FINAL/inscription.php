<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="icon" href="images/icone.ico" />
    <title>L'Art Scène - Inscription</title>
    <meta charset="utf-8">
    <link href="style_page.css" rel="stylesheet" type="text/css" />
	<script src="inscription.js"></script>
</head>

<style>
    button {
        cursor: pointer; 
        display: grid; 
        float: left;
        background-color: #26446e;
        border: none;
        padding: 0.5vw 1vw;
        margin: 0.4vw 0.2vw;
        opacity: 0.6;
        transition: 0.3s opacity;
        color: lightgray;
	    font-size: 0.9vw;
    }
    button:hover {
        opacity: 1;
    }
</style>


<body>

    <?php include 'includes/header.php';?>

    <div style="padding-top: 8vw;">&ensp;</div>

    <fieldset style="border-radius: 1.4vw; padding: 0vw 1.4vw; width: 95%; margin: auto;">
        <legend><h1><strong>Inscription</strong></h1>
        </legend>
            
    <form method="POST"> 
        <label for="Nom">Nom : </label><br>
        <input type="text" name="nom" placeholder="Nom" id="nom"required><br><br>

        <label for="Prénom">Prénom : </label><br>
        <input type="text" name="prenom" placeholder="Prénom" id="Prénom" required><br><br>

        <label for="pseudo">Nom d'utilisateur (de 4 à 16 caractères) : </label><br>
        <input type="text" name="pseudo" pattern="[A-Za-z0-9]{4,16}" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Le pseudo doit contenir entre 4 et 16 caractères, sans symboles spéciaux' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" placeholder="Nom d'utilisateur" required><br><br>

        <label for="mdp">Mot de passe :</label><br>
        <input type="password" name="mdp" pattern="^\S{4,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Le mot de passe doit contenir au moins 4 caractères' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" placeholder="Mot de passe" required><br><br>
        <input type="password" name="cmdp" pattern="^\S{4,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Les deux mots de passe doivent être identiques' : '');"  placeholder="Confirmez votre mot de passe" required><br><br>

        <label for="email">Email : </label><br>
        <input type="email" name="email" placeholder="email" id="Email" required><abbr title="madamex@gmail.com">&nbsp;?</abbr><br><br>

        <label>Sexe : </label><br>
        <input type="radio" id="h" name="gender" value="H" required> <label for="h">Homme</label>
        <input type="radio" id="f" name="gender" value="F" required> <label for="f">Femme</label> <br><br>

        <label for="birth_date">Date de naissance : </label><br>
        <input type="date" name="birth_date" id="birth_date" required><br><br>

        <label for="choix_jouer_instru">Jouez vous d'un instrument ?</label><br>
        <input type="radio"  id="non" name="choix_jouer_instru" value="non" id="togg1" required onclick="document.getElementById('d1').style.display = 'none';"><label for="non">Non</label>
        <input type="radio"  id="oui" name="choix_jouer_instru" value="oui" id="togg2" required onclick="document.getElementById('d1').style.display = 'block';"><label for="oui">Oui</label><br><br>

        <div id="d1" style="display:none;">
            <label>Lesquels ?</label><br>
            <select name="selectInstr" id="selectInstr" onclick="autreInstrument();">
                <option>Piano</option>
                <option>Chant</option>	
                <option>Guitare</option>
                <option>Basse</option>	
                <option>Batterie</option>	
                <option>Ukulele</option>
                <option>Flûte</option>	
                <option>Violon</option>
                <option>Autre</option>
            </select><br><br>
        </div>

        <div id="d2" style="display:none;">
        <label>Veuillez indiquer votre instrument :</label><br>
            <textarea name="autreInstru" placeholder="Autre Instrument" id="autreInstru"></textarea><br><br>
        </div>

        <label>Avez vous déjà pris des cours de musiques </label><br>
            <input type="radio" id="non2" name="cours" value="non" required><label for="non2">Non</label>
            <input type="radio" id="oui2" name="cours" value="oui" required><label for="oui2">Oui</label><br><br>

        <label>Avez vous déjà participé à un concert?</label><br>
            <input type="radio" id="non3" name="concert" value="non" required><label for="non3">Non</label>
            <input type="radio" id="oui3" name="concert" value="oui" required><label for="oui3">Oui</label><br><br>

        <label>Vous sentez vous à l'aise sur scène?</label><br>
            <input type="radio" id="non4" name="aisance" value="non" required onclick="document.getElementById('d3').style.display = 'none'";><label for="non4">Non</label>
            <input type="radio" id="oui4" name="aisance" value="oui" required onclick="document.getElementById('d3').style.display = 'block'";><label for="oui4">Oui</label><br><br>

        <div id="d3" style="display:none;">
            <label>Vous vous noteriez combien sur 10?</label><br>
            <select name="note">
                <option>1</option>
                <option>2</option>	
                <option>3</option>
                <option>4</option>	
                <option>5</option>	
                <option>6</option>
                <option>7</option>	
                <option>8</option>
                <option>9</option>
                <option>10</option>
            </select><br><br>
        </div>

        <button type="submit" name="formsignin" id="formsignin" value="Valider"> Envoyer </button>
        <button type="reset" value="Reset" name="reset"> Annuler </button> <br><br>

    </form> <br>
    <?php
        include 'includes/utilitaires/database.php';
        global $db;
        include 'includes/signin.php';
    ?>

    </fieldset>

    <div style="padding-top: .5vw;">&ensp;</div>
    
    <?php include 'includes/footer.php';?>







</body>