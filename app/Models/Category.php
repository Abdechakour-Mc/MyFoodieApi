<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'category_recipe', 'category_id', 'recipe_id');
    }
}
