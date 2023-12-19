<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories'; // Specify the correct table name if different
    protected $fillable = ['name'];

    // Define any relationships if needed
    public function books()
    {
        return $this->hasMany(Buku::class);
    }
}
