<?php
class Manager
{
	protected function dbConnect()
	{
	    try
	    {
	        $db = new PDO('mysql:host=localhost;dbname=writerblog;charset=utf8','root','');
	        /*$db = new PDO('mysql:host=localhost;dbname=id9412324_admin;charset=utf8','id9412324_admin,'admin');*/
	        return $db;
	    }
	    catch(Exception $e)
	    {
	        die('Erreur:'.$e->getMessage());
	    }
	}
}