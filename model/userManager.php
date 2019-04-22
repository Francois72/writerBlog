<?php
require_once("Manager.php");
class UserManager extends Manager
{
	public function userConnect($user)
	{
		$db = $this -> dbConnect();		
		$req = $db->prepare('SELECT id, pass, rights FROM users WHERE user = :user');
		$req->execute(array(
		    'user' => $user));	
		return $req;
	}
	public function insertUser($user,$pass_hache,$email)
	{
		$db = $this -> dbConnect();		
		$req = $db->prepare('INSERT INTO users(user,pass,email) VALUES(:user, :pass, :email)');
				$req->execute(array('user' => $user, 
									'pass' => $pass_hache, 
									'email' => $email));	
	}
}