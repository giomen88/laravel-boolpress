<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\Category;
use App\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        $users = User::all();

        return view('admin.posts.index', compact('posts', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();

        $categories = Category::all();

        return view('admin.posts.create', compact('post', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:50|unique:posts',
            'content' => 'required|string',
            'image' => 'nullable|url'
        ], [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min:5' => 'Il titolo è inferiore a 5 caratteri',
            'title.max:50' => 'Il titolo è superiore a 50 caratteri',
            'title.unique' => "Esiste già un post dal titolo $request->title",
            'content.required' => 'Il contenuto è obbligatorio',
            'image.url' => 'L/URL dell/immagine non è valida',
        ]);

        $data = $request->all();

        $post = new Post();

        $post->fill($data);

        $post->slug = Str::slug($post->title, '-');

        $post->save();

        if(array_key_exists('tags', $data)) {
            $post->tags()->attach($data['tags']);
        }

        return redirect()->route('admin.posts.show', $post)
        ->with('message', 'Il post è stato creato con successo')
        ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $users = User::all();

        return view('admin.posts.show', compact('post', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required','string','min:3', 'max:50', Rule::unique('posts')->ignore($post->id)],
            'content' => 'required|string',
            'image' => 'nullable|url'
        ], [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min:5' => 'Il titolo è inferiore a 5 caratteri',
            'title.max:50' => 'Il titolo è superiore a 50 caratteri',
            'title.unique' => "Esiste già un post dal titolo $request->title",
            'content.required' => 'Il contenuto è obbligatorio',
            'image.url' => 'L/URL dell/immagine non è valida',
        ]);

        $data = $request->all();

        $post->slug = Str::slug($post->title, '-');

        if(array_key_exists('tags', $data)) {
            $post->tags()->sync($data['tags']);
        }

        $post->update($data);

        return redirect()->route('admin.posts.show', $post)
        ->with('message', 'Il post è stato modificato con successo')
        ->with('type', 'success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')
        ->with('message', 'Il post è stato eliminato con successo')
        ->with('type', 'success');

    }
}
