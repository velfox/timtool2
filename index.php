<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="attributes/css/reset.css">
    <link rel="stylesheet" href="attributes/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico|Roboto|Staatliches" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <title>⏱ 𝕿𝖎𝖒𝖊𝕿𝖔𝖔𝖑 🦊</title>

</head>

<?php require_once "./attributes/includes/loginchek.php"; ?>

<body>                   
    <section id="s1" class="container">
        <section id="acound">
            <section id="acound-box">
                <section class="acound-box"> 
                    <section class="user-img"></section>
                    <section class="username"> 😃 Tim </section><section class="username"> ⚙️ </section>
                    <form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
                    <input type="submit" name="loguit" value="loguit"/>
                    </form>
                </section>
                <section class="settings-box"> 
                    <section id="button-boxmenu-1" class="setting-box"> <p class="big-icon">⏱</p> Uren overzicht </section>       
                    <section id="button-boxmenu-2" class="setting-box big"> <p class="big-icon">➕ ⏱ </p> Nieuwe Timer </section>
                    <section id="button-boxmenu-3" class="setting-box"> <p class="big-icon"> 💼 </p>  Beheer opdrachtgevers </section>
                </section>
            </section>
        </section>
        <section class="main-options-box" id="urenoverzicht">
            <section id="menu-uren" calss="uren-options"> <button id="herlaadtabel"> ⟲ Herladen </button> <button button class="bv" id="herlaadtabel"> 💾 save als PDF </button> 
            <button button class="bv" id="herlaadtabel"> < </button> <div class="maand" id="maand"> Maart 2019 </div> <button button class="bv" id="herlaadtabel"> > </button>  </section>
            <section id="uren-tabel" class="uren-tabel">
                <?php require_once "./attributes/includes/uren.php"; 
                $urentotaal = (RekenUrenUit("uren", "$totaal")); ?>
                </section>
                <table> <tr> <th> Urentotaal </th> </tr> <tr> <td> <?= $totaal ?> :   <?= $urentotaal ?> </td> </tr> </table>
            </section>
        </section>
        <section class="main-opstions-box" id="addopdrachgever">
            <section id="menu-uren" calss="uren-options"> <button id="herlaadtabel"> toevoegen </button> <div class="maand" id="maand"> 💼 opdrachtgevers </div>  <button button class="bv" id="herlaadtabel"> verwijderen </button> 
           </section>   
                <section class="addopdrachtgever">
                    <form id="addopdrg" enctype="multipart/form-data">
                            <label for="uname"><b> opdrachtgever naam </b></label>
                            <input type="text" id="opdr-name" placeholder="opdrachtgever" name="opdrachtgever" required>

                            <label for="psw"><b> beschrijving </b></label>
                            <input type="text" id="opdr-berschijfing" placeholder="berschrijving" name="berschijfing" required>
                                
                            <label for="psw"><b> logo </b></label>
                            <input type="file" name="Logo Opdrachtgever" id="fileToUpload">
                            
                            <section id="opdrachtgevertoevoegen">
                                <div id="uploudopdrachtgeveruitvoeren"> toevoegen </div>
                            </section>
                    </form>

                    <section class="opdrachtgever" id="demobox">
                        <section class="opdr-name" id="demobox-name"> zaalhetlokaal </section>
                        <section class="opdr-beschijfing" id="logodemo" style="background-image: url(/attributes/img/logo/zaal.png);"> </section>
                        <section class="opdr-disck2" id="demobox-beschrijfing"> lolwnee </section>      
                    </section>


                </section>
            </section>
        </section> 
    </section>

    <!-- start setup timer -->
    <section id="s2" class="container">
        <?php require_once "./attributes/includes/selectuser.php"; ?>
        <div class="vhc">
            <section id="selecteer-opdrachtgever">
                <div class="title-box">
                    <p class="p1"> selecteer opdrachtgever </p>
                </div>
                <section class="opdrachtgevers">
                    <?php require_once "./attributes/includes/selectopdrachtgever.php"; ?>
                </section>
            </section>

            <section id="selecteer-beschijfing">
                <div class="title-box">
                    <p class="p1"> Beschrijf de taak en druk op enter </p>
                </div>
                <form id="taskfieldform" onsubmit="event.preventDefault();">
                    <input id="taskfield" type="text" name="task" placeholder="Beschijf hier de taak">
                </form>
            </section>
        </div>
    </section>

    <!-- start timer section -->
    <section id="s3" class="container">
        <div class="vhc2">
            <section id="timerbox" class="stopwatch timerbox">
                <section class="row">
                    <section id="timerlogo" class="casus-name"> </section>
                    <section id="timer"> 00 : 00 : 00 </section>
                    <section class="stopwatch-buttons">
                        <button id="toggel" class="mb"> Start </button>
                        <button id="reset-timer"> reset </button>
                    </section>
                </section>
                <section class="row">
                    <section id="task" class="casus-disk">
                        <p id="opdrachtgever"> test </p>
                        <p id="taskd"> bescrijfing opdracht hier! </p>
                    </section>
                    <div class="saveplaceholder">
                        <button id="save-timer"> save </button>
                    </div>
                </section>
            </section>
        </div>
    </section>

    <script src="/attributes/scripts/stopwatch.js"></script>
    <script src="/attributes/scripts/global.js"></script>

</body>

</html>