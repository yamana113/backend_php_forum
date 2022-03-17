<?php
//ini_set('display_errors', 'On');
//error_reporting(E_ALL);
require_once 'helper.php';

if (authenticate()) sendMessage("");
else {
    sendError("nom d'utilisateur ou mot de passe incorrecte");
}
?>


