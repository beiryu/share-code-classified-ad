<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\District;
use App\Province;
use App\Ward;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $provinces = Province::all();
        $categories = Category::all();

        $posts = Post::latest()->get();
      
        return view('post.list')->with(['posts' => $posts,
                                        'provinces' => $provinces,
                                        'categories' => $categories]);
    }
    public function filter(Request $request)
    {
        $provinces = Province::all();
        $categories = Category::all();

        $provinceId = $request->province_id;
        $categoryId = $request->category_id;

        $category = Category::find($categoryId);
        $posts = new Post;
        $posts = $category->posts()->where('province_id', $provinceId)->get();
          
        return view('post.list')->with(['posts' => $posts,
                                        'provinces' => $provinces,
                                        'categories' => $categories]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $provinces = Province::all();
        $districts = District::all();
        $wards = Ward::all();
        return view('post.create')->with(['categories' => $categories,
                                            'provinces' => $provinces,
                                            'districts' => $districts,
                                            'wards' => $wards]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$post = new Post;
        $post->fill( $request->all() );
        $post->author = auth()->user()->id;
        $post->save();
        $categories = $request->categories_;
        foreach($categories as $categoryId)
        {
            $category = Category::find($categoryId);
            $post->categories()->attach($category);
        }
        return redirect('post/create')->with('success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Post::destroy($id);
        $userId = auth()->user()->id;
        return redirect("/user/admin/$userId");
    }
}
