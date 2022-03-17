<?php
require_once 'mysqlConnect.php';
require_once 'check.php';

function userRequest() {
    global $usersTable, $PDO;
    $query = "SELECT * FROM $usersTable " .
        "WHERE login = ? AND password = ?";

    $data = [$_POST["login"], $_POST["password"]];

    $statement = $PDO->prepare($query);
    $statement->execute($data);

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function coursesRequest() {
    global $coursesTable, $followTable, $PDO;
    $query = "SELECT * FROM $coursesTable ".
        "WHERE idcour IN ".
        "(SELECT idcour FROM $followTable ".
        "WHERE iduser = ?)";

    $data = [$_SESSION["Userid"]];
    $statement = $PDO->prepare($query);
    $statement->execute($data);

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function topicsRequest() {
    global $topicsTable, $PDO;

    $idcour = $_POST["idcour"];

    # check etu suit cours
    # recup topics lié au cour
    if (checkFollow($idcour)) {
        $query = "SELECT * FROM $topicsTable " .
            "WHERE idcour = ?";

        $data = [$idcour];
        $statement = $PDO->prepare($query);
        $statement->execute($data);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    else return null;
}

#fonction prenant le nom du cour dans le post
function getNameCour() {
    global $coursesTable, $PDO;
    $query = "SELECT nom FROM $coursesTable " .
        "WHERE idcour = ?";

    $data = [$_POST["idcour"]];
    $statement = $PDO->prepare($query);
    $statement->execute($data);

    return $statement->fetchColumn(0);
}

#fonction prenant recuperant un topic selon le nom et le cour
function getTopicbyName($name, $idcour) {
    global $topicsTable, $PDO;
    $query = "SELECT * FROM $topicsTable ".
        "WHERE nom = ? AND idcour = ?";

    $data = [$name, $idcour];
    $statement = $PDO->prepare($query);
    $statement->execute($data);

    return $statement->fetch(PDO::FETCH_ASSOC);
}