<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type'];

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipe_tools', 'tool_name', 'recipe_id');
    }
}
