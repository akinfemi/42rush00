<?php
if (file_exists("../private/passwd") !== FALSE){
    $contents = file_get_contents("../private/passwd");
    $uns_content = unserialize($contents);
    foreach ($uns_content as $i => $files){
        if ($files['login'] === $_POST['login']){
            $uns_content[$i]['login'] = "";
            file_put_contents("../private/passwd", serialize($uns_content));
            header('Location: admin.html?del=OK');
            exit();
        }
    }
}
header('Location: admin.html?del=error');
?>