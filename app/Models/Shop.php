<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'shopname',
        'address',
    ];

    // Define the relationship with Catalogue
    public function catalogues()
    {
        return $this->hasMany(Catalogue::class);
    }
}


