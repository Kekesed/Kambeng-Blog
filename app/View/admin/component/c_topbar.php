<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
<!-- Sidebar toggle button-->
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</a>
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
  <li class="dropdown user user-menu">
	<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
	  <img src="{{\Control\App::resolve_picturl(@system.user->ppid,'sm')}}" class="user-image" alt="User Image">
	  <span class="hidden-xs">{{@system.user->nama_depan . ' ' . @system.user->nama_belakang}}</span>
	</a>
	<ul class="dropdown-menu">
	  <!-- User image -->
	  <li class="user-header">
		<img src="{{\Control\App::resolve_picturl(@system.user->ppid,'sm')}}" class="img-circle" alt="User Image">
		<p>
		  {{@system.user->nama_depan . ' ' . @system.user->nama_belakang}}
		  <small>Member since {{date('M. Y',strtotime(@system.user->regdate))}}</small>
		</p>
	  </li>
	  <li class="user-footer">
		<div class="pull-left">
		  <a href="{{'admin_pack_func', 'pack=account,func=me' | alias}}" class="btn btn-default btn-flat">Profile</a>
		</div>
		<div class="pull-right">
		  <a href="{{'admin_pack_func', 'pack=Auth,func=logout' | alias}}" class="btn btn-default btn-flat">Sign out</a>
		</div>
	  </li>
	</ul>
  </li>
</ul>
</div>
</nav>
