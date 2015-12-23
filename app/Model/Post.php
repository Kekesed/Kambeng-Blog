<?php
//Post model
Namespace Model;
class Post extends \DB\SQL\Mapper{
	public $user, $casted;
	function __construct($pid = NULL) {
		parent::__construct(\kksd\Sesi::$DB, "tblpost");
		if(!empty($pid)) {
			$this->load(array("pid = ?", $pid));
			if($this->loaded == 0)
				throw new \Exception("Error: IDnya nggak ada di database.");
			$this->casted = parent::cast();
			$this->user = new \Model\User($this->casted['uid']);
		}
	}
	function refresh() {
		$this->casted = parent::cast();
		$this->user = new \Model\User($this->casted['uid']);
	}
	
	function save() {
		if($this->uid != $this->user->uid) //this is SPARTAA!!
			if(empty($this->uid))
				$this->uid = $this->user->uid;
			else
				$this->user = new \Model\User($this->casted['uid']);
		parent::save();
	}
	function skip($ofs = 1) {
		parent::skip($ofs = 1);
		$this->user = new \Model\User($this->casted['uid']);
	}
	
	function cast($obj=NULL){
		$ox = parent::cast($obj);
		$user = new \Model\User($ox['uid']);
		return array_merge($ox, array("user"=>$user->cast()));
	}
}