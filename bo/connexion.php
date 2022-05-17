<?php
    function dbconnect()
    {
        static $connect = null;
        if ($connect === null) {
            $connect = mysqli_connect('localhost', 'root', 'root', 'climax');
            mysqli_set_charset($connect,"utf8");
        }
        return $connect;
    }
?>