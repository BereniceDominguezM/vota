<?php
session_start();
error_reporting(0);

if ($_POST['btnBoton1']) {
    $_SESSION['Anime1'] += 1;
}
if ($_POST['btnBoton2']) {
    $_SESSION['Anime2'] += 1;
}
if ($_POST['btnBoton3']) {
    $_SESSION['Anime3'] += 1;
}
if ($_POST['btnBoton4']) {
    $_SESSION['Anime4'] += 1;
}
$_SESSION['total'] = $_SESSION['Anime1'] + $_SESSION['Anime2'] + $_SESSION['Anime3'] + $_SESSION['Anime4'];

header('location:index.php');
exit();
?>