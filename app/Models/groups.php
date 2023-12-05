<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groups extends Model
{
    public $timestamps = false;
    use HasFactory;
    public function tags(){
return $this->belongsToMany(poststags::class,"TAG");
    }
}
