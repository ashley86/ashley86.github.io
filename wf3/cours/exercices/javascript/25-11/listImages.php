<?php

    $dir        = 'assets/img/galerie/';
    $dirThb     = $dir . 'vignettes/';
    $filesList  = scandir($dir);
    $files      = ['imgPath' => $dir, 'imgPathThb' => $dirThb];

    foreach($filesList as $file)
    {
        if( $file == '.' || $file == '..' || substr($file, -4) != '.jpg' || is_dir($file) ){
            continue;
        }
        $files['images'][] =  $file;
    }

    echo json_encode($files);
?>