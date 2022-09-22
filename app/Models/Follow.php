<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $table = 'follows';
    protected $primaryKey=['user_id','cook_id'];
    
    public $incrementing=false;
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'cook_id',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function cook()
    {
        return $this->belongsTo(User::class, 'cook_id', 'id');
    }



}
