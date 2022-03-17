<?php
require_once 'helper.php';
require_once "PDO/getRequest.php";

$results = coursesRequest();

if(!empty($results)) {
    sendMessage($results);
} else sendError("Utilisateur ne suit pas de cours");
?>