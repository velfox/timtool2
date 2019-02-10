<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="attributes/css/reset.css">
    <link rel="stylesheet" href="attributes/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico|Roboto|Staatliches" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <section id="s1" class="container">
        Select acound
    </section>
    <section id="s2" class="container">
    <?php
    require_once "./attributes/includes/db.php";

    $sql = "SELECT * FROM users WHERE username = 'tim' ";
    $results = $db->query($sql);

    //get user id
    if ($results->num_rows > 0) {
        // output data of each row
        while($result = $results->fetch_assoc()) {
    
            $id = $result["id"];

        }} else {
            echo "user id not found";
        }

    //select opdracht gevers ids die bij klant horen uit koppel tabel
    $sql = "SELECT * FROM opdrachtgevers_users WHERE user_id = $id ";
    $results = $db->query($sql);

    if ($results->num_rows > 0) {
        // output data of each row
        while($result = $results->fetch_assoc()) {
                
                $id = $result["opdrachgever_id"];
                //select opdracht gevers op id's die bij persoon horen
                $sql = "SELECT * FROM opdrachtgevers WHERE id = $id ";
                $results2 = $db->query($sql);
            
                if ($results2->num_rows > 0) {
                    // output data of each row
                    while($result2 = $results2->fetch_assoc()) {
                        $name = $result2["name"];
                        $img = $result2["img"];
                        $beschijfing = $result2["beschijfing"];
                        $idopdr = $result2["id"];

                        ?>
                        <section class="opdrachtgever" id="<?= $idopdr ?>">
                            <section class="opdr-name"> <?= $name ?> </section>
                            <section class="opdr-beschijfing"> <?= $beschijfing ?> </section>
                        </section> <?php
                    }
                } else {
                        echo "opdrachgever result not found";
                    }

            }
        } else {
                echo "opdrachtgever id not found";
            }



        

    // $sql = "SELECT * FROM users WHERE username = 'tim' ";
    // $result = $db->query($sql);

    ?>
        select klant
    </section>
    <section id="s3" class="container">
        <section class="stopwatch timerbox">
        <section class="casus-name"> logo here! </section>
        <section id="timer"> 00 : 00 . 000 </section>
        <section class="stopwatch-buttons">
            <button id="toggel" class="mb"> Start </button>
            <button id="reset-timer"> reset </button>
        </section>
    </section>

    <script src="/attributes/scripts/stopwatch.js"></script>
    <script src="/attributes/scripts/global.js"></script>
</body>
</html>