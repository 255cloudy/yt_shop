<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    
    public function merch(){
        return $this->has_many(Merch::class);
    }
    
    public function user(){
        return $this->has_one(user::class);
    }
}
