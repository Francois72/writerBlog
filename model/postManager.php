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

	public function editPost($title,$content)
	{
		$db = $this -> dbConnect();	
		$post=$db->prepare('UPDATE postswriter SET title = ?, content = ? WHERE id=?');
		$post->execute(array($title, $content, $_GET['post']));
		return $post;
	}

	public function	addPost()
	{		
		$db = $this -> dbConnect();				
		$post= $db->prepare('INSERT INTO postswriter(title, content) VALUES(?,?)');
		$post->execute(array($_POST['title'],$_POST['content']));
	}

	public function	deletePost()
	{		
		$db = $this -> dbConnect();				
		$post= $db->prepare('DELETE FROM postswriter WHERE id=?');
		$post->execute(array($_GET['post']));
	}

	//commentaire effacer en même temps que le billet
	public function	deleteCommentsPost()
	{		
		$db = $this -> dbConnect();				
		$post= $db->prepare('DELETE FROM comments WHERE post_id=?');
		$post->execute(array($_GET['post']));
	}

}