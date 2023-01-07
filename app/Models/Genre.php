<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Genre
 * @package App\Models
 * @method static create(array $validated_data)
 */

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'picture'];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_genres', 'genre_id', 'book_id');
    }

}
