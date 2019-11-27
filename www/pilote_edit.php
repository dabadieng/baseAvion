<?php
require "../_include/inc_config.php";
if (isset($_POST["btsubmit"])) {
    //échappe les caractères spéciaux du SQL
    $_POST=array_map("cb_mres",$_POST);
    extract($_POST);  
    if ($pi_id==0)
        $sql = "insert into pilote values (null,'$pi_nom','$pi_site')";
    else
        $sql = "update pilote set pi_nom='$pi_nom',pi_site='$pi_site' where pi_id=$pi_id";        
    
    if (!mysqli_query($link, $sql)) {
        echo "<p>$sql</p>";
        echo mysqli_error($link);
        exit;
    }

    header("location:pilote.php");
} else {
    extract($_GET);
    if ($id > 0) { //UPDATE
        $sql = "select * from pilote where pi_id=$id";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);
        extract($row);
    } else { //INSERT
        $pi_id=0;
        $pi_nom="";
        $pi_site="";
    }
}
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
        <h1>Edition d'une pilote</h1>
        <form method="post">
            <input type='hidden' name='pi_id' id='pi_id' value='<?= $pi_id ?>'>
            <p>
                <label for='pi_nom'>pi_nom</label>
                <input type='text' name='pi_nom' id='pi_nom' required value='<?= htmlentities($pi_nom,ENT_QUOTES,"utf-8") ?>'>
            </p>
            <p>
                <label for='pi_site'>pi_site</label>
                <select name='pi_site' id='pi_site'>
                <?php HTMLselect($statement,"select vi_id id, vi_nom label from ville",$pi_site); ?>
                </select>
            </p>
            <input type="submit" name="btsubmit" value="Enregistrer">
        </form>
    </div>
    <hr>
    <footer>
        <?php require "../_include/inc_pied.php"; ?>
    </footer>
</body>

</html>