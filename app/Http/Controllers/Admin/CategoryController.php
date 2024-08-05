<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.categorys.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.categorys.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $validationData = $request->validate([
            'ten_danh_muc' => 'required|min:3|max:255',
            'mo_ta' => 'required|min:3',
        ]);

        $category = new Category();

        $category->ten_danh_muc = $validationData['ten_danh_muc'];
        $category->mo_ta = $validationData['mo_ta'];

        $category->save();

        return Redirect::route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Redirect::route('categories.edit', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);

        return view('admin.categorys.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validationData = $request->validate([
            'ten_danh_muc' => 'required|min:3|max:255',
            'mo_ta' => 'required|min:3',
        ]);

        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => "Danh mục không tồn tại"], 404);
        }

        $category->mo_ta = $validationData['mo_ta'];
        $category->ten_danh_muc = $validationData['ten_danh_muc'];

        $category->save();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the record by its ID
        $danhMuc = Category::findOrFail($id);

        // Delete the record
        $danhMuc->delete();

        // Optionally, return a response
        return redirect()->route('categories.index')->with('success', 'Xoá danh mục thành công');
    }
}
