<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'text', 'user_id', 'book_id',
    ];

    public function book()
    {
        return $this->belongsTo('Book');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
