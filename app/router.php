<?php
//APP ROUTER a.k.a VIEWER
\F3::mset(array(
		"UI"=>__DIR__ . "/View/",
		"DEBUG" => 2,
		"UPLOADS" => __DIR__ . "/uploaded/",
		"AUTOLOAD" => __DIR__ . "/",
		"TEMP" => __DIR__ . "/tmp/",
		"CACHE"=> __DIR__ . "/cachez/",
		
		// SYSTEMS SETTINGS
		"kekesed.sitename"=>"Kambeng blog",
		"kekesed.copyright.text"=>"Kekesed Asmasta. All Right Reserved.",
		"kekesed.copyright.year_start"=>"2014",
		"kekesed.system.version"=>"0.1.17"
		)
	);
\kksd\Sesi::$DB = new \DB\SQL("mysql:host=127.0.0.1;port=3306;dbname=kambeng_blog", "kambeng_blog", "kambeng");
\F3::route("GET /", 'Control\\App->indexer');
/*
\F3::route("GET /bikinuser/kambang", function($f3) {
	if(!$f3->exists('GET.email') or !$f3->exists('GET.pass'))
		echo "Gagal";
	$kampret = new Model\User();
	$kampret->email = $f3->get('GET.email');
	$kampret->pass = $f3->get('GET.pass');
	$kampret->save();
}); */

\F3::route("GET @blogread:     /baca/@id-xyml", "Control\\Blog->Tampil");
\F3::route("GET @virtualasset: /img/@link/@size-@id-@type", "Control\\Imager->akses", 3600 * 24 * 7); // cache seminggu :3

/*
	ADMIN PANEL SETTINGS
*/
\F3::route("GET @admin: /admin", "\\Control\\Admin\\App->home");
\F3::route("GET @admin_robot: /admin/robots-txt", function($f3) {
	header("Content-type: text/plain");
	echo "Agent *\nDisallow *";
});
\F3::route("GET @admin_home: /admin/dash", "\\Control\\Admin\\App->dash");

\F3::route("GET @admin_pack: /admin/@pack", "\\Control\\Admin\\@pack->index");
\F3::route("POST /admin/@pack", "\\Control\\Admin\\@pack->post_index");
\F3::route("GET @admin_pack_func: /admin/@pack/@func", "\\Control\\Admin\\@pack->get_@func");
\F3::route("POST /admin/@pack/@func", "\\Control\\Admin\\@pack->post_@func");
