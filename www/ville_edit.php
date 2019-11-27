<?php
require "../_include/inc_config.php";
if (isset($_POST["btsubmit"])) {
    $_POST=array_map("cb_mres",$_POST);
    extract($_POST);    
    if ($vi_id==0)
        $sql = "insert into ville values (null,'$vi_nom')";
    else
        $sql = "update ville set vi_nom='$vi_nom' where vi_id=$vi_id";        
    
    if (!mysqli_query($link, $sql)) {
        echo "<p>$sql</p>";
        echo mysqli_error($link);
        exit;
    }

    header("location:ville.php");
} else {
    extract($_GET);
    if ($id > 0) { //UPDATE
        $sql = "select * from ville where vi_id=$id";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);
        extract($row);
    } else { //INSERT
        $vi_id=0;
        $vi_nom="";
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
        <h1>Edition d'une ville</h1>
        <form method="post">
            <input type='hidden' name='vi_id' id='vi_id' value='<?= $vi_id ?>'>
            <p>
                <label for='vi_nom'>vi_nom</label>
                <input type='text' name='vi_nom' id='vi_nom' required value='<?= htmlentities($vi_nom,ENT_QUOTES,"utf-8") ?>'>
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