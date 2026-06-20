<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\RecipeItem;
use App\Models\Product;
use App\Models\Ingredient;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::with('product', 'recipeItems.ingredient')->get();
        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        $products = Product::all();
        $ingredients = Ingredient::all();
        return view('recipes.create', compact('products', 'ingredients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'ingredients.*' => 'required|exists:ingredients,id',
            'quantities.*' => 'required|numeric|min:0',
        ]);

        $recipe = Recipe::create([
            'product_id' => $request->product_id,
        ]);

        foreach($request->ingredients as $index => $ingredient_id){
            RecipeItem::create([
                'recipe_id' => $recipe->id,
                'ingredient_id' => $ingredient_id,
                'quantity_used' => $request->quantities[$index],
            ]);
        }

        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully');
    }

    public function edit(Recipe $recipe)
    {
        $products = Product::all();
        $ingredients = Ingredient::all();
        $recipeItems = $recipe->recipeItems;
        return view('recipes.edit', compact('recipe', 'products', 'ingredients', 'recipeItems'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'ingredients.*' => 'required|exists:ingredients,id',
            'quantities.*' => 'required|numeric|min:0',
        ]);

        $recipe->update([
            'product_id' => $request->product_id,
        ]);

        // Remove old recipe items
        $recipe->recipeItems()->delete();

        // Add new recipe items
        foreach($request->ingredients as $index => $ingredient_id){
            RecipeItem::create([
                'recipe_id' => $recipe->id,
                'ingredient_id' => $ingredient_id,
                'quantity_used' => $request->quantities[$index],
            ]);
        }

        return redirect()->route('recipes.index')->with('success', 'Recipe updated successfully');
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully');
    }
}
