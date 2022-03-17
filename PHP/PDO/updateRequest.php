<?php
#fonction maj le nb de post dans $idcour
function majPost($idcour) {
    global $coursesTable, $PDO;
    $query = "UPDATE $coursesTable ".
        "SET nbPost = nbPost + 1 ".
        "WHERE idcour = ?";

    $data = [$idcour];
    $statement = $PDO->prepare($query);
    $statement->execute($data);
}
