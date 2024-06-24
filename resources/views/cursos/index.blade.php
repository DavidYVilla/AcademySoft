@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-3"></div>
                <div class="col-sm-3 ">
                    <h1 class="m-0">Cursos</h1>
                </div>
                <div class="col-sm-4 ">
                    <ol class="breadcrumb  align-items-end">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Cursos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Listado de Cursos</div>
                    <div class="card-body">
                        @include('includes.alertas')
                        <div class="row">
                            <div class="col-md-6"></div>
                            @if (auth()->user()->tipo == 'Administrador')
                                <div class="col-md-6 text-end mb-2">
                                    <a href="{{ url('/cursos/registrar') }}" class="btn btn-primary">Nuevo</a>
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
                                                <th>NOMBRE</th>
                                                <th>DESCRIPCION</th>
                                                <th>IMAGEN</th>
                                                <th>COSTO</th>
                                                <th>ESTADO</th>
                                                @if (auth()->user()->tipo == 'Administrador')
                                                    <th>ACCIONES</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cursos as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->nombre }}</td>
                                                    <td>{{ $item->descripcion }}</td>
                                                    <td>
                                                        <img src="{{ $item->getimagenUrl() }}" height="40px"
                                                            alt="imagen">
                                                    </td>
                                                    <td>{{ $item->costo }}</td>
                                                    <td>
                                                        @if ($item->estado == true)
                                                            <span class="badge text-success">Activo</span>
                                                        @else
                                                            <span class="badge text-danger">Inactivo</span>
                                                        @endif
                                                    </td>
                                                    @if (auth()->user()->tipo == 'Administrador')
                                                        <td>
                                                            <a href="{{ url('/cursos/actualizar/' . $item->id) }}"
                                                                class="btn btn-sm btn-warning">📑</a>
                                                            @if ($item->estado == true)
                                                                <a href="{{ url('/cursos/estado/' . $item->id) }}"
                                                                    class="btn btn-sm btn-danger">🚫</a>
                                                            @else
                                                                <a href="{{ url('/cursos/estado/' . $item->id) }}"
                                                                    class="btn btn-sm btn-success">✔</a>
                                                            @endif
                                                        </td>
                                                    @endif

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $cursos->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
