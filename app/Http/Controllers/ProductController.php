<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('backend.product.manage', compact('categories'));
    }

    public function add_product(Request $request) {
        return $request->all();
    }

    public function find_subcategory(Request $request) {
        $subcategories = Subcategory::where('category_id', $request->category_id)->get();
        return response()->json($subcategories);
    }
}
