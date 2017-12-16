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
			@if(auth()->user())
			<div class="nav-collapse">
				<ul class="nav pull-right">			
					<li class="dropdown">						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i> 
							{{ auth()->user()->nama }}
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="/user/profil">Profil</a></li>
							<li><a href="/log-keluar">Log Keluar</a></li>
						</ul>						
					</li>
				</ul>	
                <form class="navbar-search pull-right" method="POST" action="/user/search" autocomplete="off">
				{{ csrf_field() }}
				<div style="position: relative;">
                    <input type="text" name="search" class="search-query" placeholder="Nama atau Kad Pengenalan" style="height: 19px;">
					<button type="submit" style="position: absolute;right: 6px;top: 4px;border-radius: 50px;border: 0px;background: white;"><i class="icon-arrow-right"></i></button>
				</div>
                </form>			
			</div><!--/.nav-collapse -->	
            @endif
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div>
@if(auth()->user() && auth()->user()->is('user'))
<div class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <li {{ setActive('user/blog*') }}><a href="/user/blog"><i class="icon-comment"></i><span>Blog</span> </a></li>
                <li {{ setActive('user/about*') }}><a href="/user/about"><i class="icon-user"></i><span>Tentang Perbaiah</span> </a> </li>
                <li {{ setActive('user/organisation*') }}><a href="/user/organisation"><i class="icon-book"></i><span>Carta Organisasi</span> </a> </li>
                <li {{ setActive('user/album*') }}><a href="/user/album"><i class="icon-picture"></i><span>Galeri</span> </a></li>
                {{--  <li {{ setActive('user/chat*') }}><a href="/user/chat"><i class="icon-picture"></i><span>Cakap dengan Admin</span> </a></li>  --}}
            </ul>
        </div>
    </div>
</div>
@endif