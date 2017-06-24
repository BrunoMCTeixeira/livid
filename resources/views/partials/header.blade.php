<header class="mb-5">
	<nav class="navbar top navbar-toggleable-md navbar-light">
  <div class="container">
  	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <a class="navbar-brand" href="#">Livid</a>

	  <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
		<ul class="navbar-nav d-flex align-items-center" >
			<li class="nav-item">
				<a class="nav-link d-flex align-items-center white" href="#">
					<i class="fa fa-2x fa-life-ring pr-2"></i>
					<div>Ajuda </div>
				</a>
			</li>
			
			<li class="nav-item ml-3 darkerBlue">
				<a class="nav-link" href="/auth">
					Login
				</a>
			</li>

			@if(Auth::user())
				<li class="nav-item dropdown">
					<a class="nav-link user dropdown-toggle white mx-4 d-flex align-items-center" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  <img src="http://via.placeholder.com/50x50" class="rounded-circle mr-2" alt="">
					  <div>@ {{ Auth::user()->username }}</div>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					  <a class="dropdown-item" href="#">Action</a>
					  <a class="dropdown-item" href="#">Another action</a>
					  <a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li>

				<li class="nav-item darkerBlue">
					<a class="nav-link" href="#">
						<i class="fa fa-lg fa-envelope"></i>
					</a>
				</li>

				<li class="nav-item darkerBlue">
					<a class="nav-link" href="#">
						<i class="fa fa-lg fa-user-plus"></i>
					</a>
				</li>

				<li class="nav-item darkerBlue">
					<a class="nav-link" href="#">
						<i class="fa fa-lg fa-exclamation-circle"></i>
					</a>
				</li>
				
				<li class="nav-item ml-3 darkerBlue">
					<a class="nav-link" href="/auth/logout">
						Sair
					</a>
				</li>
			@endif
		</ul>
		
	  </div>
  </div>
</nav>
</header>