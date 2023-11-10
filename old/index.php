<?php
function loadView($nameView, $params=[]){
    extract($params);
    include_once("./app/views/layouts/head.php");
    include_once("./app/views/".$nameView.".php");
    include_once("./app/views/layouts/footer.php");

}
function loadModel($nameModel){
    include_once("./app/models/".$nameModel.".php");
    $instance = new $nameModel();
    return $instance;
}
function startFramework()
{
    $controller = "DefultController";
    $method = "index";
    $params = [];

    if (isset($_SERVER["PATH_INFO"])) {
        $pathInfo = trim($_SERVER["PATH_INFO"], "/");
        $partesPath = explode("/", $pathInfo);
        if (isset($partesPath[0]) && $partesPath[0]) {
            $controller = ucfirst($partesPath[0]);
        }
        if (isset($partesPath[1]) && $partesPath[1]) {
            $method = ucfirst($partesPath[1]);
        }
        foreach ($partesPath as $key => $partePath) {
            if ($key > 1) {
                $params[] = $partePath;
            }
        }
    }
    include_once("./app/controllers/" . $controller . ".php");
    $instanceController = new $controller();
    call_user_func_array([$instanceController, $method], $params);
}
define("BASE_URL", "http://localhost/crud/");

startFramework();
