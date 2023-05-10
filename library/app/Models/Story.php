<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class story extends Model
{
    use HasFactory;

    protected $table = 'story';

    protected $fillable = [
        'reader_id',
        'book_id',
    ];
}
