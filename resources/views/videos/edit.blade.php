@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <h3 class="mb-3">
        Редактировать видео
      </h3>


      <div class="card">
        <div class="card-body">

          <form method="post" action="{{ route('videos.update', $item->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')

            @include('videos.form')

          </form>

        </div>
      </div>


    </div>
  </div>
@endsection
