@extends('layout.master_user') @section('content')
<div class="widget widget-table action-table">
    <div class="widget-header">
        <i class="icon-th-list"></i>
        <h3>Blog </h3>
    </div>
    <div class="widget-content" style="padding: 0 40px; color: black;">
       @foreach(\App\Models\Blog::all() as $blog)
        <div class="blog-container">
            <div class="blog-title">
                <a href="/blog/{{ $blog->slug }}"><h1 class="text-center">{{ $blog->name }}</h1></a>
            </div>
            <div class="blog-footer">
                <h4>Pos oleh <strong>Admin Perbaiah</strong> pada <strong>{{ $blog->created_at->format('d-M-Y') }}</strong></h4>
            </div>
        </div>
        <hr>
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

    a {
        color: grey;
    }
    .blog-title:hover > a {
        color: #19bc9c;
        cursor: pointer;
    }

    .blog-footer {
        text-align: right;
        color: grey;
    }

    strong {
        color: black;
    }
</style>
@endsection