<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'text_id',
        'name',
        'email',
        'phone',
        'address'
    ];
}
