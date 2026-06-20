<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all();
        return view('ingredients.index', compact('ingredients'));
    }

    public function create()
    {
        return view('ingredients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|numeric|min:0',
            'unit' => 'required|string|max:50',
        ]);

        Ingredient::create($request->all());
        return redirect()->route('ingredients.index')->with('success', 'Ingredient added successfully');
    }

    public function edit(Ingredient $ingredient)
    {
        return view('ingredients.edit', compact('ingredient'));
    }

    public function update(Request $request, Ingredient $ingredient)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|numeric|min:0',
            'unit' => 'required|string|max:50',
        ]);

        $ingredient->update($request->all());
        return redirect()->route('ingredients.index')->with('success', 'Ingredient updated successfully');
    }

    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return redirect()->route('ingredients.index')->with('success', 'Ingredient deleted successfully');
    }
}
