<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::with('categorie')->get();
        return view('admin.produits.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.produits.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->except('image');
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/produits'), $imageName);
            $data['image'] = $imageName;
        }

        Produit::create($data);
        return redirect('/produits')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produit = Produit::with('categorie')->findOrFail($id);
        return view('admin.produits.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produit = Produit::findOrFail($id);
        $categories = Category::all();
        return view('admin.produits.edit', compact('produit', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $produit = Produit::findOrFail($id);
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            if ($produit->image && file_exists(public_path('images/produits/' . $produit->image))) {
                unlink(public_path('images/produits/' . $produit->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/produits'), $imageName);
            $data['image'] = $imageName;
        }

        $produit->update($data);
        return redirect('/produits')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produit = Produit::findOrFail($id);
        
        if ($produit->image && file_exists(public_path('images/produits/' . $produit->image))) {
            unlink(public_path('images/produits/' . $produit->image));
        }
        
        $produit->delete();
        return redirect('/produits')->with('success', 'Product deleted successfully.');
    }
}
