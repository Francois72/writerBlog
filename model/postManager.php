<?php
require_once("Manager.php");
class PostManager extends Manager
{
	public function getPosts()
	{
		$db = $this -> dbConnect();		
		$posts =$db->query('SELECT id, title, content, creation_date FROM postswriter ORDER BY creation_date DESC ');
		return $posts;
	}

	public function getPosts2()
	{
		$db = $this -> dbConnect();		
		$posts =$db->query('SELECT id, title, content, creation_date FROM postswriter ORDER BY creation_date');
		return $posts;
	}

	public function getPost()
	{
		$db = $this -> dbConnect();		
		$post=$db->prepare('SELECT id, title, content, creation_date FROM postswriter WHERE id=?');
		$post->execute(array($_GET['post']));
		return $post;
	}


	public function editPost()
	{
		$db = $this -> dbConnect();		
		$post=$db->prepare('UPDATE postswriter SET title = ?, content = ? WHERE id=?');
		$post->execute(array($_POST['title'], $_POST['content'], $_GET['post']));
		return $post;
	}

}


//penser à suppriemr les commentaires du post supprimer