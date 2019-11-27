<?php
session_start();
$link = mysqli_connect("localhost", "root", "", "baseavion");
mysqli_set_charset($link , 'utf8');
$nomApplication = "Base avion";
$menu=array(
    ["ville.php","Ville"],
    ["pilote.php","Pilote"]
);

require "inc_fonction.php";
?>