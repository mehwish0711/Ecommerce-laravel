<?php

namespace App\Http\Controllers;
 use App\Models\Category;
 use App\Models\Product;
 use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function show(){
       $product = Product::with(['category', 'subcategory'])->get();
     
        return view('admin-dashboard.productlist',compact('product'));
    }
   
     public function create(){
        $category = Category::all();
         $subcategory = SubCategory::all();
         
        return view('admin-dashboard.add-products',compact('category','subcategory'));
    }
    public function store(Request $request){
      $product = new Product;
$product->title = $request->title;
$product->price = $request->price;
$product->discount_price = $request->discount_price;
$product->category_id = $request->parent_category;
$product->sub_cate_id = $request->sub_category;
$product->description = $request->description;

if ($request->hasFile('image')) {
    $image = $request->file('image'); 
    $newImage = time() . rand(10000, 99999) . $image->getClientOriginalName();

    $image->move(public_path('uploads/images'), $newImage);
    $product->image = $newImage;
}

$product->save();
return redirect()->route('product');

    }
    public function edit(string $id){
       $product = Product::find($id);
        $category = Category::all();
         $subcategory = SubCategory::all();
     
        return view('admin-dashboard.product-edit',compact('product','category','subcategory'));
    }
          public function update(Request $request ,string $id){
        $product = Product::find($id);
        $product->title = $request->title;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->category_id = $request->parent_category;
        $product->sub_cate_id = $request->sub_category;
        $product->description = $request->description;

          //Image upload check
    if ($request->hasFile('image')) {
        $image = $request->file('image');

        
        if ($product->image && file_exists(public_path('uploads/images/' . $product->image))) {
            unlink(public_path('uploads/images/' . $product->image));
        }

        $extension = $image->getClientOriginalExtension();
        $newImageName = time() . rand(10000, 99999) . '.' . $extension;

       
        $image->move(public_path('uploads/images'), $newImageName);

        
        $product->image = $newImageName;
    }

        $product->save();
        return redirect()->route('product')
        ->with('status','Your Data Successfully Updated');
    }
    public function destroy(string $id){
        $product = Product::findOrFail($id);
    $product->delete();
    return redirect()->route('product');
    }
}
