<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $table = "zones";

    protected $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipe_zone', 'zone_id', 'recipe_id');
    }
}
