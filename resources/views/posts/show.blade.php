@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center ">
    <div class="col-xs-12 col-md-8 col-lg-8">
      <img src="/storage/{{ $post->image }}" class=" __fotoDenuncia w-100">
    </div>
    <div class="col-xs-12 col-md-4 col-lg-4">
      <div>
        <div class="d-flex align-items-center pt-3">
          <div class="pr-3">
              <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" style="max-width: 40px">
          </div>
          <div>
            <div class="">
              <a href="/profile/{{ $post->user->id }}">
                <span class=" __tituloPosteo">{{ $post->user->username }}</span>
              </a>
              <a class="pl-5 float-right align-baseline" href="{{ url()->previous() }}"><button type="button" class="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></a>
              <!-- <a href="#" class="pl-3">Seguir</a> -->
            </div>
          </div>
        </div>
        <hr>
        <p>
          <!-- <span class="font-weight-bold">
          <a href="/profile/{{ $post->user->id }}">
            <span class="text-dark">{{ $post->user->username }}</span>
          </a></span> -->
          <div class="__texto">
            {{ $post->caption }}
          </div>
        </p>


        @can ('update', $post)
        <a class="__cerrar "  href="/post/{{ $post->id }}/edit" >Editar Post</a>
        <!-- <br>
        <div class="pt-2 w-50">
          <form action="/post/{{ $post->id }}" id="borrar_post" method="POST" >
              <button onclick="return confirm('¿Estas segura que lo queres borrar?')" id="borrarPost" form="borrar_post" class="__login" value="submit" type="submit">Eliminar</button>
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
          </form> -->
        @endcan
        </div>

        <!-- <button onclick="confirmation()">Delete</button> -->


      </div>
    </div>
  </div>
</div>
@endsection
