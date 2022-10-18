@extends('layout/plantilla')

@section('titulos','Aprendo Cruds')

@section('contenido')
<br><br>
<div class="card text-center">
  <div class="card-header">
    CRUD
  </div>
  <div class="card-body">
    <div class="row">
        <div class="col-sm-12">
            @if ($mensaje=Session::get('success')) 
            <div class="alert alert-success" role="alert">
                {{$mensaje}}
              </div>
            @endif

            
        </div>
    </div>
    <h5 class="card-title">Listado ps</h5>
    <p>
        <a href="{{ route('people.create')}}" class="btn btn-primary">
            <i class="fa-solid fa-user-plus"></i>Agrega ps
        </a>
    </p>
    <hr>
    <p class="card-title">
        <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                    <th>Ap Pat</th>
                    <th>Ap Mat</th>
                    <th>Nombre</th>
                    <th>Fecha Nac</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                @foreach ($datos as $item)   
                    <tr>
                        <td>{{$item->apPat}}</td>
                        <td>{{$item->apMat}}</td>
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->fecNac}}</td>
                        <td>
                            <form action="{{route('people.edit',$item->id)}}" method="GET">
                                <button  class="btn btn-dark">
                                    <span class="fa-solid fa-circle-xmark"></span>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="{{route('people.show',$item->id)}}" method="GET">
                                <button  class="btn btn-danger">
                                    <span class="fa-solid fa-circle-xmark"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <hr>
            
        </div>
        <div class="row">
            <div class="col-sm-12">
                {{$datos->links()}}
            </div>
        </div>
    </p>
  </div>
</div>
@endsection