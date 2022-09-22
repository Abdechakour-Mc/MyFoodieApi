<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $table = "recipes";

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'image_url',
        'preparation_time',
        'cooking_time',
        'level',
        'serves',
        'cook_id',
        'ingredients',
        'method',
    ];


    
    public function user(){
        return $this->belongsTo(User::class,'cook_id','id');
    }

    public function recipe_tags()
    {
        return $this->hasMany(RecipeTag::class, 'recipe_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class, 'recipe_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_recipe', 'recipe_id', 'category_id');
    }

    public function zones()
    {
        return $this->belongsToMany(Zone::class, 'recipe_zone', 'recipe_id', 'zone_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'recipe_id', 'id');
    }
}
