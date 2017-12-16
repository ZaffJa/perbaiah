<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\StoreBlogPost;
use App\Http\Requests\UpdateBlog;


class BlogController extends Controller 
{

  public function index()
  {
    $blogs = Blog::all();
    return view('blog.index', compact('blogs'));
  }


  public function create()
  {
    return view('blog.create');
  }


  public function store(StoreBlogPost $request)
  {
    $request['slug'] = str_slug($request->name, '-');

    Blog::create($request->all());
    
    return back()->with('success', 'Maklumat berjaya disimpan');
  }


  public function show(Blog $blog)
  {
    return view('blog.view', compact('blog'));
  }


  public function edit(Blog $blog)
  {
    return view('blog.edit', compact('blog'));
  }

  public function update(UpdateBlog $request, Blog $blog)
  {
    $blog->update($request->all());
    return back()->with('success', 'Maklumat berjaya dikemaskini');
    
  }

  public function destroy(Blog $blog)
  {
    if ($blog) {
      $blog->delete();
      return back()->with('success', "Maklumat blog berjaya dibuang");
    }
    else {
      return back()->withErrors('error', 'Ralat dalam membuang data');      
    }
  }
  
}

?>