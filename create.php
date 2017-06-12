<?php
    if ($_POST['login'] === "" || $_POST['passwd'] === "" || $_POST['submit'] !== "OK"){
        echo "ERROR\n";
        return ;
    }else{
        if ($_POST['submit'] === "OK"){
            $hashed = hash("whirlpool", $_POST['passwd']);
            if (file_exists("../private/passwd") !== FALSE){
                $contents = file_get_contents("../private/passwd");
                $uns_content = unserialize($contents);
                foreach ($uns_content as $i => $files){
                    if ($files['login'] === $_POST['login']){
                        header('Location: create.html?error');
                        echo "ERROR\n";
                        return ;
                    }
                }
                $new_entry = ['login' => $_POST['login'], 'passwd' => $hashed];
                $uns_content[] = $new_entry;
                file_put_contents("../private/passwd", serialize($uns_content));
                header('Location: welcome.php');
                echo "OK\n";
            }
            else{
                $new_entry[] = ['login' => $_POST['login'], 'passwd' => $hashed];
                $new_entry = serialize($new_entry);
                if (file_exists("../private") === FALSE)
                    mkdir("../private", 0777);
                file_put_contents("../private/passwd", $new_entry);
                header('Location: welcome.php');
                echo "OK\n";
            }
        }
    }
?>