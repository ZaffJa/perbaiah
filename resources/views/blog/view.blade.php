@extends('layout.master') @section('content')
<div class="widget ">
    <div class="widget-header">
        <i class="icon-book"></i>
        <h3>{!! $blog->name !!}</h3>
    </div>
    <div class="widget-content">
        {!! $blog->content !!}
    </div>
</div>
@endsection 
@section('scripts')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
  CKEDITOR.replace('content', options);
</script>
@endsection