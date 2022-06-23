<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;

class PostController extends Controller
{
    protected $validation = [
        'title'=> 'required|max:100',
        'content'=> 'required',
        'published'=>'sometimes|accepted',
        'category_id'=>'nullable|exists:categories,id'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::all();
       return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validation);
        $data = $request->all();
        $newPost = new Post();
        $newPost->title = $data['title'];
        $newPost->image = $data['image'];
        $newPost->content = $data['content'];
        $newPost->category_id = $data['category_id'];
        $newPost->published = isset($data['published']);
        $slug = Str::of($data['title'])->slug("-");
        $newPost->slug = $this->getSlug($data['title']);
        $newPost->save();

        return redirect()->route('admin.posts.show',$newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post=Post::findOrFail($id);
        return view('admin.posts.edit', compact('post','categories'));
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
        $request->validate($this->validation);
        $data = $request->all();
        $post = Post::findOrFail($id);
        if($post->title != $data['title']){
            $post->title = $data['title']; 
            $slug = Str::of($data['title'])->slug("-");
            if($slug != $post->slug){
                $post->slug = $this->getSlug($post->title);
            }
        }
        $post->content = $data['content'];
        $post->category_id = $data['category_id'];
        $post->published = isset($data['published']);
        $post->update($data);

        return redirect()->route('admin.posts.show',$post->id); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
    public function getSlug($title)
    {
        $slug = Str::of($title)->slug("-");
        $count = 1;

        while(Post::where('slug',$slug)->first()){
            $slug = Str::of($data['title'])->slug("-")."-{$count}";
            $count++;
        };
        return $slug;
    }
}
