<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'author', 'meal_time'];

    // Relationships
    public function author()
    {
        return $this->belongsTo(User::class, 'author', 'email');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'recipe_ingredients', 'recipe_id', 'ingredient_name')
                    ->withPivot('quantity');
    }

    public function tools()
    {
        return $this->belongsToMany(Tool::class, 'recipe_tools', 'recipe_id', 'tool_name');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'recipe_id', 'id');
    }
}
