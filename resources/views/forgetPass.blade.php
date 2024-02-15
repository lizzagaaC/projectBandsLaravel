@extends('layouts.template')

@section('contenidoPrincipal')

    <form action="{{route("sendMail")}}" method="POST">
        @csrf

        <input placeholder="Email" name="email" type="email" @error("email") style="border:1px solid red" @enderror value="{{old("email")}}">
        @error("email")
            <p style="color:red">{{$message}}</p>
        @enderror

        <input placeholder="New Password" name="password" type="password" @error("password") style="border:1px solid red" @enderror value="{{old("password")}}">
        @error("password")
            <p style="color:red">{{$message}}</p>
        @enderror

        <input type="submit" value="Ok">
    </form>

@endsection