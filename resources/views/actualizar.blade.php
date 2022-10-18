{{-- para definir rutas de archivos se puede utilizar / o . vease index se usa / en este view usamos . --}}
@extends('layout.plantilla') 
@section("titulos","Crear")
@section('contenido')
<div class="card text-center">
    <div class="card-header">
      CREANDO
    </div>
    <div class="card-body">
        <p class="card-text">
            <form action="{{route('people.update', $people->id)}}" method="POST">
              @csrf
              @method("PUT")
                <label for="">Apellido Paterno</label>
                <input type="text" name="apPat" class="form-control" required value="{{$people->apPat}}">
                <br>
                <label for="">Apellido Materno</label>
                <input type="text" name="apMat" class="form-control" required value="{{$people->apMat}}">
                <br>
                <label for="">Nombre</label>
                <input type="text" name="nombre" class="form-control" required value="{{$people->nombre}}">
                <br>
                <label for="">Fecha Nacimiento</label>
                <input type="date" name="fecNac" class="form-control" required value="{{$people->fecNac}}">
                <br>
                <button class="btn btn-warning">ACTUALIZAR</button>
                <br><br>
                <a href="{{route('people.index')}}" class="btn btn-danger">volver</a>
            </form>
        </p>
    </div>
  </div>
@endsection