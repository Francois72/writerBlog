<?php
function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=writerblog;charset=utf8','root','');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur:'.$e->getMessage());
    }
}

/*
class Manager
{
	function dbConnect()
	{
	    try
	    {
	        $db = new PDO('mysql:host=localhost;dbname=writerblog;charset=utf8','root','');
	        return $db;
	    }
	    catch(Exception $e)
	    {
	        die('Erreur:'.$e->getMessage());
	    }
	}	
}


*/