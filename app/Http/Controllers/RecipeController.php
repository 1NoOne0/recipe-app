<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }
    

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        $recipe = new Recipe();
        $recipe->name = $request->name;
        $recipe->author = Auth::user()->email;
        $recipe->meal_time = $request->meal_time;
        $recipe->save();

        // Optionally add ingredients and tools here
        // $recipe->ingredients()->attach([...]);

        return redirect()->route('recipes.index');
    }

    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }
}
