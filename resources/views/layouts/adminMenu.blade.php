<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>
  <link rel="stylesheet" href="{{URL::to('src/css/app.css')}}"

    @yield('styles')
</head>
<body>



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
      <a class="navbar-brand" >Admin Panel</a>
        <ul class="nav navbar-nav">
        <li><a href="{{route('admin.register')}}">Register Product<span class="sr-only">(current)</span></a></li>
        <li><a href="{{route('admin.list')}}">Products List</a></li>
        </ul>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      {{--  <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>  --}}
      <ul class="nav navbar-nav navbar-right">
        {{--  <li><a href="{{route('product.shoppingCart')}}"><i class="fas fa-shopping-cart"></i> Shoppig Cart <span class="badge">{{ Session::has('cart')?Session::get('cart')->totalQty : ''}}</span></a></li>  --}}
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="far fa-user-circle"></i> {{Auth::guard('admin')->check() ? Auth::guard('admin')->user()->first_name : 'Account'}}<span class="caret"></span></a>
          <ul class="dropdown-menu">  
            <li><a href="{{route('admin.logout')}}">Back to the main page</a></li>
          @if(Auth::guard('admin')->check())
            {{--  <li><a href="{{route('user.profile')}}">Profile</a></li>  --}}
            <li role="separator" class="divider"></li>
            <li><a href="{{route('admin.logout')}}">Logout</a></li>
          {{--  @else
            <li><a href="{{route('user.signup')}}">Signup</a></li>
            <li><a href="{{route('user.signin')}}">Signin</a></li>  --}}
          @endif
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div class="container">
@yield('content')
<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
@yield('scripts')
</body>
</html>