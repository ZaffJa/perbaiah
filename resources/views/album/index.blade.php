@extends('layout.master') @section('content')
<div class="widget ">
    <div class="widget-header">
        <i class="icon-book"></i>
        <h3>Album</h3>
    </div>
    <div class="widget-content">
        <iframe src="/laravel-filemanager?type=Images" style="width: 100%; height: 70vh; overflow: hidden; border: none;"></iframe>
    </div>
</div>
@endsection 
@section('scripts')
@endsection