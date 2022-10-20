@extends('layout/plantilla')

@section('titulos','Aprendo Cruds')

@section('contenido')
<br><br>
<div class="card text-center">
  <div class="card-header">
    CRUD
    <form action="{{route('people.index')}}" method="GET">
        <div class="form-row">
            <div class="col-sm-4 my-1">
                <input type="text" class="form-control" name="busqueda" value="{{$busqueda}}">
            </div>
            <div class="col-sm-4 my-1">
                <input type="submit" class="btn btn-primary" value="Buscar">
            </div>
        </div>
    </form>

    {{-- <form class="form-inline my-2 my-lg-0" action="{{route('people.index')}}" method="GET">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" value="{{$busqueda}}">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form> --}}
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
                @if (count($datos)<=0)
                    <tr>
                        <td colspan="6">No pudimos encontrar a quien buscas</td>
                    </tr>
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
                
                @endif
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