<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function expenditure(){
        return $this->hasMany(Expenditure::class);
    }

    public function Income(){
        return $this->hasMany(Income::class);
    }

}
