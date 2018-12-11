<?php
$link = mysqli_connect('mysql-yoangiovacchini.alwaysdata.net', '144527', '6g5wqc3z')
or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
mysqli_select_db($link, 'yoangiovacchini_projetavengers')
or die ('Erreur de sélection de la BD : ' . mysqli_error($link));
mysqli_set_charset($link, 'utf8');
?>