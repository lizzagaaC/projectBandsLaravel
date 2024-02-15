@extends('layouts.template')

@section('contenidoPrincipal')

    <form action="{{route("signup")}}" method="POST" enctype="multipart/form-data">
        @csrf

        <h1>Sign Up</h1>
        <img src="../public/user.png">

        <input placeholder="Name" type="text" name="name" @error("name") style="border:1px solid red" @enderror value={{old("name")}}>
        @error("name")
            <p style="color:red">{{$message}}</p>
        @enderror

        <input placeholder="Band Name" type="text" name="bandname" @error("bandname") style="border:1px solid red" @enderror value={{old("bandname")}}>
        @error("bandname")
            <p style="color:red">{{$message}}</p>
        @enderror

        <input placeholder="Email" type="email" name="email" @error("email") style="border:1px solid red" @enderror value={{old("email")}}>
        @error("email")
            <p style="color:red">{{$message}}</p>
        @enderror

        <input placeholder="Password" type="password" name="password" @error("password") style="border:1px solid red" @enderror value={{old("password")}}>
        @error("password")
            <p style="color:red">{{$message}}</p>
        @enderror

        <input placeholder="Logo" type="file" name="logo" @error("logo") style="border:1px solid red" @enderror value={{old("logo")}}>
        @error("logo")
            <p style="color:red">{{$message}}</p>
        @enderror

        <input type="submit" value="Accept"><br><br>

        <a href="{{route("login")}}">Back to Login</a>
    </form>

@endsection