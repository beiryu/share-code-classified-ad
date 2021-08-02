<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();  
        $userId = auth()->user()->id; 
        $redirectPath = auth()->user()->role == 'user' ? "user/$userId" : "user/admin/$userId"; 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->number = $request->number;
        $user->save();      
        return redirect($redirectPath)->with(['success' => true]);
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
        $user = User::find($id);
        $posts = Post::where('author', $id)->get();
        return view('user.show')->with(['user' => $user,
                                        'posts' => $posts]);
    }
    public function showAdmin($id)
    {
        
        $admin = User::find($id);
        $users = User::where('role', 'user')->get();
        $posts = Post::all();
        return view('admin.show')->with(['admin' => $admin,
                                        'posts' => $posts,
                                        'users' => $users]);
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
        $userId = auth()->user()->id; 
        $user = User::find($id);
        $user->is_block = !$user->is_block;
        $user->save();
        $posts = Post::where('author', $id)->get();
        
        foreach($posts as $post)
        {
            $post->is_block = !$post->is_block;
            $post->save();
        }
        
        return redirect("user/admin/$userId");
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
    }
}
