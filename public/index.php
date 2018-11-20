<?php
// definimos la ubicación de la raiz
define('ROOT', dirname(dirname(__FILE__)));

// esto e spoco seguro, pero por simplificar para la prueba usaremos $_REQUEST directamente
if ((isset($_REQUEST["controller"])) && (isset($_REQUEST["action"])) && (isset($_REQUEST["queryString"]))) {
    $controller = $_REQUEST["controller"];
    $model = $controller . "s";
    $nombreController = $controller . "Controller";
    $action = $_REQUEST["action"];
    $queryString = ($_REQUEST["queryString"]);
    $finalQueryString = explode("/", $queryString);

} else {
    $controller = "Portada";
    $nombreController = "PortadaController";
    $model = "Portadas";
    $action = "Portada";
}

// Llamamos al controlador
if (file_exists(ROOT . '/application/controllers/class_' . strtolower($nombreController) . '.php')) {
    require_once(ROOT . '/application/controllers/class_' . strtolower($nombreController) . '.php');
} 
if (file_exists(ROOT . '/application/models/class_' . strtolower($model) . '.php')) {
    require_once(ROOT . '/application/models/class_' . strtolower($model) . '.php');
}

$dispatch = new $nombreController($model, $controller, $action);
call_user_func_array(array($dispatch,$action), $finalQueryString);

?>