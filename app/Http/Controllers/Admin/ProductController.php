<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::with('category')->get();

        $search = $request->input('search');
        $searchTrangThai = $request->input('searchTrangThai');

        if ($search) {
            $products = Product::where('ten_san_pham', 'like', '%' . $search . '%')->get();
        }
        
        
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ten_san_pham' => 'required|string|max:255',
            'so_luong' => 'required|integer',
            'gia_san_pham' => 'required|numeric',
            'gia_khuyen_mai' => 'nullable|numeric',
            'ngay_nhap' => 'nullable|date',
            'mo_ta' => 'nullable|string',
            'danh_muc_id' => 'nullable|integer|exists:tb_danh_muc,id',
            'trang_thai' => 'required|boolean',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate images
        ]);
    
        // Save the product data
        $product = Product::create($request->all());
    
        // Handle the uploaded images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Generate a unique name for each image
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/products'), $imageName); // Save the image
    
                // Save image information in the images table
                $imageRecord = new ProductImage();
                $imageRecord->san_pham_id = $product->id; // Link the image to the product
                $imageRecord->link_anh = $imageName;
                $imageRecord->save();
            }
        }
    
        return redirect()->route('products.index')->with('success', 'Tạo mới sản phẩm thành công !!!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('category', 'images')->findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'ten_san_pham' => 'required|string|max:255',
            'so_luong' => 'required|integer',
            'gia_san_pham' => 'required|numeric',
            'gia_khuyen_mai' => 'nullable|numeric',
            'ngay_nhap' => 'nullable|date',
            'mo_ta' => 'nullable|string',
            'danh_muc_id' => 'nullable|integer|exists:tb_danh_muc,id',
            'trang_thai' => 'required|boolean',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate images
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        // Handle the uploaded images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Generate a unique name for each image
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/products'), $imageName); // Save the image

                // Save image information in the images table
                $imageRecord = new ProductImage();
                $imageRecord->san_pham_id = $product->id; // Link the image to the product
                $imageRecord->link_anh = $imageName;
                $imageRecord->save();
            }
        }

        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công !!!');
    }

    /**
     * Soft delete the specified resource from storage.
     */
    public function softDelete(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => "Sản phẩm này không tồn tại"], 404);
        }

        $product->update(['deleted_at' => now()]);

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được chuyển vào thùng rác');
    }

    /**
     * Restore the specified resource from soft deletion.
     */
    public function restore(string $id)
    {
        $product = Product::onlyTrashed()->find($id);

        if (!$product) {
            return response()->json(['message' => "Sản phẩm này không tồn tại"], 404);
        }

        $product->restore();

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được khôi phục');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
    
        try {
            $product = Product::findOrFail($id);
    
            // If there are related records, you might want to delete them first
            // For example, if a product has images, delete them before deleting the product
            $product->images()->delete();
    
            $product->delete();
            
            DB::commit();
    
            return redirect()->route('products.index')->with('success', 'Xoá sản phẩm thành công');
        } catch (QueryException $e) {
            DB::rollBack();
    
            // Log the error or handle it as necessary
            // Log::error($e->getMessage());
    
            return redirect()->route('products.index')->with('error', 'Xoá sản phẩm thất bại: ' . $e->getMessage());
        } catch (\Exception $e) {
            DB::rollBack();
    
            // Log the error or handle it as necessary
            // Log::error($e->getMessage());
    
            return redirect()->route('products.index')->with('error', 'Xoá sản phẩm thất bại: ' . $e->getMessage());
        }
    }
}
