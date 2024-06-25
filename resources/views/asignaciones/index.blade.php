@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-3"></div>
                <div class="col-sm-3 ">
                    <h1 class="m-0">Asignaciones</h1>
                </div>
                <div class="col-sm-4 ">
                    <ol class="breadcrumb  align-items-end">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Asignaciones</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Listado de Asignaciones</div>
                    <div class="card-body">
                        @include('includes.alertas')
                        <div class="row">
                            <div class="col-md-6"></div>
                            @if (auth()->user()->tipo == 'Administrador')
                                <div class="col-md-6 text-end mb-2">
                                    <a href="{{ url('/asignaciones/registrar') }}" class="btn btn-primary">Nuevo</a>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>USUARIO</th>
                                                <th>CURSO</th>
                                                <th>FECHA DE INICIO</th>
                                                <th>FECHA DE FIN</th>
                                                <th>IMPORTE</th>
                                                <th>ESTADO</th>
                                                @if (auth()->user()->tipo == 'Administrador')
                                                    <th>ACCIONES</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($asignaciones as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->usuario->name }}</td>
                                                    <td>{{ $item->curso->nombre }}</td>
                                                    <td>{{ $item->fecha_inicio }}</td>
                                                    <td>{{ $item->fecha_finalizacion }}</td>
                                                    <td>{{ $item->importe }}</td>
                                                    <td>
                                                        @if ($item->estado == true)
                                                            <span class="badge text-success">Activo</span>
                                                        @else
                                                            <span class="badge text-danger">Inactivo</span>
                                                        @endif
                                                    </td>
                                                    @if (auth()->user()->tipo == 'Administrador')
                                                        <td>
                                                            <a href="{{ url('/asignaciones/actualizar/' . $item->id) }}"
                                                                class="btn btn-sm btn-warning">📑</a>
                                                            @if ($item->estado == true)
                                                                <a href="{{ url('/asignaciones/estado/' . $item->id) }}"
                                                                    class="btn btn-sm btn-danger">🚫</a>
                                                            @else
                                                                <a href="{{ url('/asignaciones/estado/' . $item->id) }}"
                                                                    class="btn btn-sm btn-success">✔</a>
                                                            @endif
                                                        </td>
                                                    @endif

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $asignaciones->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
