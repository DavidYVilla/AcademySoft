@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-3"></div>
                <div class="col-sm-3 ">
                    <h1 class="m-0">Tareas</h1>
                </div>
                <div class="col-sm-4 ">
                    <ol class="breadcrumb  align-items-end">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Tareas</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Listado de Tareas</div>
                    <div class="card-body">
                        @include('includes.alertas')
                        <div class="row">
                            <div class="col-md-6"></div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>ASIGNACIONES</th>
                                                <th>DESCRIPCION</th>
                                                <th>ENTREGA</th>
                                                <th>NOTA</th>
                                                <th>ACCIONES</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (auth()->user()->tipo == 'Administrador')
                                                @foreach ($todo as $item)
                                                    {{-- @if ($item->id == $asignaciones->usuarios_id || auth()->user()->tipo == 'Administrador') --}}
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->asignacion_id }}</td>
                                                        <td>{{ $item->descripcion }}</td>

                                                        <td>
                                                            @if ($item->entrega == true)
                                                                <span class="badge text-success">Entregado</span>
                                                            @else
                                                                <span class="badge text-danger">Pendiente</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($item->nota != 0.0)
                                                                <span class="badge text-success">{{ $item->nota }}</span>
                                                            @else
                                                                <span class="badge text-danger">Calificacion
                                                                    Pendiente</span>
                                                            @endif
                                                        </td>

                                                        <td>
                                                            @if ($item->entrega == true && $item->nota == 0.0)
                                                                <a href="{{ url('/tareas/actualizar/' . $item->id) }}"
                                                                    class="btn btn-sm btn-succes">calificar</a>
                                                            @else
                                                                <p>Sin acciones</p>
                                                            @endif

                                                        </td>


                                                    </tr>
                                                    {{-- @endif --}}
                                                @endforeach
                                            @else
                                                @foreach ($tareas as $item)
                                                    {{-- @if ($item->id == $asignaciones->usuarios_id || auth()->user()->tipo == 'Administrador') --}}
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->asignacion_id }}</td>
                                                        <td>{{ $item->descripcion }}</td>

                                                        <td>
                                                            @if ($item->entrega == true)
                                                                <span class="badge text-success">Entregado</span>
                                                            @else
                                                                <span class="badge text-danger">Pendiente</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($item->nota != 0.0)
                                                                <span class="badge text-success">{{ $item->nota }}</span>
                                                            @else
                                                                <span class="badge text-danger">Calificacion
                                                                    Pendiente</span>
                                                            @endif
                                                        </td>

                                                        <td>
                                                            @if ($item->entrega == true)
                                                                <p>Sin acciones</p>
                                                            @else
                                                                <a href="{{ url('/tareas/entregar/' . $item->id) }}"
                                                                    class="btn btn-sm btn-succes">Entregar</a>
                                                            @endif


                                                        </td>


                                                    </tr>
                                                    {{-- @endif --}}
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    {{ $tareas->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
