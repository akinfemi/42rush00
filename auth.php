<?php
    function auth($login, $passwd)
    {
        if (file_exists("../private/passwd") !== FALSE)
        {
            $contents = file_get_contents("../private/passwd");
            $uns_content = unserialize($contents);
            $hashed = hash("whirlpool", $passwd);
            foreach ($uns_content as $i => $files)
            {
                if ($files['login'] === $login && $files['passwd'] === $hashed)
                {
                    if ($files['admin'] == TRUE)
                        return (1);
                    else
                        return (0);
                }
            }
        }
        return (-1);
    }
?>