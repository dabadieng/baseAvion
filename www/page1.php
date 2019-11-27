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
        <div>
            <h1>Gilles Lévy</h1>
            <p><img src="_images/logo.jpg" width="200"></p>
            <address>
                8 rue du champ caché, 98765 MAVILLE<br>
                <a href="mailto:moi@me.com">gilles@me.com</a><br>
                <a href="tel:0601020304">0601020304</a>
            </address>
        </div>
        <p class="moi">
            Je suis conseiller en soin esthétique à l'institut Guinot depuis 2010.<br>
            Je suis passionné par les techniques :
            <ul>
                <li>Gommage du visage</li>
                <li>Maquillage</li>
                <li>Modelage du visage</li>
                <li>Pose de vernis</li>
                <li>Soin du contour des yeux</li>

            </ul>
        </p>
    </div>
    <hr>
    <footer>
        <?php require "../_include/inc_pied.php"; ?>
    </footer>
</body>

</html>