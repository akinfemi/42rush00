<?php
function db_query($query) {
    $connection = dbconnect();
    $result = mysqli_query($connection,$query);
    return $result;
}
?>