<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Lapang extends Model
{
    use HasFactory,SoftDeletes;
    /*
            $table->string('name');
            $table->enum('category',['Futsal','Badminton','Tenis'])
    */
    protected $fillable = [
        'name',
        'category',
        'lat',
        'lng',
        'pic'
    ];
}
