<?php
//error_reporting(0);
include 'includes/utilitaires/get_role.php';

if(isset($_POST['formdelivery'])){
    if($get_user_role != "admin" && $get_user_role != "membre" && $get_user_role != "ancien_membre" && $get_user_role != "trésorier"){
        echo '<span style="color:red;font-size: 20px;"> <br><br><br>Seuls les personnes ayant un compte peuvent acheter un pull</span>';
    }
    else{
        $shop_data = [
            'id' => $id_user,
            'city' => $city,
            'address' => $address,
            'delivery_type' => $delivery,
            'size' => $size,
            'sweater_material' => $sweater_material
        ];

        //requête
        $insert = "INSERT INTO location_user(id, city, address, delivery_type, size, sweater_material) VALUES(:id, :city, :address, :delivery_type, :size, :sweater_material)";
        $delivery_query = $db->prepare($insert)->execute($shop_data);
        echo "<br> <br> <br> Commande effectuée ! ";
    }
}

?>