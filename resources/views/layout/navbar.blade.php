<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="#">
				Perbaiah				
			</a>		
			@if(auth()->user() && auth()->user()->is('admin'))
			<div class="nav-collapse">
				<ul class="nav pull-right">			
					<li class="dropdown">						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i> 
							{{ auth()->user()->nama }}
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="/admin/user/1/edit">Profil</a></li>
							<li><a href="/log-keluar">Log Keluar</a></li>
						</ul>						
					</li>
				</ul>				
			</div><!--/.nav-collapse -->	
            @endif
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div>
@if(auth()->user() && auth()->user()->is('admin'))
<div class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <li {{ setActive('admin/user') }}><a href="/admin/user"><i class="icon-user"></i><span>Ahli</span> </a> </li>
                <li {{ setActive('admin/blog*') }}><a href="/admin/blog"><i class="icon-book"></i><span>Blog</span> </a> </li>
                <li {{ setActive('admin/album*') }}><a href="/admin/album"><i class="icon-picture"></i><span>Album</span> </a></li>
                {{--  <li {{ setActive('admin/chat*') }}><a href="/admin/chat"><i class="icon-comment"></i><span>Perbualan</span> </a></li>  --}}
            </ul>
        </div>
    </div>
</div>
@endif