<section class="sidebar">
  <div class="user-panel">
	<div class="pull-left image">
	  <img src="{{\Control\App::resolve_picturl(@system.user->ppid,'sm')}}" class="img-circle" alt="User Image">
	</div>
	<div class="pull-left info">
	  <p>{{@system.user->nama_depan . ' ' . @system.user->nama_belakang}}</p>
	  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
	</div>
  </div>
  <form action="#" method="get" class="sidebar-form">
	<div class="input-group">
	  <input type="text" name="q" class="form-control" placeholder="Search...">
	  <span class="input-group-btn">
		<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
	  </span>
	</div>
  </form>
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
	<li class="header">MENU :3</li>
	<php>
	$sidebar = new \SimpleXMLElement(file_get_contents(__DIR__ . "/../View/admin/navbarinfo.xml"));
	</php>
	<repeat group="{{@sidebar->fungsi}}" value="{{@dsb}}">
	<li class="{{
	( \F3::alias('admin_pack', array('pack'=>@dsb.namespace))== '/'.substr(@PATH, 1,strlen(\F3::alias('admin_pack', array('pack'=>@dsb.namespace)))))?'active':''
	  }} {{(
	  @dsb->children()->count()>= 1)?'treeview':''}}">
		<a href="{{'admin_pack', 'pack=' . @dsb.namespace | alias}}"><i class="fa {{@dsb.icon}}"></i> <span>{{@dsb.name}}</span>
		<check if="{{@dsb->children()->count() >= 1}}">
		<i class="fa fa-angle-left pull-right"></i>
		</check>
		</a>
		<check if="{{@dsb->children()->count() >= 1}}">
		<ul class="treeview-menu">
			<li class="{{(\F3::alias('admin_pack', array('pack'=>@dsb.namespace))== '/'.substr(@PATH, 1,strlen(\F3::alias('admin_pack', array('pack'=>@dsb.namespace)))))?'active':''}}">
					<a href="{{'admin_pack', 'pack=' . @dsb.namespace | alias}}"><i class="fa"></i> <span>{{@dsb.index}}</span></a>
			</li>
			<repeat group="{{@dsb->f}}" value="{{@g}}">
				<li class="{{
					( \F3::alias('admin_pack_func', array('pack'=>@dsb.namespace, 'func'=>@g.namespace))==
					\F3::alias('admin_pack_func', array('pack'=>@PARAMS.pack, 'func'=>@PARAMS.func)))?'active':''}}">
					<a href="{{'admin_pack_func', 'pack=' . @dsb.namespace . ',func=' . @g.namespace | alias}}"> <i class="fa {{@g.icon}}"></i> <span>{{@g.name}}</span></a>
				</li>
			</repeat>
		</ul>
		</check>
	</li>
		
	</repeat>
	  </ul>
	</li>
  </ul>
</section>