<?php
    $CONNECT = mysqli_connect('localhost', 'root','', 'vpt');
    if (!$CONNECT){
        die('Error connect to DataBase');
    }
?>