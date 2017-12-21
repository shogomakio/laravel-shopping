<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{Route('product.index')}}">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" method="post" action="{{route('product.search')}}">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="q" id="q">
        <button type="submit" class="btn btn-default">Search</button>
        </div>
        {{csrf_field()}}
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{route('product.shoppingCart')}}"><i class="fas fa-shopping-cart"></i> Shoppig Cart <span class="badge">{{ Session::has('cart')?Session::get('cart')->totalQty : ''}}</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="far fa-user-circle"></i> {{Auth::check() ? Auth::user()->first_name : 'Account'}}<span class="caret"></span></a>
          <ul class="dropdown-menu">
          @if(Auth::check())
            <li><a href="{{route('user.profile')}}">Profile</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{route('user.logout')}}">Logout</a></li>
          @else
            <li><a href="{{route('user.signup')}}">Signup</a></li>
            <li><a href="{{route('user.signin')}}">Signin</a></li>
          @endif
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>