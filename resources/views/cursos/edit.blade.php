@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
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
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Actualizacion de Curso</div>

                        <div class="card-body">
                            <form action="{{ url('/cursos/actualizar/' . $curso->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" value="{{ $curso->nombre }}">
                                    @error('nombre')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <img src="{{ $curso->getimagenUrl() }}" height="82px">
                                <div class="form-group">
                                    <label for="nombre">Imagen</label>
                                    <input type="file" class="form-control" accept="image/*" name="imagen">
                                    @error('imagen')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripcion</label>
                                    <textarea cols="30" rows="3" class="form-control" name="descripcion">{{ $curso->descripcion }}</textarea>
                                    @error('descripcion')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="costo">Costo</label>
                                    <input type="numeric" class="form-control" name="costo" value="{{ $curso->costo }}">
                                    @error('nombre')
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
