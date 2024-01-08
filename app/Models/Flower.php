<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image_url',
    ];

    // Define the relationship with Catalogue
    public function catalogue()
    {
        return $this->belongsTo(Catalogue::class);
    }
}
