<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
    $data['subcategory'] = SubCategory::all();

    if ($request->ajax() && $request->action == "search_product") {
        $sub_cat_id = $request->sub_cate_id; 
        $products = Product::where('sub_cate_id', $sub_cat_id)->get();
        $data['products'] = $products;

       
        return response()->json([
            'products_view' => view('front_product', $data)->render()
        ]);
    }

    $data['products'] = Product::all();
    return view('index')->with($data); 
}

   public function shop(Request $request)
{
   $products=Product::paginate(9);

   
    if ($request->ajax())
     {
        if ($request->sub_link) 
        {
          
            $products = Product::where('sub_cate_id', $request->sub_link)->paginate(9);
        }
        if ($request->cate_link) 
        {
          
            $products = Product::where('category_id', $request->cate_link)->paginate(9);
        }
          if ($request->price) 
        {
          
            $products = Product::where('price', '<=' , $request->price)->paginate(9);
        }
     } 
         $data['subcategory'] = SubCategory::all();
         $data['category'] = Category::all();
         $data['products'] = $products;

       if($request->ajax()){

        return response()->json([
            'viewshop' => view('shop2_products', $data)->render()
        ]);
       }
        
  

   
    // $data['products'] = Product::all();
    return view('shop')->with($data);
}
}