{{-- <input type="hidden" name="user_id" value="{{ Auth::id() }}"> --}}

<div class="mb-3">
  <label for="title" class="form-label">Название</label>
  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
    value="{{ $item->title ?? old('title') }}">
  @error('title')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>

<div class="mb-3">
  <label for="description" class="form-label">Описание</label>
  <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
    rows="5">{{ $item->description ?? old('description') }}</textarea>
  @error('description')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>


<div class="mb-3">
  <label for="category" class="form-label">Категория</label>
  <select class="form-select @error('category') is-invalid @enderror" id="category" name="category">
    <option value="Шоу" {{ ($item->category ?? old('category')) == 'Шоу' ? 'selected' : '' }}>
      Шоу</option>
    <option value="Новости" {{ ($item->category ?? old('category')) == 'Новости' ? 'selected' : '' }}>Новости
    </option>
    <option value="Музыка" {{ ($item->category ?? old('category')) == 'Музыка' ? 'selected' : '' }}>
      Музыка</option>
    <option value="Обучение" {{ ($item->category ?? old('category')) == 'Обучение' ? 'selected' : '' }}>
      Обучение</option>
  </select>
  @error('category')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>

<div class="mb-3">
  <label for="video_file" class="form-label">
    Видео
  </label>
  <input class="form-control @error('video_file') is-invalid @enderror" type="file" id="video_file"
    name="video_file">
  @error('video_file')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>

<hr>
<button class="btn btn-primary">Сохранить</button>
