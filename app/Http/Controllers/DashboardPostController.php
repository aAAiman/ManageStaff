<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        return view('dashboard.posts.index', [
            'posts' =>Post::where('user_id', auth()->user()->id)->get()
        ]);
            
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|max:300',
        'body' => 'required'
    ]);

    $user = auth()->user();
    $validatedData['user_id'] = $user->id;

    Post::create($validatedData);

    return redirect('/dashboard/post')->with('success', 'New Post');
}

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::findorfail($id);
        return view('dashboard.posts.edit', compact('post'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findorfail($id);
        $post->update($request->all());
        return redirect('/dashboard/post')->with('success', 'New Post');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/dashboard/post')
                ->withSuccess('Product is deleted successfully.');


    }
}
