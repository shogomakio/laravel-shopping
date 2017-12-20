@extends('layouts.adminMenu')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1>Sign Up</h1>
        @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif
        <form action="{{route('user.signup')}}" method="post">
            <div class="form-group">
                <label for="user_id">ID</label> 
                <input type="integer" id="user_id" name="user_id" class="form-control">
            </div>
            <div class="form-group">
                <label for="first_name">First Name</label> 
                <input type="text" id="first_name" name="first_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label> 
                <input type="text" id="last_name" name="last_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label> 
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="pasword">Password</label> 
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
            {{csrf_field()}}
        </form>
    </div>
</div>
@endsection