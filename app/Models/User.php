<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name','email', 'password'];

    public function books()
    {
        $this->hasMany(Book::class);
    }

    public function comments()
    {
        $this->hasMany(Comment::class);
    }
}
