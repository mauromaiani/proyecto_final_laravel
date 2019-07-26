@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row align-items-center ">
    <div class="col-xs-6 col-md-6 col-lg-4 p-5">
      <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
    </div>
    <div class="col-xs-6 col-md-6 col-lg-8">
        <div class="">
          <div class="d-flex">
            <div class="h2 __titulo"> @can('update', $user->profile) Hola @endcan {{ $user->profile->title }}</div>
            <!-- <div class="pl-5">
              @can('update', $user->profile)
              <a class= "__registrarse" href="/post/create">Subir Denuncia</a>
              @endcan
            </div> -->
            @can('update', $user->profile)
            <p></p>
            @elsecannot('update', $user->profile)
            <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
            @endcan

          </div>

        </div>
        <div class="d-flex pb-2 __textoFollow">
          <div class="pr-4 "> <strong>{{ $user->posts->count() }}</strong> denuncias</div>
          <div class="pr-4"> <strong>{{ $user->profile->followers->count() }}</strong> amigas</div>
          <!-- <div class="pr-4"> <strong>{{ $user->following->count() }}</strong> followings</div> -->
        </div>

        <!-- <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div> -->
        <div class="pt-2 __textoPerfil">{{ $user->profile->description }}</div>
        <div><a href="">{{ $user->profile->url }}</a></div>
        @can('update', $user->profile)
        <a class= "__cerrar" href="/profile/{{ $user->id }}/edit">Editar Perfil</a>
        @endcan

        <div class="pt-3">
          @can('update', $user->profile)
          <a class= "__registrarse" href="/post/create">Subir Denuncia</a>
          @endcan
        </div>

    </div>
  </div>

  <div class=" row pt-3">
    @foreach($user->posts as $post)
      <div class="col-xs-9 col-md-6 col-lg-3 pb-1">
        <a href="/post/{{ $post->id }}">
          <img src="/storage/{{ $post->image }}" class="__fotoDenuncia">
        </a>
        <p class="__textoPerfil">{{ $post->caption }}</p>
      </div>
    @endforeach

  </div>
</div>
@endsection
