<?php
Namespace Model;
class Imager extends \Image {
	protected
		$casted;
	
	public $db;
	
	function __construct($pid = NULL) {
		$this->db = new \DB\SQL\Mapper(\kksd\Sesi::$DB, "tblimage");
		if($pid != NULL) {
			$this->db = $this->db->find(array("pid=?",$pid))[0];
			if($db->loaded() == 0)
				throw new \Execption("Error: The image with specified id are not found.");	
			$this->casted = $this->db->cast();
			parent::__construct($this->casted['source'], false, __DIR__ . '/../../gamvar/');
		}
	}
	
	function chop($p) {
		return parent::resize($p,$p,false);
	}
	
	function register($imageloc, $data) {
	
		/* 
			Register nama urlnya jadi:
			/assets/virt/[link]/[size].[source].[type]
		*/
		$alamat = pathinfo($imageloc);
		$link = uniqid("", true);
		$srcx = hash_file("sha256", $imageloc,false);
		$fname = $srcx . '.'.$alamat['extension'];
		rename($alamat, __DIR__ . '/../..' . '/gamvar/' . $fname);
		parent::__construct($fname, false, __DIR__ . '/../..'. '/gamvar/');
		
		$w = parent::$width;
		$h = parent::$height;
		$datatab = array("size" => $w . "x" . $h, "aksesable"=>1, "date_added"=>date("Y-m-d H:i:s"), "source"=>$fname, "link"=>$link, 'srcx'=>$srcx);
		
		$this->db->copyfrom(array_merge($data, $datatab), function($val) {
			return array_intersect_key($val, array_flip(array('uid','link','source', 'aksesable','size','date_added', 'srcx')));
		})->insert();
	}
}