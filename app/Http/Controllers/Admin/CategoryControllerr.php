<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class CategoryControllerr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function CategoryAdd()
    {
        return view('admin.category.add');
    }

    public function index()
    {
        $categories = Category::orderBy('id', 'asc')->paginate(10);
        return view('admin.category.manage', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|min:4|max:20',
            'status' => 'required'
        ]);
        try {
            Category::create([
                'user_id' => auth()->user()->id,
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'status' => $request->status,
            ]);
            session()->flash('type', 'success');
            session()->flash('message', 'Category Save Successfully!');
        } catch (Exception $exception) {
            session()->flash('type', 'danger');
            session()->flash('message', $exception->getMessage());
        }
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $data = Category::find($id);
        return view('admin.category.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,id,' . $id,
            'status' => 'required'
        ]);
        try {
            $category = Category::find($id);
            $category->user_id = auth()->user()->id;
            $category->name = $request->name;
            $category->slug = strtolower(str_replace(' ', '-', $request->name));
            $category->status = $request->status;
            $category->save();
            session()->flash('type', 'success');
            session()->flash('message', 'Category Successfully Updated!');
        } catch (Exception $exception) {
            session()->flash('type', 'danger');
            session()->flash('message', $exception->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
    }

    public function Status($id, $status)
    {
        $Category = Category::find($id);
        $Category->status = $status;
        $Category->save();
        return response()->json('200', '200');
    }
}
