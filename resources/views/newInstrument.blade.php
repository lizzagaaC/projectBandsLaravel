@extends('layouts.template')

@section('contenidoPrincipal')

    <div class="menu-horizontal">
        <div class="div-logo">
            <div>
                <img class="imagenPrueba" src="../public/{{auth()->user()->logo}}"/>
            </div>
            <div>
                <h2>{{auth()->user()->bandname}}</h2>
            </div>
        </div>

        <div class="div-texto">
            <a href="{{route("home")}}">Home</a>
            <a href="{{route("newInstrument")}}">Alta d'Instrument</a>
            <a href="#">Ajuda</a>
            <a href="{{route("logout")}}">Tancar Sessió</a>
        </div>
    </div>

    <div class="form-create">
        <form action="{{route("newInstrument")}}" method="POST" enctype="multipart/form-data">
            @csrf
    
            <div class="form-left">
                <h1>New Instrument</h1>
                <img src="../public/create.png" alt="Imagen del formulario">
            </div>
    
            <div class="form-right">
                <input placeholder="Family" type="text" name="family" @error("family") style="border:1px solid red" @enderror value={{old("family")}}>
                @error("family")
                    <p style="color:red">{{$message}}</p>
                @enderror

                <input placeholder="Type" type="text" name="type" @error("type") style="border:1px solid red" @enderror value={{old("type")}}>
                @error("type")
                    <p style="color:red">{{$message}}</p>
                @enderror

                <input placeholder="Brand" type="text" name="brand" @error("brand") style="border:1px solid red" @enderror value={{old("brand")}}>
                @error("brand")
                    <p style="color:red">{{$message}}</p>
                @enderror

                <input placeholder="Model" type="text" name="model" @error("model") style="border:1px solid red" @enderror value={{old("model")}}>
                @error("model")
                    <p style="color:red">{{$message}}</p>
                @enderror

                <input placeholder="Serial Number" type="text" name="serial_number">
                
                <input placeholder="Acquisition Date" type="date" name="acquisition_date">
                
                <input placeholder="State" type="text" name="state" @error("state") style="border:1px solid red" @enderror value={{old("state")}}>
                @error("state")
                    <p style="color:red">{{$message}}</p>
                @enderror
                <input placeholder="Comment" type="text" name="comment">
                
                <input placeholder="Image" type="file" name="image" @error("image") style="border:1px solid red" @enderror value={{old("image")}}>
                @error("image")
                    <p style="color:red">{{$message}}</p>
                @enderror
        
                <input type="submit" value="Add">
            </div>
        </form>
    </div>

@endsection