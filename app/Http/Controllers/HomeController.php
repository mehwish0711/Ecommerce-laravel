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
        $sub_cat_id = $request->sub_cate_id; // li se get ho raha
        $products = Product::where('sub_cate_id', $sub_cat_id)->get();
        $data['products'] = $products;

        // front_product ka partial view ajax se bhej rahe hain
        return response()->json([
            'products_view' => view('front_product', $data)->render()
        ]);
    }

    $data['products'] = Product::all();
    return view('index')->with($data); // default page load
}

   public function shop(Request $request)
{
   $products=Product::paginate(9);

    // Agar AJAX request aaye
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
        // return view('shop2_products')->with($data);
        return response()->json([
            'viewshop' => view('shop2_products', $data)->render()
        ]);
       }
        
  

    // Default full page load ke liye
    // $data['products'] = Product::all();
    return view('shop')->with($data);
}
}