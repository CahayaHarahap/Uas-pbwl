<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLoan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function borrower(){
        return $this->belongsTo(Borrower::class);
    }

    public function bookReturn(){
        return $this->hasMany(BookReturn::class);
    }
}
