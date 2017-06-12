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
            $new_entry = ['itemid' => $itemid, 'price' => $price];
            $uns_content[] = $new_entry;
            file_put_contents("../private/items", serialize($uns_content));
            header('Location: admin.html?entry=OK');
            echo "OK\n";
        }
        else{
            $new_entry[] = ['itemid' => $itemid, 'price' => $price];
            $new_entry = serialize($new_entry);
            if (file_exists("../private") === FALSE)
                mkdir("../private", 0777);
            file_put_contents("../private/items", $new_entry);
            echo "OK\n";
        }
    }
}
?>