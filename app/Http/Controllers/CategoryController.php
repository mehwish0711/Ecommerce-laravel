<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $category=Category::all();
        return view('admin-dashboard.category',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
      return view('admin-dashboard.category-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $category= new Category;
        $category->name = $request->category;
        $category->save();
        return redirect()->route('categories.index')->with('status','Category added succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $category= Category::find($id);
          return view('admin-dashboard.show',compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $category= Category::find($id);
        $category->name = $request->category;
        $category->save();
        return redirect()->route('categories.index')->with('status','Category updated successfully succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)

    {
        //
        $cate=Category::findOrFail($id);
        $cate->delete();
        return redirect()->route('categories.index')->with('status','Your category has been removed successfully');
    }
}
