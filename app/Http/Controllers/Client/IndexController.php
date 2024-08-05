<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comments;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        // Check if the user is authenticated
        // dd(auth()->check());
        
        // Retrieve all products along with their associated categories
        $products = Product::with('category')->get();
        
        // Retrieve the first 10 categories
        $category = Category::take(10)->get();
        
        // Return the client.index view with the retrieved products and categories
        return view('client.index', compact('products', 'category'));
    }
    
    public function search(Request $request)
    {
        // Retrieve the search query and category from the request
        $query = $request->input('query');
        $category = $request->input('category');
        
        // Set the limit for the number of records to retrieve
        $limit = 10;
        
        // Search for products by name or description that match the query
        $products = Product::where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->limit($limit)
            ->get();
        
        // Return the client.search view with the retrieved products, query, and category
        return view('client.search', compact('products', 'query', 'category'));
    }
    
    public function category(Request $request)
    {
        // Retrieve the category ID from the request
        $category = $request->input('category');
        
        // Retrieve products that belong to the specified category
        $products = Product::where('category_id', $category)->get();
        
        // Return the client.category view with the retrieved products and category
        return view('client.category', compact('products', 'category'));
    }
    
    public function product($id)
    {
        // Retrieve approved comments for the specified product
        $comments = Comments::where('san_pham_id', $id)->where('trang_thai', 1)->get();
        
        // Retrieve the product along with its associated images
        $product = Product::with('images')->find($id);
        
        // Return the client.products.show view with the retrieved product and comments
        return view('client.products.show', compact('product', 'comments'));
    }

    public function products() {
        $products = Product::with('images')->get();
        $category = Category::all();
        return view('client.products.listing', compact('products', 'category'));
    }
    
    public function comment() {
        
    }

    public function contact() {

        // return view('client.contact');
        return dd(Auth::check());
    }

    public function sendContact() {

        //
    }


}
