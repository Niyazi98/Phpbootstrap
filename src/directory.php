<?php
$routeIsFile = is_file($completeItemPath);

if ($routeIsFile){
    $currentWorkingDirectory = dirname($completeItemPath);
} else {
    $currentWorkingDirectory = $completeItemPath;
}
// Scan the working directory and create route links for each item.
$itemsInWorkingDirectory = array_slice(scandir($currentWorkingDirectory), 1 );

$itemLinks = array();
foreach($itemsInWorkingDirectory as $item){
    $itemLinks[$item]['is_file'] = (is_file($currentWorkingDirectory . '\\' . $item));
    $itemLinks[$item]['link'] = $route . '/' . $item;
    $itemLinks[$item]['size'] = $itemSize = human_filesize(filesize($currentWorkingDirectory . '\\' . $item));
    $itemLinks[$item]['last_modified'] = date('d-m-Y H:i:s', filemtime($currentWorkingDirectory . '\\' . $item));
    $itemLinks[$item]['link'] = $route . '/' . $item;
}