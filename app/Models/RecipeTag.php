<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeTag extends Model
{
    use HasFactory;

    protected $table = "recipe_tags";

    protected $primaryKey = 'id';

    protected $fillable = ['tag','recipe_id'];

    public $timestamps = false;

    /**
     * Get the recipe that owns the RecipeTag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id', 'id');
    }
}
