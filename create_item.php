<?php
if ($_POST['itemid'] === "" || $_POST['price'] === "" || $_POST['submit'] !== "OK"){
    echo "ERROR\n";
    exit();
}else{
    if ($_POST['submit'] === "OK" && $_POST['itemid'] !== "" && $_POST['price'] !== ""){
        $price = $_POST['price'];
        $itemid = $_POST['itemid'];
        if (file_exists("../private/items") !== FALSE){
            $contents = file_get_contents("../private/items");
            $uns_content = unserialize($contents);
            foreach ($uns_content as $i => $files){
                if ($files['itemid'] === $itemid){
                    header('Location: admin.html?error');
                    return ;
                }
            }
            $img_path = "";
//            if (($img_path = file_get_contents($_POST['image_path']) !== FALSE))
//                $img_path = base64_encode($img_path);
            $new_entry = ['itemid' => $itemid, 'price' => $price, 'item_name' => $_POST['item_name'],
                'item_type' => $_POST['item_type'], $img_path];
            $uns_content[] = $new_entry;
            file_put_contents("../private/items", serialize($uns_content));
            header('Location: admin.html?entry=OK');
            echo "OK\n";
        }
        else{
            $img_path = "";
//            if (($img_path = file_get_contents($_POST['image_path']) !== FALSE))
//                $img_path = base64_encode($img_path);
            $new_entry[] = ['itemid' => $itemid, 'price' => $price, 'item_name' => $_POST['item_name'],
                'item_type' => $_POST['item_type'], $img_path];
            $new_entry = serialize($new_entry);
            if (file_exists("../private") === FALSE)
                mkdir("../private", 0777);
            file_put_contents("../private/items", $new_entry);
            header('Location: admin.html?entry=OK');
            echo "OK\n";
        }
    }
}
?>