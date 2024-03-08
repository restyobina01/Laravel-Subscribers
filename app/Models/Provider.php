<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = ['sim_name']; // Add other fillable columns if needed

    // Define the relationship with the Subscriber model
    public function subscribers()
    {
        return $this->hasMany(Subscriber::class, 'provider_id');
    }
}
