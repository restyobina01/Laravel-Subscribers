<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'lname',
        'provider_id',
        'number',
        // Add other fillable fields here if needed
    ];

    // Define the relationship with Provider model
    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }
}
