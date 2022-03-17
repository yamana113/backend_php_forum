<?php
require_once "PDO/getRequest.php";

session_start(['cookie_samesite' => 'Lax']);

function authenticate() {
    if (array_key_exists("login", $_POST) && array_key_exists("password", $_POST)) {

        $result = userRequest();

        if (!empty($result)) {
            $_SESSION["Userid"] = $result["idUser"];
            $_SESSION["Username"] = $result["login"];
            return true;
        }
    }
    return false;
}

function isAuthenticated() {
    if (array_key_exists("Userid", $_SESSION) && array_key_exists("Username", $_SESSION)) return true;
    else return false;
}

?>