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

<body>
    <section id="s1" class="container">
        Select acound
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