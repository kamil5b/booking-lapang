<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;
    /*
            $table->unsignedBigInteger('orang_id');
            $table->foreign('orang_id')->references('id')->on('users');
            $table->date('tanggal');
            $table->time('waktu');
            $table->integer('durasi')->unsigned();
    */
    protected $fillable = [
        'orang_id',
        'user_id',
        'lapang_id',
        'tanggal',
        'waktu',
        'durasi',
        'end_time',
        'ktm'
    ];
}
