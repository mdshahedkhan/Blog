<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(5);
        return view('admin.post.manage', compact('posts'));
    }

    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('admin.post.add', compact('categories'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'categories' => 'required',
            'title' => 'required|min:6|max:30',
            'sub_title' => 'required|min:6|max:40',
            'description' => 'required|min:10',
            'image' => 'required',
            'status' => 'required'
        ]);
        $iname = $request->file('image');
        $fileName = rand(1, 999999999999) . date('Ymdhis') . rand(1, 9999999999) . "." . $iname->getClientOriginalExtension();
        try {
            if ($iname->isValid()) {
                $iname->storeAs('Post/', $fileName);
            }
            Post::create([
                'user_id' => auth()->user()->id,
                'category_id' => $request->categories,
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'description' => $request->description,
                'image' => $fileName,
                'status' => $request->status
            ]);

            session()->flash('type', 'success');
            session()->flash('message', 'Successfully! Post Created');
        } catch (Exception $exception) {
            session()->flash('type', 'danger');
            session()->flash('message', $exception->getMessage());
        }
        return redirect()->back();
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function status($id, $status)
    {
        $post = Post::find($id);
        $post->status = $status;
        $post->save();
        return response()->json('Success', 200);
    }
}
