<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FAQCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = FAQCategory::all();
        return view('faq.categories.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('faq.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:faq_categories',
        ]);

        FAQCategory::create($validatedData);

        return redirect()->route('faq.categories.index')->with('success', 'FAQ category created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('faq.categories.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:faq_categories,name,' . $category->id,
        ]);

        $category->update($validatedData);

        return redirect()->route('faq.categories.index')->with('success', 'FAQ category updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category->delete();

        return redirect()->route('faq.categories.index')->with('success', 'FAQ category deleted successfully.');

    }
}
