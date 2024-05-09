<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Accueil non sub</title>
    <link rel="stylesheet" href="styleaccueil.css">
</head>
<body>

<?php
session_start();
if(isset($_SESSION['pseudo'])){
    echo " <p> Bonjour non abonné ".$_SESSION['pseudo']."</p>";
}

?>