<?php
 function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=writerblog;charset=utf8', 'root', '');
        
        return $db;
    }
