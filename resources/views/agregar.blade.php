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
            <form action="{{route('people.store')}}" method="POST">
              @csrf
                <label for="">Apellido Paterno</label>
                <input type="text" name="apPat" class="form-control" required>
                <br>
                <label for="">Apellido Materno</label>
                <input type="text" name="apMat" class="form-control" required>
                <br>
                <label for="">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
                <br>
                <label for="">Fecha Nacimiento</label>
                <input type="date" name="fecNac" class="form-control" required>
                <br>
                <button class="btn btn-primary">AGREGAR</button>
                <br><br>
                <a href="{{route('people.index')}}" class="btn btn-danger">volver</a>
            </form>
        </p>
    </div>
  </div>
@endsection