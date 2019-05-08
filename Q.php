<?php require_once 'config.php'; /* Settings Include file */

switch ($_GET["q"]){
    case "loadStates" : Query::loadStates(); break;
    case "loadCities" : Query::loadCities(); break;
    case "generateImsakiye" : Query::generateImsakiye(); break;
}
