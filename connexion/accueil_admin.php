<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Accueil admin</title>
    <link rel="stylesheet" href="styleaccueil.css">
</head>
<body>

<?php
session_start();
if(isset($_SESSION['pseudo'])){
    echo " <p> Bonjour Administrateur ".$_SESSION['pseudo']."</p>";
}

?>