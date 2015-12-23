<?php
Namespace Control\Admin;
class Auth{
	function index($f3) {
		$f3->mset(
			array()
		);
		
		echo \Template::instance()->render("admin/auth/login.php");
	}
	function post_index($f3) {
		echo "Yoo broww";
	}
	
	function get_logout($f3) {
		$f3->set("COOKIE", null);
		$f3->set("SESSION", null);
	}
}