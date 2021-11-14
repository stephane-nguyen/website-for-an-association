<?php
if(isset($_POST['bouton_deconnexion'])){
        //Free all session variables
        session_unset();

        session_destroy();
        header('Location: '.$_SERVER['PHP_SELF']);
}



?>
