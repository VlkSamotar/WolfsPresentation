<?php

require "classes/Url.php";
require "classes/Validate.php";

session_start();

$date = new DateTime();
$aktualDate = $date->format("Y");
$name = "";
$email = "";
$phone = "";
$message = "";

if (isset($_SESSION["name"]) && $_SESSION["name"] != "" && isset($_SESSION["email"]) && $_SESSION["email"] != "" && isset($_SESSION["phone"]) && $_SESSION["phone"] != "" && isset($_SESSION["message"]) && $_SESSION["message"] != "") {
    $name = $_SESSION["name"];
    $email = $_SESSION["email"];
    $phone = $_SESSION["phone"];
    $message = $_SESSION["message"];
}

$questions = Validate::$questions;
$answers = Validate::$answers;
$line = Validate::random($questions, $answers);
$question = $questions[$line];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-PXH88PLQ');</script>
    <!-- End Google Tag Manager -->


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="title" content="Vlkovy projekty" />
    <meta name="description" content="Jsem kutil a nadšenec do technologií. Podívejte se na mé projekty." />

    <meta property="og:title" content="Vlkovy projekty">
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Jsem kutil a nadšenec do technologií. Podívejte se na mé projekty.">
    <meta property="og:image" content="<?= Url::getBaseUrl() . '/img/baseSocialView.png' ?>">
    <meta property="og:url" content="<?= Url::getFullUrl() ?>">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/queryes.css">
    <link rel="shortcut icon" href="./img/Wolf.ico" type="image/x-icon">

    <title>Vlkovy projekty</title>
</head>

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PXH88PLQ" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <?php require "assets/userMessage.php" ?>

    <header>
        <nav>
            <ul>
                <li><a href="https://microsite.vlk-samotar.cz/" target="_blank">Microsite</a></li>
                <li><a href="https://orderingsystem.vlk-samotar.cz/" target="_blank">Sklad</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            <section class="introduction">
                <h1 class="mainHeader">Vlk samotář</h1>
                <p>Vítejte na jednom z Vlkových webů. Tento konkrétně slouží jako ukázka aplikace technologií, které
                    používám. Převážně, protože zde používám
                    hosting na Linuxových serverech, se jedná o PHP, JavaScript, HTML/CSS, SCSS, WordPress a podobně.
                    Více se dočtete na mém blogu, který běží pro
                    změnu na Windowsovských serverech a používá technologii ASP.NET CORE:</p>
                <a href="https://vlksamotar.cz/" target="_blank" class="blogLink">vlksamotar.cz</a>
            </section>

            <section class="contact">
                <h1 class="sectionHeader">Napište mi...</h1>
                <form action="assets/mailer.php" method="post">
                    <input type="text" name="name" placeholder="Jméno a příjmení" value="<?= htmlspecialchars($name) ?>"
                        required>
                    <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($email) ?>"
                        required>
                    <input type="tel" name="phone" placeholder="Telefon" value="<?= htmlspecialchars($phone) ?>"
                        required>
                    <textarea name="message" placeholder="Moje zpráva"
                        required><?= htmlspecialchars($message) ?></textarea>
                    <label for="controlQuestion">Odpověz slovy...</label>
                    <input type="text" name="question" id="controlQuestion" placeholder="<?= $question ?>" required>
                    <input type="hidden" name="line" value="<?= $line ?>">
                    <input type="submit" value="Odeslat">
                </form>
            </section>
        </div>
    </main>
    <footer>
        &copy;
        <?= $aktualDate ?> Vlk samotář
    </footer>

    <script src="./js/messageBox.js"></script>

</body>

</html>