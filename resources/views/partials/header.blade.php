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

    {{--  <table class="navbar-form navbar-right">
      <td>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <form class="navbar-form navbar-right" method="post" action="{{route('product.search')}}">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search" name="q" id="q">
                        <select name="genre">
                            <option value="-">Genre</option>
                            @foreach($genres as $genre)
                            <option value="{{$genre['genre_id']}}" >{{$genre['genre_name']}}</option>
                            @endforeach
                        </select>
                        </td>
                        <td>
                        <select name="brand">
                            <option value="-">Brand</option>
                            @foreach($brands as $brand)
                            <option value="{{$brand['brand_id']}}" >{{$brand['brand_name']}}</option>
                            @endforeach
                        </select>
            <button type="submit" class="btn btn-default">Search</button>
            </div>
            {{csrf_field()}}
          </form>
        </div><!-- /.navbar-collapse -->
      </td>
    </table>  --}}
  </div><!-- /.container-fluid -->
</nav>