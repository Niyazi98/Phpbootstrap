<?php
$route = (isset($_GET['route'])) ? $_GET['route'] : false;
if($route){
    $routeParts = array_filter(explode('/', $route));
    // Remove the ".." and previous directory.
    foreach($routeParts as $index => $part){
        if($part === '..' || $part === 'index.php' ){
            unset($routeParts[$index], $routeParts[$index - 1]);
        }
    }
    // Create clean route without the "..".
    $route = implode('/', $routeParts);
    
    // Remove filename from route
    $completeItemPath .= '\\' . str_replace('/', '\\', $route);
    if (is_file($completeItemPath)){
        $route = dirname($route);
    }
}