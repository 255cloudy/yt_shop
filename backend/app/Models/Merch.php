<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merch extends Model
{
    use HasFactory;

    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }

    public function type(){
        return $this->belongsTo(Merch_types::class, 'type_id');
    }
}
