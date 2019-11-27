<?php
require "../_include/inc_config.php";
$_GET=array_map("cb_mres",$_GET); 
extract($_GET);
$sql = "delete from pilote where pi_id=$id";
if (!mysqli_query($link, $sql)) {
    echo "<p>$sql</p>";
    echo mysqli_error($link);
    exit;
} else {
    header("location:pilote.php");
}