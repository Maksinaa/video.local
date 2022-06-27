@auth
  <li class="nav-item">
    <a class="nav-link" href="{{ route('videos.index') }}">Мое видео</a>
  </li>
@endauth


@can('admin')
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admins.index') }}">Мадерация</a>
  </li>
@endcan
