@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row align-items-center justify-content-around">
      <div class="col-xs-11 col-md-8 col-lg-6">
        <form action="/post/{{ $post->id }}" enctype="multipart/form-data" method="POST">
          @csrf
          @method('PATCH')
            <div class="d-flex justify-content-between align-baseline">

              <p class="__tituloPosteo">Editar Denuncia</p>
              <a class="float-right align-baseline" href="{{ url()->previous() }}"><button type="button" class="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></a>
            </div>

              <div class="form-group">
                  <label for="caption" class=" __textoFollow col-form-label col-md-4">Situación:</label>
                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror"
                    name="caption" value="{{ old('caption') ?? $post->caption }}" required autocomplete="caption" autofocus>
                      @error('caption')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
              </div>

            <div class="">
              <label for="image" class=" __textoFollow col-form-label col-md-6 ">También podes cambiar la imagen.</label>
              <input type="file" class="form-control-file" id="image" name="image">
              @error('image')
                      <strong>{{ $message }}</strong>
              @enderror
            </div>

            <div class="row flex-row-reverse pt-4">
              <button class="__login">Modificar</button>
            </div>
            <div class="row flex-row-reverse mt-3">
            </form>
            @can ('update', $post)
              <form action="/post/{{ $post->id }}" id="borrar_post" method="POST" >
                <button onclick="return confirm('¿Estas segura que lo queres borrar?')" id="borrarPost" form="borrar_post" class="__botonRojo" value="submit" type="submit">Eliminar</button>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
              </form>
            @endcan
            </div>
          </div>
        </div>



</div>



@endsection
