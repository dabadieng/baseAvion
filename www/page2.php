<?php
require "../_include/inc_config.php";
?>
<!DOCTYPE html>
<html>

<head>
    <?php require "../_include/inc_head.php" ?>
</head>

<body>
    <header>
        <?php require "../_include/inc_entete.php" ?>
    </header>
    <nav>
        <?php require "../_include/inc_menu.php"; ?>
    </nav>
    <div id="contenu">
        <h1>Mes formations et diplômes</h1>
        <article>
            <h2>Bac C</h2>
            <span>1984</span>
            <p>
                Mention très passable
            </p>
            <figure>
                <img src="https://i.skyrock.net/6845/58906845/pics/2511265759_small_1.jpg" alt="diplôme du BAC">
                <figcaption>mon diplôme du BAC obtenu en 1984</figcaption>
            </figure>
        </article>
        <article>
            <h2>Centre de formation des esthéticiens</h2>
            <span>de 1990 à 1992</span>
        </article>
        <article>
            <h2>Cours de management au CNAM</h2>
            <span>de mai 2001 à Juillet 2001</span>
        </article>
    </div>
    <hr>
    <footer>
        <?php require "../_include/inc_pied.php"; ?>
    </footer>
</body>

</html>