<?php
$file = basename($completeItemPath);
if ($routeIsFile) {
    if(isset($_POST['file-contents'])) {
        file_put_contents($file, $_POST['file-contents']);
    }
    
    $fileLastModified = date('d-m-Y H:i:s', filemtime($completeItemPath));

    $fileExtension = pathinfo($completeItemPath, PATHINFO_EXTENSION);
    $fileIsText = (in_array($fileExtension, ['php','txt','css']));
    $fileIsImage = (in_array($fileExtension, ['jpg','jpeg','png','gif']));

    if ($fileIsText){
        $fileContents = file_get_contents($completeItemPath);
        $readHtmlChars =  htmlspecialchars($fileContents);        
    }
}