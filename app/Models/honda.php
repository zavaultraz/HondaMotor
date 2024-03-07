<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class honda extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'image',
        
    ];
    public function image(): Attribute{
        return Attribute::make(
            get: fn ($value) => asset('/storage/category/' . $value), 
        );
    }
}
