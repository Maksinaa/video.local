@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <h3 class="mb-3">
        Добавить видио
      </h3>


      <div class="card">
        <div class="card-body">

          <form method="post" action="{{ route('videos.store') }}" enctype="multipart/form-data">
            @csrf

            @include('videos.form')

          </form>

        </div>
      </div>


    </div>
  </div>
@endsection
