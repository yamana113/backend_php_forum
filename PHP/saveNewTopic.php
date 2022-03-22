<?php
require_once 'helper.php';
require_once "PDO/getRequest.php";
require_once 'PDO/addRequest.php';
require_once 'PDO/check.php';

ini_set("display_errors", 1);
$nom = $_POST["nom"];
$idcour = $_POST["idcour"];

if(empty($nom)) sendError("nom vide");

if(!checkFollow($idcour)) sendError("Utilisateur ne suit pas ce cour");

if(!empty(getTopicbyName($nom, $idcour))) sendError("Ce topic existe déjà");

addTopic($nom, $idcour);
sendMessage(getTopicbyName($nom, $idcour));
