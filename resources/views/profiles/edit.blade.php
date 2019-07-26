
@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row align-items-center justify-content-around">
      <div class="col-xs-11 col-md-8 col-lg-6">
        <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="POST">
          @csrf
          @method('PATCH')

            <div class="d-flex justify-content-between align-baseline">
                    <p class="__tituloPosteo">Editar Perfil</p>
                    <a class="float-right align-baseline" href="{{ url()->previous() }}"><button type="button" class="close" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button></a>
                </div>
                  <div class="form-group row">
                    <label for="title" class="__textoFollow col-md-6 col-form-label">Nombre</label>
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                    name="title" value="{{ old('title') ?? $user->profile->title }}" required autocomplete="title" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                <div class="form-group row">
                  <label for="description" class="col-md-4 __textoFollow col-form-label">Biografía</label>
                  <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                  name="description" value="{{ old('description') ?? $user->profile->description }}" autofocus>
                  @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-group row">
                  <label for="url" class="col-md-4 __textoFollow col-form-label">Email</label>
                  <input id="url" type="text" class="form-control @error('url') is-invalid @enderror"
                  name="url" value="{{ old('url') ?? $user->profile->url }}" autofocus>

                  @error('url')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="row">
                  <label for="image" class="col-md-4 __textoFollow col-form-label">Imagen de Perfil</label>
                  <input type="file" class="form-control-file" id="image" name="image">
                  @error('image')
                          <strong>{{ $message }}</strong>
                  @enderror
                </div>

                <div class="row flex-row-reverse mt-3">
                  <button class="__registrarse">Guardar Perfil</button>
                </div>

        </form>
    </div>
  </div>
</div>
@endsection
