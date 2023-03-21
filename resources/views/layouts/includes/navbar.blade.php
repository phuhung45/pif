<header class="heađer">
<nav class="navbar navbar-expand-lg navbar-light">
	<div class="container">
	  <a class="navbar-brand" href="/"><img src="/images/logo-pif.png" width="160" height="89" /></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbar">
		<ul class="navbar-nav ml-auto">
		  <li class="nav-item active">
			<a class="nav-link" href="/">Giới thiệu <span class="sr-only">(current)</span></a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="{{ route('recruitment') }}">Tuyển dụng</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="{{ route('contact') }}">Liên hệ</a>
		  </li>
		</ul>
	  </div>
	  <a class="nav-link btn btn-primary btn-login" href="{{ route('user.login') }}"><i class="fa fa-user"></i> Đăng nhập</a>
	  </div>
</nav>
</header>