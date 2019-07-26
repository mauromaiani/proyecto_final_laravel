@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row align-items-center justify-content-around">
    <div class="col-xs-11 col-md-8 col-lg-6">
      <form action="/post" enctype="multipart/form-data" method="POST">
        @csrf
          <div class="d-flex justify-content-between align-baseline">
            <p class="__tituloPosteo">Subir Denuncia</p>
            <a class="float-right align-baseline" href="{{ url()->previous() }}"><button type="button" class="close" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></a>
          </div>
            <div class="form-group row">
              <label for="caption" class="__textoFollow col-md-6 col-form-label">Describí lo que te paso:</label>
                <textarea id="caption" type="text" class="form-control @error('caption') is-invalid @enderror"
                name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus></textarea>



                @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="">
              <label for="image" class="__textoFollow col-form-label ">Subí una imagen para acompañar tu relato.</label>
              <input type="file" class="form-control-file" id="image" name="image">
              @error('image')
                      <strong>{{ $message }}</strong>
              @enderror
            </div>

            <div class="row flex-row-reverse mt-3">
              <button class="__registrarse">Compartir Denuncia</button>
            </div>

          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
