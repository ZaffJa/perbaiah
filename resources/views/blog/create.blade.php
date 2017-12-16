@extends('layout.master') @section('content')
<div class="widget ">
    <div class="widget-header">
        <i class="icon-book"></i>
        <h3>Kandungan Baru</h3>
    </div>
    <div class="widget-content">
        @include('layout.error_status')
        <form class="form-horizontal" method="post" action="{{ action('BlogController@store') }}" autocomplete="off">
            {{ csrf_field() }}
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="barcode">Tajuk</label>
                    <div class="controls">
                        <input type="text" style="width: 99%;" name="name" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="alamat">Kandungan</label>
                    <div class="controls">
                        <textarea name="content" id="content" rows="10" cols="80">{{ old('content') }}</textarea>
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

  CKEDITOR.on('instanceReady', function (ev) {
    ev.editor.dataProcessor.htmlFilter.addRules( {
        elements : {
            img: function( el ) {
                // Add bootstrap "img-responsive" class to each inserted image
                el.addClass('img-responsive');
        
                // Remove inline "height" and "width" styles and
                // replace them with their attribute counterparts.
                // This ensures that the 'img-responsive' class works
                var style = el.attributes.style;
        
                if (style) {
                    // Get the width from the style.
                    var match = /(?:^|\s)width\s*:\s*(\d+)px/i.exec(style),
                        width = match && match[1];
        
                    // Get the height from the style.
                    match = /(?:^|\s)height\s*:\s*(\d+)px/i.exec(style);
                    var height = match && match[1];
        
                    // Replace the width
                    if (width) {
                        el.attributes.style = el.attributes.style.replace(/(?:^|\s)width\s*:\s*(\d+)px;?/i, '');
                        el.attributes.width = width;
                    }
        
                    // Replace the height
                    if (height) {
                        el.attributes.style = el.attributes.style.replace(/(?:^|\s)height\s*:\s*(\d+)px;?/i, '');
                        el.attributes.height = height;
                    }
                }
        
                // Remove the style tag if it is empty
                if (!el.attributes.style)
                    delete el.attributes.style;
            }
        }
    });
});
</script>
@endsection