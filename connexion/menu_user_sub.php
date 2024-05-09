<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Accueil sub</title>
    <link rel="stylesheet" href="stylemanu.css">
</head>
<body>

<?php
session_start();
if(isset($_SESSION['pseudo'])){
    echo " <p> Bonjour abonné premium ".$_SESSION['pseudo']."</p>";
}

?>
