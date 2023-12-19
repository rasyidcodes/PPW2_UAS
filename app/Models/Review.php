<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','review','buku_id', 'content', 'approved'];

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    public function user()
{
    return $this->belongsTo(\App\Models\User::class);
}
}