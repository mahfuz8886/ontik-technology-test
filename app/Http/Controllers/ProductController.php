<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) {
        $categories = Category::all();
        //return $categories;
        $products = Product::with('subcategory');
        if($request->title != null) {
            $products = $products->where('title', 'LIKE', "%$request->title%");
        }
        if($request->subcategory_id != null) {
            $products = $products->where('subcategory_id', $request->subcategory_id);
        }
        if($request->price_from != null) {
            $products = $products->where('price', '>=', $request->price_from);
        }
        if($request->price_to != null) {
            $products = $products->where('price', '<=', $request->price_to);
        }
        $products = $products->get();
        return view('backend.product.manage', compact('categories', 'products'));
    }

    public function add_product(Request $request) {
        //return $request->all();

        $validate = $request->validate([
            'title' => 'required',
            'price' => 'required',
        ]);

        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->subcategory_id = $request->subcategory_id;
        $product->price = $request->price;
        $product->thumbnail = $request->thumbnail;
        $product->save();
        return redirect()->back()->with('message', 'Product Added');
    }

    public function delete_product(Request $request) {
        //return $request->id;
        $product = Product::find($request->id);
        $product->delete();
        return redirect()->back()->with('message', 'Product Delete');
        
    }

    public function find_subcategory(Request $request) {
        $subcategories = Subcategory::where('category_id', $request->category_id)->get();
        return response()->json($subcategories);
    }
}
