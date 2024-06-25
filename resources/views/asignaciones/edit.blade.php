@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
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
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Actualizacion de Asignacion</div>

                        <div class="card-body">
                            <form action="{{ url('/asignaciones/actualizar/' . $asignacion->id) }}" method="POST">
                                @method('PUT')
                                @csrf


                                <div class="form-group">
                                    <label for="usuarios_id">Estudiante</label>
                                    <select class="form-control" name="usuarios_id" id="usuarios_id">
                                        @foreach ($usuarios as $itemusuario)
                                            <option
                                                value="{{ $itemusuario->id }}"@if ($itemusuario->id == $asignacion->usuario->id) select @endif>
                                                {{ $itemusuario->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('usaurios_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cursos_id">Cursos</label>
                                    <select class="form-select" aria-label="Default select example" name="cursos_id">

                                        @foreach ($cursos as $itemcursos)
                                            <option value="{{ $itemcursos->id }}"
                                                @if ($itemcursos->id == $asignacion->cursos_id) select @endif>{{ $itemcursos->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('cursos_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="row">

                                    <div class="col-6">

                                        <div class="form-group col-m-6">
                                            <label for="fecha_inicio">Fecha de Inicio</label>
                                            <input type="datetime-local" value="{{ $asignacion->fecha_inicio }}"
                                                class="form-control" name="fecha_inicio">
                                            @error('fecha_inicio')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="fecha_finalizacion">Fecha de finalizacion</label>
                                            <input type="datetime-local"
                                                value="{{ $asignacion->fecha_finalizacion }}"class="form-control"
                                                name="fecha_finalizacion">
                                            @error('fecha_finalizacion')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="importe">importe</label>
                                    <input type="numeric" value="{{ $asignacion->importe }}" class="form-control"
                                        name="importe">
                                    @error('importe')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
