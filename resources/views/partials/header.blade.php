<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{Route('product.index')}}">Home</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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