<?php
Namespace Control\Admin;
class Account {
	function index($f3) {
		$f3->mset(
			array(
				"page.content"=>"content_template.php",
				"page.title"=>"Atur akun",
				"page.header"=>array("title"=>"Akun", "subtitle"=>"pengaturan dan manejemen")
				)
		);
		echo \Template::instance()->render('admin/layout.php');
	}
}