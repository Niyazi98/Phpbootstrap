<?php 
function human_filesize($bytes, $decimals = 2)
{
    $size = array('B', 'KB', 'MB', 'GB', 'TB');
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}

    
   
$currentPath = getcwd();
/**
 * Route
 */
$route = (isset($_GET['route'])) ? $_GET['route'] : false;
if($route){
    $routeParts = array_filter(explode('/', $route));
    // Remove the ".." and previous directory.
    foreach($routeParts as $index => $part){
        if($part === '..'){
            unset($routeParts[$index], $routeParts[$index - 1]);
        }
    }
    // Create clean route without the "..".
    $route = implode('/', $routeParts);
    
    // Remove filename from route
    $currentPath .= '\\' . str_replace('/', '\\', $route);
    if (is_file($currentPath)){
        $route = dirname($route);
    }
}

/**
 * Directory
 */

if (is_file($currentPath)){
    $currentWorkingDirectory = dirname($currentPath);
} else {
    $currentWorkingDirectory = $currentPath;
}
// Scan the working directory and create route links for each item.
$itemsInCurrentWorkingDirectory = array_slice(scandir($currentWorkingDirectory),1);

$itemLinks = array();


foreach($itemsInCurrentWorkingDirectory as $item){
    $itemLinks[$item] = $route . '/' . $item;
}
/**
 * File
 */

$routeIsFile = false;

$file = basename($currentPath);
if (isset($item)) { 
    
    $fileIsWritable = is_writable($file);
    $writableText = ($fileIsWritable) ? 'Ja' : 'Nee';
    $getFileSize = human_filesize(filesize($file));
    $getFileTime = date(date_default_timezone_set ("UTC"). "F d Y H:i:s.");

    
    $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
    $fileIsText = ($fileExtension === 'php' || $fileExtension === 'txt' || $fileExtension === 'css');
    $fileIsImage = ($fileExtension === 'jpg' || $fileExtension === 'png' || $fileExtension === 'gif' || $fileExtension === 'jpeg' || $fileExtension === 'img');

    if ($fileIsText){
        $fileContents = file_get_contents($currentPath);
        $readHtmlChars =  htmlspecialchars($fileContents);
    }
}

include '..\html\home.phtml';