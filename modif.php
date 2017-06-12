<?php
if ($_POST['newpw'] === "" || $_POST['oldpw'] === "" || $_POST['submit'] !== "OK"){
    echo "ERROR\n";
    return ;
}else{
    if ($_POST['submit'] === "OK"){
        $hashed = hash("whirlpool", $_POST['oldpw']);
        if (file_exists("../private/passwd") !== FALSE){
            $contents = file_get_contents("../private/passwd");
            $uns_content = unserialize($contents);
            foreach ($uns_content as $i => $files){
                if ($files['login'] === $_POST['login'] && $files['passwd'] === $hashed){
                    $uns_content[$i]['passwd'] = hash("whirlpool",$_POST['newpw']);
                    file_put_contents("../private/passwd", serialize($uns_content));
                    header('Location: welcome.php');
                    echo "OK\n";
                    return ;
                }
            }
        }
        echo "ERROR\n";
        return ;
    }
}
?>