<ul class="list-unstyled">
  @foreach($root_folders as $root_folder)
    @if(auth()->user() && auth()->user()->is('user') && $root_folder->name == "Fail Kongsi")
    <li>
      <a class="clickable folder-item" data-id="{{ $root_folder->path }}">
        <i class="fa fa-folder"></i> {{ $root_folder->name }}
      </a>
    </li>
    @elseif(auth()->user() && auth()->user()->is('admin'))
    <li>
      <a class="clickable folder-item" data-id="{{ $root_folder->path }}">
        <i class="fa fa-folder"></i> {{ $root_folder->name }}
      </a>
    </li>
    @endif
    @foreach($root_folder->children as $directory)
      <li style="margin-left: 10px;">
        <a class="clickable folder-item" data-id="{{ $directory->path }}">
          <i class="fa fa-folder"></i> {{ $directory->name }}
        </a>
      </li>
    @endforeach
    @if($root_folder->has_next)
      <hr>
    @endif
  @endforeach
</ul>
