<?php
include 'Proprietaire_class.php';
$prop = new Proprietaire();
extract($_POST);
$prop->numPiece = $nump;
$prop->nom = $nom;
$prop->tel = $tel;

$prop->addProprietaire();
header('location:viewProprietaires.php');
