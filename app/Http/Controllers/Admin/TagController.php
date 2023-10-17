<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tags;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function tag() {

        $tags = Tags::all();
        return view('Admin.Tag.tag', compact('tags'));
    }
    public function createTag(Request $request){
        // dd($request->all());

        Tags::create([
            'tags' => $request->tags,
            'slug' => Str::slug($request->tags)
        ]);

        return redirect()->back();
    }

    public function updateTag(Request $request){
        $tags = Tags::findOrFail($request->id);
        $tags->tags = $request->tags;
        $tags->slug = Str::slug($request->tags);
        $tags->update();

        return redirect()->back();

    }

    public function deleteTag(Request $request){

        $tags = Tags::findOrFail($request->id);
        $tags->delete();

        return redirect()->back();
    }
}
