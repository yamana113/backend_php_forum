<?php
#fonction checkant si l'etu dans $_SESSION suit bien $idcour
function checkFollow($idcour) {
    # recup data dans follow
    global $followTable, $PDO;
    $query = "SELECT idcour FROM $followTable ".
        "WHERE iduser = ?";

    $data = [$_SESSION["Userid"]];
    $statement = $PDO->prepare($query);
    $statement->execute($data);

    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    # check $idcour en fait partie
    $flag = false;
    foreach ($results as $result) {
        if (isset($result["idcour"]) && $result["idcour"] == $idcour) {
            $flag = true;
            break;
        }
    }
    return $flag;
}