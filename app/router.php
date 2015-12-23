<?php
//APP ROUTER a.k.a VIEWER
\F3::mset(array(
		"UI"=>__DIR__ . "/View/",
		"DEBUG" => 2,
		"UPLOADS" => __DIR__ . "/uploaded/",
		"AUTOLOAD" => __DIR__ . "/",
		"TEMP" => __DIR__ . "/tmp/",
		#"CACHE"=> __DIR__ . "/cachez/",
		
		// SYSTEMS SETTINGS
		"kekesed.sitename"=>"Kambeng blog",
		"kekesed.copyright.text"=>"Kekesed Asmasta. All Right Reserved.",
		"kekesed.copyright.year_start"=>"2014"
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
#\F3::route("GET @virtualasset: /assets/virt/@id.@type", "Control\\Imager->akses");
\F3::route("GET @virtualasset: /img/@link/@size-@id-@type", "Control\\Imager->akses", 3600 * 24 * 7); // cache seminggu :3