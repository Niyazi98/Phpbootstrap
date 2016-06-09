<?php
$route = (isset($_GET['route'])) ? $_GET['route'] : false;
if($route){
    $routeParts = array_filter(explode('/', $route));
    // Remove the ".." and previous directory.
    $illigalRouteParts = array('.', '..', 'index.php');
    foreach($routeParts as $index => $part){
        if(in_array($part, $illigalRouteParts)){
            unset($routeParts[$index], $routeParts[$index - 1]);
        }
    }
    $breadcrumbs = array();
    $previousRoute = '';
    foreach($routeParts as $part){
        $breadcrumbs[$part]['link'] = "$previousRoute/$part";
        $previousRoute .= $part;
    }
    // Create clean route without the "..".
    $route = implode('/', $routeParts);
    
    // Remove filename from route
    $completeItemPath .= '\\' . str_replace('/', '\\', $route);
    if (is_file($completeItemPath)){
        $route = dirname($route);
    }
}