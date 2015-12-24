<?php
//User model
Namespace Model;
class User extends \DB\SQL\Mapper{
	function __construct($uid = NULL) {
		parent::__construct(\kksd\Sesi::$DB, "users");
		if($uid != NULL) {
			$this->load(array("id=?",$uid));
		}
	}
	
	public function save() {
		if(parent::changed('pass'))
		$this->pass=$this->passwordify($this->pass);
		
		parent::save();
	}
}