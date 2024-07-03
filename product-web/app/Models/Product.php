<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'clasification_id',
        'name',
        'price'
    ];

    public function clasification() {
        return $this->belongsTo(Clasification::class);
    }
}
