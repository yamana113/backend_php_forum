<?php
require_once "helper.php";
require_once "PDO/getRequest.php";

$results = topicsRequest();

if(!empty($results)) {
    sendMessage([$results, getNameCour()]);
} else sendError("Utilisateur ne suit pas ce cour");