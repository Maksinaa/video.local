@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="row row-cols-2 g-4">



        @forelse ($items as $item)
          <div class="col">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">
                  {{ $item->title }}

                  <span class="float-end">
                    {!! date('d-m-Y h:i', strtotime($item->created_at)) !!}
                  </span>

                </h4>

                <video controls class="w-100" src="{{ asset('storage/' . $item->video_file) }}">
                  Your browser does not support the
                  <code>video</code> element.
                </video>

                <a href="{{ route('show', $item->id) }}" class="btn btn-primary">Подробнее</a>
              </div>
            </div>
          </div>
        @empty
        @endforelse

      </div>
    </div>
  </div>
@endsection
