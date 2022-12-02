<?php
    $connect = mysqli_connect("localhost", "root", "", "sark");
    if(!$connect){
        die('Error'.mysqli_connect_error());
    }
?>