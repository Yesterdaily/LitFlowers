<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    use HasFactory;
    protected $table = 'catalogues';

    protected $fillable = [
        'name',
        'description',
    ];

    // Define the relationship with Flower
    public function flowers()
    {
        return $this->hasMany(Flower::class);
    }
}
