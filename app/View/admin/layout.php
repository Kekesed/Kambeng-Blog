<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <check if="{{isset(@page.title)}}"><title>{{@page.title}}</title></check>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/assets/adminlte/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/assets/adminlte/css/skins/_all-skins.min.css">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <a href="{{'admin_home', '' | alias}}" class="logo">
          <span class="logo-mini"><b>A</b>LT</span>
          <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
		<include href="admin/component/c_topbar.php"/>
      </header>
      <aside class="main-sidebar">
        <include href="admin/component/c_sidebar.php"/>
      </aside>
      <div class="content-wrapper">
        <check if="{{isset(@page.header)}}">
        <section class="content-header">
          <h1>
            {{@page.header.title}}
            <check if="{{@page.header.subtitle}}"><small>{{@page.header.subtitle}}</small></check>
          </h1>
          <ol class="breadcrumb">
		  <exclude>
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
		  </exclude>
		  
          </ol>
        </section>
		</check>

        <section class="content">
			<include href="{{'admin/' . @page.content}}"/>
        </section>
      </div>

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> {{@kekesed.system.version}}
        </div>
        <strong>Copyright &copy; {{@kekesed.copyright.year_start}}-{{date("Y")}}.</strong> {{@kekesed.copyright.text}}
      </footer>

      <include href="admin/component/c_aside.php"/>
    </div>
    <script src="/assets/adminlte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="/assets/plugins/fastclick/fastclick.min.js"></script>
    <script src="/assets/adminlte/js/app.min.js"></script>
  </body>
</html>
