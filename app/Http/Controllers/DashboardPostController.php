<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
        $user = auth()->user();
        
        $post = Post::where([
            ['user_id', '=', auth()->user()->id],
            ['created_at', '=', Carbon::today()] 
        ]);
        
        if ($post) {
            return redirect()->route('post.index')->with('error', 'Kamu Sudah membuat laporan hari ini!');
        }
        
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
    public function show($id)
    {
        $post = Post::join('users', 'posts.user_id', '=', 'users.id')
                    ->select('posts.*', 'users.name')
                    ->where('posts.id', '=', $id )
                    ->first();
        return view('dashboard.posts.show', ['post' => $post]);
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
    public function inbox()
    {
        
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
                ->select('posts.*', 'users.role')
                ->where('users.role', '=', auth()->user()->role)
                ->get();
        return view('dashboard.inbox', ['posts' => $posts]);
    }
}
