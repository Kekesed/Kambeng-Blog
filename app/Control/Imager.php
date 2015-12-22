<?php
Namespace Control;
Class Imager {
	private $size = array(
		'ic' => 50, //px
		'sm' => 307, //px
		'md' => 512,
		'lg' => 819,
		'xl' => 1024
	);
	function akses($f3) {
		//deteksi
		if($f3->get('PARAMS.link')=='' or $f3->get('PARAMS.size')=='' or $f3->get('PARAMS.id')=='') {
			$error = new \Model\Imager(0);
				$kampret = $f3->get('PARAMS.type');
			if($f3->get('PARAMS.type') == '' or !in_array($kampret, array('png','jpeg','gif', 'wbmp')))
				$f3->set('PARAMS.type', 'png');
			$error = $this->chopcop($f3->get('PARAMS.size'), $error);
			$f3->status(404);
			$error->render($f3->get("PARAMS.type"));
		}
		//oke semua terbukti
			$kampret=$f3->get('PARAMS.type');
		if($f3->get('PARAMS.type') == '' or !in_array($kampret, array('png','jpeg','gif', 'wbmp'))) $f3->set('PARAMS.type', 'png');
		$kambing = new \Model\Imager();
		$hasil=$kambing->db->find(array('(link=? and srcx=?)', $f3->get('PARAMS.link'), $f3->get('PARAMS.id')));
		if(count($hasil) == 0)
			$f3->status(404);
		$kambing = $this->chopchop($f3->get('PARAMS.size'), (new \Image())->load(file_get_contents(__DIR__ . '/../gamvar/'.$hasil[0]->source)));
		#$kambing = $this->chopchop($f3->get('PARAMS.size'), $kambing);
		$kambing->render($f3->get('PARAMS.type'));
		
		return;
	}
	function chopchop($size, $img) {
	$size = strtolower($size);
		if(!in_array($size, array_flip($this->size))) $size='md';
			return $img->resize($this->size[$size],$this->size[$size],false);
	}

}