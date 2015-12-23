<?php
//User model
Namespace Model;
class User extends \DB\SQL\Mapper{
	function __construct($uid = NULL) {
		parent::__construct(\kksd\Sesi::$DB, "tbluser");
		if($uid != NULL) {
			$this->load(array("uid=?",$uid));
		}
	}
	
	public function save() {
		if(parent::changed('pass'))
		$this->pass=$this->passwordify($this->pass);
		
		parent::save();
	}
	public function passwordify($pass) {
		return hash('SHA256', $pass);
	}
}