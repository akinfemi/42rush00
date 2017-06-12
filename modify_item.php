<?php
if ($_POST['itemid'] === "" || $_POST['submit'] !== "OK"){
    header('Location: admin.html?del=error');
    exit();
}else{
    if ($_POST['submit'] === "OK"){
        if (file_exists("../private/items") !== FALSE){
            $contents = file_get_contents("../private/items");
            $uns_content = unserialize($contents);
            foreach ($uns_content as $i => $files){
                if ($files['itemid'] === $_POST['itemid']){
                    $uns_content[$i]['price'] = ($_POST['price'] !== "") ? $_POST['price'] : $uns_content[$i]['price'];
                    $uns_content[$i]['item_name'] = ($_POST['item_name'] !== "") ? $_POST['item_name'] : $uns_content[$i]['item_name'];
                    $uns_content[$i]['item_type'] = ($_POST['item_type'] !== "") ? $_POST['item_type'] : $uns_content[$i]['item_type'];
                    $uns_content[$i]['image_path'] = ($_POST['image_path'] !== "") ? $_POST['image_path'] : $uns_content[$i]['image_path'];
                    file_put_contents("../private/passwd", serialize($uns_content));
                    header('Location: admin.html?modify=OK');
                    exit();
                }
            }
        }
    }
    header('Location: admin.html?modify=OK');
}
?>