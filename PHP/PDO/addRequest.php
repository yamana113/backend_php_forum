<?php
require_once 'mysqlConnect.php';
require_once 'updateRequest.php';

function addTopic($nom, $idcour) {
    global $topicsTable, $PDO;
    $query = "INSERT INTO $topicsTable (nom, nbPost, d_last_mess, idCour) ".
        "VALUES (?, 0, ?, ?)";

    $data = [$nom, date('Y-m-d'), $idcour];
    $statement = $PDO->prepare($query);
    $statement->execute($data);

    majPost($idcour);
}