<?php
    session_start();
    session_unset();
    session_destroy();

    if (isset($_COOKIE['PHPSESSID'])){
        setcookie('PHPSESSID', '', TIME()- 3600, '/', '', 0, TRUE);
    }
    header("Location: index.php");
    exit();
?>