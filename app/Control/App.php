<?php
Namespace Control;
class App {
	
	function beforeroute($f3) {
		$f3->mset(array(
			'spicetify' => function($postcontent) {
				if(strpos($postcontent, '.') == 0)
					return $postcontent;
				return substr($postcontent,1, strpos($postcontent, '.'));
			},
			 'usertify' => function($uid){
				$user = new \Model\User($uid);
				return $user->nama_depan . ' ' . $user->nama_belakang;
			},
			'datetify' => function($date){
				$tgl = date_diff(date_create($date), date_create('now'));
				return $tgl->format('%a days ago');
			}));
	}
	function indexer($f3) {
		//post loader
		$posts = new \Model\Post();
		
		$hasil = array_map(array($posts,'cast'),$posts->find(array("published=? ORDER BY date_created DESC LIMIT 0,7",1)));
		#var_dump($hasil);
		$f3->mset(array(
			"template.title" => $f3->get("kekesed.sitename"),
			"template.content"=>"index.html",
			"fpost"=>$hasil[0],
			"posts"=>array_slice($hasil, 1)
		));
		echo \Template::instance()->render('public/layout.php');
	}
	static function resolve_picturl($id, $size="md", $type="png") {
		try {
			$pic = new \Model\Imager();
			$pic->db = $pic->db->find(array("pid=?", $id))[0];
		} catch(\Exception $e) {
			return;
		}
		return \F3::alias('virtualasset', array("link"=>$pic->db->link, "size"=>$size, "id"=>$pic->db->srcx, "type"=>$type));
	}
}