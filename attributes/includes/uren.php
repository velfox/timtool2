<?php
    require_once "./attributes/includes/db.php";
    require_once "./attributes/includes/functions.php";

    if (isset($_SESSION["user"])) { 
        $userid = $_SESSION["id"];
    }
    
    $bestede_tijd_totaal = 0;
    $sql = "SELECT * FROM besteding WHERE user_id = $userid";
    $results2 = $db->query($sql);
    $totaal = "00:00:00";
    if ($results2->num_rows > 0) {  ?> 
        <section class="uren">
        <table>
        <TR> <TH>Datum</TH> <TH>Opdrachtgever</TH> <TH>Taak</TH> <TH>Tijd</TH> </TR> <?php
        while ($urendata = $results2->fetch_assoc()) {
                $iduren = $urendata["id"];
                $datum = $urendata["datum"];
                $bestede_tijd = $urendata["bestede_tijd"];
                $opdrachtgever_id = $urendata["opdrachtgever_id"];
                $uren_beschrijfing = $urendata["discription"];
                $totaal = RekenUrenUit("$bestede_tijd", "$totaal");
            ?>

                <TR> 
                    <TD><?= $datum ?></TD> 
                    <TD><?= $opdrachtgever_id ?></TD> 
                    <TD><?= $uren_beschrijfing ?></TD> 
                    <TD><?= $bestede_tijd ?></TD>
                </TR>
            
        <?php }
            
            ?>  </table><?php
            $urentotaal = (RekenUrenUit("uren", "$totaal"));

    } else {
        echo "Geen uren voor deze opdracht gever gevonden!? ";
    }
