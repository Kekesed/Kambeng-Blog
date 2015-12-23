<?php
Namespace Control\Admin;
class App {
	function pinid($f3) {
		
		
	}

	function dash($f3) {
		//bagian pertama
		$f3->mset(array(
			"page.content"=>"content_template.php"
		));
		
		echo \Template::instance()->render('admin/layout.php');
	
	}
}