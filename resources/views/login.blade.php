@extends('layouts.template')

@section('contenidoPrincipal')
    
    <form action="{{route("login")}}" method="POST">
        @csrf

        <h1>Log In</h1>
        <img src="../public/user.png">

        <input placeholder="Name" type="text" name="name" @error("name") style="border:1px solid red" @enderror value={{old("name")}}>
        @error("name")
            <p style="color:red">{{$message}}</p>
        @enderror

        <input placeholder="Password" type="password" name="password" @error("password") style="border:1px solid red" @enderror value={{old("password")}}>
        @error("password")
            <p style="color:red">{{$message}}</p>
        @enderror

        <input type="submit" value="Accept"><br><br><br>

        <p>Do not you have an account yet? <a href="{{route("signup")}}">Sign up</a></p>

        <h4>----------------------------------------------</h4>

        <a href="{{route("forgetPass")}}">Have you forgotten your password?</a>

    </form>

@endsection