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
            <a href="{{route("generatePDF")}}">Generar PDF</a>
            <a href="{{route("logout")}}">Tancar Sessió</a>
        </div>
    </div>

    <div class="contenido">
        <div class="menu-vertical">
            <div class="div-interno">
                <form method="POST">
                    @csrf
                    <h2>Cerca</h2><br>
    
                    <label><b>Tipo</b></label><br>
                    <input type="text" name="tipo" /><br><br>
    
                    <label><b>Marca</b></label><br>
                    <input type="text" name="marca" /><br><br>
    
                    <label><b>Model</b></label><br>
                    <input type="text" name="model" /><br><br>
    
                    <label><b>Nº de serie</b></label><br>
                    <input type="text" name="numSerie" /><br><br>
    
                    <label><b>Estat</b></label><br>
                    <input type="text" name="estado" /><br><br>
    
                    <input type="submit" value="Filtrar" name="botonFiltrar" /><br>
                    <input type="reset" value="Borrar Filtros" />
                </form>
            </div>
        </div>

        <div class="contenido-principal">
            <div class="contenedorInstrumentos">
                @foreach ($instrumentos as $instrumento)
                    @if (
                        (empty(request('tipo')) || strpos($instrumento->type, request('tipo')) !== false) &&
                        (empty(request('marca')) || strpos($instrumento->brand, request('marca')) !== false) &&
                        (empty(request('model')) || strpos($instrumento->model, request('model')) !== false) &&
                        (empty(request('numSerie')) || strpos($instrumento->serial_number, request('numSerie')) !== false) &&
                        (empty(request('estado')) || strpos($instrumento->state, request('estado')) !== false)
                    )
                    <div class='instrumento'>
                        <img src="../public/{{$instrumento->image}}" /><br>
                        <label><b>Family: </b>{{$instrumento->family}}</label><br>
                        <label><b>Type: </b>{{$instrumento->type}}</label><br>
                        <label><b>Brand: </b>{{$instrumento->brand}}</label><br>
                        <label><b>Model: </b>{{$instrumento->model}}</label><br>
                        <label><b>Serial NUmber: </b>{{$instrumento->serial_number}}</label><br>
                        <label><b>Acquisition Date: </b>{{$instrumento->acquisition_date}}</label><br>
                        <label><b>State: </b>{{$instrumento->state}}</label><br>
                        <label><b>Comment: </b>{{$instrumento->comment}}</label><br>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        
    </div>

@endsection