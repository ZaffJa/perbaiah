@extends('layout.master') @section('content')
<div class="widget ">
    <div class="widget-header">
        <i class="icon-book"></i>
        <h3>Kemaskini Kandungan</h3>
    </div>
    <div class="widget-content">
        @include('layout.error_status')
        <form class="form-horizontal" method="post" action="{{ action('BlogController@update', $blog->slug) }}" autocomplete="off">
            {{ csrf_field() }}
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="barcode">Tajuk</label>
                    <div class="controls">
                        <input type="text" style="width: 99%;" name="name" value="{{ $blog->name }}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="alamat">Kandungan</label>
                    <div class="controls">
                        <textarea name="content" id="content" rows="10" cols="80">{{ $blog->content }}</textarea>
                    </div>
                </div>
                <div class="form-actions">
                    <a href="/admin/blog"><button type="button" class="btn">Batal</button></a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection 
@section('scripts')
<script src="/ckeditor3/ckeditor.js"></script>
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