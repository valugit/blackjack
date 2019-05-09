<?php

require_once "../src/models/Game.php";

session_start();

$controller_query = $_GET["controller"] ?? "index";
$action = $_GET["action"] ?? "home";

$controllerName = ucfirst($controller_query)."Controller";

require "../src/controllers/" . $controllerName . ".php";
$controller = new $controllerName;

$controller->$action();