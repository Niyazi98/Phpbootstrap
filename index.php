<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <link href="newcss.css" rel="stylesheet" type="text/css"/>
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="maxcdn.bootstrapcdn.com_bootstrap_3.3.6_css_bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="bootstrap.css" rel="stylesheet" type="text/css"/>
    <a href="bootstrap.css.map"></a>
</head>
<body background="glowing-blue-circles-19043-1920x1200.jpg"> 
    <?php
    if (isset($_GET['map'])) {
        $dir = $_GET['map'];
        $dir = realpath($dir) . '/';
    } else {
        $dir = getcwd();
    }
    if (strpos($dir, 'PhpBootstrap') !== false) {
        
    } else {
        $dir = getcwd();
    }
    $items = scandir($dir);
    ?>           
    <div class="container">
        <div class="jumbotron">
            <h1> Php Filebrowser</h1>      
        </div>
        <div class="well well-lg">
            <?php
            if (isset($_GET['map'])) {
                $dir = $_GET['map'];
                $dir = realpath($dir) . '/';
            } else {
                $dir = getcwd();
            }
            if (strpos($dir, 'PhpBootstrap') !== false) {
                
            } else {
                $dir = getcwd();
            }
            $items = scandir($dir);
            ?>
            <box2>       
                <h1>            
                    <?php
                    echo $dir, "<br><br>";
                    ?>
                </h1>
                <?php
                foreach ($items as $item) {

                    if ($item == 'index1.php' || $item == 'Index1.php') {
                        
                    } elseif ($item == ".") {
                        
                    } elseif ($item == ".." && $dir == "C:\xampp\htdocs\PhpBootstrap\\") {
                        
                    } elseif (is_file($dir . '/' . $item)) {
                        echo 'bestand: <a href="index1.php?map=' . $dir . '&amp;bestand=' . $item . '"/>' . $item . '</a><br> ';
                    } else {
                        echo 'map: <a href="index1.php?map=' . $dir . "\\" . $item . '"/>' . $item . '</a>' . '<br>';
                    }
                }echo '<br>';

                function human_filesize($bytes, $decimals = 2) {
                    $size = array('B', 'KB', 'MB', 'GB', 'TB');
                    $factor = floor((strlen($bytes) - 1) / 3);
                    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
                }
                ?>
                <box1>
                    <?php
                    if (isset($_GET['bestand'])) {
                        $file = $_GET['bestand'];

                        if (is_writable($dir . $file)) {
                            echo 'is het schrijfbaar :Ja';
                            echo '<br>' .'Bestands groote: '. human_filesize(filesize($dir . $file));
                            echo  '<br>'." was last modified: " . date("F d Y H:i:s.", filemtime($dir . $file));
                        } else {
                            echo  'Filesize: ' . human_filesize(filesize($file)) . '<br>' . $file . " Was last modified: " . date("F d Y H:i:s.", filemtime($file));
                        }
                    }
                    ?>
                </box1>       
                <box3> 
                    <?php
                    if (isset($_GET['bestand'])) {
                        if (isset($_POST['text'])) {
                            file_put_contents($file, $_POST['text']);
                        }
                        $ext = pathinfo($file, PATHINFO_EXTENSION);
                        if ($ext === 'php' || $ext === 'txt' || $ext === 'css') {
                            $read = file_get_contents($file);
                            if ($file === 'index1.php' || $file === 'Index1.php') {
                                echo 'Dit bestand is geblokkeerd';
                            } else {
                                echo '<form method="post" id="text" name="text" action="index1.php?map=' . $dir . '&amp;bestand=' . $file . '">' .
                                '<textarea name="text" id="text" >' . htmlspecialchars($read) . '</textarea>' .
                                '<br>' ?> 
                    <input
                        class="btn btn-default btn-block" type="submit" name="save" value="Save" type="button" 
                        />
                            <?php
                            
                            }
                        } elseif ($ext === 'jpg' || $ext === 'png' || $ext === 'gif' || $ext === 'jpeg' || $ext === 'img') {
                            echo '<img src="' . $file . '" /img>';
                        }
                    }
                    ?>
                    </div>
                    </body>
                    </html>