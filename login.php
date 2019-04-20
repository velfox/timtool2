<?php require_once "./attributes/includes/login.php"; ?>
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
        <section id="acound">
            <section id="acound-box">
            <h1 class="login-title"> login page </h1>
                <section class="acound-box"> 

                    <?php if (isset($errors) && !empty($errors)) { ?>
                        <ul class="errors">
                            <?php for ($i = 0; $i < count($errors); $i++) { ?>
                                <li><?= $errors[$i]; ?></li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                    <section class="loginform">
                        <form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
                            <input class="login-form-username" type="text" placeholder="Enter Username" name="gebruikersnaam" required>

                            <input type="password" placeholder="Enter Password" name="wachtwoord" required>

                            <input class="loginbutton" type="submit" name="submit" value="Login"/>
                        </div>
                    </form>
                    </section>
                </section>
                <section class="settings-box">   
                    <br/> <br/>     
                <img class="logo-timetool" src="attributes/img/timetool.svg" alt="">
                </section>
            </section>
        </section>
        <section id="uren">
                <img class="logo-timetool" src="attributes/img/beta.svg" alt="">
        </section>
</body>
</html>