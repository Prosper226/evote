<?php
    session_start();
    //session_destroy();exit;
    include 'crud/function.php';
    if(!sessionExist()){
        echo "<script>javascript:window.history.back();</script>";
        exit();
    }
?>