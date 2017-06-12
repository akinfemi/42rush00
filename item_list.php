<?php
if (file_exists("../private/items") !== FALSE){
    $contents = file_get_contents("../private/items");
    $uns_content = unserialize($contents);
    foreach ($uns_content as $i => $files){
//        echo
    }
}