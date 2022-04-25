<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merch_types extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    
    public function merch(){
        return $this->hasMany(Merch::class, 'type_id');
    }
}
