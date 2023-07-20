<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;
    protected $table = "director";
    protected $fillable = ["name", "avatar", "age", "gender", "country"];

    protected static function booted()
    {
        parent::booted(); // TODO: Change the autogenerated stub
        static::creating(function ($item) {
            $item->created_at = now();
            $item->updated_at = now();
        });
        static::saving(function ($item) {
            $item->updated_at = now();
        });
    }
}
