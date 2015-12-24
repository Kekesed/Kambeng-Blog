<?php
Namespace Control\Admin;
class App {
	function dash($f3) {
		
		
		$f3->mset(array(
			"page.content"=>"content_template.php",
		));
		echo \Template::instance()->render('admin/layout.php');
	}
	function home($f3) {
		$f3->reroute("@admin_home");
	}
}