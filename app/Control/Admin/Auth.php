<?php
Namespace Control\Admin;
class Auth{
	function index($f3) {
		if($f3->exists("GET.sesi_lenyap")) {
			\Flash::instance()->addMessage('Yoo bang! Selamat jalan~', 'success');
		}
		echo \Template::instance()->render("admin/auth/login.php");
	}
	function post_index($f3) {
		$user = \User::createUser(\kksd\Sesi::$DB);
		$user->load(array("email=?",$f3->POST['email']));
		if($user->checkLogin($f3->get('POST.email'), $f3->get('POST.password'))) {
			$user->load(array("email=?",$f3->POST['email']));
			$f3->SESSION['user_type'] = 'admin';
			if(!$f3->POST['remember']) {
				$f3->SESSION['user']=$user->id;
				$f3->SESSION['user_obj']=$user;
			} else {
				$f3->set('COOKIE.user', $user->id, time() + 24*3600*7);
			}
			$f3->reroute('@admin_home');
			return;
		}
		\Flash::instance()->addMessage('Wrong password, you morron!', 'danger');
		$this->index($f3);
		return;
	}
	
	function get_logout($f3) {
		$f3->set("COOKIE.user", null, time()- 24*3600*7);
		$f3->clear("SESSION");
		$f3->reroute($f3->alias('admin_pack', array("pack"=>"auth")) . "?sesi_lenyap");
	}
}