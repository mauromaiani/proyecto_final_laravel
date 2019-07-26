@extends('layouts.app')
<!-- @include('partials.header') -->


@section('content')
<div class="container">
  @foreach($posts as $post)
  <div class="row justify-content-center pb-5 ">
    <div class="col-xs-12 col-md-8 col-lg-5">
      <a href="/post/{{ $post->id }}">
        <img src="/storage/{{ $post->image }}" class=" __fotoDenuncia w-100">
      </a>
    </div>
    <div class="col-xs-12 col-md-4 col-lg-5">
      <div>
        <div class="d-flex align-items-center pt-3">
          <div class="pr-3">
              <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" style="max-width: 40px">
          </div>
          <div>
            <div class="font-weight-bold">
              <a href="/profile/{{ $post->user->id }}">
                <span class="__tituloPosteo">{{ $post->user->username }}</span>
                <!-- <span class="text-dark">
                  @if (auth()->user()->following())
                    {{ $post->user->username }}
                    @else
                    anonimo
                    @endif
                </span> -->
              <!-- </a>
              <a href="#" class="pl-3">Seguir</a> -->
            </div>
          </div>
        </div>
        <hr>
        <p>
          <span class="__texto">
          <a href="/profile/{{ $post->user->id }}"></a></span>
          <p class="__texto">{{ $post->caption }}</p>
          <br>
          <!-- <strong>{{ $post->created_at }}</strong> -->
        </p>
      </div>
    </div>
  </div>
  @endforeach

  <div class="pt-5">
    <div class="col-12 d-flex justify-content-center">
      {{ $posts->links() }}
    </div>
  </div>

</div>
@endsection
