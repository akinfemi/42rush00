<?php

function upload_image()
{
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image_path"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image_path"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            header('Location: admin.html?error=bad_image');
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {
        header('Location: admin.html?error_filename_already_exists');;
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["image_path"]["size"] > 500000) {
        header('Location: admin.html?error_file_too_large');;
        $uploadOk = 0;
    }
// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        header('Location: admin.html?error_wrong_file_format');;
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        header('Location: admin.html?error_failed_to_upload');
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image_path"]["tmp_name"], $target_file)) {
            header('Location: admin.html?entry=OK');
        } else {
            header('Location: admin.html?error_move_upload_failed');
        }
    }
    return (basename($_FILES["image_path"]["name"]));
}

if ($_POST['itemid'] === "" || $_POST['submit'] !== "OK"){
    header('Location: admin.html?error');
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
            $img_path = "images/".upload_image();
            $new_entry = ['itemid' => $itemid, 'price' => $price, 'item_name' => $_POST['item_name'],
                'item_type' => $_POST['item_type'], 'image_path' => $img_path];
            $uns_content[] = $new_entry;
            file_put_contents("../private/items", serialize($uns_content));
            header('Location: admin.html?entry=OK');
        }
        else{
            $img_path = "images/".upload_image();
            $new_entry[] = ['itemid' => $itemid, 'price' => $price, 'item_name' => $_POST['item_name'],
                'item_type' => $_POST['item_type'], 'image_path' => $img_path];
            $new_entry = serialize($new_entry);
            if (file_exists("../private") === FALSE)
                mkdir("../private", 0777);
            file_put_contents("../private/items", $new_entry);
            header('Location: admin.html?entry=OK');
        }
    }
}
?>