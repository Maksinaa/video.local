@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <h3 class="mb-3">
        Модерация видеофайлов
        <a href="{{ route('videos.create') }}" class="btn btn-success float-end">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square"
            viewBox="0 0 16 16">
            <path
              d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
            <path
              d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
          </svg>
        </a>
      </h3>

      @forelse ($items as $item)
        <div class="card mb-3">
          <div class="card-body">
            <h4 class="card-title">
              {{ $item->title }}
              <span class="float-end">{!! date('d-m-Y h:i', strtotime($item->created_at)) !!}</span>
              <h6 class="card-subtitle mb-2 text-muted">
                {{ $item->category }}
              </h6>
              <video controls class="w-100" src="{{ asset('storage/' . $item->video_file) }}">
                Your browser does not support the
                <code>video</code> element.
              </video>
              <span class="badge bg-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                  <path
                    d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                </svg>
                {{ $item->likes }}
              </span>
              <span class="badge bg-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-hand-thumbs-down-fill" viewBox="0 0 16 16">
                  <path
                    d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.378 1.378 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51.136.02.285.037.443.051.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.896 1.896 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2.094 2.094 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.162 3.162 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.823 4.823 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591z" />
                </svg>
                {{ $item->dislikes }}
              </span>

            </h4>

            <p class="card-text">{{ $item->description }}</p>
            <hr>

            <form method="post" action="{{ route('admins.update', $item->id) }}" class="float-end w-50">
              @csrf
              @method('put')

              <div class="input-group">
                <select class="form-select" id="restrictions" name="restrictions">
                  <option @if ($item->restrictions == 'Без ограничений') selected @endif>Без ограничений</option>
                  <option @if ($item->restrictions == 'Нарушение') selected @endif>Нарушение</option>
                  <option @if ($item->restrictions == 'Теневой бан') selected @endif>Теневой бан</option>
                  <option @if ($item->restrictions == 'Бан') selected @endif>Бан</option>
                </select>
                <button class="btn btn-outline-secondary" type="submit">
                  Установить
                </button>
              </div>
            </form>

          </div>
        </div>
      @empty
      @endforelse

    </div>
  </div>
@endsection
