<?php
require "../_include/inc_config.php";
$sql="select * from ville";
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
        <h1>Liste des villes</h1>      
        <table>
            <caption>
                <a href="ville_edit.php?id=0">Créer une nouvelle ville</a>
            </caption>
            <thead>
                <tr>
                    <th>vi_id</th>
                    <th>vi_nom</th>
                    <th>modifier</th>
                    <th>supprimer</th>
                </tr>
            </thead>
            <tbody>
            <?php
                while ($row=mysqli_fetch_assoc($result)) {
                    $row=array_map("cb_htmlentities",$row);
                    extract($row);
                    echo "<tr>";
                    echo "<td>$vi_id</td>";
                    echo "<td>$vi_nom</td>";                    
                    echo "<td><a href='ville_edit.php?id=$vi_id'>modifier</a></td>";
                    echo "<td><a href='ville_delete.php?id=$vi_id'>supprimer</a></td>";
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