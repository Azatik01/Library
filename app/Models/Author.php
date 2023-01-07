<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Author
 * @package App\Models
 * @method static create(array $validated_data)
 *
 */

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'picture', 'description'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
