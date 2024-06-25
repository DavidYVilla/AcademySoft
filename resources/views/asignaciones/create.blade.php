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
                        <div class="card-header">Registro de Asignaciones</div>

                        <div class="card-body">
                            <div class="content">



                                <form action="{{ url('/asignaciones/registrar') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="usuarios_id">Estudiante</label>
                                        <select class="form-select" aria-label="Default select example" name="usuarios_id">
                                            <option selected>Elija un estudiante</option>
                                            @foreach ($usuarios as $itemusuario)
                                                <option value="{{ $itemusuario->id }}">{{ $itemusuario->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('usaurios_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="cursos_id">Cursos</label>
                                        <select class="form-select" aria-label="Default select example" name="cursos_id">
                                            <option selected>Elija un curso</option>
                                            @foreach ($cursos as $itemcursos)
                                                <option value="{{ $itemcursos->id }}">{{ $itemcursos->nombre }}</option>
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
                                                <input type="date" class="form-control" name="fecha_inicio">
                                                @error('fecha_inicio')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="fecha_finalizacion">Fecha de finalizacion</label>
                                                <input type="date" class="form-control" name="fecha_finalizacion">
                                                @error('fecha_finalizacion')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="importe">importe</label>
                                        <input type="numeric" class="form-control" name="importe">
                                        @error('importe')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn m-3 btn-primary">Registrar</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
