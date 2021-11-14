<?php
if(isset($_POST['valider_vote'])){
    if(! isset($_SESSION['pseudo'])){
        echo "Vous ne pouvez pas voter sans vous être connecté.";
    }
    else{
        
        $pseudo_user = $_SESSION['pseudo'];


        $vote1_pseudo_query = $db->prepare("SELECT pseudo FROM vote1_user WHERE pseudo = :pseudo");
        $vote2_pseudo_query = $db->prepare("SELECT pseudo FROM vote2_user WHERE pseudo = :pseudo");

            //vérifier si déjà voté 
        $vote1_pseudo_query ->execute(['pseudo' => $pseudo_user]);
        $check_vote1_pseudo= $vote1_pseudo_query->rowCount();

        $vote2_pseudo_query ->execute(['pseudo' => $pseudo_user]);
        $check_vote2_pseudo= $vote2_pseudo_query->rowCount();

        //si pas voté alors
        if($check_vote1_pseudo == 0 && $check_vote2_pseudo == 0){
            $vote = $_POST['vote'];
            if($vote == "vote1"){
                $only_vote1 = $db->prepare("INSERT INTO vote1_user(pseudo) VALUES(:pseudo)");
                $only_vote1 ->execute(['pseudo' => $pseudo_user]);
            }
            else{
                $only_vote2 = $db->prepare("INSERT INTO vote2_user(pseudo) VALUES(:pseudo)");
                $only_vote2 ->execute(['pseudo' => $pseudo_user]);
            }
        }
        else{
            echo '<span style="color:red;font-size: 20px;"> "Vous avez déjà voté !"</span>';?>
            <br><br>
        <?php
        }
    }
    
}
?>

<!-- compte des votes  -->
<h3> Nombres de votes : </h3>

<?php
$vote1_count = "SELECT COUNT(*) FROM vote1_user";
$vote2_count = "SELECT COUNT(*) FROM vote2_user";


$vote1_total = $db->query($vote1_count)->fetchColumn(); 
$vote2_total = $db->query($vote2_count)->fetchColumn();  


if($vote1_total > $vote2_total){
    echo '<span style="color:red;font-size: 20px;">Vote 1 est sur le point de gagner <br></span>'; 
}
elseif($vote1_total < $vote2_total){
    echo '<span style="color:red;font-size: 20px;">Vote 2 est sur le point de gagner <br></span>'; 
}
else{
    echo '<span style="color:red;font-size: 20px;">Les deux candidats ont autant de votes chacun <br></span>'; 
}


echo 'Vote 1: '.$vote1_total."<br>"; 
echo 'Vote 2: '.$vote2_total;
?>