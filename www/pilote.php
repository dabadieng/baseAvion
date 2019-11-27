<?php
require "../_include/inc_config.php";
$sql="select * from pilote,ville where pi_site=vi_id";
//exécution d'une requete
$result = mysqli_query($link, $sql);
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
        <h1>Liste des pilotes</h1>      
        <table>
            <caption>
                <a href="pilote_edit.php?id=0">Créer un nouveau pilote</a>
            </caption>
            <thead>
                <tr>
                    <th>pi_id</th>
                    <th>pi_nom</th>
                    <th>pi_site</th>
                    <th>modifier</th>
                    <th>supprimer</th>
                </tr>
            </thead>
            <tbody>
            <?php
                while ($row=mysqli_fetch_assoc($result)) {
                    //htmlentities échappe les caractères spéciaux du HTML
                    $row=array_map("cb_htmlentities",$row);
                    extract($row);
                    echo "<tr>";
                    echo "<td>$pi_id</td>";
                    echo "<td>$pi_nom</td>";
                    echo "<td>$vi_nom</td>";
                    echo "<td><a href='pilote_edit.php?id=$pi_id'>modifier</a></td>";
                    echo "<td><a href='pilote_delete.php?id=$pi_id'>supprimer</a></td>";
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
    <hr>
    <footer>
        <?php require "../_include/inc_pied.php"; ?>
    </footer>
</body>

</html>