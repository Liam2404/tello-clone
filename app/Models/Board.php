<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function listes()
    {
        return $this->hasMany(Liste::class);
    }

    public function cards()
    {
        return $this->hasManyThrough(Card::class, Liste::class);
    }
}
