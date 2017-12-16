@extends('layout.master_user') @section('content')
<div class="widget widget-table action-table">
    <div class="widget-header">
        <i class="icon-th-list"></i>
        <h3>Hasil Carian </h3>
        <a href="/user/blog" class="pull-right" style="padding-right: 10px;">
            <button class="btn btn-success"><i style="color: white;" class="icon-arrow-left"></i> Kembali</button>
        </a>        
    </div>
    <div class="widget-content" style="padding: 0 40px 40px 40px; color: black;">
        @foreach($users as $user)
        <div class="row">        
            <div class="blog-container">
                <div class="span-3">
                @if($user->gambar)
                    <img src="/{{ $user->gambar }}" alt="" class="search-image">
                @else
                    <i style="font-size: 121px;" class="icon-user"></i>
                @endif
                </div>
                <div class="span9">
                    <h4>{{ $user->nama }}</h4>
                    <h4>{{ $user->title->name or null }}</h4>
                    <h4>{{ $user->tarikh_daftar ? $user->tarikh_daftar->format('d-M-Y') : ''  }}</h4>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
@section('styles')
<style>
    .blog-container {
        margin: 5vw 0 auto;
        font-family: 'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif;
    }

    .search-image {
        width: 100px;
        height: 100px;
        border-radius: 5px;
    }

    h4 {
        line-height: 34px;
    }
</style>
@endsection