<?php
if (file_exists("../private/items") !== FALSE){
    $contents = file_get_contents("../private/items");
    $uns_content = unserialize($contents);
    foreach ($uns_content as $i => $files){
        if ($files['itemid'] === $_POST['itemid']){
            $uns_content[$i]['itemid'] = "";
            file_put_contents("../private/items", serialize($uns_content));
            header('Location: admin.html?del=OK');
            exit();
        }
    }
}
header('Location: admin.html?del=error');
?>