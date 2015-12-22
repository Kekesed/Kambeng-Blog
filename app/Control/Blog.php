<?php
Namespace Control;
Class Blog {
	function Tampil($f3) {
		try {
			$post = new \Model\Post();
			$hasil = $post->find(array("uniq_url = ?", $f3->get("PARAMS.id")));
			/* if($post->loaded == 0)
				return $f3->error(404); */
			#$post = new \Model\Post($f3->get("PARAMS.id"));
		}
		catch (\Exception $e) {
			return $f3->error(404);
		}
		
		$f3->mset(array(
			"template.title" => $hasil[0]->title . " // " .$f3->get("kekesed.sitename"),
			"template.content"=>"entry.html",
			"post.cast" => $hasil[0]->cast(),
			"post.object"=>$hasil[0]
		));
		echo \Template::instance()->render('public/layout.php');
		
	}
}