<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'descripyion' => 'required|string|max:1000',
        ]);

        Category::create([
            'name' => $request->name,
            'descripyion' => $request->descripyion,
        ]);

        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        $category = Category::with('products')->findOrFail($id);

        return view('categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.update', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'descripyion' => 'required|string|max:1000',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'descripyion' => $request->descripyion,
        ]);

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index');
    }
}
