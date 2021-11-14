<?php
    if(isset($_SESSION['pseudo'])){
        $id_user = $_SESSION["id"];
        //echo $id_user;
        $get_role = $db->prepare("SELECT role FROM user WHERE id = $id_user");
        $get_role->execute();
        $role_array=$get_role->fetch();
        $get_user_role=$role_array["role"];
        //echo $get_user_role;
    }
?>