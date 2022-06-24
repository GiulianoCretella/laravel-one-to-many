<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags= Tag::all();
        return view('admin.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newTag = new Tag();
        $newTag->name = $data['name'];
        $slug = Str::of($data['name'])->slug("-");
        $newTag->slug = $this->getSlug($data['name']);
        $newTag->save();

        return redirect()->route('admin.tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show',compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag= Tag::findOrFail($id);
        return view('admin.tags.edit', compact('tag'));
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
        $data = $request->all();
        $tag = Tag::findOrFail($id);
        if($tag->name != $data['name']){
            $tag->name = $data['name']; 
            $slug = Str::of($data['name'])->slug("-");
            if($slug != $tag->slug){
                $tag->slug = $this->getSlug($tag->name);
            }
        }
        $tag->update($data);

        return redirect()->route('admin.tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect()->route('admin.tags.index');
    }
    public function getSlug($title)
    {
        $slug = Str::of($title)->slug("-");
        $count = 1;

        while(Tag::where('slug',$slug)->first()){
            $slug = Str::of($data['name'])->slug("-")."-{$count}";
            $count++;
        };
        return $slug;
    }
}
