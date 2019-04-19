<?php
session_start();

if(isset($_SESSION["user"])){
  require_once "db.php";
  require_once "functions.php";

//select opdracht gevers ids die bij klant horen uit koppel tabel
    if (isset($_SESSION["user"])) { 
        $userid = $_SESSION["id"];
    }

    $sql = "SELECT * FROM opdrachtgevers_users WHERE user_id = $userid";
    $results = $db->query($sql);

    if ($results->num_rows > 0) {
    // output data of each row
        while ($result = $results->fetch_assoc()) {

            $id = $result["opdrachgever_id"];
            //select opdracht gevers op id's die bij persoon horen
            $sql = "SELECT * FROM opdrachtgevers WHERE id = $id";
            $results2 = $db->query($sql);


            if ($results2->num_rows > 0) {
                // output data of each row
                while ($result2 = $results2->fetch_assoc()) {
                        $name = $result2["name"];
                        $img = $result2["img"];
                        $beschijfing = $result2["beschijfing"];
                        $idopdr = $result2["id"];
                    ?>
                    <section class="opdrachtgever-edit">
                        <section class="opdr-name"> <?= $name ?> </section>
                        <section class="opdr-beschijfing" style="background-image: url(/attributes/img/logo/<?= $img ?>);"> </section>
                        <section class="opdr-disck2"> <?= $beschijfing ?> </section>
                        <section class="deleteopdrgever" id="d<?= $idopdr ?>"> 🗑 Verweirderen  </section>
                    </section>
                <?php }

            } else {
                echo "opdrachgever result not found";
            }

        }
    } else {
        echo "opdrachtgever id not found";
    }
}