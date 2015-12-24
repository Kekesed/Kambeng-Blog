<?php
//APP ROUTER a.k.a VIEWER
\F3::mset(array(
		"UI"=>__DIR__ . "/View/",
		"DEBUG" => 2,
		"UPLOADS" => __DIR__ . "/uploaded/",
		"AUTOLOAD" => __DIR__ . "/;" . __DIR__ . "/f3/burger/",
		"TEMP" => __DIR__ . "/tmp/",
		"CACHE"=> __DIR__ . "/cachez/",
		
		// SYSTEMS SETTINGS
		"kekesed.sitename"=>"Kambeng blog",
		"kekesed.copyright.text"=>"Kekesed Asmasta. All Right Reserved.",
		"kekesed.copyright.year_start"=>"2014",
		"kekesed.system.version"=>"0.1.17"
		)
	);
if(!isset($_SESSION)) session_start();
\kksd\Sesi::$DB = new \DB\SQL("mysql:host=127.0.0.1;port=3306;dbname=kambeng_blog", "kambeng_blog", "kambeng");
\F3::set('db', \kksd\Sesi::$DB);
/* 
	PUBLIC SETTINGS~ :* :*
 */
\F3::route("GET /", 'Control\\App->indexer');
\F3::route("GET @blogread:     /baca/@id-xyml", "Control\\Blog->Tampil");
\F3::route("GET @virtualasset: /img/@link/@size-@id-@type", "Control\\Imager->akses", 3600 * 24 * 7); // cache seminggu :3

/*
	ADMIN PANEL SETTINGS~ :* :*
*/
\Middleware::instance()->before('GET|POST|PUT|DELETE /admin*',function(\Base $f3, $param) {
	//cek apa dia login apa kagak, dan layak apa kagak. lel
	$access = \Access::instance();
	$access->policy('deny');
	$access->allow('/admin/*', 'admin');
	$access->allow('GET|POST /admin/Auth*');
	$access->allow('GET|POST /admin/auth*');
	if(!$f3->exists('SESSION.user_type') && !$f3->exists('COOKIE.user')) $f3->set('SESSION.user_type', 'guest');
	$access->authorize($f3->get('SESSION.user_type'), function($route, $subject) {
		\F3::reroute('@admin_pack(@pack=Auth)');
	});
	
	/* 
		Default settings for template #1
	*/
	if($f3->exists("COOKIE.user") or $f3->exists("SESSION.user")) {
		$userz = \User::createUser(\kksd\Sesi::$DB);
		$userz->load(array('id=?', ($f3->exists("COOKIE.user")?$f3->COOKIE['user']:$f3->SESSION['user'])));
		$f3->set("system.user",$userz);
	}
	\Template::instance()->extend('php', function($args){
		$html = (isset($args[0])) ? $args[0] : '';
		return "<?php $html ?>";
	});
});
\F3::route("GET  @admin:      /admin", "\\Control\\Admin\\App->home");
\F3::route("GET  @admin_home: /admin/dash", "\\Control\\Admin\\App->dash");

\F3::route("GET  @admin_pack: /admin/@pack", "\\Control\\Admin\\@pack->index");
\F3::route("POST @admin_pack", "\\Control\\Admin\\@pack->post_index");
\F3::route("GET  @admin_pack_func: /admin/@pack/@func", "\\Control\\Admin\\@pack->get_@func");
\F3::route("POST @admin_pack_func", "\\Control\\Admin\\@pack->post_@func");


\Middleware::instance()->run(); //we've settinged a middleware, be4.