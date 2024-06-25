@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
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
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Registro de Tareas</div>

                        <div class="card-body">
                            <div class="content">
                                @include('includes.alertas')


                                <form action="{{ url('/tareas/registrar/' . $id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="asignacion_id">Id</label>
                                        <input type="text" value="{{ $id }}" id="asignacion_id"
                                            name="asignacion_id" disabled>
                                        <label for="">Usuario</label>
                                        <input type="text" value="{{ $usuario }}" disabled>
                                        <label for="">Curso</label>
                                        <input type="text" value="{{ $curso }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion</label>
                                        <textarea cols="30" rows="3" class="form-control" value="{{ old('descripcion') }}" name="descripcion"></textarea>
                                        @error('descripcion')
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
